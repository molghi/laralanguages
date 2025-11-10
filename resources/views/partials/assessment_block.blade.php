<div class="max-w-4xl mx-auto mt-10 px-4">

    <div class="flex items-center justify-between text-white mb-10">
        <h2 class="text-[#eee] font-bold text-2xl">Assess Your Knowledge — Spaced Repetition System</h2>
        <div class="p-2 rounded-md border border-gray-700 text-[{{ $language_color }}]" style="background-color: rgba(0,0,0,0.5)">{{ $language }}</div>
    </div>
    
    <div class="rounds mb-10">
        @foreach ($entries as $index => $entry)
            <div class="round flex items-center rounded-md border border-gray-700 text-white mb-5 p-5 {{config('tailwind.block-bg--transparent')}} transition">
                <div class="text-4xl opacity-30 font-bold mr-10"> {{ $index+1 }} </div>
                <div class="flex items-center gap-4">
                    <div class="font-bold">{{ $entry['word_phrase'] }}</div>
                    —
                    <div class="italic">{{ $entry['translation'] }}</div>
                </div>
                <div class="btns flex gap-2 items-center ml-auto text-sm">
                    <button class="btn-forgot border border-gray-700 {{config('tailwind.btn-styles')}}" title="You didn’t remember the answer">Forgot</button>
                    <button class="btn-barely border border-gray-700 {{config('tailwind.btn-styles')}}" title="You remembered with difficulty">Barely</button>
                    <button class="btn-okay border border-gray-700 {{config('tailwind.btn-styles')}}" title="You remembered correctly with moderate effort">
                    Okay
                    </button>
                    <button class="btn-easily border border-gray-700 {{config('tailwind.btn-styles')}}" title="You recalled effortlessly">Easily</button>
                </div>
            </div>
        @endforeach
    </div>

    {{-- block footer --}}
    <div class="flex justify-end gap-6 items-center text-white">
        <div class="warning text-[coral] transition p-2 px-4 rounded-md border border-gray-700" style="background-color: rgba(0,0,0,0.5)">You must rate every question to submit the results.</div>
        <form action="{{ route('quiz.register') }}" method="POST" class="form-submit-results">
            @csrf 
            <input type="hidden" name="results" value="">
            <button class="{{config('tailwind.btn-styles')}} border border-[transparent] transition opacity-50 cursor-not-allowed pointer-events-none bg-green-600" type="submit">Submit Results</button>
        </form>
    </div>

</div>



<script>
    document.querySelector('.rounds').addEventListener('click', function(e) {
        // click round button and register it (visually change it)
        if (e.target.tagName !== 'BUTTON') return;
        const clickedBtn = e.target;
        const btnsHolder = clickedBtn.closest('.btns');
        btnsHolder.querySelectorAll('button').forEach(x => {
            x.classList.remove('btn--clicked');
        })
        clickedBtn.classList.add('btn--clicked');

        // detect how many clicked btns, unfreeze Submit Results btn
        const rounds = document.querySelectorAll('.rounds .round').length;
        const clickedBtns = document.querySelectorAll('.btn--clicked').length;
        if (clickedBtns === rounds) {
            document.querySelector('.form-submit-results button').classList.remove('opacity-50', 'cursor-not-allowed', 'pointer-events-none');
            document.querySelector('.warning').classList.add('hidden');

            // pass results to Laravel
            const results = [...document.querySelectorAll('.btn--clicked')].map(x => {
                return [...x.classList].find(x => x.includes('btn-')).slice(4);
            });
            document.querySelector('.form-submit-results input[name="results"]').value = JSON.stringify(results);
        }
    })
</script>