@extends('layouts.superadmin')

@section('section_name', 'Dashboard')
@section('path')
<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item active">Leave</li>
<li class="breadcrumb-item active">Applied Leave</li>
@endsection

@section('main_section')
<section class="g-bg-white g-py-50">

   
      
      <!-- Modal -->
      
      {{-- end modal --}}

    <div class="col-md-12 table_member">
        <table class="table table-hover table-striped table-bordered table-font" id="applied_leave_table">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Employee Name
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
                <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                </div>
                                
                                    <form action="{{ route('changeleavestatus') }}" id="search_employee" method="get" role="form">
                                <div class="col-md-12">
                                
                            
                                        <div class="box-body col-md-6">
                                            <label for="company_type">Reason To Reject</label>
                                            <textarea class="form-control" name="authorized_reason" id="authorized_reason" required="required"></textarea>
                            
                                        </div>
                                        <input type="hidden" name="st" id="st" value="d">
                                        <input type="hidden" name="id" id="id" value="{{ $leave->id }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                            
                        </div>
                        {{-- end modal --}}
                <tr>
                    <td>{{$leave->user->name}}</td>
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
                        {{-- <div class="list-icons d-inline-flex">
                            <div class="list-icons-item dropdown">
                                <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"></i></a>
                                <div class="dropdown-menu dropdown-menu-right"> --}}
                                   

                                    <a href="{{ route('changeleavestatus') }}?id={{ $leave->id }}&st=a" class="dropdown-item"
                                        id="change" cat_id="{{$leave->id}}"> <button type="button" class="btn btn-primary">
                                            Approve
                                            </button></a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Deny
                                        </button>
                                    
                                {{-- </div>
                            </div>
                        </div> --}}
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
