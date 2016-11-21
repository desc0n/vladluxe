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
