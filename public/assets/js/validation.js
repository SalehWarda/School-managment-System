/*

Template:  Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template
Author: potenzaglobalsolutions.com
Design and Developed by: potenzaglobalsolutions.com

NOTE:

*/

 (function($){


    $( document ).ready( function () {
      $( "#signupForm" ).validate( {
        rules: {

            email: {
                required: true,
                email: true,
            },

            password: {
                required: true,
                minlength: 5
            },

            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },

            fnamee:{
                required: true,
                maxlength:225,
            } ,

            fnamea:{
                required: true,
                maxlength:225,
            } ,

            mnamee:{
                required: true,
                maxlength:225,
            } ,

            mnamea:{
                required: true,
                maxlength:225,
            } ,

            father_id_number:{
                required: true,
                maxlength:30,
                digits:true,
            } ,

            mother_id_number:{
                required: true,
                maxlength:30,
                digits:true,
            } ,

            father_passport_number:{
                required: false,
                maxlength:225,

            } ,

            mother_passport_number:{
                required: false,
                maxlength:225,
            } ,

            father_phone:{
                required: true,
                maxlength:50,
                digits:true,
            } ,

            mother_phone:{
                required: true,
                maxlength:50,
                digits:true,
            } ,

            fjobe:{
                required: true,
                maxlength:50,
            } ,

            fjoba:{
                required: true,
                maxlength:50,
            } ,

            mjobe:{
                required: true,
                maxlength:50,
            } ,

            mjoba:{
                required: true,
                maxlength:50,
            } ,

            father_nationality_id:{
                required: true,
            } ,

            father_blood_type_id:{
                required: true,
            } ,

            father_religion_id:{
                required: true,
            } ,

            mother_nationality_id:{
                required: true,
            } ,

            mother_blood_type_id:{
                required: true,
            } ,

            mother_religion_id:{
                required: true,
            } ,

            father_address:{
                required: true,
            } ,

            mother_address:{
                required: true,
            } ,



        },
        messages: {

           email: {
            required: "Please enter an email",
            email: "Please enter a valid email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          confirm_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password "
          },
          fnamee: {
            required: "Please enter a Father's name is English",
            maxlength: "Your field must be 225 characters long"
          },
          fnamea: {
            required: "Please enter a Father's name is Arabic",
            maxlength: "Your field must be 225 characters long"
          },
          mnamee: {
            required: "Please enter a Mother's name is Arabic",
            maxlength: "Your field must be 225 characters long"
          },
          mnamea: {
            required: "Please enter a Mother's name is Arabic",
            maxlength: "Your field must be 225 characters long"
          },
          father_id_number: {
            required: "Please enter a Father's ID number",
            maxlength: "Your field must be 30 characters long",
            digits: "Your field must be only numbers"
          },
          mother_id_number: {
            required: "Please enter a Mother's ID number",
            maxlength: "Your field must be 30 characters long",
            digits: "Your field must be only numbers"
          },
          father_passport_number: {
            required: "Please enter a Father's passport number",
            maxlength: "Your field must be 225 characters long",
          },
          mother_passport_number: {
            required: "Please enter a Mother's passport number",
            maxlength: "Your field must be 225 characters long",
          },
          father_phone: {
             required: "Please enter a Father Phone",
             maxlength: "Your field must be 225 characters long",
             digits: "Your field must be only numbers"
          },
          mother_phone: {
             required: "Please enter a Mother Phone",
             maxlength: "Your field must be 225 characters long",
             digits: "Your field must be only numbers"
            },
          fjobe: {
             required: "Please enter a Father's job in English",
             maxlength: "Your field must be 50 characters long",
            },
           fjoba: {
             required: "Please enter a Father's job in Arabic",
             maxlength: "Your field must be 50 characters long",
            },
            mjobe: {
             required: "Please enter a Mother's job in English",
             maxlength: "Your field must be 50 characters long",
            },
            mjoba: {
             required: "Please enter a Mother's job in Arabic",
             maxlength: "Your field must be 50 characters long",
            },
            father_nationality_id: {
             required: "Please enter a Father's nationality",
            },
            father_blood_type_id: {
             required: "Please enter a Father's blood type",
            },
            father_religion_id: {
             required: "Please enter a Religion, Father",
            },
            mother_nationality_id: {
             required: "Please enter a Mother's nationality",
            },
            mother_blood_type_id: {
             required: "Please enter a Mother's blood type",
            },
            mother_religion_id: {
             required: "Please enter a Religion, Mother",
            },
            father_address: {
             required: "Please enter a Father's address",
            },
            mother_address: {
             required: "Please enter a Mother's address",
            },

        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      } );

      $( "#signupForm1" ).validate( {
        rules: {
          firstname1: "required",
          lastname1: "required",
          username1: {
            required: true,
            minlength: 2
          },
          password1: {
            required: true,
            minlength: 5
          },
          confirm_password1: {
            required: true,
            minlength: 5,
            equalTo: "#password1"
          },
          email1: {
            required: true,
            email: true
          },
          agree1: "required"
        },
        messages: {
          firstname1: "Please enter your firstname",
          lastname1: "Please enter your lastname",
          username1: {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 2 characters"
          },
          password1: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          confirm_password1: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
          },
          email1: "Please enter a valid email address",
          agree1: "Please accept our policy"
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          // Add `has-feedback` class to the parent div.form-group
          // in order to add icons to inputs
          element.parents( ".col-sm-5" ).addClass( "has-feedback" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }

          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !element.next( "span" )[ 0 ] ) {
            $( "<span class='fa fa-times form-control-feedback pr-2'></span>" ).insertAfter( element );
          }
        },
        success: function ( label, element ) {
          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !$( element ).next( "span" )[ 0 ] ) {
            $( "<span class='fa fa-check form-control-feedback'></span>" ).insertAfter( $( element ) );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
          $( element ).next( "span" ).addClass( "fa fa-times" ).removeClass( "fa fa-check" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
          $( element ).next( "span" ).addClass( "fa fa-check" ).removeClass( "fa fa-times" );
        }
      });
      $( "#signupForm3" ).validate( {
        rules: {
          firstname: "required",
          lastname: "required",
          username: {
            required: true,
            minlength: 2
          },
          password: {
            required: true,
            minlength: 5
          },
          confirm_password: {
            required: true,
            minlength: 5,
            equalTo: "#password"
          },
          email: {
            required: true,
            email: true
          },
          agree: "required"
        },
        messages: {
          firstname: "Please enter your firstname",
          lastname: "Please enter your lastname",
          username: {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 2 characters"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          confirm_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
          },
          email: "Please enter a valid email address",
          agree: "Please accept our policy"
        },
        errorPlacement: function ( error, element ) {
          error.addClass( "ui red pointing label transition" );
          error.insertAfter( element.parent() );
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".row" ).addClass( errorClass );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".row" ).removeClass( errorClass );
        }
      } );

    });

 })(jQuery);
