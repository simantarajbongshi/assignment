<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Constituency;
use App\Models\District;
use App\Models\Region;

use App\Models\Details;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    public function adddetails(Request $request){
        if($request->isMethod('get')) {
        $data['constituency'] = Constituency::orderBy('constituency', 'asc')->get();
        $data['district'] = District::orderBy('updated_at', 'desc')->get();
        $data['region'] = Region::orderby('updated_at','desc')->get();
        // return view('admin.addphotos', $data)
        return view('admin.details', $data);

    	} else {
            $validatedData = $request->validate([
                'dist' => 'required',
                'constituency' => 'required',
                'region' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'total_anchalik' => 'required',
                'booth' => 'required',
                'date' => 'required',
                'description' => 'required'
            ]);

            $dt = new Details;
            $dt->district_id = $request->input('dist');
            $dt->constituency_id = $request->input('constituency');
            $dt->region_id = $request->input('region');
            $dt->name = $request->input('name');
            $dt->phone = $request->input('phone');
            $dt->total_anchalik = $request->input('total_anchalik');
            $dt->booth_name = $request->input('booth');
            $dt->date = $request->input('date');
            $dt->description = $request->input('description');
            $result = $dt->save();
            if($result) {
                return redirect()->route('adddetails')->with('alert-success', 'Details added successfully !!!');
          }
            else{
                return redirect()->route('adddetails')->with('alert-failure', 'Opps! Something went horribly wrong. Please try again.');
            }
        }
    }


    public function addregion(Request $request){
        if($request->isMethod('get')) {
            $data['constituency'] = Constituency::orderBy('constituency', 'asc')->get();
            $data['district'] = District::orderBy('district', 'asc')->get();
            return view('admin.region', $data);
    	} else {
            // return $request;
            $validatedData = $request->validate([
                'dist' => 'required',
                'constituency' => 'required',
                'region' => 'required',
                'date' => 'required',
                'booth_no' => 'required'
            ]);

            $region = new Region;
            $region->user_id = $request->input('user');
            $region->district_id = $request->input('dist');
            $region->constituency_id = $request->input('constituency');
            $region->region = $request->input('region');

            // $dob = $request->input('date');
            // $dob = str_replace('/', '-', $dob);
            $region->est_date =$request->input('date');
            $region->booth_no = $request->input('booth_no');
            $result = $region->save();
            if($result) {
                return redirect()->route('addregion')->with('alert-success', 'Anchalik Linked With Constituency added successfully !!!');
            } else {
                return redirect()->route('addregion')->with('alert-failure', 'Opps! Something went horribly wrong. Please try again.');
            }
        }
    }


    public function getregion(Request $request){
        $id = $request->get('const_id');
        $regions = Region::with('constituency')->where('constituency_id', '=', $id)->get();
        $output = '';
        if($regions->count() > 0){
            foreach($regions as $region){
                $output .= '<option selected="" disabled="disabled">Select your ancholik</option>
                            <option value="'.$region->id.'">'.$region->region.'</option>';
            }
        }
        else{
            $output .= "<p> *No data found </p>";
        }
        echo $output;
    }



}
