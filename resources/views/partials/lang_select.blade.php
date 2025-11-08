@php
    $month_years = [];
    foreach($user_month_years as $user_month_year) {
        $month_year = $user_month_year['year'] . '-' . $user_month_year['month'];
        if (!in_array($month_year, $month_years)) array_push($month_years, $month_year);
    }
@endphp

<select name="filter" class="bg-black text-white rounded-md px-4 py-1 {{ config('tailwind.block-bg--transparent') }} border border-gray-500 cursor-pointer">

    <option value="0" selected disabled>Filter</option>
    <option value="show-all">Show all</option>

    {{-- LANGUAGES --}}
    @if (!empty($user_languages) && count($user_languages) > 0)
        @foreach ($user_languages as $key => $val)  
            <option value="lang-{{$val['language']}}" 
                {{ !empty(session('current_filter')) && "lang-".$val['language'] === session('current_filter') ? 'selected' : '' }}
                {{-- {{$val['language'] === $selected_language ? 'selected' : ''}} --}}
            >
                Language: {{$languages[$val['language']]}}
            </option>
        @endforeach
    @endif 

    {{-- CATEGORIES --}}
    @if (!empty($user_categories) && count($user_categories) > 0)
        @foreach ($user_categories as $key => $val)  
            @if ($val['category'])
                <option value="category-{{$val['category']}}"
                    {{ !empty(session('current_filter')) && "category-".$val['category'] === session('current_filter') ? 'selected' : '' }}
                >
                    Category: {{$val['category']}}
                </option>
            @endif
        @endforeach
    @endif

    {{-- MONTH-YEARS --}}
    @if (!empty($month_years) && count($month_years) > 0)
        @foreach ($month_years as $key => $val)  
            <option value="period-{{$val}}"
                {{ !empty(session('current_filter')) && "period-".$val === session('current_filter') ? 'selected' : '' }}
            >
                Added in: {{$val}}
            </option>
        @endforeach
    @endif

</select>




<script>
    document.querySelector('select[name="filter"]').addEventListener('change', function(e) {
        const selectedValue = e.target.value;
        if (selectedValue === 'show-all') {
            location.href = `/words`;
        }
        if (selectedValue.includes('lang-')) {
            const [lang, value] = selectedValue.split('-');
            location.href = `/words?filter=${lang}&value=${value}`;
        }
        if (selectedValue.includes('category-')) {
            const [cat, value] = selectedValue.split('-');
            location.href = `/words?filter=${cat}&value=${value}`;
        }
        if (selectedValue.includes('period-')) {
            const period = selectedValue.split('-')[0];
            const value = selectedValue.split('-').slice(1).join('-');
            location.href = `/words?filter=${period}&value=${value}`;
        }
    })
</script>