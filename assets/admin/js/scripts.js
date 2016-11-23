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