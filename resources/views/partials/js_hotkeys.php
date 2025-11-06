<script>
    document.addEventListener('keydown', function(e) {
        const pressedKey = e.code; // language-indifferent, always EN
        const activeEl = document.activeElement.tagName;
        const metaKeyPressed = e.metaKey;
        if (activeEl !== 'INPUT' && activeEl !== 'SELECT' && !metaKeyPressed) {
            if (pressedKey === 'Digit1') {
                // click Add Word
                if (document.querySelector('#add-word')) document.querySelector('#add-word').click();
            }
            if (pressedKey === 'Digit2') {
                // click View Words
                if (document.querySelector('#view-words')) document.querySelector('#view-words').click();
            }
            if (pressedKey === 'Digit3') {
                // click Practice
                if (document.querySelector('#practice')) document.querySelector('#practice').click();
            }
        }
    })
</script>