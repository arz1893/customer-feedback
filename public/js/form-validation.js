/**
 * Created by arnadi on 9/20/17.
 */
$(document).ready(function () {

    $('#form-login').validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 4
            }
        },
        messages: {
            email: {
                required: "Please enter your email address",
                email: "email format is not valid"
            },
            password: {
                required: "Please enter your password",
                minlength: jQuery.validator.format("At least {0} characters required!")
            }
        },

        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#form_register').validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        rules: {
            name: 'required',
            category_id: 'required',
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 4
            },
            password_confirmation: {
                required: true,
                minlength: 4,
                equalTo: '#txt_password'
            },
            country: 'required'
        },
        messages: {
            name: 'please enter your business / company name',
            email: {
                required: 'please enter your email',
                email: 'email format is invalid'
            },
            category_id: 'please select your business type',
            password: {
                required: 'please enter your password',
                minlength: jQuery.validator.format("At least {0} characters required!")
            },
            password_confirmation: {
                required: 'please re enter your password',
                minlength: jQuery.validator.format("At least {0} characters required!"),
                equalTo: 'your password didn\'t match'
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#form-product').validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",

        rules: {
            name: 'required',
            description: 'required',
            image_cover: {
                required: true
            }
        },
        messages: {
            name: 'please enter your product name',
            description: 'please enter your product description',
            image_cover: {
                required: 'please insert your product picture'
            }
        }
    });

    $('#form-service').validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",

        rules: {
            name: 'required',
            description: 'required'
        },
        messages: {
            name: 'please enter your service name',
            description: 'please enter your service description'
        }
    });

    $('#form_product_faq').validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",

        rules: {
            question: 'required',
            answer: 'required'
        },
        messages: {
            question: 'please enter your FAQ question',
            answer: 'please enter your answer to current question'
        },

        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#sub_product_form').validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",

        rules: {
            name: 'required'
        },
        messages: {
            name: 'please enter your sub product name'
        },

        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#form_add_customer').validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",

        rules: {
            name: 'required',
            gender: 'required',
            phone: {
                required: true,
                minlength: 9
            },
            birthdate: 'required'
        },
        messages: {
            name: 'please enter customer\'s name',
            gender: 'gender not yet selected',
            phone: {
                required: 'please enter customer\'s phone number',
                minlength: 'at least 10 digits of number are required'
            },
            birthdate: 'please enter customer\'s birthdate'
        },
        errorPlacement: function(error, element)
        {
            if ( element.is(":radio") )
            {
                error.appendTo( element.parents('.error') );
            }
            else
            { // This is the default behavior
                error.insertAfter( element );
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});