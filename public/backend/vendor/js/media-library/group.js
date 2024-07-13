"use strict";

$(document).ready(function() {

  if( typeof isListPage  !== 'undefined' && isListPage  === '1' ){

    const tableColumns =  [
      {"targets": [0], "orderable": false}, 
      {"targets": [1,2,3,4,5,6], "orderable": true},
      {"targets": [0,1], "width": 60},
      {"targets": [2], "width": 200},
      {"targets": [3,4,5,6], "width": 100}
    ];

    setDataTable("mediaGroupTable", tableColumns);

    $("#mediaGroupAddForm").on("submit", function(e){
      e.preventDefault();        
  
      const formData = new FormData(this);
      postForm(routes.MEDIA_LIBRARY_GROUP_ADD, formData);
      table.state.clear();
    });

    $(".deleteBtn").on("click", function(e){
      e.preventDefault();        

      const recordId = $(this).data("itemtodelete");

      const formdata = new FormData();
      formdata.append('recordId', recordId);
  
      deleteRecord(routes.MEDIA_LIBRARY_GROUP_DELETE, formdata);
    });

  }

  if( typeof isEditFormPage  !== 'undefined' && isEditFormPage === '1' ){
    $("#mediaGroupUpdateForm").on("submit",function(e){
      e.preventDefault();        
  
      const formData = new FormData(this);
      postForm(routes.MEDIA_LIBRARY_GROUP_UPDATE, formData);
    });
  }

});