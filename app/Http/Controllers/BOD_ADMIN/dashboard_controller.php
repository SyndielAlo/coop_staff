<?php

namespace App\Http\Controllers\BOD_ADMIN;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\resolution;
use App\Models\BOD;
use App\Models\Committee;
use App\Models\DepartmentHead;
use App\Models\Log;

class dashboard_controller extends Controller
{    
    //resolution view admin
    public function dashboard(){
        $resolutions = resolution::all();
        $totalResolutions1 = resolution::count();
        $totalBODs1 = BOD::count();
        $totalCommittees1 = Committee::count();
        $totalDH1 = DepartmentHead::count();
        return view('1st_admin.dashboard', compact('resolutions', 'totalResolutions1', 'totalBODs1', 'totalCommittees1', 'totalDH1'));
        
    }

    public function bod_dashboard(){
        $BODs = BOD::all();
        $totalResolutions1 = resolution::count();
        $totalBODs1 = BOD::count();
        $totalCommittees1 = Committee::count();
        $totalDH1 = DepartmentHead::count();
        return view('1st_admin.bod_dashboard',compact('BODs', 'totalResolutions1', 'totalBODs1', 'totalCommittees1', 'totalDH1'));
    }

    public function bod_com_dashboard() {
        $committees = Committee::all();
        $totalResolutions1 = resolution::count();
        $totalBODs1 = BOD::count();
        $totalCommittees1 = Committee::count();
        $totalDH1 = DepartmentHead::count(); // Use count instead of sum('id') to get the total count
    
        return view('1st_admin.bod_com_dashboard', compact('committees', 'totalResolutions1', 'totalBODs1', 'totalCommittees1', 'totalDH1'));
    }

    public function dh_dashboard(){
        $DH = DepartmentHead::all();
        $totalResolutions1 = resolution::count();
        $totalBODs1 = BOD::count();
        $totalCommittees1 = Committee::count();
        $totalDH1 = DepartmentHead::count();
        // Manually convert date_added to Carbon
        $DH->each(function ($departmentHead) {
        $departmentHead->date_added = Carbon::parse($departmentHead->date_added);
    });
        return view('1st_admin.dh_dashboard',compact('DH', 'totalResolutions1', 'totalBODs1', 'totalCommittees1', 'totalDH1'));
    }

    public function dh_logs(Request $request)
    {
        // Get logs for a specific month
        $month = $request->input('month', date('m')); // Default to the current month
        $year = $request->input('year', date('Y'));   // Default to the current year

        $logs = Log::all();
        $Logs = Log::whereYear('login_time', $year)
                    ->whereMonth('login_time', $month)
                    ->get();

        // Calculate total logs for each day in the month
        $logCountByDay = $Logs->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d');
        });

        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

        $logCounts = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $logCounts[] = $logCountByDay->has($day) ? $logCountByDay[$day]->count() : 0;
        }

        return view('1st_admin.dh_logs', compact('logs', 'Logs', 'logCounts'));
    }

    public function bod_dashboard_main(){
        $BODs = BOD::all();
        $totalResolutions1 = resolution::count();
        $totalBODs1 = BOD::count();
        $totalCommittees1 = Committee::count();
        $totalDH1 = DepartmentHead::count();
        return view('1st_admin.BOD (view only).BOD_dashboard',compact('BODs', 'totalResolutions1', 'totalBODs1', 'totalCommittees1', 'totalDH1'));
    }
    public function bod_committee_dashboard(){
        $Committees = Committee::all();
        $totalResolutions1 = resolution::count();
        $totalBODs1 = BOD::count();
        $totalCommittees1 = Committee::count();
        $totalDH1 = DepartmentHead::count();
        return view('1st_admin.BOD (view only).BOD_committee',compact('Committees', 'totalResolutions1', 'totalBODs1', 'totalCommittees1', 'totalDH1'));
    }
    public function bod_resolution_dashboard(){
        $resolutions = Resolution::all();
        $totalResolutions1 = resolution::count();
        $totalBODs1 = BOD::count();
        $totalCommittees1 = Committee::count();
        $totalDH1 = DepartmentHead::count(); 
        return view('1st_admin.BOD (view only).BOD_resolution',compact('resolutions', 'totalResolutions1', 'totalBODs1', 'totalCommittees1', 'totalDH1'));
    }
    public function department_head_dashboard(){
        $DH = DepartmentHead::all();
        $totalResolutions1 = resolution::count();
        $totalBODs1 = BOD::count();
        $totalCommittees1 = Committee::count();
        $totalDH1 = DepartmentHead::count();
        return view('1st_admin.BOD (view only).BOD_DH',compact('DH', 'totalResolutions1', 'totalBODs1', 'totalCommittees1', 'totalDH1'));
    }
}
