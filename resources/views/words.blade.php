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
    $selected_language = 'es';
@endphp

@extends('layouts.app')

@section('title', 'Your Words')

@section('content')
    <div class="mt-10 text-center">
        {{-- Page title & filter --}}
        <div class="flex items-center justify-between max-w-2xl mx-auto mb-5">
            <h2 class="text-2xl font-semibold text-white">View Words — Entries: {{count($user_words)}}</h2>
            @include('partials.lang_select')
        </div>

        {{-- print words --}}
        @if (!empty($user_words) && count($user_words) > 0)
            <div class="max-w-2xl mx-auto">
                @foreach ($user_words as $entry)
                    @include('partials.word_entry')
                @endforeach
            </div>
            <div class="max-w-2xl mx-auto mt-6">{{ $user_words->links() }}</div>
        @else 
            <div class="text-center text-white">No words added.</div>
        @endif

        @include('partials.import_export_btns')
    </div>

    @include('partials.flash_message')
@endsection