<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ACTIONPLAN;
use App\USER;
use App\RESIKO;
use App\MASTERRESIKO;
use App\MDAMPAK;
use App\JUDULPROGRAM;
use App\ASPEKTERDAMPAK;
use App\MKEMUNGKINANTERJADI;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
          'risk' => RESIKO::count(),
          'user' => USER::count()
        ];
        return view('admin.admindashboard', compact('data'));
    }

    //===========================================================================================================================================================================================

    public function showActionPlan()
    {
        $data = ACTIONPLAN::all();
        return view('admin.adminactionplan', compact('data'));
    }

    public function editActionPlan(Request $req)
    {
        $edit = ACTIONPLAN::where('id_action_plan', $req->id_action_plan)->update(['nama_action_plan' => $req->nama_action_plan]);
        return $this->showActionPlan();
    }

    //===========================================================================================================================================================================================

    public function showProgram()
    {
        $data = JUDULPROGRAM::all();
        return view('admin.adminprogram', compact('data'));
    }

    public function editProgram(Request $req)
    {
        $edit = JUDULPROGRAM::where('id_judul_program', $req->id_judul_program)->update(['nama_judul_program' => $req->nama_judul_program]);
        return $this->showProgram();
    }

    //===========================================================================================================================================================================================

    public function showMasterResiko()
    {
        $data = MASTERRESIKO::all();
        return view('admin.adminmasterresiko', compact('data'));
    }

    public function editMasterResiko(Request $req)
    {
        $edit = MASTERRESIKO::where('id_master_resiko', $req->id_master_resiko)->update(['nm_pemicu_resiko' => $req->nm_pemicu_resiko, 'jenis_pemicu' => $req->jenis_pemicu]);
        return $this->showMasterResiko();
    }

    //===========================================================================================================================================================================================

    public function showUsers()
    {
        $data = USER::all();
        return view('admin.adminuser', compact('data'));
    }

    public function deleteUser(Request $req)
    {
        $delete = USER::where('username', $req->username)->delete();
        return $this->showUsers();

    }

    //===========================================================================================================================================================================================

    public function showKemungkinan()
    {
        $data = MKEMUNGKINANTERJADI::all();
        return view('admin.adminkemungkinan', compact('data'));
    }

    public function editKemungkinan(Request $req)
    {
        $edit = MKEMUNGKINANTERJADI::where('id_kemungkinan', $req->id_kemungkinan)->update(['nama_kemungkinan' => $req->nama_kemungkinan, 'skor_kemungkinan' => $req->skor_kemungkinan]);
        return $this->showKemungkinan();
    }

    //===========================================================================================================================================================================================

    public function showDampak()
    {
        $data = MDAMPAK::all();
        return view('admin.admindampak', compact('data'));
    }

    public function editDampak(Request $req)
    {
        $edit = MDAMPAK::where('id_dampak', $req->id_dampak)->update(['nama_dampak' => $req->nama_dampak, 'skor_dampak' => $req->skor_dampak]);
        return $this->showDampak();
    }

    //===========================================================================================================================================================================================

    public function showAspekTerdampak()
    {
        $data = ASPEKTERDAMPAK::all();
        return view('admin.adminaspekterdampak', compact('data'));
    }

    public function editAspekTerdampak(Request $req)
    {
        $edit = ASPEKTERDAMPAK::where('id_aspek_terdampak', $req->id_aspek_terdampak)->update(['nama_aspek_terdampak' => $req->nama_aspek_terdampak]);
        return $this->showAspekTerdampak();
    }

    //===========================================================================================================================================================================================

    public function showResiko()
    {
        $data = RESIKO::all();
        return view('admin.adminresiko', compact('data'));
    }

    //===========================================================================================================================================================================================
}
