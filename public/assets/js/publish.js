(function($) {
    "use strict"; // Start of use strict

    $.ajax({
        url: window._loadPageLink,
        type: 'POST',
        data: `_token=${window._token}`,
        success: function(data) {
            if ($.isEmptyObject(data.error)) {
                $('body').prepend(data.html);
                $('body').prepend(`<style>${data.css}</style>`);

            } else {
                alert(data.error);
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr);
        }
    });

})(jQuery); // End of use strict