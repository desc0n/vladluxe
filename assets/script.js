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

    $('.send-notice #street').typeahead({
        source: function (query, process) {
            return $.get('/ajax/find_street', {query: query}, function (data) {
                var json = JSON.parse(data); // string to json

                return process(json);
            });
        }
    });

    $('#selectPriceOrderSearchForm').change(function () {
        $('#searchForm #order').val($(this).val());
        $('#searchForm').submit();
    });

    $('#searchPagination a').click(function () {
        $('#searchForm #page').val($(this).data('page'));
        $('#searchForm').submit();
    });

    $('#sendNoticeQuery').click(function () {
        var type = $('.send-notice #type option:selected').text();
        var floor = $('.send-notice #floor').val();
        var price = $('.send-notice #price').val();
        var district = $('.send-notice #district option:selected').text();
        var street = $('.send-notice #street').val();
        var house = $('.send-notice #house').val();
        var description = $('.send-notice #description').val();
        var customerName = $('.send-notice #customerName').val();
        var customerPhone = $('.send-notice #customerPhone').val();
        var customerEmail = $('.send-notice #customerEmail').val();

        if ($.trim(street) == '') {
            $('#errorModal #errorModalLabel').html('Ошибка');
            $('#errorModal #errorModalBody').html('<div class="alert alert-danger"><strong>Ошибка!</strong> Не указана улица.</div>');
            $('#errorModal').modal('toggle');

            return false;
        }

        if ($.trim(customerPhone) == '') {
            $('#errorModal #errorModalLabel').html('Ошибка');
            $('#errorModal #errorModalBody').html('<div class="alert alert-danger"><strong>Ошибка!</strong> Не указан номер телефона.</div>');
            $('#errorModal').modal('toggle');

            return false;
        }

        $.post('/ajax/send_notice_query', {
            type: type,
            floor: floor,
            price: price,
            district: district,
            street: street,
            house: house,
            description: description,
            customerName: customerName,
            customerPhone: customerPhone,
            customerEmail: customerEmail
        }, function (data) {
            var json = JSON.parse(data);

            if (json.result == 'success') {
                $('#errorModal #errorModalLabel').html('Успешная отправка');
                $('#errorModal #errorModalBody').html('<div class="alert alert-success"><strong>Успех!</strong> Запрос успешно отправлен.</div>');
                $('#errorModal').modal('toggle');

                return false;
            } else {
                $('#errorModal #errorModalLabel').html('Ошибка');
                $('#errorModal #errorModalBody').html('<div class="alert alert-danger"><strong>Ошибка!</strong> Ошибка отправки запроса.</div>');
                $('#errorModal').modal('toggle');

                return false;
            }
        });
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