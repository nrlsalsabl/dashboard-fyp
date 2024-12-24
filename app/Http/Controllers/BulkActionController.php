<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Staff;
use App\Models\Agency;
use App\Models\Earning;
use App\Models\Indicator;
use App\Models\Intern;
use App\Models\Performance;
use App\Models\Spending;
use App\Models\Talent;
use Illuminate\Http\Request;

class BulkActionController extends Controller
{
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $model = $request->model;
        try {
            switch ($model) {
                case 'talent':
                    Talent::destroy($ids);
                    break;
                case 'staff':
                    Staff::destroy($ids);
                    break;
                case 'intern':
                    Intern::destroy($ids);
                    break;
                case 'brand':
                    // Check if the brand used in earning
                    $earnings = Earning::where('earnable_type', 'App\Models\Brand')->whereIn('earnable_id', $ids)->get();
                    if ($earnings->count() > 0) {
                        return response()->json(['error' => "Gagal menghapus! Brand ini terhubung dengan data pendapatan. Jika ingin tetap menghapus brand ini maka hapus semua pendapatan dengan brand ini terlebih dahulu."]);
                    }
                    Brand::destroy($ids);
                    break;
                case 'agency':
                    // Check if the agency used in earning
                    $earnings = Earning::where('earnable_type', 'App\Models\Agency')->whereIn('earnable_id', $ids)->get();
                    if ($earnings->count() > 0) {
                        return response()->json(['error' => "Gagal menghapus! Agency ini terhubung dengan data pendapatan. Jika ingin tetap menghapus agency ini maka hapus semua pendapatan dengan agency ini terlebih dahulu."]);
                    }
                    Agency::destroy($ids);
                    break;
                case 'performance':
                    Performance::destroy($ids);
                    break;
                case 'indicator':
                    Indicator::destroy($ids);
                    break;
                case 'earnings':
                    Earning::destroy($ids);
                    break;
                case 'spendings':
                    Spending::destroy($ids);
                    break;
                default:
                    break;
            }
            return response()->json(['success' => "Data Deleted successfully.", 'ids' => $request['ids'], 'model' => $request['model']]);
        } catch (\Exception $e) {
            // return response()->json(['error' => $e->getMessage()]);
            return response()->json(['error' => "Gagal menghapus! Data ini terhubung dengan data lain."]);
        }
    }
}
