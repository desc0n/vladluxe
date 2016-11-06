$(document).ready(function() {
    $("#owl-example").owlCarousel();
    $('.listing-detail span').tooltip('hide');
    $('.carousel').carousel({
        interval: 3000
    });
    $('.carousel').carousel('cycle');

    var districts = [
        '3-я (третья) Рабочая',
        '6-й (шестой) километр',
        '64-й (шестьдесят четвертый) микрорайон',
        '71-й (семьдесят первый) микрорайон',
        'Академгородок',
        'Артур (бухта Улисс)',
        'БАМ',
        'Баляева',
        'Весенняя',
        'Водохранилище Пионерское',
        'Воевода',
        '2-я (вторая) речка',
        'Выселковая',
        'Гоголя',
        'Голубинка',
        'Горностай',
        'Дальхимпром',
        'Дворец культуры моряков',
        'Диомид',
        'Днепровская',
        'Емар',
        'Жигур',
        'Заря',
        'Зеленый угол',
        'Змеинка',
        'Инструментальный завод',
        'Камская',
        'Кирова',
        'Комсомольская',
        'Котельникова',
        'Луговая',
        'Льва Толстого',
        'Мальцевская',
        'Маяк',
        'Моргородок',
        'Морское кладбище',
        'Набережная',
        'Некрасовская',
        'Окатовая',
        'Океанская',
        'Патрокл',
        'Первая речка',
        'Подножье',
        'Поспелово',
        'Постышева',
        'Рыбачий',
        'Рыбный порт',
        'Рында',
        'Сабанеева',
        'Садгород',
        'Санаторная',
        'Седанка',
        'Снеговая',
        'Спутник',
        'Станция Мыс Чуркин',
        '100-е (столетие) Владивостока',
        'Тавайза',
        'Техучилище',
        'Тихая',
        'Трампарк',
        'Трудовая',
        'Трудовое',
        'Угольная',
        'Фокина',
        'Фуникулер',
        'Хабаровская',
        'Центр города',
        'Цирк',
        'Чайка',
        'Чуркин',
        'Шамора',
        'Шилкинская',
        'Школьная',
        'Экипажный',
        'пионерский лагерь Океан'
    ];

    $('.searchbar input[type=text][name=district]').typeahead({
        source: districts
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