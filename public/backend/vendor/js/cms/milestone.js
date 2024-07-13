"use strict";

$(document).ready(function() {

  if( typeof isListPage  !== 'undefined' && isListPage  === '1' ){

    const tableColumns =  [
      {"targets": [0], "orderable": false}, 
      {"targets": [1,2,3,4,5,6,7,8], "orderable": true},
      {"targets": [0,1,2,3,4], "width": 60},
      {"targets": [5], "width": 250},
      {"targets": [6,7,8], "width": 80}
    ];

    setDataTable("milestoneTable", tableColumns);

    $(".deleteBtn").on("click", function(e){
      e.preventDefault();        

      const recordId = $(this).data("itemtodelete");

      const formdata = new FormData();
      formdata.append('recordId', recordId);
  
      deleteRecord(routes.MILESTONE_DELETE, formdata);
    });
  }

  if( typeof isFormPage  !== 'undefined' && isFormPage === '1' ){

    let defaultDate = '';

    if( typeof isEditFormPage  !== 'undefined' && isEditFormPage === '1' ){

      const year = $('#year').val();
      const month = $('#month').val();

      if( year && month ){
        defaultDate = new Date(year, month - 1);
      }

      $("#milestoneUpdateForm").on("submit",function(e){
        e.preventDefault();        
    
        for(let instance in CKEDITOR.instances){
          CKEDITOR.instances[instance].updateElement();
        }

        const formData = new FormData(this);
        postForm(routes.MILESTONE_UPDATE, formData);
      });
    }else{
      $("#milestoneAddForm").on("submit", function(e){
        e.preventDefault();        
    
        for(let instance in CKEDITOR.instances){
          CKEDITOR.instances[instance].updateElement();
        }
        
        const formData = new FormData(this);
        postForm(routes.MILESTONE_ADD, formData);
      });
    }

    flatpickr("#monthYearPicker", {
      defaultDate: defaultDate, // Set the default date
      plugins: [
        new monthSelectPlugin({
          shorthand: true, //defaults to false
          dateFormat: "M Y", //defaults to "F Y"
          altFormat: "F Y", //defaults to "F Y"
          theme: "dark" // defaults to "light"
        })
      ]
    });

    $("#language").on("change", function(e){
      const selectedLang = $(this).val(); 
      sectionToggler(selectedLang);
    });
    
    const selectedLang = $('#language').val(); 
    sectionToggler(selectedLang);
  }
});