<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ACTIONPLAN;
use App\USER;
use App\RESIKO;
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
          'user' => USER::count()
        ];
        return view('admin.admindashboard', compact('data'));
    }

    public function showActionPlan()
    {
        $data = ACTIONPLAN::all();
        return view('admin.actionplan', compact('data'));
    }

    public function showProgram()
    {
        $data = ACTIONPLAN::all();
        return view('admin.actionplan', compact('data'));
    }

    public function showMasterResiko()
    {
        $data = ACTIONPLAN::all();
        return view('admin.actionplan', compact('data'));
    }

    // public function editActionPlan()
    // {
    //     return view('actionplan');
    // }
    //
    // public function deleteActionPlan()
    // {
    //     return view('actionplan');
    // }

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

    public function showDampak()
    {
        $data = MDAMPAK::all();
        return view('admin.admindampak', compact('data'));
    }

    public function showAspekTerdampak()
    {
        $data = ASPEKTERDAMPAK::all();
        return view('admin.adminaspekterdampak', compact('data'));
    }

    public function showResiko()
    {
        $data = RESIKO::all();
        return view('admin.adminresiko', compact('data'));
    }
}
