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

    <div class="bg-gray-800 text-white p-6 rounded-lg max-w-xl mx-auto space-y-4 mt-10 {{config('tailwind.block-bg--transparent')}} text-white border border-gray-700">
        @if (!empty($user_languages) && count($user_languages) > 0)
            {{-- Show prompt form --}}
            <h2 class="text-xl font-semibold text-white">What language do you wish to practice?</h2>
            <ul class="list-disc list-inside space-y-1">
                @foreach ($user_languages as $lang)
                    <li style="color: {{ $language_colors[$lang] }};">{{ $languages[$lang] }} ({{ strtoupper($lang) }})</li>
                @endforeach
            </ul>
            <form action="{{ route('fetch_practice') }}" method="POST" class="flex space-x-4">
                @csrf
                <input name="language" type="text" placeholder="Type language code (2 letters)" class="flex-1 p-2 rounded bg-black focus:border-blue-500 focus:ring focus:ring-blue-200" autofocus autocomplete="off" required >
                <button type="submit" class="bg-blue-600 {{ config('tailwind.btn-styles') }}">Begin</button>
            </form>
        @else 
            {{-- Show message --}}
            <h2 class="text-xl font-semibold text-white">You have not added any words to practice.</h2>
        @endif
        
    </div>


    @include('partials.flash_message')
@endsection