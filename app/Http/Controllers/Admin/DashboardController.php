<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // // Example data to fetch and pass to the dashboard view
        // $flightCount = Flight::count();
        // $userCount = User::count();
        // $pendingApprovals = Flight::where('status', 'pending_approval')->count();

        // return view('admin.dashboard.index', [
        //     'flightCount' => $flightCount,
        //     'userCount' => $userCount,
        //     'pendingApprovals' => $pendingApprovals
        // ]);
        return view('admin.dashboard');
    }
}
