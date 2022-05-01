@extends('layouts.superadmin')

@section('section_name', 'Dashboard')
@section('path')
<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('main_section')
<section class="g-bg-white g-py-50">

    <div class="col-md-12 table_member">
        <table class="table table-hover table-striped table-bordered table-font" id="member_table">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Constituency Name
                        </div>
                    </th>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Established Region Name
                        </div>
                    </th>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Date Of Established
                        </div>
                    </th>

                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">No. of Booths Under This Region
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody id="table_body">
                @foreach($membersdata as $index => $m)
                <tr>
                    <td>{{$m->constituency->constituency}}</td>
                    <td>{{$m->region}}</td>
                    <td>{{$m->est_date}}</td>
                    <td>{{$m->booth_no}}</td>
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
    $('#member_table').DataTable();
} );
</script>
@endsection
