"use strict";

$(document).ready(function() {

  if( typeof isListPage  !== 'undefined' && isListPage  === '1' ){

    const tableColumns =  [
      {"targets": [0], "orderable": false}, 
      {"targets": [1,2,3,4], "orderable": true},
      {"targets": [0,1], "width": 60},
      {"targets": [2], "width": 200},
      {"targets": [3,4], "width": 80}
    ];

    setDataTable("rolePermissionTable", tableColumns);

    $("#rolePermissionAddForm").on("submit", function(e){
      e.preventDefault();        
  
      const formData = new FormData(this);
      postForm(routes.ROLE_PERMISSION_ADD, formData);
      table.state.clear();
    });

    $(".deleteBtn").on("click", function(e){
      e.preventDefault();        

      const recordId = $(this).data("itemtodelete");

      const formdata = new FormData();
      formdata.append('recordId', recordId);
  
      deleteRecord(routes.ROLE_PERMISSION_DELETE, formdata);
    });

  }

  if( typeof isEditFormPage  !== 'undefined' && isEditFormPage === '1' ){
    $("#rolePermissionUpdateForm").on("submit",function(e){
      e.preventDefault();        
  
      const formData = new FormData(this);
      postForm(routes.ROLE_PERMISSION_UPDATE, formData);
    });
  }

});