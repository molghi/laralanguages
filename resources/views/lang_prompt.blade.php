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

@section('title', "Practice Prompt")

@section('content')

    <div class="bg-gray-800 text-white p-6 pb-8 rounded-lg max-w-xl mx-auto flex flex-col gap-4 mt-10 {{config('tailwind.block-bg--transparent')}} text-white border border-gray-700">
        @if (!empty($user_languages) && count($user_languages) > 0)
            {{-- Show prompt form --}}
            @include('partials.prompt_block')
        @else 
            {{-- Show message --}}
            <h2 class="text-xl font-semibold text-white">You have not added any words to practice.</h2>
        @endif
        
    </div>

    @include('partials.flash_message')
@endsection