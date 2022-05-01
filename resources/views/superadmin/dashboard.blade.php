@extends('layouts.superadmin')

@section('section_name', 'Dashboard')
@section('path')
<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('main_section')
<section class="g-bg-gray-light-v5">
	<div class="container text-center">
		<h2 class="h2 g-color-black g-font-weight-600">Hello {{ Auth::user()->name }}, Welcome to Dashboard</h2>
    </div>
</section>
@endsection
