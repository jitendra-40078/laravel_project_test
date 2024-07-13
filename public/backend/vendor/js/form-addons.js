"use strict";

CKEDITOR.config.removePlugins = 'scayt';
CKEDITOR.config.allowedContent = true;
CKEDITOR.config.enterMode = CKEDITOR.ENTER_P;
CKEDITOR.config.extraAllowedContent = 'span;ul;li;table;td;style;*[id];*(*);*{*}';

// config.extraAllowedContent = '*(*)';
CKEDITOR.config.protectedSource.push(/<span[^>]*><\/span>/g);
// CKEDITOR.config.height = 200;
CKEDITOR.config.specialChars = CKEDITOR.config.specialChars.concat( [ '&#8377;' ] );

CKEDITOR.on('instanceReady', function (ev) {
  const inputElements = ['p', 'ul', 'ol', 'li'];
  inputElements.forEach( el => {
    ev.editor.dataProcessor.writer.setRules(el, {
      indent : false,
      breakBeforeOpen : true,
      breakAfterOpen : false,
      breakBeforeClose : false,
      breakAfterClose : false
    });
  });
});

$(document).ready(function(){

  $(".editor").each( function() {
    CKEDITOR.replace( $(this).attr('id'), {
      format_tags: 'p;h1;h2;h3;h4;h5;h6'
    });
  });

  $('.multiple-select').select2({
    theme: 'bootstrap4',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: Boolean($(this).data('allow-clear')),
  });

  $('.date-time-picker').bootstrapMaterialDatePicker({
    format: 'YYYY-MM-DD HH:mm',
    clearButton: true
  });
  
});

const INPUT_FIELDS = {
  textField: {
    get: function(element){
      let inputField = `<div class="${element.cols}">`;
      inputField += element.label ? `<label class="form-label">${element.label}</label>` : '';
      inputField += `<input 
          type="text"
          id="${element.sectionId}"
          name="${element.sectionId}"
          class="form-control ${element.customClasses}"
          placeholder="${element.placeholder}" >
        <label for="${element.sectionId}" class="invalid-feedback"></label>  
      </div>`;

      return inputField;
    }
  },
  hiddenField: {
    get: function(element){
      let inputField = `<input 
          type="hidden"
          id="${element.sectionId}"
          name="${element.sectionId}"
          class="form-control"
          value="${element.value}">`;

      return inputField;
    }
  },
  editorField: {
    get: function(element){
      return `<div class="${element.cols}">
        <label class="form-label">${element.label}</label>
        <textarea 
          id="${element.sectionId}"
          name="${element.sectionId}"
          rows="5"
          class="form-control ${ element.isEditor ? 'editor' : '' }"></textarea>
        <label for="${element.sectionId}" class="invalid-feedback"></label>
      </div>`;
    }
  },
  mediaSelector: {
    get: function(element){
      let inputElement = `<div class="${element.cols}">
      <div class="uploadPic">
        <label class="form-label p-1 d-block">${element.label}</label>

        <input
          type="hidden"
          id="${element.sectionId}"
          name="${element.sectionId}" 
          value="" />

        <div class="${element.sectionId}MediaAdd">
          <button
            type="button"
            class="btn btn-secondary mb-2 col-12" 
            id="mediaLibraryBtn" 
            data-placeholder="${element.sectionId}">
            <i class="bi bi-upload"></i> Add File
          </button>
          <label for="${element.sectionId}" class="invalid-feedback"></label>`;
        
      if( element.format || element.size || element.dimensions ){
        inputElement += `<label class=""><ul>`;
        inputElement += element.format ? `<li>Accepted formats: ${element.format}</li>` : '';
        inputElement += element.size ? `<li>Size: ${element.size} MB</li>` : '';
        inputElement += element.dimensions ? `<li>Dimension (W x H): ${element.dimensions}</li>` : '';
        inputElement += `</ul></label>`;
      }
  
      inputElement += `</div>`;
      inputElement += `<div class="${element.sectionId}MediaPreview"></div>`;
      inputElement += `</div></div>`;
  
      return inputElement;
    }
  }
}

