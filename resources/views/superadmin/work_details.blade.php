@extends('layouts.superadmin')

@section('section_name', 'Dashboard')
@section('path')
<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item active">Description</li>
<li class="breadcrumb-item active">Work Description</li>
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
                        <div class="form-inline my-2 my-lg-0">Phone No.
                        </div>
                    </th>
                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Name
                        </div>
                    </th>

                    {{-- <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Region Name
                        </div>
                    </th> --}}

                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">No of Total Anchalik <br> In This Constituency

                        </div>
                    </th>


                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">No of Anchalik Formed <br>
                            worked for
                        </div>
                    </th>

                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Date
                        </div>
                    </th>

                    <th scope="col">
                        <div class="form-inline my-2 my-lg-0">Description
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody id="table_body">
                @foreach($descriptions as $index => $description)
                <tr>
                    <td>{{$description->constituency->constituency}}</td>
                    <td>{{$description->phone}}</td>
                    <td>{{$description->name}}</td>
                    {{-- <td>{{$description->regions->region}}</td> --}}
                    <td>{{$description->total_anchalik}}</td>
                    <td>{{$description->booth_name}}</td>
                    <td>{{$description->date}}</td>
                    <td>{{$description->description}}</td>
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
