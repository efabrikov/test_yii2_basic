<style>
    .shadow {        
        position: absolute;
        width: 100%;
        height: 100%;
        top:0;
        left:0;
        opacity: 0.5;
        background-color: black;
        z-index: 1001;
    }

    .loading {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 132px;
        height: 132px;
        /* 1/2 of the height and width of the actual gif */
        margin: -16px 0 0 -16px;
        z-index: 1002;
    }
</style>
<span class = "shadow">
    <img class = "loading" src = "/images/loading.gif" alt = "Loading indicator">
</span>
<script>
    $(document).on('pjax:send', function (k) {
        //console.dir(k.relatedTarget);
        //$(k.relatedTarget).attr('disabled','true');
        //$(k.relatedTarget)
          //      .closest('[data-pjax-container]')
                //.css( "background-color", "red" );
                //.attr( "disabled", "true" );
            //    .append('<span class = "shadow"><img class = "loading" src = "/images/loading.gif" alt = "Loading indicator"></span>');
                //.css('background-color', 'black');
                //.fadeOut("slow");
        //console.dir($(k.relatedTarget).closest('[data-pjax-container]'));

        $('.shadow').show()
    })
    $(document).on('pjax:complete', function (k) {
        //$(k.target)
                //.closest('[data-pjax-container]')
                //.fadeIn("slow");
        //console.dir($(k.target));
        //console.dir($(k.target).closest('[data-pjax-container]'));
        setTimeout(function() {
            $('.shadow').hide();
        },1000);
    })
    $(window).load(function () {
        $('.shadow').hide();
    });
</script>