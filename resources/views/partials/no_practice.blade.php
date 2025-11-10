<div class="flex flex-col gap-4 items-start">

    {{-- language practicing --}}
    <h2 class="text-2xl font-semibold text-[{{ $language_colors[session('language_practicing')] }}]">{{ $languages[session('language_practicing')] }}</h2>

    {{-- message --}}
    <p class="text-md text-white">All added words in this language have been reviewed.</p>
    <p class="text-md text-white">Add more now or wait until the next review.</p>
    
    <a href="/practice/prompt" class="{{config('tailwind.btn-styles')}} border border-gray-700 bg-gray-600 active:opacity-50">Back</a>
</div>