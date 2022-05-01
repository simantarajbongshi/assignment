@extends('layouts.admin')

@section('section_name', 'Dashboard')
@section('path')
<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item active">Leave</li>
<li class="breadcrumb-item active">Apply Leave</li>
@endsection

@section('main_section')
<section class="g-bg-gray-light-v5">

    <style>
        #btn-submit {
            background-color: green;
            color: #fff;
            border-radius: 25px !important;
            padding: 8px 20px;
        }

        #btn-submit:hover {
            background-color: #009933;
        }

    </style>

    @if ($message = Session::get('alert-success'))
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Teal Alert -->
                <div class="alert alert-dismissible fade show g-bg-teal g-color-white rounded-0" role="alert">
                    <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="media">
                        <span class="d-flex g-mr-10 g-mt-5">
                            <i class="icon-check g-font-size-25"></i>
                        </span>
                        <span class="media-body align-self-center cbpl">
                            {{ $message }}
                        </span>
                    </div>
                </div>
                <!-- End Teal Alert -->
            </div>
        </div>
    </section>
    @endif
    @if ($message = Session::get('alert-failure'))
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Teal Alert -->
                <div class="alert alert-dismissible fade show g-bg-red g-color-white rounded-0" role="alert">
                    <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="media">
                        <span class="d-flex g-mr-10 g-mt-5">
                            <i class="icon-ban g-font-size-25"></i>
                        </span>
                        <span class="media-body align-self-center cbpl">
                            {{ $message }}
                        </span>
                    </div>
                </div>
                <!-- End Teal Alert -->
            </div>
        </div>
    </section>
    @endif
    <!-- Add region Form -->
    <section class="container g-pb-30">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h3> You have {{ $sl }} day(s) of Sick Leave, {{ $pl }} day(s) od Paid Leave, {{ $cl }} day(s) of Casual Leave left. </h3>
                <form method="POST" action="{{route('addleave')}}" name="add_leave" id="add_leave" style="background-color: #fff; padding:40px">
                    @csrf
                    <div class="row">
                       
                        <div class="col-md-12 form-group @error('leave_type') u-has-error-v1 @enderror g-mb-20">
                            <label class="g-mb-10" for="region">Select Leave Type<sup>*</sup></label>
                            <select class="form-control form-control-md rounded-0" id="leave_type" name="leave_type" required>
                                <option selected="selected" disabled="disabled">Select Leave Type</option>
                                
                                <option value="CL">Casual Leave</option>
                                <option value="SL">Sick Leave</option>
                                <option value="PL">Paid Leave</option>
                                <option value="LWP">Leave Without Pay</option>
                            </select>
                            @error('leave_type')
                                <small class="form-control-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <?php
                        $date = now();
                        $d = $date->toDateString();
                        $dd = $date->format('Y-m-d');
                        ?>
                        <div class="col-md-12 form-group @error('leave_start_date') u-has-error-v1 @enderror g-mb-20">
                            <label class="g-mb-10" for="leave_start_date">Start<sup>*</sup></label>
                            <input id="leave_start_date" name="leave_start_date" min="{{ $dd }}" value="{{ old('leave_start_date') }}" class="form-control form-control-md rounded-0 g-state-not-empty" type="date" placeholder="DD/MM/YYYY" data-mask="99/99/9999" required>
                            @error('leave_start_date')
                                <small class="form-control-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group @error('leave_end_date') u-has-error-v1 @enderror g-mb-20">
                            <label class="g-mb-10" for="leave_end_date">End<sup>*</sup></label>
                            <input id="leave_end_date" name="leave_end_date" min="{{ $dd }}" value="{{ old('leave_end_date') }}" class="form-control form-control-md rounded-0 g-state-not-empty" type="date" placeholder="DD/MM/YYYY" data-mask="99/99/9999" required>
                            @error('leave_end_date')
                                <small class="form-control-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group @error('half_day') u-has-error-v1 @enderror g-mb-20">
                            <label for="half_day">Is Half Day (please tick if yes)</label>
                            <input  type="checkbox" id="half_day" name="half_day" value="1" class="form-control form-control-md rounded-0 g-state-not-empty" >
                            @error('half_day')
                                <small class="form-control-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group @error('leave_reason') u-has-error-v1 @enderror g-mb-20">
                            <label class="g-mb-10" for="leave_reason">Reason for leave<sup>*</sup></label>
                            <input id="leave_reason" name="leave_reason" value="{{ old('leave_reason') }}" class="form-control form-control-md rounded-0 g-state-not-empty" type="text" required>
                            @error('leave_reason')
                                <small class="form-control-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        

                        <div class="mx-auto">
                            <button type="submit" id="btn-upload" class="btn btn-success" ><i
                                    class="fas fa-save nav-icon"></i> Apply</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    @section('customjs')
    <!-- JS Plugins Init. -->
    <script src="https://cdn.tiny.cloud/1/4avxzje2zspt0hi4hunn83wn4pr5th6ri8le7uxy5epqcvgw/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        // $("#booth_no").inputFilter(function(value) { return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9999999999); });
    </Script>
    @endsection


</section>
@endsection
