<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Scope;
use App\Models\Staff;
use App\Models\Agency;
use App\Models\Talent;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProjectExport;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Project::latest()->filter(request(['search', 'name']))->paginate(10)->withQueryString();
        $staff = Staff::all();
        $brand = Brand::all();
        $talent = Talent::all();
        $agency = Agency::all();
        $scopes = Scope::all();



        return view('project.main', [
            'title' => 'Project',
            'search' => 'project',
            'export' => 'exportProject',
            'tables' => $tables,
            'staff' => $staff,
            'brand' => $brand,
            'talent' => $talent,
            'agency' => $agency,
            'scopes' => $scopes,

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
        ]);





        if ($validatedData) {
            $date = $request->date . '-01';
            $data = [
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
            ];
        }



        Project::create($data);
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
    public function edit(Project $project) {}

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
        ]);





        if ($validatedData) {
            $date = $request->date . '-01';
            $data = [
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
            ];
        }

        Project::where('id', $project->id)->update($data);



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
}
