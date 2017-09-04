<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ACTIONPLAN;
use App\RESIKO;
use App\MASTERRESIKO;
use App\MDAMPAK;
use App\JUDULPROGRAM;
use App\DETAILPROGRAM;
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

    public function showDetailProgram()
    {
        $jp = JUDULPROGRAM::orderBy('id_judul_program')->get();
        $ap = ACTIONPLAN::orderBy('id_action_plan')->get();
        $rs = RESIKO::orderBy('id_resiko')->get();
        $data = DETAILPROGRAM::join('judul_program', 'detail_program.id_judul_program', '=', 'judul_program.id_judul_program')
            ->join('action_plan', 'detail_program.id_action_plan', '=', 'action_plan.id_action_plan')
            ->where('detail_program.created_by', '=', AUTH::user()->username)
            ->get();
        return view('user.userdetailprogram', compact('data','jp', 'ap', 'rs'));
    }

    public function addDetailProgram(Request $req)
    {
        $d = new DETAILPROGRAM;
        $d->id_judul_program = $req->id_judul_program;
        $d->id_action_plan = $req->id_action_plan;
        $d->unit_sasaran = $req->unit_sasaran;
        $d->rencana_anggaran = $req->rencana_anggaran;
        $d->waktu_pelaksanaan = $req->waktu_pelaksanaan;
        $d->indikator_kegiatan = $req->indikator_kegiatan;
        $d->luaran_dampak = $req->luaran_dampak;
        $d->status_capaian = $req->status_capaian;
        $d->tahun = $req->tahun;
        $d->created_by = $req->created_by;
        $d->save();
        return $this->showDetailProgram();
    }

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
