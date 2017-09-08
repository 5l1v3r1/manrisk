<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ACTIONPLAN;
use App\USER;
use App\ADMIN;
use App\RESIKO;
use App\MASTERRESIKO;
use App\MDAMPAK;
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
          'user' => USER::count(),
          'ap' => ACTIONPLAN::count(),
          'admin' => ADMIN::count()
        ];
        return view('admin.admindashboard', compact('data'));
    }

    //===========================================================================================================================================================================================

    public function showActionPlan()
    {
      $data = ACTIONPLAN::orderBy('id_action_plan')
          ->join('resiko', 'action_plan.id_resiko', '=', 'resiko.id_resiko')
          ->join('aspek_terdampak', 'resiko.id_aspek_terdampak', '=', 'aspek_terdampak.id_aspek_terdampak')
          ->get();
        return view('admin.adminactionplan', compact('data'));
    }

    //===========================================================================================================================================================================================

    public function showMasterResiko()
    {
        $data = MASTERRESIKO::orderBy('id_master_resiko')->get();
        return view('admin.adminmasterresiko', compact('data'));
    }

    public function editMasterResiko(Request $req)
    {
        $edit = MASTERRESIKO::where('id_master_resiko', $req->id_master_resiko)->update(['nm_pemicu_resiko' => $req->nm_pemicu_resiko]);
        return $this->showMasterResiko();
    }

    public function addMasterResiko(Request $req)
    {
        $d = new MASTERRESIKO;
        $d->nm_pemicu_resiko = $req->nm_pemicu_resiko;
        $d->save();
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
        $data = MKEMUNGKINANTERJADI::orderBy('id_kemungkinan')->get();
        return view('admin.adminkemungkinan', compact('data'));
    }

    public function editKemungkinan(Request $req)
    {
        $edit = MKEMUNGKINANTERJADI::where('id_kemungkinan', $req->id_kemungkinan)->update(['nama_kemungkinan' => $req->nama_kemungkinan, 'skor_kemungkinan' => $req->skor_kemungkinan]);
        return $this->showKemungkinan();
    }

    public function addKemungkinan(Request $req)
    {
        $d = new MKEMUNGKINANTERJADI;
        $d->nama_kemungkinan = $req->nama_kemungkinan;
        $d->skor_kemungkinan = $req->skor_kemungkinan;
        $d->save();
        return $this->showKemungkinan();
    }

    //===========================================================================================================================================================================================

    public function showDampak()
    {
        $data = MDAMPAK::orderBy('id_dampak')->get();
        return view('admin.admindampak', compact('data'));
    }

    public function editDampak(Request $req)
    {
        $edit = MDAMPAK::where('id_dampak', $req->id_dampak)->update(['nama_dampak' => $req->nama_dampak, 'skor_dampak' => $req->skor_dampak]);
        return $this->showDampak();
    }

    public function addDampak(Request $req)
    {
        $d = new MDAMPAK;
        $d->nama_dampak = $req->nama_dampak;
        $d->skor_dampak = $req->skor_dampak;
        $d->save();
        return $this->showDampak();
    }

    //===========================================================================================================================================================================================

    public function showAspekTerdampak()
    {
        $data = ASPEKTERDAMPAK::orderBy('id_aspek_terdampak')->get();
        return view('admin.adminaspekterdampak', compact('data'));
    }

    public function editAspekTerdampak(Request $req)
    {
        $edit = ASPEKTERDAMPAK::where('id_aspek_terdampak', $req->id_aspek_terdampak)->update(['nama_aspek_terdampak' => $req->nama_aspek_terdampak]);
        return $this->showAspekTerdampak();
    }

    public function addAspekTerdampak(Request $req)
    {
        $d = new ASPEKTERDAMPAK;
        $d->nama_aspek_terdampak = $req->nama_aspek_terdampak;
        $d->save();
        return $this->showDampak();
    }

    //===========================================================================================================================================================================================

    public function showResiko()
    {
        $data = RESIKO::orderBy('id_resiko')
            ->join('m_dampak', 'resiko.id_dampak', '=', 'm_dampak.id_dampak')
            ->join('aspek_terdampak', 'resiko.id_aspek_terdampak', '=', 'aspek_terdampak.id_aspek_terdampak')
            ->join('m_kemungkinan_terjadi', 'resiko.id_kemungkinan', '=', 'm_kemungkinan_terjadi.id_kemungkinan')
            ->join('master_resiko', 'resiko.id_master_resiko', '=', 'master_resiko.id_master_resiko')
            ->get();
        return view('admin.adminresiko', compact('data'));
    }

    //===========================================================================================================================================================================================

    public function showDetailProgram()
    {
        $data = DETAILPROGRAM::join('judul_program', 'detail_program.id_judul_program', '=', 'judul_program.id_judul_program')
            ->join('action_plan', 'detail_program.id_action_plan', '=', 'action_plan.id_action_plan')
            ->get();
        return view('admin.admindetailprogram', compact('data'));
    }

    //===========================================================================================================================================================================================

    public function chartdata()
    {
        $jan = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 1)
            ->count();

        $feb = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 2)
            ->count();

        $mar = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 3)
            ->count();

        $apr = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 4)
            ->count();

        $mei = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 5)
            ->count();

        $jun = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 6)
            ->count();

        $jul = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 7)
            ->count();

        $ags = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 8)
            ->count();

        $sep = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=',9)
            ->count();

        $oct = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 10)
            ->count();

        $nov = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 11)
            ->count();

        $des = RESIKO::whereYear('created_at', '=', date('y'))
            ->whereMonth('created_at', '=', 12)
            ->count();

        $data = array($jan,$feb,$mar,$apr,$mei,$jun,$jul,$ags,$sep,$oct,$nov,$des);
        return response()->json($data);
    }


}
