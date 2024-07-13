"use strict";

$(document).ready(function() {
  if( 
    typeof isFormPage  !== 'undefined' && 
    isFormPage === '1' && 
    typeof isEditFormPage  !== 'undefined' && 
    isEditFormPage === '1'
  ){
    $("#smtpUpdateForm").on("submit",function(e){
      e.preventDefault();        
    
      const formData = new FormData(this);
      postForm(routes.SETTING_SMTP_UPDATE, formData);
    });

    $("#careerEmailUpdateForm").on("submit",function(e){
      e.preventDefault();        
    
      const formData = new FormData(this);
      postForm(routes.SETTING_CAREER_EMAIL_UPDATE, formData);
    });

    $("#contactEmailUpdateForm").on("submit",function(e){
      e.preventDefault();        
    
      const formData = new FormData(this);
      postForm(routes.SETTING_CONTACT_EMAIL_UPDATE, formData);
    });
  }
});