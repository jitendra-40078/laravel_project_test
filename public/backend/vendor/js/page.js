"use strict";

let inputSet = {};
let pageTemplate = '';

if( typeof isFormPage !== 'undefined' && isFormPage === '1' ){
  pageTemplate = $("#template").val();

  inputSet = {
    homeSection2: getPageObject('homeSection2', 8, 'one'),
    homeSection3: getPageObject('homeSection3', 8, 'two'),
    homeSection4: getPageObject('homeSection4', 3, ''),
    riaasSection2: getPageObject('riaasSection2', 15, 'four'),
    riaasSec3Feat: getPageObject('riaasSec3Feat', 6, 'six'),
    riaasSection4: getPageObject('riaasSection4', 8, 'five'),
    riaasSection5: getPageObject('riaasSection5', 5, 'four'),
    useCaseSection2: getPageObject('useCaseSection2', 10, 'four'),
  }
}

if( typeof isEditFormPage !== 'undefined' && isEditFormPage === '1' ){
  switch(pageTemplate){
    case 'home': {
      inputSet.homeSection2.toggleButton("homeSection2");
      inputSet.homeSection3.toggleButton("homeSection3");
      inputSet.homeSection4.toggleButton("homeSection4");
    }
    break;
    case 'whatRiaas' : {
      inputSet.riaasSection2.toggleButton("riaasSection2");
      inputSet.riaasSec3Feat.toggleButton("riaasSec3Feat");
      inputSet.riaasSection4.toggleButton("riaasSection4");
      inputSet.riaasSection5.toggleButton("riaasSection5");
    }
    break;
    case 'useCase' : {
      inputSet.useCaseSection2.toggleButton("useCaseSection2");
    }
    break;
  }
}

$(document).ready(function() {

  if( typeof isListPage !== 'undefined' && isListPage === '1' ){
    const tableColumns =  [
      {"targets": [0], "orderable": false}, 
      {"targets": [1,2,3,4], "orderable": true},
      {"targets": [0,1], "width": 60},
      {"targets": [2], "width": 250},
      {"targets": [3,4], "width": 100}
    ];

    setDataTable("pageTable", tableColumns);
  }

  if( typeof isFormPage !== 'undefined' && isFormPage === '1' ){

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

    const tableElement = document.getElementsByClassName("table-cards")[0];
    if( tableElement ){
      const sortableTable = Sortable.create(tableElement, {
        handle: '.table-card-header', // Use the header for the drag handle
        animation: 150,
        dataIdAttr: 'data-id',
        handle: ".my-handle",
        onEnd: function(evt) {
          const item = evt.item;
          const section = item.getAttribute('data-section');
  
          const order = sortableTable.toArray(); // Get the array of item IDs
          inputSet[section].elements = order;
        }
      });
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
      const editorInstance = $(`#${section}DescR${inputSet[section].elIndex}`).attr('id');

      switch( section ){
        case "homeSection2" : renderCKEditor(editorInstance); break;
      }
    });

    $("#pageUpdateForm").on('click', ".removeRowBtn", removeTableRowHandler);
    $("#pageUpdateForm").on('blur', ".accordion-header-input", setAccordianHeaderHandler);
    
    // Update form
    $("#pageUpdateForm").on("submit",function(e){
      e.preventDefault();        

      for(let instance in CKEDITOR.instances){
        CKEDITOR.instances[instance].updateElement();
      } 

      const formData = new FormData(this);

      switch(pageTemplate){
        case 'home' : {
          formData.append("homeSection2Set", inputSet.homeSection2.elements);
          formData.append("homeSection3Set", inputSet.homeSection3.elements);
          formData.append("homeSection4Set", inputSet.homeSection4.elements);
        }
        break;
        case 'whatRiaas' : {
          formData.append("riaasSection2Set", inputSet.riaasSection2.elements);
          formData.append("riaasSec3FeatSet", inputSet.riaasSec3Feat.elements);
          formData.append("riaasSection4Set", inputSet.riaasSection4.elements);
          formData.append("riaasSection5Set", inputSet.riaasSection5.elements);
        }
        break;
        case 'useCase' : {
          formData.append("useCaseSection2Set", inputSet.useCaseSection2.elements);
        }
        break;
      }

      postForm(routes.PAGE_UPDATE, formData);
    });

  }
});