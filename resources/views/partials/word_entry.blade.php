<div class="word-entry border rounded-xl p-5 mb-6 shadow-md bg-gray-900/50 border-[{{ $language_colors[$entry->language] }}] text-[{{ $language_colors[$entry->language] }}] relative" 
     data-word-id="{{$entry->id}}" 
     data-category="{{$entry->entry}}" 
     data-lang="{{$entry->language}}"
>

  <div class="space-y-2">

    {{-- language --}}
    <div class="flex gap-4 items-center">
      <div class="font-semibold text-sm text-gray-500">Language:</div>
      <div>{{$languages[$entry->language]}}</div>
    </div>

    {{-- word / phrase --}}
    <div class="flex gap-4 items-center">
      <div class="font-semibold text-sm text-gray-500">Word/Phrase:</div>
      <div>{{$entry->word_phrase}}</div>
    </div>

    {{-- translation --}}
    @if ($entry->translation)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Translation:</div>
            <div class="italic text-[{{ $language_colors[$entry->language] }}] translation">{{$entry->translation}}</div>
        </div>
    @endif 

    {{-- definition --}}
    @if ($entry->definition)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Definition:</div>
            <div class="italic text-[{{ $language_colors[$entry->language] }}]">{{ $entry->definition }}</div>
        </div>
    @endif 

    {{-- category --}}
    @if ($entry->category)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Category:</div>
            <div class="italic text-[{{ $language_colors[$entry->language] }}]">{{ $entry->category }}</div>
        </div>
    @endif 

    {{-- web img --}}
    @if ($entry->web_img)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Web Image:</div>
            <div class="w-[100px] bg-black">
                <img src="{{ $entry->web_img }}" alt="Entry Image" class="w-full">
            </div>
        </div>
    @endif 

    {{-- example usage --}}
    @if ($entry->example_usage)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Example Usage:</div>
            <div class="italic text-[{{ $language_colors[$entry->language] }}]">{{ $entry->example_usage }}</div>
        </div>
    @endif 

    {{-- note --}}
    @if ($entry->note)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Note:</div>
            <div class="italic text-[{{ $language_colors[$entry->language] }}]">{{ $entry->note }}</div>
        </div>
    @endif 

    {{-- when added --}}
    <div class="flex gap-4 items-center text-xs text-gray-400 border-t border-white/20 pt-2 mt-2">
      <div class="font-semibold text-gray-500">Added:</div>
      <div>{{ substr($entry->created_at, 0, -3) }}</div>
    </div>
  </div>

  {{-- action buttons --}}
  <div class="flex justify-end gap-2 absolute top-[10px] right-[10px]">
    {{-- edit btn --}}
    <a href="/form/edit/{{$entry->id}}" class="{{config('tailwind.btn-styles')}} hover:bg-blue-500 text-white font-semibold  active:translate-y-[1px] shadow py-1 opacity-50 hover:opacity-100 border border-[#555] hover:text-white">
      Edit
    </a>
    {{-- delete btn --}}
    <form action="{{ route('word.delete', $entry->id) }}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" onclick="return confirm('Are you sure you want to delete this entry?\n\nThis action cannot be undone.')" class="{{config('tailwind.btn-styles')}} hover:bg-red-600 text-white font-semibold active:translate-y-[1px] shadow py-1 opacity-50 hover:opacity-100 border border-[#555] hover:text-white">
            Delete
        </button>
    </form>
  </div>
</div>