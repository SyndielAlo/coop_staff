<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Don't forget to import the Request class
use App\Models\Log;
use Carbon\Carbon;

class LogController extends Controller
{
    public function showLineChart(Request $request)
    {
        $logs = Log::all();

        // Get logs for a specific month
        $month = $request->input('month', date('m')); // Default to the current month
        $year = $request->input('year', date('Y'));   // Default to the current year

        $logs = Log::whereYear('login_time', $year)
                    ->whereMonth('login_time', $month)
                    ->get();

        // Calculate total logs for each day in the month
        $logCountByDay = $logs->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d');
        });

        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

        $logCounts = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $logCounts[] = $logCountByDay->has($day) ? $logCountByDay[$day]->count() : 0;
        }

        return view('1st_admin.dh_logs', compact('logCounts'));
    }
}

