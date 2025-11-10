@php
    // config
    // type is either input or select
    $fields = [
        'Word / Phrase' => ['input', 'word_phrase'],
        'Language' => ['select', 'language'],
        'Translation' => ['input', 'translation'],
        'Definition / Tip' => ['input', 'definition'],
        'Category / Tag' => ['input', 'category'],
        'Web Img Path' => ['input', 'web_img'],
        'Example Usage' => ['input', 'example_usage'],
        'Note' => ['input', 'note'],
    ];
@endphp

<div class="max-w-xl mx-auto mt-10 p-6 {{config('tailwind.block-bg--transparent')}} text-white rounded-2xl shadow-lg border border-gray-700 mb-4">
    {{-- page title --}}
  <h2 class="text-2xl font-semibold mb-6 text-center">{{ ucwords($mode) }} Word</h2>

  <form action="{{ $form_action }}" method="POST" class="space-y-4 grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
    @csrf 

    @if ($mode === 'edit')
        @method('PUT')
    @endif

    {{-- render fields: either input or select --}}
    @foreach ($fields as $label => $type_name_arr)
        @if ($type_name_arr[0] === 'input')
            <div>
                <label for="{{$type_name_arr[1]}}" class="block font-medium mb-1 opacity text-gray-400">
                    {{ $label }} 
                    {!! $label === 'Word / Phrase' ? '<span class="text-red-500">*</span>' : '' !!}
                </label>
                <input name="{{ $type_name_arr[1] }}" autocomplete="off" type="text" 
                    id="{{$type_name_arr[1]}}"
                    {{ $label === 'Word / Phrase' ? 'autofocus' : '' }}
                    {{ $label === 'Word / Phrase' ? 'required' : '' }}
                    value="{{ $mode === 'edit' ? $entry[$type_name_arr[1]] : '' }}"
                    class="w-full rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 px-3 py-2 bg-black">
            </div>
        @else
            <div>
                <label for="language" class="block font-medium mb-1 opacity text-gray-400">
                    Language <span class="text-red-500">*</span>
                </label>
                <select name="language" id="language" required
                    class="w-full rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 px-3 py-2 bg-black">
                        <option disabled value="0">Select Language</option>
                    @foreach ($languages as $lang_key => $lang_val)
                        <option value="{{ $lang_key }}" 
                            {{ $mode === 'add' && $lang_key === $selected_language ? 'selected' : '' }}
                            {{ $mode === 'edit' && $entry->language === $lang_key ? 'selected' : '' }}
                        >
                            {{ $lang_val }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif
    @endforeach

    {{-- form btn --}}
    <div class="col-span-full text-right pt-2">
      <button type="submit"
        class="bg-blue-700 text-white font-semibold shadow-md active:shadow-sm active:translate-y-[1px] {{ config('tailwind.btn-styles') }} min-w-[100px]">
        {{ strtoupper($mode) }}
      </button>
    </div>
  </form>
</div>

{{-- print errors --}}
@error('word_phrase')
    <div class="error-msg text-[red] text-center mt-8 mb-2">
        <div class="inline-block bg-black/50 px-3 py-2 rounded">Error: {{ $message }}</div>
    </div>
@enderror

@error('language')
    <div class="error-msg text-[red] text-center mt-8 mb-2">
        <div class="inline-block bg-black/50 px-3 py-2 rounded">Error: {{ $message }}</div>
    </div>
@enderror

@error('translation')
    <div class="error-msg text-[red] text-center mt-8 mb-2">
        <div class="inline-block bg-black/50 px-3 py-2 rounded">Error: {{ $message }}</div>
    </div>
@enderror

@error('definition')
    <div class="error-msg text-[red] text-center mt-8 mb-2">
        <div class="inline-block bg-black/50 px-3 py-2 rounded">Error: {{ $message }}</div>
    </div>
@enderror

@error('category')
    <div class="error-msg text-[red] text-center mt-8 mb-2">
        <div class="inline-block bg-black/50 px-3 py-2 rounded">Error: {{ $message }}</div>
    </div>
@enderror

@error('web_img')
    <div class="error-msg text-[red] text-center mt-8 mb-2">
        <div class="inline-block bg-black/50 px-3 py-2 rounded">Error: {{ $message }}</div>
    </div>
@enderror

@error('example_usage')
    <div class="error-msg text-[red] text-center mt-8 mb-2">
        <div class="inline-block bg-black/50 px-3 py-2 rounded">Error: {{ $message }}</div>
    </div>
@enderror

@error('note')
    <div class="error-msg text-[red] text-center mt-8 mb-2">
        <div class="inline-block bg-black/50 px-3 py-2 rounded">Error: {{ $message }}</div>
    </div>
@enderror


<script>
    // remove validation error msg in n secs
    const secsToRemoveMsg = 5;
    const errorMsg = document.querySelector('.error-msg');
    if (errorMsg) {
        setTimeout(() => {
            document.querySelectorAll('.error-msg').forEach(el => el.remove());
        }, secsToRemoveMsg * 1000)
    }
</script>