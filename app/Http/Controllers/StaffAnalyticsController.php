<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffAnalyticsController extends Controller
{
    public function index()
    {
        return view('admin.staff.staffAnalytics');
    }
}