const LAYOUTS = {
  one: function(section, index){
    let imageLabel = section === "homeSection2" ? "Image (600 x 400 px)" : "Image";
    let card = '';

    card += `<div id="${section}-card_${index}" class="accordion-item" data-id="${index}" data-section="${section}">`;
    card += `<h2 id="heading${section}${index}" class="accordion-header d-flex justify-content-between align-items-center">`;
    card += `<button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse${section}${index}" aria-expanded="true" aria-controls="collapse${section}${index}">`;
    card += renderHandlerBtn();
    card += `<span class="accordion-title"></span>`;
    card += renderDeleteBtn(index, section);        
    card += `</button></h2>`;
    card += `<div id="collapse${section}${index}" class="accordion-collapse collapse show" aria-labelledby="heading${section}${index}" data-bs-parent="#${section}Tree">
    <div class="accordion-body">`;
    card += `<div class="row g-3">`;
      
    card += INPUT_FIELDS.mediaSelector.get({ 
      cols: 'col-12 col-md-4',
      label: imageLabel,
      sectionId: `${section}ImageR${index}`,
      format: '',
      size: '',
      dimensions: ''
    });

    card += INPUT_FIELDS.textField.get({ 
      cols: 'col-12',
      customClasses: 'accordion-header-input',
      label: 'Header',
      sectionId: `${section}HeadR${index}`,
      placeholder: 'Enter heading'
    });

    card += INPUT_FIELDS.editorField.get({ 
      cols: 'col-12',
      label: 'Description',
      sectionId: `${section}DescR${index}`,
      isEditor: true
    });
    
    card += `</div></div></div></div>`;

    return card;
  },
  two: function(section, index){
    let card = '';
    
    card += `<tr id="${section}-card_${index}" class="table-card-header" data-id="${index}" data-section="${section}">`
    card += renderHandlerBtn();

    card += `<td>`;
    card += INPUT_FIELDS.textField.get({ 
      cols: 'col-12',
      label: '',
      sectionId: `${section}HeadR${index}`,
      placeholder: 'Enter heading'
    });
    card += `</td>`;

    card += `<td>`;
    card += INPUT_FIELDS.textField.get({ 
      cols: 'col-12',
      label: '',
      sectionId: `${section}TextR${index}`,
      placeholder: 'Enter text'
    });
    card += `</td>`;

    card += renderDeleteBtn(index, section);
    card += `</tr>`;

    return card;
  },
  three: function(section, index){
    let card = '';

    card += `<div id="${section}-card_${index}" class="accordion-item" data-id="${index}" data-section="${section}">`;
    card += `<h2 id="heading${section}${index}" class="accordion-header d-flex justify-content-between align-items-center">`;
    card += `<button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse${section}${index}" aria-expanded="true" aria-controls="collapse${section}${index}">`;
    card += renderHandlerBtn();
    card += `<span class="accordion-title"></span>`;
    card += renderDeleteBtn(index, section);        
    card += `</button></h2>`;
    card += `<div id="collapse${section}${index}" class="accordion-collapse collapse show" aria-labelledby="heading${section}${index}" data-bs-parent="#${section}Tree">
    <div class="accordion-body">`;
    card += `<div class="row g-3">`;
       
    card += INPUT_FIELDS.mediaSelector.get({ 
      cols: 'col-12 col-md-4',
      label: 'Image',
      sectionId: `${section}ImageR${index}`,
      format: '',
      size: '',
      dimensions: ''
    });

    card += INPUT_FIELDS.textField.get({ 
      cols: 'col-12',
      customClasses: 'accordion-header-input',
      label: 'Header',
      sectionId: `${section}HeadR${index}`,
      placeholder: 'Enter heading'
    });

    card += `<div class="col-12"><table class="table mb-0">`;
    card += `<thead><tr><th scope="col" width="30%">Icon</th><th scope="col" width="70%">Text</th></tr></thead><tbody>`;

    for (let i = 1; i <= 3; i++) {
      card += `<tr><td>`;

      card += INPUT_FIELDS.mediaSelector.get({ 
        cols: 'col-12',
        label: '',
        sectionId: `${section}IconR${index}C${i}`,
        format: '',
        size: '',
        dimensions: ''
      });

      card += `</td><td>`;
      
      card += INPUT_FIELDS.textField.get({ 
        cols: 'col-12',
        customClasses: '',
        label: '',
        sectionId: `${section}TextR${index}C${i}`,
        placeholder: 'Enter text'
      });
      card += `</td></tr>`;
    }

    card += `</tbody>`;
    card += `</div></div></div></div>`;

    return card;
  },
  four: function(section, index){
    let dimensions = '';
    switch(section){
      case 'useCaseSection2' : dimensions = '(700 x 350 px)'; break;
      case 'riaasSection2' : dimensions = '(500 x 300 px)'; break;
      case 'riaasSection5' : dimensions = '(1600 x 700 px)'; break;
    }

    let card = '';

    card += `<div id="${section}-card_${index}" class="accordion-item" data-id="${index}" data-section="${section}">`;
    card += `<h2 id="heading${section}${index}" class="accordion-header d-flex justify-content-between align-items-center">`;
    card += `<button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse${section}${index}" aria-expanded="true" aria-controls="collapse${section}${index}">`;
    card += renderHandlerBtn();
    card += `<span class="accordion-title"></span>`;
    card += renderDeleteBtn(index, section);        
    card += `</button></h2>`;
    card += `<div id="collapse${section}${index}" class="accordion-collapse collapse show" aria-labelledby="heading${section}${index}" data-bs-parent="#${section}Tree">
    <div class="accordion-body">`;
    card += `<div class="row g-3">`;
      
    card += INPUT_FIELDS.mediaSelector.get({ 
      cols: 'col-12 col-md-4',
      label: `Image ${dimensions}`,
      sectionId: `${section}ImageR${index}`,
      format: '',
      size: '',
      dimensions: ''
    });

    card += INPUT_FIELDS.textField.get({ 
      cols: 'col-12 col-md-8',
      customClasses: 'accordion-header-input',
      label: 'Header',
      sectionId: `${section}HeadR${index}`,
      placeholder: 'Enter heading'
    });
    
    card += `</div></div></div></div>`;

    return card;
  },
  five: function(section, index){
    let imageLabel = section === 'riaasSection4' ? 'Image (1000 x 500 px)' : 'Image';
    let iconLabel = section === 'riaasSection4' ? 'Icon (100 x 100 px)' : 'Icon';
    let card = '';

    card += `<div id="${section}-card_${index}" class="accordion-item" data-id="${index}" data-section="${section}">`;
    card += `<h2 id="heading${section}${index}" class="accordion-header d-flex justify-content-between align-items-center">`;
    card += `<button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse${section}${index}" aria-expanded="true" aria-controls="collapse${section}${index}">`;
    card += renderHandlerBtn();
    card += `<span class="accordion-title"></span>`;
    card += renderDeleteBtn(index, section);        
    card += `</button></h2>`;
    card += `<div id="collapse${section}${index}" class="accordion-collapse collapse show" aria-labelledby="heading${section}${index}" data-bs-parent="#${section}Tree">
    <div class="accordion-body">`;
    card += `<div class="row g-3">`;
     
    card += INPUT_FIELDS.textField.get({ 
      cols: 'col-12',
      customClasses: 'accordion-header-input',
      label: 'Header',
      sectionId: `${section}HeadR${index}`,
      placeholder: 'Enter heading'
    });

    card += INPUT_FIELDS.mediaSelector.get({ 
      cols: 'col-12 col-md-3',
      label: imageLabel,
      sectionId: `${section}ImageR${index}`,
      format: '',
      size: '',
      dimensions: ''
    });

    card += INPUT_FIELDS.mediaSelector.get({ 
      cols: 'col-12 col-md-3',
      label: iconLabel,
      sectionId: `${section}IconR${index}`,
      format: '',
      size: '',
      dimensions: ''
    });

    card += `</div></div></div></div>`;

    return card;
  },
  six: function(section, index){
    let imageLabel = ['featuresEn', 'featuresKr'].includes(section) ? 'Image (200 x 200 px)' : 'Image';
    let card = '';

    card += `<div id="${section}-card_${index}" class="accordion-item" data-id="${index}" data-section="${section}">`;
    card += `<h2 id="heading${section}${index}" class="accordion-header d-flex justify-content-between align-items-center">`;
    card += `<button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse${section}${index}" aria-expanded="true" aria-controls="collapse${section}${index}">`;
    card += renderHandlerBtn();
    card += `<span class="accordion-title"></span>`;
    card += renderDeleteBtn(index, section);        
    card += `</button></h2>`;
    card += `<div id="collapse${section}${index}" class="accordion-collapse collapse show" aria-labelledby="heading${section}${index}" data-bs-parent="#${section}Tree">
    <div class="accordion-body">`;
    card += `<div class="row g-3">`;

    card += INPUT_FIELDS.mediaSelector.get({
      cols: 'col-12 col-md-4',
      label: imageLabel,
      sectionId: `${section}ImageR${index}`,
      format: '',
      size: '',
      dimensions: ''
    });

    card += `<div class="col-12 col-md-8">`;
    card += `<div class="row g-3">`;
    
    card += INPUT_FIELDS.textField.get({ 
      cols: 'col-12',
      customClasses: 'accordion-header-input',
      label: 'Head',
      sectionId: `${section}HeadR${index}`,
      placeholder: 'Enter heading'
    });

    card += INPUT_FIELDS.textField.get({ 
      cols: 'col-12',
      label: 'Text',
      sectionId: `${section}TextR${index}`,
      placeholder: 'Enter text'
    });

    card +=  `</div></div>`;

    card += `</div></div></div></div>`;

    return card;
  },
  contentOne: function(section, index){
    let card = '';

    card += `<div id="${section}-card_${index}" class="accordion-item" data-id="${index}" data-section="${section}">`;
    card += `<h2 id="heading${section}${index}" class="accordion-header d-flex justify-content-between align-items-center">`;
    card += `<button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse${section}${index}" aria-expanded="true" aria-controls="collapse${section}${index}">`;
    card += renderHandlerBtn();
    card += `<span class="accordion-title">Layout - Head + Text</span>`;
    card += renderDeleteBtn(index, section);        
    card += `</button></h2>`;
    card += `<div id="collapse${section}${index}" class="accordion-collapse collapse show" aria-labelledby="heading${section}${index}" data-bs-parent="#${section}Tree">
    <div class="accordion-body">`;
    card += `<div class="row g-3">`;

    card += INPUT_FIELDS.hiddenField.get({ 
      sectionId: `${section}LayoutR${index}`,
      value: 'layout_1'
    });

    card += INPUT_FIELDS.textField.get({ 
      cols: 'col-12',
      label: 'Heading',
      sectionId: `${section}HeadR${index}`,
      placeholder: 'Enter heading'
    });
    
    card += INPUT_FIELDS.editorField.get({ 
      cols: 'col-12',
      label: 'Text',
      sectionId: `${section}TextR${index}`,
      isEditor: true
    });

    card += `</div></div></div></div>`;
    return card;
  },
  contentTwo: function(section, index){
    let card = '';

    card += `<div id="${section}-card_${index}" class="accordion-item" data-id="${index}" data-section="${section}">`;
    card += `<h2 id="heading${section}${index}" class="accordion-header d-flex justify-content-between align-items-center">`;
    card += `<button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse${section}${index}" aria-expanded="true" aria-controls="collapse${section}${index}">`;
    card += renderHandlerBtn();
    card += `<span class="accordion-title">Layout - Text</span>`;
    card += renderDeleteBtn(index, section);        
    card += `</button></h2>`;
    card += `<div id="collapse${section}${index}" class="accordion-collapse collapse show" aria-labelledby="heading${section}${index}" data-bs-parent="#${section}Tree">
    <div class="accordion-body">`;
    card += `<div class="row g-3">`;

    card += INPUT_FIELDS.hiddenField.get({ 
      sectionId: `${section}LayoutR${index}`,
      value: 'layout_2'
    });
    
    card += INPUT_FIELDS.editorField.get({ 
      cols: 'col-12',
      label: 'Text',
      sectionId: `${section}TextR${index}`,
      isEditor: true
    });

    card += `</div></div></div></div>`;
    return card;
  },
  contentThree: function(section, index){
    let card = '';

    card += `<div id="${section}-card_${index}" class="accordion-item" data-id="${index}" data-section="${section}">`;
    card += `<h2 id="heading${section}${index}" class="accordion-header d-flex justify-content-between align-items-center">`;
    card += `<button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse${section}${index}" aria-expanded="true" aria-controls="collapse${section}${index}">`;
    card += renderHandlerBtn();
    card += `<span class="accordion-title">Layout - Image</span>`;
    card += renderDeleteBtn(index, section);        
    card += `</button></h2>`;
    card += `<div id="collapse${section}${index}" class="accordion-collapse collapse show" aria-labelledby="heading${section}${index}" data-bs-parent="#${section}Tree">
    <div class="accordion-body">`;
    card += `<div class="row g-3">`;
      
    card += INPUT_FIELDS.hiddenField.get({ 
      sectionId: `${section}LayoutR${index}`,
      value: 'layout_3'
    });

    card += INPUT_FIELDS.mediaSelector.get({ 
      cols: 'col-12 col-md-4',
      label: 'Image (1000 x 500 px)',
      sectionId: `${section}ImageR${index}`,
      format: '',
      size: '',
      dimensions: ''
    });

    card += INPUT_FIELDS.textField.get({ 
      cols: 'col-12',
      label: 'Caption',
      sectionId: `${section}CaptionR${index}`,
      placeholder: 'Enter caption'
    });
    
    card += `</div></div></div></div>`;

    return card;
  }
}

