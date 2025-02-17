<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Scope;
use App\Models\Staff;
use App\Models\Agency;
use App\Models\Talent;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Exports\ProjectExport;
use App\Imports\ProjectImport;
use Maatwebsite\Excel\Facades\Excel;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = [
            (object) ['id' => 1, 'name' => 'Ongoing'],
            (object) ['id' => 2, 'name' => 'Completed'],
            (object) ['id' => 3, 'name' => 'Not Completed'],
        ];

        $tables = Project::latest()->filter(request(['search', 'name', 'brand', 'staff', 'talent', 'bulan', 'tahun', 'link', 'status']))
            ->when(request('status'), function ($query) {
                return $query->where('status', request('status'));
            })
            ->paginate(10)
            ->withQueryString();
        $staff = Staff::all();
        $brand = Brand::orderBy('name')->get();
        $talents = Talent::all();
        $agency = Agency::all();
        $scopes = Scope::all();
        $total_profit = Project::sum('rate_brand') - Project::sum('rate_talent');

        return view('project.main', [
            'title' => 'Project',
            'search' => 'project',
            'export' => 'exportProject',
            'tables' => $tables,
            'staff' => $staff,
            'brand' => $brand,
            'talents' => $talents,
            'agency' => $agency,
            'scopes' => $scopes,
            'link' => 'link',
            'status' => $status, // Mengirim status sebagai array atau objek
            'total_profit' => $total_profit,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agency = Agency::orderBy('name')->get();
        return view('project.create', compact('agency'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'staff_id' => 'required',
            'brand_id' => 'required',
            'date' => 'required',
            'talent_id' => 'required',
            'agency_id' => 'required',
            'scope_id' => 'required',
            'quantity' => 'required',
            'rate_brand' => 'required',
            'rate_talent' => 'required',
            'tgl_pelunasan_talent' => 'required',
            'tgl_pelunasan_brand' => 'required',
            'Keterangan' => 'required',
            'link' => 'nullable|url',
            'status' => 'nullable|in: 1,2,3',
        ]);

        if ($validatedData) {
            $date = $request->date . '-01';
            $status = $request->status ?: 2;
            $validatedData = [
                'name' => $request->name,
                'staff_id' => $request->staff_id,
                'brand_id' => $request->brand_id,
                'date' => $date,
                'talent_id' => $request->talent_id,
                'agency_id' => $request->agency_id,
                'scope_id' => $request->scope_id,
                'quantity' => $request->quantity,
                'rate_brand' => $request->rate_brand,
                'rate_talent' => $request->rate_talent,
                'tgl_pelunasan_talent' => $request->tgl_pelunasan_talent,
                'tgl_pelunasan_brand' => $request->tgl_pelunasan_brand,
                'Keterangan' => $request->Keterangan,
                'link' => $request->link,
                'status' => $status,
            ];
        }

        Project::create($validatedData);
        return redirect('/project')->with('success', 'Data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $agency = Agency::orderBy('name')->get(); // ambil agency urut abjad
        $staffs = Staff::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        $talents = Talent::orderBy('name')->get();
        $scopes = Scope::orderBy('name')->get();
        return view('project.edit', compact('project', 'agency'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'staff_id' => 'required',
            'brand_id' => 'required',
            'date' => 'required',
            'talent_id' => 'required',
            'agency_id' => 'required',
            'scope_id' => 'required',
            'quantity' => 'required',
            'rate_brand' => 'required',
            'rate_talent' => 'required',
            'tgl_pelunasan_talent' => 'required',
            'tgl_pelunasan_brand' => 'required',
            'Keterangan' => 'required',
            'link' => 'nullable|url',
            'status' => 'nullable|in:1,2,3',
        ]);

        $status = $request->status ?: 2;

        if ($validatedData) {
            $date = $request->date . '-01';
            $validatedData = [
                'name' => $request->name,
                'staff_id' => $request->staff_id,
                'brand_id' => $request->brand_id,
                'date' => $date,
                'talent_id' => $request->talent_id,
                'agency_id' => $request->agency_id,
                'scope_id' => $request->scope_id,
                'quantity' => $request->quantity,
                'rate_brand' => $request->rate_brand,
                'rate_talent' => $request->rate_talent,
                'tgl_pelunasan_talent' => $request->tgl_pelunasan_talent,
                'tgl_pelunasan_brand' => $request->tgl_pelunasan_brand,
                'Keterangan' => $request->Keterangan,
                'link' => $request->link,
                'status' => $request->status,
            ];
        }

        Project::where('id', $project->id)->update($validatedData);



        return redirect('/project')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Project::destroy($project->id);
        return redirect('/project')->with('success', 'Data has been deleted!');
    }

    public function export()
    {
        return Excel::download(new ProjectExport, 'Project.xlsx');
    }

    public function import(Request $request)
    {
        $validatedData = $request->file('file');

        $fileName = $validatedData->getClientOriginalName();
        $validatedData->move('ProjectData', $fileName);

        Excel::import(new ProjectImport, public_path('/ProjectData/' . $fileName));

        return redirect('/project')->with('success', 'Data has been added!');
    }
}
