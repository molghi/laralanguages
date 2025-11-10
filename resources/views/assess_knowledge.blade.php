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

    $entries = session('entries');
    $language = $entries[0]['language'];
    $language = $languages[$language];
    $language_color = $language_colors[$entries[0]['language']]
@endphp

@extends('layouts.app')

@section('title', "Assess Knowledge")

@section('content')
    @include('partials.assessment_block')
    @include('partials.flash_message')
@endsection