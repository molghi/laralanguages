<script>
    document.addEventListener('keydown', function(e) {
        const pressedKey = e.code; // language-indifferent, always EN
        const activeEl = document.activeElement.tagName;
        const metaKeyPressed = e.metaKey;

        if (activeEl !== 'INPUT' && activeEl !== 'SELECT' && !metaKeyPressed) {

            if (pressedKey === 'Digit1') {
                // click Add Word header btn
                if (document.querySelector('#add-word')) document.querySelector('#add-word').click();
            }
            
            if (pressedKey === 'Digit2') {
                // click View Words header btn
                if (document.querySelector('#view-words')) document.querySelector('#view-words').click();
            }
            
            if (pressedKey === 'Digit3') {
                // click Practice header btn
                if (document.querySelector('#practice')) document.querySelector('#practice').click();
            }
            
            if (pressedKey === 'Space' && document.querySelector('.practice-round')) {
                // Proceed in practice/quiz: click visible button
                if (document.querySelector('.actions form button').style.opacity == 0) {
                    // if Next btn is hidden, click Show
                    document.querySelector('.show-btn').click();
                } else {
                    // click Next btn
                    document.querySelector('.actions form button').click();
                }
            }
            
        }
    })
</script>