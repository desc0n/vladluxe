$(document).ready(function() {
    $('#street').typeahead({
        source: function (query, process) {
            return $.get('/ajax/find_street', {query: query}, function (data) {
                var json = JSON.parse(data); // string to json

                return process(json);
            });
        }
    });
});

function redactNoticeImg(id, src)
{
    $('#redactImgModal .modal-body')
        .html('')
        .append('<img src="/public/img/thumb/' + src + '" data-id="' + id + '">')
    ;

    $('#redactImgModal').modal('toggle');
}

function removeNoticeImg()
{
    var id = $('#redactImgModal .modal-body img').data('id');

    $.ajax({url: '/ajax/remove_notice_img', type: 'POST', data: {id: id}, async: true})
        .done(function () {
            $('#redactImgModal').modal('toggle');
            $('#noticeImg' + id).remove();
        });
}

function removeNotice(id)
{
    $.ajax({url: '/ajax/remove_notice', type: 'POST', data: {id: id}, async: true})
        .done(function () {
            $('#noticeRow' + id).remove();
        });
}

function showOnIndexTop(id)
{
    $.ajax({url: '/ajax/show_on_index_top', type: 'POST', data: {id: id}, async: true})
        .done(function () {
            $('#noticeRow' + id + ' .change-index-top-btn button').remove();
            $('#noticeRow' + id + ' .change-index-top-btn').append(
                '<button title="Не отображать в верхней части главной страницы" class="btn btn-danger change-index-top-btn" onclick="hideOnIndexTop(' + id + ');"><i class="fa fa-caret-square-o-up fa-fw"></i></button>'
            );
        });
}

function hideOnIndexTop(id)
{
    $.ajax({url: '/ajax/hide_on_index_top', type: 'POST', data: {id: id}, async: true})
        .done(function () {
            $('#noticeRow' + id + ' .change-index-top-btn button').remove();
            $('#noticeRow' + id + ' .change-index-top-btn').append(
                '<button title="Отобразить в верхней части главной страницы" class="btn btn-success change-index-top-btn" onclick="showOnIndexTop(' + id + ');"><i class="fa fa-caret-square-o-up fa-fw"></i></button>'
            );
        });
}