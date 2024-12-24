<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('forms.main', [
            'title' => 'Registrasi',
            'search' => 'fregsitrasi',
            'export' => 'exportRegis',
        ]);
    }
    
}
