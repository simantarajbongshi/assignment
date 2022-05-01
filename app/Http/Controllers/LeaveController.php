<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Leave_request;
use Datetime;
use Carbon\Carbon;
use App\Models\Details;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    //

    public function __construct() {
        $this->middleware('auth');
    }


    public function addleave(Request $request){
        if($request->isMethod('get')) {
            // $data['constituency'] = Constituency::orderBy('constituency', 'asc')->get();
            // $data['district'] = District::orderBy('district', 'asc')->get();
            // return view('admin.leave', $data);
            $datetime1 = now();

            $m = Carbon::parse($datetime1)->month;
            $y = Carbon::parse($datetime1)->year;

           $sick_leaves =  Leave_request::where('user_id',Auth::user()->id)->where('leave_type', 'SL')->where('leave_status',1)->get();
           if(count($sick_leaves) == 0){
            $slt = 0;
            }
            else{
                    $slt = 0;
                    foreach($sick_leaves as $sickleave){
                        $slt += $sickleave->number_of_days; 
                    }
            }

           $paid_leaves = Leave_request::where('user_id',Auth::user()->id)->where('leave_type', 'PL')->where('leave_status',1)->get();
           if(count($paid_leaves) == 0){
               $plt = 0;
           }
           else{
             $plt = 0;
                foreach($paid_leaves as $paidleave){
                    $plt += $paidleave->number_of_days; 
                }
            }

           $casual_leaves = Leave_request::where('user_id',Auth::user()->id)->where('leave_type', 'CL')->where('leave_status',1)->get();
           if(count($casual_leaves) == 0){
               $clt = 0;
           }
           else{
            $clt = 0;
               foreach($casual_leaves as $casualleave){
                $clt += $casualleave->number_of_days; 
               }
           }

       

            // $data['sl'] = 6.0 -  Leave_request::where('user_id',Auth::user()->id)->where('leave_type', 'SL')->where('leave_status',1)->count();
            // $data['pl'] =6.0 - Leave_request::where('user_id',Auth::user()->id)->where('leave_type', 'PL')->where('leave_status',1)->count();
            // $data['cl'] =6.0 - Leave_request::where('user_id',Auth::user()->id)->where('leave_type', 'CL')->where('leave_status',1)->count();
            $data['sl'] = 6.0 - $slt;
            $data['pl'] = 6.0 - $plt;
            $data['cl'] = 6.0 - $clt;
            
            return view('admin.leave', $data);
    	} else {
            // return $request;
            $validatedData = $request->validate([
                'leave_type' => 'required',
                'leave_reason' => 'required',
                'leave_start_date' => 'required',
                'leave_end_date' => 'required',
            ]);
           
            
            $datetime1 = new DateTime($request->input('leave_start_date'));
            $datetime2 = new DateTime($request->input('leave_end_date'));
            $interval = $datetime1->diff($datetime2);
            // $number_of_days = $interval->format('%a')+1;
            $leave_month = Carbon::parse($datetime1)->month;
            $leave_year = Carbon::parse($datetime1)->year;
            $leave_type = $request->input('leave_type');

            $date1 = Carbon::parse($datetime1);
            $date2 = Carbon::parse($datetime2);

            $result = $date1->lte($date2);

            $days = $interval->format('%a');


            if($result == true) {

                if($leave_type == 'LWP'){
                    $leave = new Leave_request;
                    $leave->user_id = Auth::user()->id;
                    $leave->leave_type = $leave_type;
                    // $leave->number_of_days = 2;
                    // $leave->leave_month = 'june';
                    $leave->leave_reason = $request->input('leave_reason');
                    $leave->leave_start_date = $request->input('leave_start_date');
                    $leave->leave_end_date = $request->input('leave_end_date');
                    
                    $leave->number_of_days = $number_of_days = $interval->format('%a')+1;
                    $leave->leave_month = $leave_month;
                    $leave->leave_year = $leave_year;
                    // dd($d);
                    $leave->crea_user = Auth::user()->id;
        
                    
                    $result = $leave->save();
                    if($result) {
                        return redirect()->route('addleave')->with('alert-success', 'Leave applied successfully !!!');
                    } else {
                        return redirect()->route('addleave')->with('alert-failure', 'Opps! Something went horribly wrong. Please try again.');
                    }
                }
                else{

                    if($days == 0 && $request->input('half_day')==1){
                        $number_of_days = .5;
                        // $total =2.0 - Leave_request::where('user_id',Auth::user()->id)->where('leave_year',$leave_year)->where('leave_month',$leave_month)->where('leave_type', $leave_type)->where('leave_status',1)->count();
                        
                        $sums = Leave_request::where('user_id',Auth::user()->id)->where('leave_year',$leave_year)->where('leave_month',$leave_month)->where('leave_type', $leave_type)->where('leave_status',1)->get();
                       
                        if(count($sums) == 0){
                            $total = 2.0;
                        }
                        else{
    
                            $totals = 0;
                            foreach($sums as $sum){
                                $totals += $sum->number_of_days;
                            }
                            $total= 2.0 - $totals;
                        }
                        
                        
        
                            if($number_of_days <= $total ){
                
                                $leave = new Leave_request;
                                $leave->user_id = Auth::user()->id;
                                $leave->leave_type = $leave_type;
                                // $leave->number_of_days = 2;
                                // $leave->leave_month = 'june';
                                $leave->leave_reason = $request->input('leave_reason');
                                $leave->leave_start_date = $request->input('leave_start_date');
                                $leave->leave_end_date = $request->input('leave_end_date');
                                
                                $leave->number_of_days = $number_of_days;
                                $leave->leave_month = $leave_month;
                                $leave->leave_year = $leave_year;
                                // dd($d);
                                $leave->crea_user = Auth::user()->id;
                    
                                
                                $result = $leave->save();
                                if($result) {
                                    return redirect()->route('addleave')->with('alert-success', 'Leave applied successfully !!!');
                                } else {
                                    return redirect()->route('addleave')->with('alert-failure', 'Opps! Something went horribly wrong. Please try again.');
                                }
                            }
                            else{
                                return redirect()->route('addleave')->with('alert-failure', 'Opps! You do not have  '.$number_of_days.' days of '.$leave_type.' for leave applied month.');
                            }
                    }
                        else if($days != 0 && $request->input('half_day') ==  1){ 
                            return redirect()->route('addleave')->with('alert-failure', 'Opps! You can not select half day for multiple days');
                        }
                        else{
                            $number_of_days = $interval->format('%a')+1;
                            // $total =2 - Leave_request::where('user_id',Auth::user()->id)->where('leave_year',$leave_year)->where('leave_month',$leave_month)->where('leave_type', $leave_type)->where('leave_status',1)->count();
                            $sums = Leave_request::where('user_id',Auth::user()->id)->where('leave_year',$leave_year)->where('leave_month',$leave_month)->where('leave_type', $leave_type)->where('leave_status',1)->get();
                       
                            if(count($sums) == 0){
                                $total = 2.0;
                            }
                            else{
    
                                $totals = 0;
                                foreach($sums as $sum){
                                    $totals += $sum->number_of_days;
                                }
                                 $total = 2.0 - $totals;
                            }
            
                        if($number_of_days <= $total ){
            
                            $leave = new Leave_request;
                            $leave->user_id = Auth::user()->id;
                            $leave->leave_type = $leave_type;
                            // $leave->number_of_days = 2;
                            // $leave->leave_month = 'june';
                            $leave->leave_reason = $request->input('leave_reason');
                            $leave->leave_start_date = $request->input('leave_start_date');
                            $leave->leave_end_date = $request->input('leave_end_date');
                            
                            $leave->number_of_days = $number_of_days;
                            $leave->leave_month = $leave_month;
                            $leave->leave_year = $leave_year;
                            // dd($d);
                            $leave->crea_user = Auth::user()->id;
                
                            
                            $result = $leave->save();
                            if($result) {
                                return redirect()->route('addleave')->with('alert-success', 'Leave applied successfully !!!');
                            } else {
                                return redirect()->route('addleave')->with('alert-failure', 'Opps! Something went horribly wrong. Please try again.');
                            }
                        }
                        else{
                            return redirect()->route('addleave')->with('alert-failure', 'Opps! You do not have  '.$number_of_days.' days of '.$leave_type.' for leave applied month.');
                        }
                        }

                }

                

            }
            else{
                return redirect()->route('addleave')->with('alert-failure', 'Opps! Start Date Can not be greater than End Date.');
            }


            


            
            


            


        }
    }


    public static function appliedleave(){
        
        // $data['membersdata']= Region::with('constituency')->orderBy('updated_at', 'desc')->paginate(150);
        $data['leaves'] = Leave_request::with('user')
        ->where('leave_status', null)
        ->orderBy('created_at', 'desc')->get();
        return view('superadmin.applied_leave',$data);
    }


    public static function pastapplications(){
        
        
        $data['leaves']= Leave_request::with(['user','users'])->where('leave_status', 1)->orderBy('updated_at', 'desc')->get();
        return view('superadmin.past_approved_applications',$data);
    }

    public static function pastapplicationsrejected(){
        
        
        $data['leaves']= Leave_request::with(['user','users'])->where('leave_status', 0)->orderBy('updated_at', 'desc')->get();
        return view('superadmin.past_rejected_applications',$data);
    }

    public static function approvedleave(Request $request){

        $data['leaves']= Leave_request::with(['user','users'])->where('user_id', Auth::user()->id)->where('leave_status', 1)->orderBy('updated_at', 'desc')->get();    

        return view('admin.approved_leave',$data);
    }


    public static function rejectedleave(Request $request){

        $data['leaves']= Leave_request::with(['user','users'])->where('user_id', Auth::user()->id)->where('leave_status', 0)->orderBy('updated_at', 'desc')->get();    

        return view('admin.rejected_leave',$data);
    }


    

    
    public function appliedleaveedit(Request $request){
       
        $id = $request->get('id');
        $st = $request->get('st');
        
        // }
        if($id != ''){

            if($st == "a"){
               $d = Leave_request::where('id',$id)->first();
                    // Leave_request::where('id',$id)->update(['leave_status' => 1]);
                $d->leave_status = 1;
                $d->authorized_by = Auth::user()->id;
                $d->mod_user = Auth::user()->id;
                $d->save();
                    return redirect()->route('appliedleave');
            }
            else{
                
                    // Leave_request::where('id',$id)->update(['leave_status' => 0]);
                    $d = Leave_request::where('id',$id)->first();
                $d->leave_status = 0;
                $d->authorized_by = Auth::user()->id;
                $d->authorized_reason = $request->input('authorized_reason');
                $d->mod_user = Auth::user()->id;
                $d->save();
                    return redirect()->route('appliedleave');
            }
        }
        else{
            return redirect('/superadmin/dashboard');
        }
    
}


    



}

