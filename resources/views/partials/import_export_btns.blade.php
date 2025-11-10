@php
    $is_logged_in = Auth::id();
@endphp

@if ($is_logged_in)
<div class="flex gap-4 items-center absolute bottom-[70px] right-[10px] text-[silver]">

    {{-- Import --}}
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <input type="file" name="import" class="file-select hidden">
        <button type="button" class="import-btn {{ config('tailwind.btn-styles') }} bg-gray-700 opacity-40 hover:opacity-100 hover:text-white hover:bg-gray-500" title="Import words as JSON">Import</button>
        <button type="submit" class="file-submit hidden">Submit</button>
    </form>

    {{-- Export --}}
    @if (!empty($all_user_words) && count($all_user_words) > 0)
        <a href="/export" class="{{ config('tailwind.btn-styles') }} bg-gray-700 opacity-40 hover:opacity-100 hover:text-white hover:bg-gray-500" title="Export words as JSON">Export</a>
    @endif 
</div>
@endif


<script>
    if (document.querySelector('.import-btn')) {
        document.querySelector('.import-btn').addEventListener('click', function(e) {
            e.target.previousElementSibling.click(); // open file select window
        });
    }

    if (document.querySelector('.file-select')) {
        document.querySelector('.file-select').addEventListener('change', function(e) {
            document.querySelector('.file-submit').click(); // submit post form
        }); 
    }
</script>