const httpClient = axios.create({
  baseURL: BASE_URL,
  headers: {
    'Content-Type': 'multipart/form-data',
    'Access-Control-Allow-Origin': '*'
  }
});

const postForm = (url, formdata) => {
  resetErrorMessages();

  httpClient.post(url, formdata)
  .then( response => {
    let { status, data } = response;

    if( status === 200 && data.status === "REDIRECT" ){
      window.location.href = BASE_URL + data.redirect;
    }else if([201, 200].includes(status) && data.status === "ALERT" ){
      Swal.fire({
        icon: data.alertIcon,
        title: data.alertTitle,
        text: data.alertText
      });
    }else if([201, 200].includes(status) && data.status === "SUCCESS_ALERT_REDIRECT" ){
      Swal.fire({
        icon: data.alertIcon,
        title: data.alertTitle,
        text: data.alertText
      })
      .then((value) => {
        window.location.href = BASE_URL + data.redirect;
      });
    }else if( [201, 200].includes(status) && data.status === "SUCCESS_ALERT_RELOAD" ){
      Swal.fire({
        icon: data.alertIcon,
        title: data.alertTitle,
        text: data.alertText
      })
      .then((value) => {
        window.location.reload();
      });
    } 
  })
  .catch( error => {
    let { status, data } = error.response

    if( status === 422 && data.status === "VALIDATION_ERRORS" ){
      let firstInputElement = '';
      let index = 0;

      $.each(data.errors, function(key, element) {
        let error = Object.entries(element)
        const [el, errorMessage] = error[0];

        $("label[for='"+key+"']").html(errorMessage);
        $(`#${key}`).addClass('is-invalid');
        firstInputElement = index == 0 ? key : firstInputElement;

        // Find the parent tab and accordion and add 'error' class
        // const tab = $(`#${key}`).closest('.section-container');
        // const accordionHeader = $(`#${key}`).closest('.accordion-item').find('.accordion-header');

        // if(tab.length) {
        //   $(tab).addClass('error'); // Assuming tab triggers are <a> tags
        // }

        // if(accordionHeader.length) {
        //   accordionHeader.addClass('error');
        // }

        index++;
      });

      $(".invalid-feedback").css("display","block");
      $(`#${firstInputElement}`).focus();
    }else if( status === 422 && data.status === "ALERT" ){
      Swal.fire({
        icon: data.alertIcon,
        title: data.alertTitle,
        text: data.alertText
      });
    }else if( status === 422 && data.status === "ALERT_BOX" ){
      if( data.type === "error" ){
        $(".alert-box-text").html(data.text);
        $("#dangerAlert").css("display","block");
      }
    }else if( status === 401 && data.message === "Unauthenticated." ){
      Swal.fire({
        icon: 'error',
        title: 'Your session has expired.',
        text: ''
      })
      .then((value) => {
        window.location.reload();
      });
    }else{
      Swal.fire({
        icon: 'error',
        title: 'The operation failed.',
        text: 'Please reload the page and try again later.'
      });
    }
  })
  .finally(function () {
    $('#loader-wrapper').hide();
  });
}

const resetErrorMessages = () => {
  $('#loader-wrapper').show();

  $(".invalid-feedback").html("");
  $(".invalid-feedback").css("display","none");
  $('input, textarea, select').removeClass('is-invalid');

  $(".alert-box-text").html("");
  $("#dangerAlert").css("display","none");
}

const deleteRecord = (url, formdata) => {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      postForm(url, formdata);
    }
  })
}

resetErrorMessages();

const getMediaThumbnail = ( mimeType ) => {
  
  let thumbnailPath = '';

  switch( mimeType ){
    case "audio/mpeg" : thumbnailPath = '/backend/assets/images/audio.png'; break;
    case "video/mp4" : thumbnailPath = '/backend/assets/images/video.png'; break;
    case "application/msword" : thumbnailPath = '/backend/assets/images/doc.png'; break;
    case "application/vnd.openxmlformats-officedocument.wordprocessingml.document" : thumbnailPath = '/backend/assets/images/doc.png'; break;
    case "text/csv" : thumbnailPath = '/backend/assets/images/xls.png'; break;
    case "application/vnd.ms-excel" : thumbnailPath = '/backend/assets/images/xls.png'; break;
    case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" : thumbnailPath = '/backend/assets/images/xls.png'; break;
    case "application/vnd.ms-powerpoint" : thumbnailPath = '/backend/assets/images/ppt.png'; break;
    case "application/vnd.openxmlformats-officedocument.presentationml.presentation" : thumbnailPath = '/backend/assets/images/ppt.png'; break;
    case "application/pdf" : thumbnailPath = '/backend/assets/images/pdf.png'; break;
    case "application/x-zip-compressed": thumbnailPath = '/backend/assets/images/zip.png'; break;
    case "application/zip" : thumbnailPath = '/backend/assets/images/zip.png'; break;
    case "application/vnd.rar" : thumbnailPath = '/backend/assets/images/zip.png'; break;
    default: thumbnailPath = null;
  }

  return thumbnailPath;
}

const sectionToggler = (lang) => {
  switch(lang){
    case 'en' : {
      $('.enFields').show();
      $('.krFields').hide();
    } break;
    case 'kr' : {
      $('.enFields').hide();
      $('.krFields').show();
    } break;
    case 'both' : {
      $('.enFields').show();
      $('.krFields').show();
    } break;
    default: {
      $('.enFields').hide();
      $('.krFields').hide();
    }
  }
}