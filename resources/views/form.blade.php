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
    $selected_language = 'es';

    $mode = !empty($entry) ? 'edit' : 'add';
    $form_action = $mode === 'add' ? route('word.add') : route('word.update', $entry->id);
    $mode_for_title = ucwords($mode);
@endphp

@extends('layouts.app')

@section('title', "$mode_for_title Word")

@section('content')
    <div class="">
        @include('partials.form_block')
    </div>
    @include('partials.flash_message')
@endsection