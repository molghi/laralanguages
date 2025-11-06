@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
    <div class="flex items-center justify-center h-[100%] transform -translate-y-[15%]">
        @include('partials.signup_form')
    </div>
    @include('partials.flash_message')
@endsection