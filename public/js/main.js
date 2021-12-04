// (function ($) {
//     "use strict";

$(document).ready(function(){

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');
    var emailtest;


    $("#email").keyup(function(){
        var email =  $("#email").val();
        $.post("php/checkemail.php",{
            emailval : email
        }, function(data,status){
           
            emailtest = data;
            if(emailtest && emailtest == true){
              
                var emailTokenValidate = $('#emailerr');
                emailTokenValidate.html("Sorry! this email already exists");
    
                //showValidate($('#email'),emailtest);

            }else{
                emailTokenValidate.html("");
            }
        });
    })
 
    
    $('#registerForm').on('submit',function(){
        var check = true;
        

        //alert($('#registerForm').attr('data-test').val());

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }else if($(input[i]).attr('name') == 'password' && $(input[i+1]).attr('name') == 'confirmation_password' ){
                if($(input[i]).val() !== $(input[i+1]).val() ){
                    var passNotConfirm = $(input[i]).parent();
                    passNotConfirm.attr('data-validate','password does\'nt match');
                    showValidate(input[i]);
                    check = false;
                }
            }
        }


        return check;
    });

    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }



        } else if($(input).attr('type') == 'password' || $(input).attr('name') == 'password'){

            if($(input).val().trim() == ''){
                var passEmptyValidate = $(input).parent();
                passEmptyValidate.attr('data-validate','password field is required ');
                return false;
            }
            if($(input).val().length < 6 ){
                var passLengthValidate = $(input).parent();
                passLengthValidate.attr('data-validate','password should be greater than 6 charecters');
                
                return false;
            }
        }
        else {
            console.log($(input).val().trim().length);
            if($(input).val().trim() == '' || $(input).val().trim().length > 255){

                return false;
            }
        }
    }

     function showValidate(input,boolVlaue) {
        var thisAlert = $(input).parent();
        emailtest2 = boolVlaue;
        //to show the error message  class

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

});