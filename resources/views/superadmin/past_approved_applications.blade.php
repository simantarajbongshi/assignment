@extends('layouts.superadmin')

@section('section_name', 'Dashboard')
@section('path')
<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item active">Leave</li>
<li class="breadcrumb-item active">Approved Leave</li>
@endsection

@section('main_section')
<section class="g-bg-white g-py-50">

    <div class="col-md-12 table_member">
        <table class="table table-hover table-striped table-bordered table-font" id="applied_leave_table">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Employee Name
                        </div>
                    </th>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Approved By
                        </div>
                    </th>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Leave Type
                        </div>
                    </th>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Number Of Days
                        </div>
                    </th>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">From Date
                        </div>
                    </th>

                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">To Date
                        </div>
                    </th>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Action
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody id="table_body">
                @foreach($leaves as $leave)
                <tr>
                    <td>{{$leave->user->name}}</td>
                    <td>{{$leave->users->name}}</td>
                    <td>
                        @if($leave->leave_type == "LWP")
                        <span class="text-center"> Leave Without Pay </span>
                        @elseif($leave->leave_type == "CL")
                        <span class="text-center"> Casual Leave </span>
                        @elseif($leave->leave_type == "SL")
                        <span class="text-center"> Sick Leave </span>
                        @else
                        <span class="text-center"> Paid Leave </span>
                        @endif
                    </td>
                    <td>{{$leave->number_of_days}}</td>
                    <td>{{$leave->leave_start_date}}</td>
                    <td>{{$leave->leave_end_date}}</td>
                    <td class="text-center">
                                   
                        @if($leave->leave_status == 1)
                            <span class="text-center">Approved</span>
                        @else
                            <span class="text-center">Denied</span>
                        @endif
                                    
                                    
                               
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</section>
@endsection

@section('customjs')
<script>
$(document).ready( function () {
    $('#applied_leave_table').DataTable();
} );
</script>
@endsection
