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

@section('title', "Practice Prompt")

@section('content')

    <div class="bg-gray-800 text-white p-6 rounded-lg max-w-xl mx-auto space-y-4 mt-10 {{config('tailwind.block-bg--transparent')}} text-white border border-gray-700">

        @if (count($entries) > 0)
        <div class="practice-round flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white"><span class="opacity-50">Practice:</span> Round {{ (int) $current_round + 1 }} / {{ count($entries) }} </h2>
            <div class="opacity-50 transition hover:opacity-100 text-[{{ $language_colors[$entries[0]['language']] }}]">{{ $language }}</div>
        </div>

        <div class="italic mb-6">Do you remember what this word/phrase means?</div>
        
        <div class="text-3xl font-bold">{{ $entries[$current_round]['word_phrase'] }}</div>

        <div style="transition: opacity 3s;" class="translation text-3xl font-bold opacity-0 italic text-[{{ $language_colors[$entries[0]['language']] }}]">{{ $entries[$current_round]['translation'] }}</div>

        <div class="flex gap-6 relative actions">
            <button style="transition: opacity 3s, background-color .2s, color .2s;" type="button" class="show-btn {{config('tailwind.btn-styles')}} border hover:bg-[snow] hover:text-black hover:opacity-100">Show</button>

            <form action="{{ $form_route }}" method="POST" class="absolute top-0 left-0" style="z-index: -1;">
                @csrf 
                <button type="submit" class="{{config('tailwind.btn-styles')}} border hover:bg-[snow] hover:text-black hover:opacity-100" style="transition: opacity 3s, background-color .2s, color .2s; opacity: 0;">
                    {{ $action_button_text }}
                </button>
            </form>
        </div>
        @else 
        <div class="flex flex-col gap-4 items-start">
            <h2 class="text-2xl font-semibold text-[{{ $language_colors[session('language_practicing')] }}]">{{ $languages[session('language_practicing')] }}</h2>
            <p class="text-md text-white">All added words in this language have been reviewed.</p>
            <p class="text-md text-white">Add more now or wait until the next review.</p>
            <a href="/practice/prompt" class="{{config('tailwind.btn-styles')}} border border-gray-700 bg-gray-600 active:opacity-50">Back</a>
        </div>
        @endif

    </div>


    <script>
        // show/hide Show/Next buttons
        if (document.querySelector('.show-btn')) document.querySelector('.show-btn').addEventListener('click', function(e) {
            document.querySelector('.translation').style.opacity = 1;
            e.target.style.opacity = 0;
            e.target.style.zIndex = -1;
            document.querySelector('form').style.zIndex = 1;
            document.querySelector('form button').style.opacity = 1;
        })
    </script>

    @include('partials.flash_message')
@endsection