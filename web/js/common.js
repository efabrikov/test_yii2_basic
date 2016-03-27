jQuery(document).ready(function () {
    //jQuery.pjax.options = { 'skipOuterContainers' : true };
    /*jQuery("body").on("click", "#cart", function() {
     console.log("#cart click");
     });*/


//  $(document).on('click', 'a', function(event) {
//    var container = $(this).closest('[data-pjax-container]')
//    $.pjax.click(event, container)
//  })

    //#main
    //jQuery(document).pjax("#main a", "#main", {"skipOuterContainers": true, "push": true, "replace": false, "timeout": 1000, "scrollTo": false});
   /* $(document).on('click', '#main a', function (event) {
        var container = $(this).closest('[data-pjax-container]')
        $.pjax.click(event, container);
    });
    jQuery(document).on('submit', "#main form[data-pjax]", function (event) {
        var container = $(this).closest('[data-pjax-container]');
        jQuery.pjax.submit(event, container, {"skipOuterContainers": true, "push": true, "replace": false, "timeout": 1000, "scrollTo": false});
    });

    //#cart
    //jQuery(document).pjax("#cart a", "#cart", {"skipOuterContainers": true, "push": false, "replace": false, "timeout": 1000, "scrollTo": false});
    $(document).on('click', '#cart a', function (event) {
        var container = $(this).closest('[data-pjax-container]')
        $.pjax.click(event, container);
    })
    jQuery(document).on('submit', "#cart form[data-pjax]", function (event) {
        var container = $(this).closest('[data-pjax-container]');
        jQuery.pjax.submit(event, container, {"skipOuterContainers": true, "push": false, "replace": false, "timeout": 1000, "scrollTo": false});
    });*/
    
    /*jQuery(document).on('pjax:complete', function (event) {
        console.log("pjax complete.");            
        
        var list = window.pjax_reload_list[$(event.target).attr('id')];        
        
        if (undefined != list) {
            //var arr = $(event.target).attr('data-pjax-reload-list').split(',');
            //console.dir(arr); 
            
            $.each(list, function(k,v){
                console.log('reload ' + v);                
                
                $.pjax.reload({container:"#" + v});
            });            
        }
    });      */
    

});






