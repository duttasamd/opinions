$(document).ready(function(){
    var possibletitles = [
        {"label" : "Messi", "value" : "1"},
        {"label" : "Messi is the", "value" : "2"},
    ];

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var csrfVar = $('meta[name="csrf-token"]').attr('content');

    $("#txtSearch").autocomplete({
        source: '/fetchautocomplete',
        select: function (event, ui) {
            if(ui.item.value == -1) {
                $('<form action="/post/create" method="post"><input name="title" value=' + ui.item.label + '/>' +
                    '<input name="_token" value="' + csrfVar + '" type="hidden" />' + '</form>').appendTo('body').submit();
            } else {
                window.location.replace('/post/' + ui.item.value);
            }
        }
    });

    // $('#txtSearch').keyup(
    //     function () {
    //         var query = $(this).val();
    //         if(query.length > 5) {
    //             $.ajax({
    //                 type:'POST',
    //                 url:'/fetchautocomplete',
    //                 data: {search_term: query},
    //                 success:function(data) {
    //
    //                 }
    //             });
    //         }
    //     }
    // );

});
