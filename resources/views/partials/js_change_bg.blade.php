<script>
    // change background gif functionality:

    const localStorageKey = 'easy_lang_coach_bg';
    const bgSelectEl = document.querySelector('.bg-change select');
    const bgEl = document.querySelector('.bg');
    const path = '../img/';

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

    // populate select w/ options
    const optionsMarkup = Object.keys(options).map(opt => {
        return `<option value="${opt}">${opt.replaceAll('-', ' ')}</option>`;
    })
    bgSelectEl.insertAdjacentHTML('beforeend', optionsMarkup.join(''));

    // react to select change: change bg nicely, save to LS
    bgSelectEl.addEventListener('change', function(e) {
        const selectedOption = e.target.value;
        // sort of blink the bg:
        bgEl.style.filter = 'brightness(0)';
        setTimeout(() => {
            bgEl.style.background = `url('${path}` + options[selectedOption] + `') 0 0 / cover no-repeat`;
        }, 500)
        setTimeout(() => {
            bgEl.style.filter = 'brightness(60%) contrast(140%) saturate(60%) blur(2px)';
        }, 1000)
        localStorage.setItem(localStorageKey, selectedOption);
    })

    // fetch last selected option from LS and show
    const bgFromLS = localStorage.getItem(localStorageKey);
    if (bgFromLS) {
        bgEl.style.background = `url('${path}` + options[bgFromLS] + `') 0 0 / cover no-repeat`;
        document.querySelector(`select option[value="${bgFromLS}"]`).selected = true;
    } else {
        const defaultOption = 'snowing-in-the-dusk'; // default option
        bgEl.style.background = `url('${path}` + options[defaultOption] + `') 0 0 / cover no-repeat`;
        document.querySelector(`select option[value="${defaultOption}"]`).selected = true;
    }
</script>