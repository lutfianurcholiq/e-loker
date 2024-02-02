<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $apply = DB::table('applies')
                ->select('applies.*')
                ->where('applies.user_id', auth()->user()->id)
                ->get();

        $ap = $apply->count();

        $jmlh_status_diterima = $apply->where('status_apply','diterima')->count();
        $jmlh_status_ditolak = $apply->where('status_apply','ditolak')->count();
        $jmlh_status_menunggu = $apply->where('status_apply','menunggu')->count();


        return view('dashboard.index', [
            'title' => 'Dashboard',
            'apply' => $apply,
            'jmlh_apply' => $ap,
            'diterima' =>  $jmlh_status_diterima,
            'ditolak' => $jmlh_status_ditolak,
            'menunggu' => $jmlh_status_menunggu
        ]);
    }
}
