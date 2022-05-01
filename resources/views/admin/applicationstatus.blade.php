@extends('layouts.superadmin')

@section('section_name', 'Dashboard')
@section('path')
<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('main_section')
<section class="g-bg-white g-py-50">

    <div class="box-body col-md-6">
        {{-- <form action="{{ route('client.list.complaints') }}" id="add_admin" method="get" role="form"> --}}
            
            {{-- <div class="box-body row-md-4">
                <div class="form-group has-feedback ">
                    <label for="search">{{ __('Keyword') }}</label>
                    <input id="search" type="text" class="form-control" name="search"
                        placeholder="keyword" autocomplete="search" value="{{Request::get('search')}}">
                </div>   
                <div class="form-group has-feedback ">
                    <button type="submit" class="btn btn-primary btn-sm">Search <i class="fa fa-search"></i> </button>
                </div>                  
            </div> --}}

            <div class="form-group has-feedback  @error('type') has-error @enderror">
                <label for="type">{{ __(' Select Type') }}</label>
                <select name="type" id="type" class="form-control table-filter-dropdown">
                    {{-- <option selected value="all">All</option> --}}
                    <option selected value="na">Not Actioned</option>
                    <option  value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
                @error('type')
                <span class="help-block" role="alert">{{ $message }}</span>
                @enderror
            </div>
        {{-- </form> --}}
    </div>

    <div class="col-md-12 table_member" id="not">
        <table class="table table-hover table-striped table-bordered table-font" id="not_actioned">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Employee Name
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
                </tr>
            </thead>
            <tbody id="table_body">
                @foreach($leaves as $leave)
                @if($leave->leave_status == null)
                <tr>
                    <td>{{$leave->user->name}}</td>
                    {{-- <td>{{$leave->users->name}}</td> --}}
                    <td>{{$leave->number_of_days}}</td>
                    <td>{{$leave->leave_start_date}}</td>
                    <td>{{$leave->leave_end_date}}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-12 table_member" id="approved" style="display: none;">
    
        <table class="table table-hover table-striped table-bordered table-font" id="approved">
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
                </tr>
            </thead>
            <tbody id="table_body">
                @foreach($leaves as $leave)
                    @if($leave->leave_status == 1)
                        <tr>
                            <td>{{$leave->user->name}}</td>
                            <td>{{$leave->users->name}}</td>
                            <td>{{$leave->number_of_days}}</td>
                            <td>{{$leave->leave_start_date}}</td>
                            <td>{{$leave->leave_end_date}}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-12 table_member" id="rejected" style="display:none;">

        <table class="table table-hover table-striped table-bordered table-font" id="rejected">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Employee Name
                        </div>
                    </th>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Rejected By
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
                        <div class="form-inline my-2 my-lg-0">Rejected Reason
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody id="table_body">
                @foreach($leaves as $leave)
                 @if($leave->leave_status == 0)
                    <tr>
                        <td>{{$leave->user->name}}</td>
                        {{-- <td>{{$leave->users->name}}</td> --}}
                        <td>{{$leave->number_of_days}}</td>
                        <td>{{$leave->leave_start_date}}</td>
                        <td>{{$leave->leave_end_date}}</td>
                        <td>{{$leave->authorized_reason}}</td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>


</section>
@endsection

@section('customjs')
<script>
$(document).ready( function () {
    $('#not_actioned').DataTable();
} );
$(document).ready( function () {
    $('#approved').DataTable();
} );
$(document).ready( function () {
    $('#rejected').DataTable();
} );
</script>


<script>

        $('#type').change(function () {
        var type = $('#type').val();
        if(type == 'na'){
            na.style.display="block";
            approved.style.display="none";
            rejected.style.display="none";
        }
        if(type == 'approved'){
            na.style.display="none";
            approved.style.display="block";
            rejected.style.display="none";
        }
        if(type == 'rejected'){
            na.style.display="none";
            approved.style.display="none";
            rejected.style.display="block";
        }
    });
    
    </script>
@endsection
