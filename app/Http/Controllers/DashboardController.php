<?php

namespace App\Http\Controllers;

// use App\Models\Earning;
use App\Models\Project;
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
        $yearsProject = DB::table('projects')
            ->selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

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
        $positionDataQuery = Position::select(
            'positions.name AS name',
            DB::raw('COUNT(DISTINCT interns.id) AS intern_count'),
            DB::raw('COUNT(DISTINCT staff.id) AS staff_count'),
            DB::raw('COUNT(DISTINCT interns.id) + COUNT(DISTINCT staff.id) AS total_count')
        )
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


        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $dataSpending = Spending::all();
        // $dataEarning = Earning::all();
        $dataProject = Project::all();

        $yearsSpending = Spending::selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // $yearsEarning = Earning::selectRaw('YEAR(date) as year')
        //     ->distinct()
        //     ->orderBy('year', 'desc')
        //     ->pluck('year');
        $yearsProject = Project::selectRaw('YEAR(tgl_pelunasan_brand) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // $earningDataQuery = Earning::with('sows')->filter(request(['bulan', 'tahun']))->where('status', 'selesai');
        // if ($request->has('bulan') && $request->has('tahun')) {
        //     $earningsData = $earningDataQuery->latest()->paginate(5);
        // } else {
        //     $earningsData = Earning::whereMonth('date', $currentMonth)->whereYear('date', $currentYear)->where('status', 'selesai')->latest()->paginate(5);
        // }

        $projectDataQuery = Project::filter(request(['bulan', 'tahun']))
            ->where('status', 2);


        if ($request->has('bulan') && $request->has('tahun')) {
            $projectsData = $projectDataQuery->latest()->paginate(5);
        } else {
            $projectsData = Project::whereMonth('tgl_pelunasan_brand', $currentMonth)->whereYear('tgl_pelunasan_brand', $currentYear)->where('status', 2)->latest()->paginate(5);
        }

        $spendingsDataQuery = Spending::filter(request(['bulanSpending', 'tahunSpending']))->where('status', 'selesai');
        if ($request->has('bulanSpending') && $request->has('tahunSpending')) {
            $spendingsData = $spendingsDataQuery->latest()->paginate(5);
        } else {
            $spendingsData = Spending::whereMonth('date', $currentMonth)->whereYear('date', $currentYear)->where('status', 'selesai')->latest()->paginate(5);
        }

        $totalSpendings = $spendingsData->sum('budget');


        $talent_rate = $projectsData->sum('rate_talent'); // tidak perlu pakai sows

        $totalProjects = $projectsData->sum('rate_brand') - $talent_rate;



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
            // 'earnings' => Earning::where('status', 'selesai')->latest()->paginate(5),
            // 'spendings' => Spending::latest()->paginate(5),
            // 'spendings' => Spending::where('status', 'selesai')->latest()->paginate(5),
            'selectedYear' => $year,
            // 'totalEarnings' => $totalEarnings,
            // 'earnings' => $earningsData,
            'projects' => $projectsData,
            'totalProjects' => $totalProjects,
            'spendings' => $spendingsData,
            'yearsSpending' => $yearsSpending,
            // 'yearsEarning' => $yearsEarning,
            'yearsProject' => $yearsProject,
            'totalSpendings' => $totalSpendings,
        ]);
    }
}
