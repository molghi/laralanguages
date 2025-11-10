{{-- practice round & language practicing --}}
<div class="practice-round flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-white"><span class="opacity-50">Practice:</span> Round {{ (int) $current_round + 1 }} / {{ count($entries) }} </h2>
    <div class="opacity-50 transition hover:opacity-100 text-[{{ $language_colors[$entries[0]['language']] }}]">{{ $language }}</div>
</div>

{{-- general title --}}
<div class="italic mb-6">Do you remember what this word/phrase means?</div>

{{-- word/phrase --}}
<div class="text-3xl font-bold">{{ $entries[$current_round]['word_phrase'] }}</div>

{{-- translation --}}
<div style="transition: opacity 3s;" class="translation text-3xl font-bold opacity-0 italic text-[{{ $language_colors[$entries[0]['language']] }}]">{{ $entries[$current_round]['translation'] }}</div>

{{-- action buttons: Show, Next, Finish --}}
<div class="flex gap-6 relative actions">
    <button style="transition: opacity 3s, background-color .2s, color .2s;" type="button" class="show-btn {{config('tailwind.btn-styles')}} border hover:bg-[snow] hover:text-black hover:opacity-100">Show</button>

    <form action="{{ $form_route }}" method="POST" class="absolute top-0 left-0" style="z-index: -1;">
        @csrf 
        <button type="submit" class="{{config('tailwind.btn-styles')}} border hover:bg-[snow] hover:text-black hover:opacity-100" style="transition: opacity 3s, background-color .2s, color .2s; opacity: 0;">
            {{ $action_button_text }}
        </button>
    </form>
</div>


<script>
    // show/hide Show/Next buttons
    if (document.querySelector('.show-btn')) {
        document.querySelector('.show-btn').addEventListener('click', function(e) {
            // click on Show btn --> hide Show btn, show Next (or Finish) btn
            document.querySelector('.translation').style.opacity = 1;
            e.target.style.opacity = 0;
            e.target.style.zIndex = -1;
            document.querySelector('form').style.zIndex = 1;
            document.querySelector('form button').style.opacity = 1;
        })
    }
</script>