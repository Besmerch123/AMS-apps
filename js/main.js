jQuery(document).ready(function ($) {
   /* Materialize inits */
   $('.sidenav').sidenav();
   $('.collapsible').collapsible();
   /* END Materialize inits */

   /* iframe */
   $('body').on("click", ".play-btn", function () {
      let video = $(this).data('video');
      $(this).hide('slow');
      $(this).siblings('.placeholder').hide(800);
      $(this).parent().html('<iframe src="' + video + '&autoplay=1" frameborder="0" allowfullscreen></iframe>')
   });
   /* END iframe */

   if ($('.wpcf7-form').length) {
      //New Validation rule
      jQuery.validator.addMethod("phoneNumber", function (value, element) {
         return this.optional(element) || /^[\d\(\)\ -+]{4,14}\d$/.test(value);
      }, 'Please enter a valid phone number.');

      //Validation
      $(".wpcf7-form").validate({
         rules: {
            leadName: {
               required: true,
               minlength: 3
            },
            email: {
               required: true,
               email: true
            },
            phone: {
               phoneNumber: true
            },
            company: {
               minlength: 0
            },
            message: {
               minlength: 0
            }
         },
         //For custom messages
         messages: {
            lead_name: {
               required: "Please, enter your name",
               minlength: "Enter at least 3 characters"
            },
            email: {
               required: "Please, enter your email",
            }

         },
         errorElement: 'div',
         errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
               $(placement).append(error)
            } else {
               error.insertAfter(element);
            }
         }
      });
   }

});