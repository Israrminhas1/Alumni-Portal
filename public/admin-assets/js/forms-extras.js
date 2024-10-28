/**
 * Form Extras
 */

'use strict';

// bootstrap-maxlength & repeater (jquery)
$(function () {
  var maxlengthInput = $('.bootstrap-maxlength-example');

  // Bootstrap Max Length Initialization
  function initMaxlength() {
    if (maxlengthInput.length) {
      maxlengthInput.each(function () {
        $(this).maxlength({
          warningClass: 'label label-success bg-success text-white',
          limitReachedClass: 'label label-danger',
          separator: ' out of ',
          preText: 'You typed ',
          postText: ' chars available.',
          validate: true,
          threshold: +this.getAttribute('maxlength')
        });
      });
    }
  }

  // Initialize Form Repeater with dynamic ID and label handling
  function initRepeater(repeaterSelector, repeaterPrefix) {
    var repeater = $(repeaterSelector);
    var row = 2;

    if (repeater.length) {
      repeater.find('[data-repeater-item]').hide();

      // Initialize repeater with dynamic ID generation
      // if(repeater.length > 1) {
        repeater.repeater({
          show: function () {
            var col = 1;
            var formControl = $(this).find('.form-control, .form-select');
            var formLabel = $(this).find('.form-label');
  
            // Add dynamic IDs and labels
            formControl.each(function (i) {
              var id = repeaterPrefix + '-' + row + '-' + col;
              $(formControl[i]).attr('id', id);
              $(formLabel[i]).attr('for', id);
              col++;
            });
  
            row++;
            $(this).slideDown();
          },
          hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
          }
        });
      // }

      // Show only the clicked repeater form
      repeater.find('[data-repeater-create]').on('click', function () {
        $(this).closest(repeaterSelector).find('[data-repeater-item]').show();
      });
    }
  }

  // Initialize repeaters for employment, education, and links
  initRepeater('.employment-repeater', 'employment-repeater');
  initRepeater('.education-repeater', 'education-repeater');
  initRepeater('.link-repeater', 'link-repeater');

  // Initialize maxlength for inputs
  initMaxlength();
});
