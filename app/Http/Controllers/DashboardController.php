<?php

namespace App\Http\Controllers;

use App\Models\Earning;
use App\Models\Staff;
use App\Models\Intern;
use App\Models\Talent;
use App\Models\Position;
use App\Models\Indicator;
use App\Models\Performance;
use App\Models\Spending;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', date('Y'));
    
        $months = range(1, 12);
    
        $internData = collect($months)->map(function ($month) use ($year) {
            $result = Performance::selectRaw('AVG(result) as result')
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->first();
    
            return (object) [
                'month' => $month,
                'month_name' => Carbon::createFromDate(null, $month)->monthName,
                'result' => $result ? $result->result : 0,
            ];
        });
    
        // Query untuk staffData
        $staffData = collect($months)->map(function ($month) use ($year) {
            $result = Indicator::selectRaw('AVG(result) as result')
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->first();
    
            return (object) [
                'month' => $month,
                'month_name' => Carbon::createFromDate(null, $month)->monthName,
                'result' => $result ? $result->result : 0,
            ];
        });
    
        $positionType = $request->input('position', 'total');
        $positionDataQuery = Position::select('positions.name AS name',
            DB::raw('COUNT(DISTINCT interns.id) AS intern_count'),
            DB::raw('COUNT(DISTINCT staff.id) AS staff_count'),
            DB::raw('COUNT(DISTINCT interns.id) + COUNT(DISTINCT staff.id) AS total_count'))
            ->leftJoin('interns', 'interns.position_id', '=', 'positions.id')
            ->leftJoin('staff', 'staff.position_id', '=', 'positions.id');

        if ($positionType == 'intern') {
            $positionDataQuery->whereNotNull('interns.id');
        } elseif ($positionType == 'staff') {
            $positionDataQuery->whereNotNull('staff.id');
        }

        $positionData = $positionDataQuery->groupBy('name')->get();
    
        $labels = [];
        $data = [];
        foreach ($positionData as $position) {
            $labels[] = $position->name;
            $data[] = $position->total_count;
        }
    
        $staffCount = Staff::count();
        $talentCount = Talent::where('status', 1)->count();
        $internCount = Intern::count();
    
        return view('dashboard', [
            'title' => 'Dashboard',
            'positions' => Position::count(),
            'staffs' => $staffCount,
            'talents' => $talentCount,
            'interns' => $internCount,
            'labels' => $labels,
            'pie' => $data,
            'internData' => $internData,
            'staffData' => $staffData,
            'earnings' => Earning::where('status', 'selesai')->latest()->paginate(5),
            // 'spendings' => Spending::latest()->paginate(5)
            'spendings' => Spending::where('status', 'selesai')->latest()->paginate(5),
            'selectedYear' => $year,
        ]);
    }
}
