<?php

namespace App\Http\Controllers;

use App\Models\EBOM;
use App\Models\MBOM;
use App\Models\TRPGMMODEL;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'total' => [
                'ebom'  => EBOM::count(),
                'mbom'  => MBOM::count(),
                'pesawat'   => TRPGMMODEL::count(),
                'user'  => User::count()
            ],
            'chart_ebom'    => $this->getChartEBOM(),
            'chart_mbom'    => $this->getChartMBOM()
        ]);
    }

    public function getChartEBOM()
    {
        $labels = [];
        $values = [];

        // Inisialisasi array untuk semua 12 bulan dengan nilai 0
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::createFromFormat('m', $i)->format('M');
            $labels[] = $monthName;
            $values[$i] = 0;
        }

        // Ambil dan atur nilai dari database
        $data = EBOM::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        foreach ($data as $item) {
            $month = $item->month;
            $values[$month] = $item->total;
        }

        $chartData = [
            'labels' => $labels,
            'values' => array_values($values) // Mengambil nilai dari array, mengabaikan kunci (bulan)
        ];

        return $chartData;
    }

    public function getChartMBOM()
    {
        $labels = [];
        $values = [];

        // Inisialisasi array untuk semua 12 bulan dengan nilai 0
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::createFromFormat('m', $i)->format('M');
            $labels[] = $monthName;
            $values[$i] = 0;
        }

        // Ambil dan atur nilai dari database
        $data = MBOM::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        foreach ($data as $item) {
            $month = $item->month;
            $values[$month] = $item->total;
        }

        $chartData = [
            'labels' => $labels,
            'values' => array_values($values) // Mengambil nilai dari array, mengabaikan kunci (bulan)
        ];
        return $chartData;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
