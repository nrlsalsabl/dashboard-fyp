<?php

namespace App\Http\Controllers;

use App\Models\Sow;
use App\Models\Talent;
use App\Models\Earning;
use Illuminate\Http\Request;
use App\Exports\EarningExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreFinanceRequest;
use App\Http\Requests\UpdateFinanceRequest;

class EarningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort = request()->query('sort', 'id');
        $direction = request()->query('direction', 'asc');

        $earningsQuery = Earning::with('sows')
            ->filter(request(['search', 'name', 'bulan', 'tahun', 'tipe', 'status', 'talent']));

        $earnings = $earningsQuery->get();

        $earnings = $earnings->map(function($earning) {
            $total_talent_rate = $earning->sows->sum(function($sow) {
                return $sow->pivot->talent_rate;
            });
            $earning->total_talent_rate = $total_talent_rate;
            $earning->profit = $earning->rate - $total_talent_rate;
            return $earning;
        });

        if ($sort === 'profit') {
            $earnings = $direction === 'asc'
                ? $earnings->sortBy('profit')
                : $earnings->sortByDesc('profit');
        } elseif ($sort === 'sow') {
            $earnings = $direction === 'asc'
                ? $earnings->sortBy(function($earning) {
                    return $earning->sows->pluck('name')->first();
                })
                : $earnings->sortByDesc(function($earning) {
                    return $earning->sows->pluck('name')->first();
                });
        } else {
            $earnings = $direction === 'asc'
                ? $earnings->sortBy($sort)
                : $earnings->sortByDesc($sort);
        }

        $page = request('page', 1);
        $perPage = 10;
        $paginatedEarnings = new \Illuminate\Pagination\LengthAwarePaginator(
            $earnings->forPage($page, $perPage),
            $earnings->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('earnings.main', [
            'title' => 'Pendapatan',
            'search' => 'earnings',
            'tables' => $paginatedEarnings,
            'export' => 'exportEarning',
            'talents' => Talent::orderBy('name')->get(),
            'sows' => Sow::orderBy('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'earnable_id' => 'required',
            'earnable_type' => 'required',
            'talent_id' => 'required',
            'date' => 'required',
            'sows' => 'required',
            'rate' => 'required|numeric',
            'link_project' => 'nullable|url',
        ]);

        // transaction
        try {
            DB::transaction(function () use ($validatedData) {
                $earning = Earning::create($validatedData);
    
                // Generate talent_rate and note for each sow
                $sowsIDs = $validatedData['sows'];
                
                // get all sows based on the IDs
                $sows = Sow::find($sowsIDs);

                // get talent based on the ID
                $talent = Talent::find($validatedData['talent_id']);

                foreach ($sows as $sow) {
                    $talent_rate = 0;
                    switch ($sow->name) {
                        case 'IG Feed':
                            $talent_rate = $talent->rate_igf;
                            break;
                        case 'IG Story':
                            $talent_rate = $talent->rate_igs;
                            break;
                        case 'IG Reels':
                            $talent_rate = $talent->rate_igr;
                            break;
                        case 'IG Live':
                            $talent_rate = $talent->rate_igl;
                            break;
                        case 'Tiktok':
                            $talent_rate = $talent->rate_ttf;
                            break;
                        case 'Tiktok Live':
                            $talent_rate = $talent->rate_ttl;
                            break;
                        case 'Youtube':
                            $talent_rate = $talent->rate_yt;
                            break;
                        case 'Attandance':
                            $talent_rate = $talent->rate_yt;
                            break;
                        default:
                            $talent_rate = 0;
                            break;
                    }

                    $earning->sows()->attach($sow, [
                        'talent_rate' => $talent_rate
                    ]);
                }
            });

            return redirect()->route('earnings.index')->with('success', 'Pendapatan berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('earnings.index')->with('error', 'Pendapatan gagal ditambahkan');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Earning $earning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Earning $earning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Earning $earning)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'link_project' => 'nullable|url',
        ]);

        // dd($validatedData);
        Earning::where('id', $earning->id)
                ->update($validatedData);

        return redirect('/earnings')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Earning $earning)
    {
        try {
            Earning::destroy($earning->id);

            return redirect('/earnings')->with('success', 'Data has been deleted!');
        } catch (\Throwable $th) {
            return redirect('/earnings')->with('error', 'Data cannot Delete');
        }
    }

    public function export()
    {
        return Excel::download(new EarningExport, 'earning.xlsx');
    }
}