const renderCKEditor = (instanceId) => {
  CKEDITOR.replace(instanceId, {
    format_tags: 'p;h1;h2;h3;h4;h5;h6'
  });
}

const renderHandlerBtn = () => {
  return `<td>
    <a 
      href="javascript:;"
      class="ms-auto btn-outline-primary my-handle">
      <i class="bi bi-arrows-move"></i>
    </a>
  </td>`;
}

const renderDeleteBtn = (elIndex, section) => {
  return `<td>
    <a 
      href="javascript:;"
      class="btn-outline-danger removeRowBtn" 
      data-count="${elIndex}"
      data-section="${section}">
      <i class="bi bi-trash-fill"></i>
    </a>
  </td>`;
}

const getElements = (section) => {
  return typeof isEditFormPage !== 'undefined' && isEditFormPage === '1' && $(`#${section}Elements`).val() ? $(`#${section}Elements`).val().split(",") : [];
}

const getIndex = (section) => {
  return typeof isEditFormPage !== 'undefined' && isEditFormPage === '1' && $(`#${section}Counter`).val() ? +$(`#${section}Counter`).val() : 0;
}

function getPageObject(section, recordsLimit, layout){
  return {
    elements: getElements(section),
    elIndex: getIndex(section),
    limit: recordsLimit,
    dropIndex: null,
    newRow: function(){
      switch(layout){
        case 'one' : return LAYOUTS.one(section, this.elIndex);
        case 'two' : return LAYOUTS.two(section, this.elIndex);
        case 'three' : return LAYOUTS.three(section, this.elIndex);
        case 'four' : return LAYOUTS.four(section, this.elIndex);
        case 'five' : return LAYOUTS.five(section, this.elIndex);
        case 'six' : return LAYOUTS.six(section, this.elIndex);
      }
    },
    pushElement: elementPushHandler,
    popElement: elementPopHandler,
    toggleButton: toggleBtnHandler
  }
}

