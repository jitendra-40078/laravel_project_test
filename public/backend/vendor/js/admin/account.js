"use strict";

$(document).ready(function() {
  $("#profileUpdateForm").on("submit",function(e){
    e.preventDefault();        
    
    const formdata = new FormData(this);
    postForm(routes.ADMIN_PROFILE_UPDATE, formdata);
  });

  $("#passwordUpdateForm").on("submit",function(e){
    e.preventDefault();        
    
    const formdata = new FormData(this);
    postForm(routes.ADMIN_PASSWORD_UPDATE, formdata);
  });
});