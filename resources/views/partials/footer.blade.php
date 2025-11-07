<footer class="{{ config('tailwind.block-bg--transparent') }} text-gray-600 text-center p-3 text-sm">
    <div class="max-w-4xl mx-auto flex items-center justify-between">
        <div class="bg-change">
            <select title="Select Background GIF" name="bg-change" class="border bg-[transparent] border-gray-700 p-1 px-2 rounded-md cursor-pointer transition opacity-30 hover:opacity-100">
                <option disabled value="0">Select Background GIF</option>
            </select>
        </div>
        <p>&copy; Nov 2025 MyCompany. All rights reserved.</p>
    </div>
</footer>


<script>
    // change background gif functionality:

    const localStorageKey = 'easy_lang_coach_bg';
    const bgSelectEl = document.querySelector('.bg-change select');
    const bgEl = document.querySelector('.bg');

    const options = {
        'snowing-in-the-dusk': 'snowing-in-the-dusk.gif',
        'snow-in-the-dark': 'snow-in-the-dark.gif',
        'heavy-snow': 'heavy-snow.gif',
        'snowing-in-the-forest-2': 'snowing-in-the-forest-2.gif',
        'snowing-in-the-forest': 'snowing-in-the-forest.gif',
        'snowy-forest': 'snowy-forest.gif',
        'snow-lamppost': 'snow-lamppost.gif',
        'snowing-top': 'snowing-top.gif',
        'snowy-overcast': 'snowy-overcast.gif',
        'snow-trees': 'snow-trees.gif',
        'snow-black': 'snow-black.gif',
        'snowy-day': 'snowy-day.gif',
        'snowy-day-2': 'snowy-day-2.gif',
        'snowy-day-3': 'snowy-day-3.gif',
    }

    // populate w/ options
    const optionsMarkup = Object.keys(options).map(opt => {
        return `<option value="${opt}">${opt.replaceAll('-', ' ')}</option>`;
    })
    bgSelectEl.insertAdjacentHTML('beforeend', optionsMarkup.join(''));

    // react to change, change BG nicely, save to LS
    bgSelectEl.addEventListener('change', function(e) {
        const selectedOption = e.target.value;
        bgEl.style.filter = 'brightness(0)';
        setTimeout(() => {
            bgEl.style.background = `url('img/` + options[selectedOption] + `') 0 0 / cover no-repeat`;
        }, 500)
        setTimeout(() => {
            bgEl.style.filter = 'brightness(60%) contrast(140%) saturate(60%) blur(2px)';
        }, 1000)
        localStorage.setItem(localStorageKey, selectedOption);
    })

    // fetch last selected option from LS and show
    const bgFromLS = localStorage.getItem(localStorageKey);
    if (bgFromLS) {
        bgEl.style.background = `url('img/` + options[bgFromLS] + `') 0 0 / cover no-repeat`;
        document.querySelector(`select option[value="${bgFromLS}"]`).selected = true;
    } else {
        const defaultOption = 'snowing-in-the-dusk';
        bgEl.style.background = `url('img/` + options[defaultOption] + `') 0 0 / cover no-repeat`;
        document.querySelector(`select option[value="${defaultOption}"]`).selected = true;
    }
</script>