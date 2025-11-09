<div class="flex gap-4 items-center fixed bottom-[60px] right-[15px]">

    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <input type="file" name="import" class="file-select hidden">
        <button type="button" class="import-btn {{ config('tailwind.btn-styles') }} bg-gray-700 opacity-40 hover:opacity-100 hover:text-white hover:bg-gray-500" title="Import words as JSON">Import</button>
        <button type="submit" class="file-submit hidden">Submit</button>
    </form>

    @if (!empty($user_words) && count($user_words) > 0)
        <a href="/export" class="{{ config('tailwind.btn-styles') }} bg-gray-700 opacity-40 hover:opacity-100 hover:text-white hover:bg-gray-500" title="Export words as JSON">Export</a>
    @endif 
</div>


<script>
    document.querySelector('.import-btn').addEventListener('click', function(e) {
        e.target.previousElementSibling.click(); // open file select window
    });

    document.querySelector('.file-select').addEventListener('change', function(e) {
        document.querySelector('.file-submit').click(); // submit post form
    });
</script>