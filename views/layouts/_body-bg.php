<style>
    body {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;

        background: url(/images/bg-main.jpg) center top no-repeat fixed;
        background-size: cover;
    }

    /* BG video */
    .bg_video {
        z-index: -1;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .bg_video video {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;

        min-width: 100%;
        min-height: 100%;
    }

</style>
<div class="bg_video">
    <video poster="/images/bg-main.jpg" preload="none" loop autoplay muted id="bg_video">
        <source src="/video/back.mp4" type="video/mp4">
        <source src="/video/back.webm" type="video/webm">
        <source src="/video/back.ogv" type="video/ogg">
    </video>
</div>
<!--.bg_video-->