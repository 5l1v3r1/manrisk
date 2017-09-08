<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ACTIONPLAN;
use App\RESIKO;
use App\MASTERRESIKO;
use App\MDAMPAK;
use App\ASPEKTERDAMPAK;
use App\MKEMUNGKINANTERJADI;
use AUTH;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mr = MASTERRESIKO::orderBy('id_master_resiko')->get();
        //dd($mr);
        $at = ASPEKTERDAMPAK::orderBy('id_aspek_terdampak')->get();
        //dd($at);
        $dm = MDAMPAK::orderBy('id_dampak')->get();
        //dd($d);
        $kt = MKEMUNGKINANTERJADI::orderBy('id_kemungkinan')->get();
        //dd($kt);
        $data = RESIKO::orderBy('id_resiko')
            ->join('m_dampak', 'resiko.id_dampak', '=', 'm_dampak.id_dampak')
            ->join('aspek_terdampak', 'resiko.id_aspek_terdampak', '=', 'aspek_terdampak.id_aspek_terdampak')
            ->join('m_kemungkinan_terjadi', 'resiko.id_kemungkinan', '=', 'm_kemungkinan_terjadi.id_kemungkinan')
            ->join('master_resiko', 'resiko.id_master_resiko', '=', 'master_resiko.id_master_resiko')
            ->where('created_by', '=', AUTH::user()->username)
            ->get();
        return view('user.userresiko', compact('data', 'mr', 'at', 'dm', 'kt'));
    }

    public function addResiko(Request $req)
    {
        $dampak = MDAMPAK::where('id_dampak', $req->id_dampak)->value('skor_dampak');
        $kemungkinan = MKEMUNGKINANTERJADI::where('id_kemungkinan', $req->id_kemungkinan)->value('skor_kemungkinan');
        $skor = $dampak*$kemungkinan;
        $d = new RESIKO;
        $d->id_kemungkinan = $req->id_kemungkinan;
        $d->id_dampak = $req->id_dampak;
        $d->id_aspek_terdampak = $req->id_aspek_terdampak;
        $d->total_skor = $skor;
        $d->created_by = $req->created_by;
        $d->deskripsi_resiko = $req->deskripsi_resiko;
        $d->id_master_resiko = $req->id_master_resiko;
        $d->save();
        return $this->index();
    }

//=============================================================================================================================

    public function showActionPlan()
    {
        $rs = RESIKO::orderBy('id_resiko')->get();
        $data = ACTIONPLAN::orderBy('id_action_plan')
            ->join('resiko', 'action_plan.id_resiko', '=', 'resiko.id_resiko')
            ->join('aspek_terdampak', 'resiko.id_aspek_terdampak', '=', 'aspek_terdampak.id_aspek_terdampak')
            ->get();
        return view('user.useractionplan', compact('data', 'rs'));
    }

    public function addActionPlan(Request $req)
    {
        $d = new ACTIONPLAN;
        $d->id_action_plan = $req->id_action_plan;
        $d->nama_action_plan = $req->nama_action_plan;
        $d->id_resiko = $req->id_resiko;
        $d->waktu_pelaksanaan = $req->waktu_pelaksanaan;
        $d->status_pelaksanaan = $req->status_pelaksanaan;
        $d->pic = $req->pic;
        $d->keterangan = $req->keterangan;
        $d->save();
        return $this->showActionPlan();
    }

//=============================================================================================================================

    public function findSkorDampak(Request $req)
    {
        $sd = MDAMPAK::where('id_dampak', $req->id_dampak)->first();
        return response()->json($sd);
    }

    public function findSkorKemungkinan(Request $req)
    {
        $sk = MKEMUNGKINANTERJADI::where('id_kemungkinan', $req->id_kemungkinan)->first();
        return response()->json($sk);
    }


}
