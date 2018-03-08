<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\SyncWithApimo;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a dashboard.
     *
     * @return Response
     */

    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function force_update()
    {
        SyncWithApimo::force_update();

        return redirect('/admin');
    }

}
