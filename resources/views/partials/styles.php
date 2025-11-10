<style>
    :root{
        --bg: black;
        /* --bg-img: url("https://motionbgs.com/media/3981/cabin-covered-in-snow_312.gif"); */
        /* --bg-img: url("img/snowing-in-the-dusk.gif"); */
    }

    /* to shut up red non-https warning */
    body > div[style="background: red; color: white; padding: 10px; position: fixed; bottom: 0px; width: 100%; text-align: center; z-index: 1000;"] {
        display: none !important;
    }


    /* thin dark scrollbar */
    /* Chrome, Edge, Safari */
    ::-webkit-scrollbar{width:8px;height:8px}
    ::-webkit-scrollbar-track{background:transparent}
    ::-webkit-scrollbar-thumb{background:rgba(100,100,100,0.6);border-radius:999px;border:2px solid transparent;background-clip:padding-box}
    ::-webkit-scrollbar-thumb:hover{background:rgba(100,100,100,0.8)}
    /* Firefox */
    *{scrollbar-width:thin;scrollbar-color:rgba(100,100,100,0.6) transparent}


    @keyframes blink{0%,49%{opacity:0}50%,100%{opacity:1}}


    body {
        position: relative;
    }
    .bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        filter: brightness(60%) contrast(140%) saturate(60%) blur(2px);
        transition: all .5s;
    }

    .word-entry .translation {
        position: relative;
    }
    .word-entry .translation:after {
        content: '';
        position: absolute;
        top: 0;
        left: -2px;
        width: 105%;
        height: 100%;
        background-color: #222;
        transition: all 1.3s;
        border-radius: 5px;
        cursor: none;
    }
    .translation:hover:after {
        background-color: transparent;
    }

    .word-entry {
        transition: all 1s;
    }

    .word-entry:hover {
        box-shadow:  0 0 10px antiquewhite;
    }

    .rounds .round {
        transition: all 1s;
    }
    .rounds .round:hover {
        box-shadow: inset 0 0 10px antiquewhite;
    }

    .rounds .round button:hover {
        opacity: 1;
        background-color: antiquewhite;
        color: black;
    }
    .rounds .round button:active {
        opacity: 0.7;
    }
    .btn--clicked {
        opacity: 1;
        background-color: antiquewhite;
        color: black;
    }
    .form-submit-results button {
        transition: all 1s;
    }

</style>