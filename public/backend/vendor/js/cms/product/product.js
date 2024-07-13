"use strict";

let inputSet = {};

if( typeof isFormPage !== 'undefined' && isFormPage === '1' ){
  inputSet = {
    featuresEn: getPageObject('featuresEn', 6, 'six'),
    featuresKr: getPageObject('featuresKr', 6, 'six')
  };
}

if( typeof isEditFormPage !== 'undefined' && isEditFormPage === '1' ){
  inputSet.featuresEn.toggleButton("featuresEn");
  inputSet.featuresKr.toggleButton("featuresKr");
}

$(document).ready(function() {

  if( typeof isListPage  !== 'undefined' && isListPage  === '1' ){

    const tableColumns =  [
      {"targets": [0,3], "orderable": false}, 
      {"targets": [1,2,4,5,6,7], "orderable": true},
      {"targets": [0,1,2], "width": 60},
      {"targets": [3], "width": 100},
      {"targets": [4], "width": 200},
      {"targets": [5,6,7], "width": 80}
    ];

    setDataTable("productTable", tableColumns);

    $(".deleteBtn").on("click", function(e){
      e.preventDefault();        

      const recordId = $(this).data("itemtodelete");

      const formdata = new FormData();
      formdata.append('recordId', recordId);
  
      deleteRecord(routes.PRODUCT_DELETE, formdata);
    });
  }

  if( typeof isFormPage  !== 'undefined' && isFormPage === '1' ){

    const accordionElements = document.getElementsByClassName("accordion");
    if( accordionElements.length > 0 ){
      for (let i = 0; i < accordionElements.length; i++) {
        const accordionElement = accordionElements[i];
        const sortable = Sortable.create(accordionElement, {
          handle: '.accordion-header', // Use the header for the drag handle
          animation: 150,
          dataIdAttr: 'data-id',
          handle: ".my-handle", 
          
          onEnd: function(evt) {
            const item = evt.item;
            const section = item.getAttribute('data-section');
  
            const order = sortable.toArray(); // Get the array of item IDs
            inputSet[section].elements = order;
          }
        });
      }  
    }
    
    $(".addRowBtn").on("click", function(e){
      e.preventDefault();

      const section = $(this).data('section');
      const treeRef = `#${section}Tree`;

      inputSet[section].elIndex += 1;
      inputSet[section].pushElement();
      inputSet[section].toggleButton(section);

      $('.accordion-collapse').removeClass('show');
      $('.accordion-button').attr('aria-expanded', 'false');

      $(treeRef).append( inputSet[section].newRow() );
    });

    $("#productAddForm, #productUpdateForm").on('click', ".removeRowBtn", removeTableRowHandler);
    $("#productAddForm, #productUpdateForm").on('blur', ".accordion-header-input", setAccordianHeaderHandler);
    
    if( typeof isEditFormPage  !== 'undefined' && isEditFormPage === '1' ){
      $("#productUpdateForm").on("submit",function(e){
        e.preventDefault();        
    
        for(let instance in CKEDITOR.instances){
          CKEDITOR.instances[instance].updateElement();
        } 

        const formData = new FormData(this);
        formData.append("featuresEnSet", inputSet.featuresEn.elements);
        formData.append("featuresKrSet", inputSet.featuresKr.elements);

        postForm(routes.PRODUCT_UPDATE, formData);
      });
    }else{
      $("#productAddForm").on("submit", function(e){
        e.preventDefault();        
    
        for(let instance in CKEDITOR.instances){
          CKEDITOR.instances[instance].updateElement();
        } 

        const formData = new FormData(this);
        formData.append("featuresEnSet", inputSet.featuresEn.elements);
        formData.append("featuresKrSet", inputSet.featuresKr.elements);

        postForm(routes.PRODUCT_ADD, formData);
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