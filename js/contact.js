/***********************************************
*   Theme Name: 1ST Contact Form               *
*   Theme URI: FB/DZWARE .                     *    
*   Description: A Contact form                *
*   Version: 1.0                               *
*   Author: AMEUR AZZI .                       *
*   Author URI: http://FB/AZZIAMEUR            *
***********************************************/

/*global $, alert, console */

$(function () {

    'use strict';
    
    var user_errors     = true,
        email_errors    = true,
        message_errors  = true;
    
    $('.username').blur(function () {
       
        if ($(this).val().length < 4) {
            
            $(this).parent().removeClass('has-success').addClass('has-error');
            
            $(this).parent().find('.custom-alert').fadeIn(200)
                .end().parent().find('.asterix').fadeIn(100); 
            
            user_errors = true;
            
        } else {
            
            $(this).parent().removeClass('has-error').addClass('has-success');
            
            $(this).parent().find('.custom-alert').fadeOut(200)
                .end().parent().find('.asterix').fadeOut(100);
            
            user_errors = false;
            
        }
        
    });
    
    $('.message').blur(function () {
       
        if ($(this).val().length < 10) {
            
            $(this).parent().removeClass('has-success').addClass('has-error');
            
            $(this).parent().find('.custom-alert').fadeIn(200)
                .end().parent().find('.asterix').fadeIn(100);
            
            message_errors = true;
            
        } else {
            
            $(this).parent().removeClass('has-error').addClass('has-success');
            
            $(this).parent().find('.custom-alert').fadeOut(200)
                .end().parent().find('.asterix').fadeOut(100);
            
            message_errors = false;
          
        }
        
    });
    
    $('.email').blur(function () {
       
        if ($(this).val().length < 1) {
            
            $(this).parent().removeClass('has-success').addClass('has-error');
            
            $(this).parent().find('.custom-alert').fadeIn(200)
                .end().parent().find('.asterix').fadeIn(100);
            
            email_errors = true;
            
        } else {
            
            $(this).parent().removeClass('has-error').addClass('has-success');         
            $(this).parent().find('.custom-alert').fadeOut(200)
                .end().parent().find('.asterix').fadeOut(100);
            
            email_errors = false;
            
        } 
        
    });
    
        // Submit From Validation
    
    $('.contact-form').submit(function (e) {
       
        if (user_errors === true || message_errors === true || email_errors === true) {
            
            e.preventDefault();
            
            $('.username, .email, .message').blur();    
            
        }
        
    });
          
});
