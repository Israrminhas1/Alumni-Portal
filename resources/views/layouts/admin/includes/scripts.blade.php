    <!-- Core JS -->
    <!-- build:js admin-assets/vendor/js/core.js -->

    <script src="{{ asset('admin-assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin-assets/vendor/libs/block-ui/block-ui.js') }}"></script>
    <script src="{{ asset('admin-assets/js/extended-ui-blockui.js') }}"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

    <script src="{{ asset('admin-assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/moment/moment.js') }}"></script>

    <script src="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin-assets/js/main.js') }}"></script>

    <script>
        // $(document).ready(function() {
        //     // Show spinner on page load
        //     blockUI();

        //     // Hide spinner when page is fully loaded
        //     $(window).on('load', function() {
        //         $.unblockUI();
        //     });
        // });

        // $(document).on({
        //     ajaxStart: function() {
        //         blockUI();
        //     },
        //     ajaxStop: function() {
        //         $.unblockUI();
        //     }
        // });

        function blockUI() {
            $.blockUI({
                message: '<div class="sk-wave mx-auto"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div>', // Adjust the timeout as needed
                css: {
                    backgroundColor: 'transparent',
                    border: '0'
                },
                overlayCSS: {
                    opacity: 0.5
                }
            });
        }

        // AJAX header for CSRF protection
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
