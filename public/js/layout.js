jQuery(window).on('load', function(e){
    // initialize Packery
    var $grid = $('.grid').packery({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true,
    });

    // make all grid-items draggable
    $grid.find('.grid-item').each( function( i, gridItem ) {
        var draggie = new Draggabilly( gridItem );
        // bind drag events to Packery
        $grid.packery( 'bindDraggabillyEvents', draggie );
    });

    // show item order after layout
    function orderItems() {
        var itemElems = $grid.packery('getItemElements');
        $( itemElems ).each( function( i, itemElem ) {
            $( itemElem ).find('.sortInput').val( i + 1 );
        });
    }

    $grid.on( 'layoutComplete', orderItems );
    $grid.on( 'dragItemPositioned', orderItems );

});