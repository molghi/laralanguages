@php
    $languages = [
        'es' => '🇨🇱 Español',
        'de' => '🇩🇪 Deutsch',
        'fr' => '🇫🇷 Français',
        'ar' => "🇪🇬 'arabi",
        'zh' => '🇨🇳 zhong wen',
        'is' => '🇮🇸 Islenska',
        'cz' => '🇨🇿 Čeština',
        'en' => '🇺🇸 English',
    ];
    $language_colors = [
        'es' => 'Gold',
        'de' => 'Coral',
        'fr' => 'DodgerBlue',
        'ar' => '#31972E',
        'zh' => '#FF204E',
        'is' => 'CadetBlue',
        'cz' => 'cadetblue',
        'en' => '#EA60AB',
    ];
@endphp

@extends('layouts.app')

@section('title', 'Your Words')

@section('content')
    <div class="mt-10 text-center">
        {{-- @include('partials.login_form') --}}
        <i class="text-white">Entries: {{count($user_words)}}</i>
        @if (!empty($user_words) && count($user_words) > 0)
            <div class="max-w-2xl mx-auto">
                @foreach ($user_words as $entry)
                    @include('partials.word_entry')
                @endforeach
            </div>
        @else 
            <div class="text-center text-white">No words added.</div>
        @endif
    </div>
    @include('partials.flash_message')
@endsection