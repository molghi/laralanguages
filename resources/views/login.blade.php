@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex items-center justify-center h-[100%] transform -translate-y-[15%]">
        @include('partials.login_form')
    </div>
    @include('partials.flash_message')
@endsection