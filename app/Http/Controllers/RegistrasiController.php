<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Staff;
use App\Models\Talent;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('forms.form', [
            'title' => "FYP Media",
            'categories' => Category::all(),
            'staffs' => Staff::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|max:12',
            'ttl' => 'required',
            'domicile' => 'required',
            'category_id' => 'required',
            'instagram' => 'required',
            'rate_igs' => 'required',
            'rate_igf' => 'required',
            'rate_igr' => 'required',
            'rate_igl' => 'required',
            'tiktok' => 'required',
            'ftiktok' => 'required',
            'rate_ttf' => 'required',
            'rate_ttl' => 'required',
            'youtube' => 'required',
            'syoutube' => 'required',
            'rate_yt' => 'required',
            'rate_event' => 'required',
            'talent_exclusive' => 'required',
            'staff_id' => 'required',
            'shopee_affiliate' => 'required',
            'tiktok_affiliate' => 'required',
            'mcn_tiktok' => 'required',
            'place' => 'required',
        ]);

        if($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('images/talents');
        }

        Talent::create($validatedData);

        return redirect('/registrasi-talent')->with('success', 'Berhasil Mendaftar!');
    }
}
