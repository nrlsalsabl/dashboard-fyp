<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Agency;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;

class DependantDropdownController extends Controller
{
    public function getAgencies(Request $request)
    {
        $agencies = Agency::select('id', 'name')->orderBy('name')->get();
        return response()->json($agencies);
    }

    public function getBrands()
    {
        $brands = Brand::select('id', 'name')->orderBy('name')->get();
        return response()->json($brands);
    }

    public function getRegencies($province_id)
    {
        $regencies = Regency::where('province_id', $province_id)->get();
        return response()->json($regencies);
    }

    public function getDistricts($regency_id)
    {
        $districts = District::where('regency_id', $regency_id)->get();
        return response()->json($districts);
    }

    public function getVillages($district_id)
    {
        $villages = Village::where('district_id', $district_id)->get();
        return response()->json($villages);
    }
}