function getContentObject(section, recordsLimit){
  return {
    elements: getElements(section),
    elIndex: getIndex(section),
    limit: recordsLimit,
    dropIndex: null,
    layout: null,
    newRow: function(){
      switch(this.layout){
        case 'layout_1' : return LAYOUTS.contentOne(section, this.elIndex);
        case 'layout_2' : return LAYOUTS.contentTwo(section, this.elIndex);
        case 'layout_3' : return LAYOUTS.contentThree(section, this.elIndex);
      }
    },
    pushElement: elementPushHandler,
    popElement: elementPopHandler,
    toggleButton: toggleBtnHandler
  }
}

function elementPushHandler(){
  this.elements.push(+this.elIndex);
}

function elementPopHandler(){
  const filterElements = this.elements.filter( el => +el !== this.dropIndex );
  this.elements = filterElements;
}

function toggleBtnHandler(section){
  const btnRef = ['contentEn','contentKr'].includes(section) ? `#${section}LayoutBox` : `#${section}RowBtn`;
  
  if( this.limit === "NA" ){
    return;
  }
  
  if( this.elements.length >= this.limit ){
    $(btnRef).hide();
  }else{
    $(btnRef).show();
  }
}

function removeTableRowHandler(e){ 
  e.preventDefault();

  const elIndex = $(this).data('count');
  const section = $(this).data('section');
  const cardRef = `#${section}-card_${elIndex}`;

  inputSet[section].dropIndex = elIndex;
  inputSet[section].popElement();
  $(cardRef).remove();
  inputSet[section].toggleButton(section);
}

function setAccordianHeaderHandler(e){
  e.preventDefault();

  const text = $(this).val();
  $(this).closest('.accordion-collapse').siblings('.accordion-header').find('.accordion-title').html(text);
}