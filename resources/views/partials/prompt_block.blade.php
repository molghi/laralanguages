{{-- page title --}}
<h2 class="text-xl font-semibold text-white">What language do you wish to practice?</h2>

{{-- print user-added languages --}}
<ul class="list-disc list-inside space-y-1 text-lg mb-2">
    @foreach ($user_languages as $lang)
        <li style="color: {{ $language_colors[$lang] }};">{{ $languages[$lang] }} ({{ strtoupper($lang) }})</li>
    @endforeach
</ul>

{{-- input field & action button --}}
<form action="{{ route('fetch_practice') }}" method="POST" class="flex space-x-4">
    @csrf
    <input name="language" type="text" placeholder="Type language code (2 letters)" class="flex-1 p-2 rounded bg-black focus:border-blue-500 focus:ring focus:ring-blue-200" autofocus autocomplete="off" required >
    <button type="submit" class="bg-blue-600 {{ config('tailwind.btn-styles') }}">Begin</button>
</form>