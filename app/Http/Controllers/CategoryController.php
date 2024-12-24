<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Category::orderBy('name', 'asc')->filter(request(['search', 'name']))->paginate(10)->withQueryString();
        return view('category.main', [
            'title' => 'Kategori',
            'search' => 'categories',
            'tables' => $tables,
            'export' => 'exportCategory',
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

        // NAMA TIDAK BOLEH SAMA
        if (Category::where('name', $validatedData['name'])->exists()) {
            return redirect('/categories')->with('error', 'Kategori sudah ada');
        }
        
        Category::create($validatedData);

        return redirect('/categories')->with('success', 'Data has been added!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        // NAMA TIDAK BOLEH SAMA
        if (Category::where('name', $validatedData['name'])->exists()) {
            return redirect('/category')->with('error', 'Kategori sudah ada');
        }
        Category::where('id', $id)->update($validatedData);

        return redirect('/category')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);

        return redirect('/category')->with('success', 'Data has been deleted!');
    }
}
