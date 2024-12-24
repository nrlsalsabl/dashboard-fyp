<?php

namespace App\Http\Controllers;

use App\Models\Scope;
use App\Exports\ScopeExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Scope::latest()->filter(request(['search', 'name']))->paginate(10)->withQueryString();
        return view('scope.main', [
            'title' => 'Scope',
            'search' => 'scope',
            'export' => 'exportScope',
            'tables' => $tables,

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
        ]);

        Scope::create($validatedData);
        return redirect('/scope')->with('success', 'Data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scope $scope)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scope $scope)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scope $scope)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Scope::where('id', $scope->id)->update($validatedData);
        return redirect('/scope')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scope $scope)
    {
        Scope::destroy($scope->id);
        return redirect('/scope')->with('success', 'Data has been deleted!');
    }

    public function export()
    {
        return Excel::download(new ScopeExport, 'Scope.xlsx');
    }
}
