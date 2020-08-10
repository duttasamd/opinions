// $('#categorytags').tagsinput({
//     typeahead: {
//         source: function(query) {
//             var categories = $.get('/util/getcategories');
//             return categories;
//         }
//     },
//     trimValue: true,
//     freeInput: false,
//     select : function (event) {
//         console.log(event);
//     }
// });


$(document).ready(function(){
    var tagsInput = document.querySelector('#categorytags')
    var tagify = new Tagify(tagsInput, {
        whitelist:[],
        dropdown: {
            classname: "color-blue",
            enabled: 0,              // show the dropdown immediately on focus
            maxItems: 10,        // place the dropdown near the typed text
            closeOnSelect: false,          // keep the dropdown open after selecting a suggestion
            highlightFirst: true,
        },
        enforceWhitelist : true
    });
    var controller;

    tagify.on('input', onInput);

    function onInput( e ){
        var value = e.detail.value;
        tagify.settings.whitelist.length = 0; // reset the whitelist

        // https://developer.mozilla.org/en-US/docs/Web/API/AbortController/abort
        controller && controller.abort();
        controller = new AbortController();

        // show loading animation and hide the suggestions dropdown
        //tagify.loading(true).dropdown.hide.call(tagify)

        fetch('/util/getcategories', {
            signal:controller.signal
        })
        .then(RES => RES.json())
        .then(function(whitelist){
            // update inwhitelist Array in-place
            tagify.settings.whitelist.splice(0, whitelist.length, ...whitelist)
            tagify.loading(false).dropdown.show.call(tagify, value); // render the suggestions dropdown
        });
    }

});

