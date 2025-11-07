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
        {{-- Page title & filter --}}
        <div class="flex items-center justify-between max-w-2xl mx-auto mb-5">
            <h2 class="text-xl font-bold text-white">View Words — Entries: {{count($user_words)}}</h2>
            <select name="filter" class="bg-black text-white rounded-md px-4 py-1 bg-gray-700 border border-gray-500">
                <option value="0" selected disabled>Filter</option>
            </select>
        </div>

        {{-- print words --}}
        @if (!empty($user_words) && count($user_words) > 0)
            <div class="max-w-2xl mx-auto">
                @foreach ($user_words as $entry)
                    @include('partials.word_entry')
                @endforeach
            </div>
        @else 
            <div class="text-center text-white">No words added.</div>
        @endif

        {{-- import/export btns --}}
        <div class="flex gap-4 items-center fixed bottom-[60px] right-[15px]">
            <a href="#" class="{{ config('tailwind.btn-styles') }} bg-gray-700 opacity-40 hover:opacity-100 hover:text-white hover:bg-gray-500" title="Import words as JSON">Import</a>
            @if (!empty($user_words) && count($user_words) > 0)
                <a href="#" class="{{ config('tailwind.btn-styles') }} bg-gray-700 opacity-40 hover:opacity-100 hover:text-white hover:bg-gray-500" title="Export words as JSON">Export</a>
            @endif 
        </div>
    </div>
    @include('partials.flash_message')
@endsection