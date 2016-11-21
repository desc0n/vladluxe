$(document).ready(function() {
    $("#owl-example").owlCarousel();
    $('.listing-detail span').tooltip('hide');
    $('.carousel').carousel({
        interval: 3000
    });
    $('.carousel').carousel('cycle');

    $('.searchbar input[type=text][name=street]').typeahead({
        source: function (query, process) {
            return $.get('/ajax/find_street', {query: query}, function (data) {
                var json = JSON.parse(data); // string to json

                return process(json);
            });
        }
    });
});




$(function() {
    var Page = (function() {
        var $nav = $( '#nav-dots > span' ),
            slitslider = $( '#slider' ).slitslider( {
                onBeforeChange : function( slide, pos ) {

                    $nav.removeClass( 'nav-dot-current' );
                    $nav.eq( pos ).addClass( 'nav-dot-current' );

                }
            } ),

            init = function() {
                initEvents();
            },
            initEvents = function() {
                $nav.each( function( i ) {
                    $( this ).on( 'click', function( event ) {
                        var $dot = $( this );
                        if( !slitslider.isActive() ) {
                            $nav.removeClass( 'nav-dot-current' );
                            $dot.addClass( 'nav-dot-current' );
                        }
                        slitslider.jump( i + 1 );
                        return false;

                    } );

                } );

            };
        return { init : init };
    })();

    Page.init();
});