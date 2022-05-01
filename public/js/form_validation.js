$=jQuery;
function checkPasswordStrengthUser() {
	var number = /([0-9])/;
	var alphabets = /([a-zA-Z])/;
	var special_characters = /([!,@,#,$,%,^,&,*])/;

	if ($('#lpassword').val().length < 1) {
		$('#password-strength-status').removeClass("strong-password medium-password weak-password").html("");
		// $('#password-strength-status').addClass('required-password');
		// $('#password-strength-status').html("");
	} else if ($('#lpassword').val().length < 8) {
		$('#password-strength-status').removeClass('medium-password strong-password').addClass('weak-password').html("Weak (should be atleast 8 characters.)");
		// $('#password-strength-status').html("Weak (should be atleast 8 characters.)");
	} else {
		if ($('#lpassword').val().match(number) && $('#lpassword').val().match(alphabets) && $('#lpassword').val().match(special_characters)) {
			// $('#password-strength-status').removeClass();
			$('#password-strength-status').removeClass('medium-password weak-password').addClass('strong-password').html("Strong");
			// $('#password-strength-status').html("Strong");
		} else {
			// $('#password-strength-status').removeClass();
			$('#password-strength-status').removeClass("strong-password weak-password").addClass('medium-password').html("Medium (should include alphabets, numbers and special characters.)");
			// $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
		}
	}
}
       
jQuery(document).ready(function($){

                    

		if ($.isFunction($.fn.validate)) {
    $.validator.addMethod(
			"required_com",
			function (value, element) {
				return this.optional(element) || /[.](com|in|net|org|nz)\b$/i.test(value);
			},
			"Please enter a valid email address"
		),    
	$.validator.addMethod(
      "six_seven_eight_nine",
      function (value, element) {
        return (
          this.optional(element) || /^\(?([6-9]{1})\)?([0-9]{0,})$/i.test(value)
        );
      },
      "Mobile No must be integer and should start with 6 or 7 or 8 or 9"
    ),
    $.validator.addMethod(
        "numbers_only",
        function (value, element) {
          return (
            this.optional(element) || /^\(?([0-9]{1})\)?([0-9]{0,})$/i.test(value)
          );
        },
        "Must be numbers "
      ),
    // $.validator.addMethod(
    //     "only_numbers",
    //     function (value, element) {
    //       return (
    //         this.optional(element) || /^[0-9]$/i.test(value)
    //       );
    //     },
    //     // "Post code can not have character"
    //   ),
    $.validator.addMethod(
      "not_same_digit",
      function (value, element) {
        return !(
          /^[6]{10}$/i.test(value) ||
          /^[7]{10}$/i.test(value) ||
          /^[8]{10}$/i.test(value) ||
          /^[9]{10}$/i.test(value)
        );
      },
      "Mobile No can't have 10 same digit repetitively"
    ),
            $.validator.addMethod(
                "numbers_hyphen_full_stop_comma",
                function (value, element) {
                    return !!/^[^ ][a-zA-Z0-9 \,\.\-\'']*$/i.test(value);
                },
                "Sub can have space, numbers, hyphen, comma and fullstop"
            ),
            $.validator.addMethod(
				"alphabets_and_space",
				function (value, element) {
					return !!/^[^ ][a-zA-Z ]*$/i.test(value);
				},
				"Name can start with alphabets and can have space in between"
			),
            $.validator.addMethod(
				"alpha_numeric",
				function (value, element) {
					return !!/^[^ ][a-zA-Z0-9]*$/i.test(value);
				},
				"Name can start with alphabets and can not have space in between"
			),
            
			$.validator.addMethod(
				"alphabets_comma",
				function (value, element) {
					return !!/^[^ ][a-zA-Z, ]*$/i.test(value);
				},
				"This field can contain only alphabets OR alphabets separated by a comma's"
			),
			$.validator.addMethod(
				"alphabets_space_dot_hypen_quote",
				function (value, element) {
					return !!/^[^ ][a-z \.\-\'']*$/i.test(value);
				},
				"This field can contain only alphabets, space, dot and single quote"
			),
			$.validator.addMethod(
				"alphabets_number_space_dot_comma_hypen_quote",
				function (value, element) {
					return !!/^[^ ][a-z0-9 \,\.\-\'']*$/i.test(value);
				},
				"This field can contain only alphabets, numbers, comma, space, dot and single quote"
			),
			$.validator.addMethod(
				"alphabets_number_space_dot_hypen_quote",
				function (value, element) {
					return !!/^[^ ][a-z0-9 \,\.\-\'']*$/i.test(value);
				},
				"This field can contain only alphabets, numbers, space, dot and single quote"
			),
			$.validator.addMethod(
				"edu_name_format",
				function (value, element) {
					return !!/^[^ ][a-zA-Z ,-.\'']*$/i.test(value);
				},
				"This field can contain alphabets,hyphen, single quote and a dot OR alphabets separated by a comma's"
			),
			$.validator.addMethod(
				"edu_name_format_without_comma",
				function (value, element) {
					return !!/^[^ ][a-zA-Z \-\.\'']*$/i.test(value);
				},
				"This field can contain alphabets, hyphen, dot and single quote"
			),
			$.validator.addMethod(
				"no_two_comma",
				function (value, element) {
					return !!/^{a-z,,a-z}/i.test(value);
				},
				"This field value cannot have blank values separated by comma's"
			),
			$.validator.addMethod(
				"alphabets_space_special_char",
				function (value, element) {
					return !!/^[a-zA-Z][a-zA-Z0-9-_\.\&\@\? ]*$/i.test(value);
				},
				"Project Description containing only numbers and letters with '_', '.','&' and '@' allowed"
			),
			$.validator.addMethod(
					'not_equal_to',
					function(value,element,param){
						console.log("value==target: ",value!==$(param).val());
						return value!==$(param).val()
					},
					"Field is equal to other field"
			),
			$.validator.addMethod(
				'js_valid_password',
				function(value,element){
					let passwordRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])");
						return passwordRegex.test(value);
				},
				"The field must contain atleast one uppercase letter, lowercase letter, digit and special character "
			),
			$.validator.addMethod(
					'strong_password_checker',
					function(value,element){
						let StrongPasswordRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,20})");
						return StrongPasswordRegex.test(value);
					},
					"Weak Password! The field must contain atleast one lowercase letter, uppercase letter, digits and special character (!@#\$%\^&\*)"
			),
	
                // $("form[name='frm_change_password']").validate({
                // onkeyup: function(element){
                //                         $(element).valid();
                // },
                // rules: {
                //                 old_password:{
                //                         required:true,
                //                         js_valid_password:true
                //                 },
                //                 new_password:{
                //                         required:true,
                //                         not_equal_to: '#old_password',
                //                         js_valid_password:true,
                //                         minlength:8,
                //                         maxlength:20
                //                 },
                //                 confirm_new_password:{
                //                         required:true,
                //                         equalTo: "#new_password"
                //                 }
                // },
                // messages:{
                //         new_password:{
                //                 not_equal_to: "Old password cannot be equal to new password"
                //         },
                //         confirm_new_password:{
                //                 equalTo: "New password and confirm new password should be the same"
                //         }
                // }
                // });
        


        // edit admin

       

    

        $("form[name='add_leave']").validate({
            focusInvalid:true,
            debug:true,
            onkeyup: function(element){
                $(element).valid();
            },
            submitHandler: function(form){
                if($(form).valid())
                    form.submit();
                else	
                    $(form).showErrors();
            },
            rules: {
                // to:{
                //     required:true,
                //     required_com:true
                // },
                leave_type: {
                    required:true,
                },
                leave_start_date: {
                    required:true,
                },
                leave_end_date:{
                    required:true,
                },
                leave_reason:{
                    required:true,
                },            
                
            },
            messages: {
                
                
            }
        });

        
    }
    $('#success').on('show.bs.modal', function (){
         setTimeout(function(){ $('#success').modal('hide');}, 12000);
    });
});
