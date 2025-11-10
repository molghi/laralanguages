@php
    $user_id = Auth::id();

    $current_page = Request::url();
    $page_is_add_edit_word = str_contains($current_page, '/form') && !str_contains($current_page, '/form/edit');
    $page_is_words = str_contains($current_page, '/words');
    $page_is_practice = str_contains($current_page, '/practice');
    $page_is_login = str_contains($current_page, '/login');
    $page_is_signup = str_contains($current_page, '/signup');
    
    $current_page_classes = 'opacity-50 hover:opacity-50 underline';

    $hotkeys = 'HOTKEYS: digits 1-3: click header buttons';
@endphp

<header class="{{ config('tailwind.block-bg--transparent') }} p-4 text-white font-mono">
    <div class="max-w-4xl mx-auto flex items-center justify-between">
        <div class="text-xl font-bold transition opacity-50 hover:opacity-100" title="{{ $hotkeys }}">Easy Lang Coach</div>
        
        <div class="relative z-[5] flex items-center gap-6">
            @if ($user_id)
                <a href="/form" class="bg-green-700 {{ config('tailwind.btn-styles') }} {{ $page_is_add_edit_word ? $current_page_classes : '' }}" id="add-word">Add Word</a>
                <a href="/words" class="bg-blue-700 {{ config('tailwind.btn-styles') }} {{ $page_is_words ? $current_page_classes : '' }}" id="view-words">View Words</a>
                <a href="/practice/prompt" class="bg-orange-500 {{ config('tailwind.btn-styles') }} {{ $page_is_practice ? $current_page_classes : '' }}" id="practice">Practice</a>
                <a href="/logout" class="bg-gray-700 {{ config('tailwind.btn-styles') }}">Logout</a>
            @else
                <a href="/login" class="bg-gray-700 {{ config('tailwind.btn-styles') }} {{ $page_is_login ? $current_page_classes : '' }}">Login</a>
                <a href="/signup" class="bg-blue-600 {{ config('tailwind.btn-styles') }} {{ $page_is_signup ? $current_page_classes : '' }}">Sign Up</a>
            @endif
        </div>
    </div>
</header>