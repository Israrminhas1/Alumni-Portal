 (function($) {
    "use strict"; // Start of use strict

    $(".btn_builder_template").on("click", function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#template_id_builder').val(id);

    });

})(jQuery); // End of use strict