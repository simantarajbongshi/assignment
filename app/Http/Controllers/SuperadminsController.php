<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Constituency;
use App\Models\District;
use App\Models\Region;
use App\Models\Details;

class SuperadminsController extends Controller
{

    public function index(){
        return view('superadmin.dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }



    public static function boothview(){
        $data['districts']= District::get();
        $data['constituencies']= Constituency::orderBy('constituency', 'asc')->get();
        $data['membersdata']= Region::with('constituency')->orderBy('updated_at', 'desc')->paginate(150);
        return view('superadmin.view_no_of_booths',$data);
    }

    public static function checkdetails(){
        // $descriptions = Details::with('region', 'district', 'constituency')->orderBy('updated_at', 'desc')->get();
        // echo '<pre>';
        // print_r($descriptions);
        // die();
        $data['descriptions']= Details::with('regions', 'district', 'constituency')->orderBy('updated_at', 'desc')->get();
        return view('superadmin.work_details',$data);
    }


}
