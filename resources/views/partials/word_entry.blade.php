<div class="word-entry border rounded-xl p-5 mb-6 shadow-md bg-gray-900/50 border-[{{ $language_colors[$entry->language] }}] text-[{{ $language_colors[$entry->language] }}] relative" 
     data-word-id="{{$entry->id}}" data-category="{{$entry->entry}}" data-lang="{{$entry->language}}">

  <div class="space-y-2">
    <div class="flex gap-4 items-center">
      <div class="font-semibold text-sm text-gray-500">Language:</div>
      <div>{{$languages[$entry->language]}}</div>
    </div>

    <div class="flex gap-4 items-center">
      <div class="font-semibold text-sm text-gray-500">Word/Phrase:</div>
      <div>{{$entry->word_phrase}}</div>
    </div>

    @if ($entry->translation)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Translation:</div>
            <div class="italic text-yellow-300 translation">{{$entry->translation}}</div>
        </div>
    @endif 

    @if ($entry->definition)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Definition:</div>
            <div class="italic text-yellow-300">{{ $entry->definition }}</div>
        </div>
    @endif 

    @if ($entry->category)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Category:</div>
            <div class="italic text-yellow-300">{{ $entry->category }}</div>
        </div>
    @endif 

    @if ($entry->web_img)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Web Image:</div>
            <div class="italic text-yellow-300">{{ $entry->web_img }}</div>
        </div>
    @endif 

    @if ($entry->example_usage)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Example Usage:</div>
            <div class="italic text-yellow-300">{{ $entry->example_usage }}</div>
        </div>
    @endif 

    @if ($entry->note)
        <div class="flex gap-4 items-center">
            <div class="font-semibold text-sm text-gray-500">Note:</div>
            <div class="italic text-yellow-300">{{ $entry->note }}</div>
        </div>
    @endif 

    <div class="flex gap-4 items-center text-xs text-gray-400 border-t border-white/20 pt-2 mt-2">
      <div class="font-semibold text-gray-500">Added:</div>
      <div>{{ substr($entry->created_at, 0, -3) }}</div>
    </div>
  </div>

  <div class="flex justify-end gap-2 absolute top-[10px] right-[10px]">
    <a href="/form/edit/{{$entry->id}}" class="{{config('tailwind.btn-styles')}} hover:bg-blue-500 text-white font-semibold  active:translate-y-[1px] shadow py-1 opacity-50 hover:opacity-100 border border-[#555]">
      Edit
    </a>
    <form action="{{ route('word.delete', $entry->id) }}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" onclick="return confirm('Are you sure you want to delete this entry?\n\nThis action cannot be undone.')" class="{{config('tailwind.btn-styles')}} hover:bg-red-600 text-white font-semibold active:translate-y-[1px] shadow py-1 opacity-50 hover:opacity-100 border border-[#555]">
            Delete
        </button>
    </form>
  </div>
</div>