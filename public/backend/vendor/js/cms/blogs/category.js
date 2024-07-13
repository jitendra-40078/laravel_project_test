"use strict";

$(document).ready(function() {

  if( typeof isListPage  !== 'undefined' && isListPage  === '1' ){

    const tableColumns =  [
      {"targets": [0], "orderable": false}, 
      {"targets": [1,2,3,4,5,6,7], "orderable": true},
      {"targets": [0,1], "width": 60},
      {"targets": [2,3], "width": 150},
      {"targets": [4], "width": 60},
      {"targets": [5,6,7], "width": 120}
    ];

    setDataTable("blogCategoryTable", tableColumns);

    $("#blogCategoryAddForm").on("submit", function(e){
      e.preventDefault();        
  
      const formData = new FormData(this);
      postForm(routes.BLOG_CATEGORY_ADD, formData);
      table.state.clear();
    });

    $(".deleteBtn").on("click", function(e){
      e.preventDefault();        

      const recordId = $(this).data("itemtodelete");

      const formdata = new FormData();
      formdata.append('recordId', recordId);
  
      deleteRecord(routes.BLOG_CATEGORY_DELETE, formdata);
    });

  }

  if( typeof isEditFormPage  !== 'undefined' && isEditFormPage === '1' ){
    $("#blogCategoryUpdateForm").on("submit",function(e){
      e.preventDefault();        
  
      const formData = new FormData(this);
      postForm(routes.BLOG_CATEGORY_UPDATE, formData);
    });
  }

});