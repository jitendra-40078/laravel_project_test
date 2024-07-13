"use strict";

$(document).ready(function() {

  if( typeof isListPage  !== 'undefined' && isListPage  === '1' ){

    const tableColumns =  [
      {"targets": [0], "orderable": false}, 
      {"targets": [1,2,3,4,5,6], "orderable": true},
      {"targets": [0,1,2], "width": 60},
      {"targets": [3], "width": 200},
      {"targets": [4,5,6], "width": 100}
    ];

    setDataTable("testimonialTable", tableColumns);

    $(".deleteBtn").on("click", function(e){
      e.preventDefault();        

      const recordId = $(this).data("itemtodelete");

      const formdata = new FormData();
      formdata.append('recordId', recordId);
  
      deleteRecord(routes.TESTIMONIAL_DELETE, formdata);
    });
  }

  if( typeof isFormPage  !== 'undefined' && isFormPage === '1' ){

    if( typeof isEditFormPage  !== 'undefined' && isEditFormPage === '1' ){
      $("#testimonialUpdateForm").on("submit",function(e){
        e.preventDefault();        
    
        const formData = new FormData(this);
        postForm(routes.TESTIMONIAL_UPDATE, formData);
      });
    }else{
      $("#testimonialAddForm").on("submit", function(e){
        e.preventDefault();        
    
        const formData = new FormData(this);
        postForm(routes.TESTIMONIAL_ADD, formData);
      });
    }

    $("#language").on("change", function(e){
      const selectedLang = $(this).val(); 
      sectionToggler(selectedLang);
    });
    
    const selectedLang = $('#language').val(); 
    sectionToggler(selectedLang);
  }
});