<?php

namespace App\Http\Controllers;


use Session;

use App\Models\Intern;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Imports\InternImport;
use App\Exports\InternExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Province;

class InternController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('name')){
            Intern::firstWhere('id', request(('name')));
        }

        $sort = request()->query('sort', 'id');
        $direction = request()->query('direction', 'asc');

        $tables = Intern::query()
            ->orderBy($sort, $direction)
            ->filter(request(['search', 'name', 'position', 'bulan', 'status']))
            ->paginate(10)
            ->withQueryString();

        return view('interns.main', [
            'title' => 'Intern',
            'search' => 'intern',
            'tables' => $tables,
            'positions' => Position::all(),
            'provinces' => Province::all(),
            'export' => 'exportIntern'
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
            'email' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required|max:12',
            'place' => 'required',
            'birth' => 'required',
            'village_id' => 'required',
            'address' => 'required|max:255',
            'position_id' => 'required|max:255',
            'instagram' => 'required',
            'linkedin' => 'required'
        ]);

        Intern::create($validatedData);

        return redirect('/intern')->with('success', 'Data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intern $intern)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intern $intern)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required|max:12',
            'place' => 'required',
            'birth' => 'required',
            'village_id' => 'required',
            'address' => 'required',
            'position_id' => 'required|max:255',
            'instagram' => 'required',
            'linkedin' => 'required',
            'status' => 'required'
        ]);

        Intern::where('id', $intern->id)
                ->update($validatedData);

        return redirect('/intern')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intern $intern)
    {
        Intern::destroy($intern->id);

        return redirect('/intern')->with('success', 'Data has been deleted!');
    }

    public function export() 
    {
        return Excel::download(new InternExport, 'intern.xlsx');
    }

    public function import(Request $request)
    {
        $validatedData = $request->file('file');

        $fileName = $validatedData->getClientOriginalName();
        $validatedData->move('InternData', $fileName);

        Excel::import(new InternImport, public_path('/InternData/'.$fileName)); 
        
        return redirect('/intern')->with('success', 'Data has been added!');
    }
}
