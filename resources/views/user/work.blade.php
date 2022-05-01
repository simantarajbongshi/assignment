@extends("layouts.site")
@section('content')
@include('includes.header')



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
<!-- Add album Form -->
<section class="container g-pb-30">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form id="gallery" method="post" role="form" action="{{ route('details') }}" enctype="multipart/form-data"
                style="background-color: #fff; padding:40px">
                @csrf
                <div class="row">
                    <div class="col-md-12 form-group @error('suggestion_category_id') u-has-error-v1 @enderror g-mb-20">
                        <label class="g-mb-10" for="album">Select District<sup>*</sup></label>
                        <select class="form-control form-control-md rounded-0" id="album" name="album">
                            <option selected="selected" disabled="disabled">Select your district</option>
                            {{-- @foreach($titles as $title)
                            <option value="{{$title->id}}">{{$title->album}}</option>
                            @endforeach --}}
                        </select>
                    </div>


                    <div class="col-md-12 form-group @error('suggestion_category_id') u-has-error-v1 @enderror g-mb-20">
                        <label class="g-mb-10" for="album">Select Constituency<sup>*</sup></label>
                        <select class="form-control form-control-md rounded-0" id="album" name="album">
                            <option selected="selected" disabled="disabled">Select your constituency</option>
                            {{-- @foreach($titles as $title)
                            <option value="{{$title->id}}">{{$title->album}}</option>
                            @endforeach --}}
                        </select>
                    </div>


                    <div class="col-md-12 form-group @error('suggestion_category_id') u-has-error-v1 @enderror g-mb-20">
                        <label class="g-mb-10" for="album">Select Regional<sup>*</sup></label>
                        <select class="form-control form-control-md rounded-0" id="album" name="album">
                            <option selected="selected" disabled="disabled">Select your regional</option>
                            {{-- @foreach($titles as $title)
                            <option value="{{$title->id}}">{{$title->album}}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="col-md-12 form-group @error('dob') u-has-error-v1 @enderror g-mb-20">
						<label class="g-mb-10" for="dob">Date of Submission<sup>*</sup></label>
						<input id="dob" name="dob" value="{{ old('dob') }}" class="form-control form-control-md rounded-0 g-state-not-empty" type="text" placeholder="DD/MM/YYYY" data-mask="99/99/9999">
						@error('dob')
	                        <small class="form-control-feedback">{{ $message }}</small>
	                    @enderror
                    </div>

                    <div class="col-md-12 form-group @error('dob') u-has-error-v1 @enderror g-mb-20">
						<label class="g-mb-10" for="dob">Work description<sup>*</sup></label>
						<input id="description" name="description" value="{{ old('description') }}" class="form-control form-control-md rounded-0 g-state-not-empty" type="textarea" placeholder="mention what you have done in last 48 hours for AJP" >
						@error('dob')
	                        <small class="form-control-feedback">{{ $message }}</small>
	                    @enderror
					</div>

                    <div class="mx-auto">
                        <button type="submit" id="btn-upload" class="btn btn-success" disabled="disabled"><i
                                class="fas fa-save nav-icon"></i> Save</button>
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
    // $(function () {
    //     $('#upload_div').hide();
    //     $('#attachments').uploadifive({
    //         'buttonClass': 'btn btn-block btn-sm btn-primary btn-md g-mb-15',
    //         'buttonText': 'Upload',
    //         'uploadScript': '/gallery/upload_attachments',
    //         'removeCompleted': false,
    //         'fileSizeLimit': '4MB',
    //         'width': '100',
    //         'multi': false,
    //         'fileType': 'image/*',
    //         'fileTypeDesc': 'JPG/PNG Image Files',
    //         'fileTypeExts': '*.jpg; *.png',
    //         'formData': {
    //             '_token': $('meta[name="_token"]').attr('content')
    //         },
    //         'onUploadComplete': function (file, data) {
    //             if ($('#attachments_field').val() == "") {
    //                 $('#attachments_field').val(data);
    //                 $("#btn-upload").removeAttr('disabled');
    //             } else {
    //                 var new_val = $('#attachments_field').val();
    //                 $('#attachments_field').val(new_val + ',' + data);
    //             }
    //         }
    //     });

    //     $('#album').change(
    //         function () {
    //             if ($('#attachments_field').val() == "") {
    //                 $("#upload_div").show();
    //             }
    //         });
    // });

</script>
@endsection








<!-- End Contact Form -->
@include('includes.footer')
@endsection
