<?php

namespace App\Http\Controllers;

use App\Exports\AgencyExport;
use App\Imports\AgencyImport;
use App\Models\Staff;
use App\Models\Agency;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('name')){
            Agency::firstWhere('id', request(('name')));
        }

        $sort = request()->query('sort', 'id');
        $direction = request()->query('direction', 'asc');

        $tables = Agency::query()
            ->orderBy($sort, $direction)
            ->filter(request(['search', 'name', 'position']))
            ->paginate(10)
            ->withQueryString();

        return view('agency.main', [
            'title' => 'Agency',
            'search' => 'agency',
            'tables' => $tables,
            'staffs' => Staff::all(),
            'export' => 'exportAgency'
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
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'staff_id' => 'required',
            'photo' => 'image|file|max:2048'
        ]);

        // NAMA TIDAK BOLEH SAMA
        $agency = Agency::where('name', $request->name)->first();
        if($agency) {
            return redirect('/agency')->with('error', 'Data has been added!');
        }

        if($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('images/agencies');
        }

        Agency::create($validatedData);

        return redirect('/agency')->with('success', 'Data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'staff_id' => 'required',
            'photo' => 'image|file|max:2048'
        ]);

        if($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('images/agencies');
        }

        Agency::where('id', $agency->id)
                ->update($validatedData);

        return redirect('/agency')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        try {
            Agency::destroy($agency->id);

            return redirect('/agency')->with('success', 'Data has been deleted!');
        } catch (\Throwable $th) {
            return redirect('/agency')->with('error', 'Data cannot Delete');
        }
    }

    public function export() 
    {
        return Excel::download(new AgencyExport, 'agency.xlsx');
    }

    public function import(Request $request)
    {
        $validatedData = $request->file('file');

        $fileName = $validatedData->getClientOriginalName();
        $validatedData->move('AgencyData', $fileName);

        Excel::import(new AgencyImport, public_path('/AgencyData/'.$fileName)); 
        
        return redirect('/agency')->with('success', 'Data has been added!');
    }
}
