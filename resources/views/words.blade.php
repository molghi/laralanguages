@extends('layouts.app')

@section('title', 'Your Words')

@section('content')
    <div class="mt-10 text-center">
        {{-- @include('partials.login_form') --}}
        <i class="text-white">Words will be here</i>
    </div>
    @include('partials.flash_message')
@endsection