<style>
    :root{
        --bg: black;
        /* --bg-img: url("https://c.tenor.com/EoNWZ2yXN2oAAAAC/tenor.gif"); */
        --bg-img: url("https://motionbgs.com/media/3981/cabin-covered-in-snow_312.gif");
        /* --bg-img: url("https://i.pinimg.com/originals/ff/53/9f/ff539f30bff12b8b02698dcff72a7766.gif"); */
        /* --bg-img: url("https://i.pinimg.com/originals/13/21/97/132197f89853d564c086ef923ad0ed71.gif"); */
        /* --bg-img: url("https://i.pinimg.com/originals/5b/99/c2/5b99c23aeffd798ccaabdd265e7153fe.gif"); */
        /* --bg-img: url(""); */
    }

    /* to shut up red non-https warning */
    body > div[style] {
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


    main {
        position: relative;
    }
    main:after {
        content: '';
        /* background: black 0 0 / cover no-repeat; */
        background: var(--bg-img) 0 0 / cover no-repeat;
        /* background-image: var(--bg-img); */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        filter: brightness(60%) contrast(140%) saturate(60%) blur(2px);
        /* filter: blur(3px); */
    }

</style>