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
    $current_round = session('round_counter');

    if (count($entries) > 0) { 
        $language = $entries[0]['language']; 
        $language = $languages[$language];

        $action_button_text = $current_round + 1 < count($entries) ? 'Next' : 'Finish';
        $form_route = $current_round + 1 < count($entries) ? route('quiz.proceed') : route('quiz.finish');
    }
@endphp

@extends('layouts.app')

@section('title', "Practice")

@section('content')

    <div class="bg-gray-800 text-white p-6 rounded-lg max-w-xl mx-auto space-y-4 mt-10 {{config('tailwind.block-bg--transparent')}} text-white border border-gray-700">

        @if (count($entries) > 0)
            @include('partials.practice_round')
        @else 
            @include('partials.no_practice')
        @endif

    </div>

    @include('partials.flash_message')
@endsection