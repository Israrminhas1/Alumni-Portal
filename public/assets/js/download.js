 (function($) {
    "use strict"; // Start of use strict

    function myFunction() {
	     window.print();
	}
    document.getElementById("pdfDownloader").addEventListener("click", myFunction);
	

    $.ajax({
        url: window._loadPageLink,
        type: 'POST',
        async: false,
        data: `_token=${window._token}`,
        success: function(data) {
            if ($.isEmptyObject(data.error)) {
                $('body').append(data.html);
                $('body').prepend(`<style>${data.css}</style>`);
                
            } else {
                alert(data.error);
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr);
        }
    });

    window.print();

})(jQuery); // End of use strict