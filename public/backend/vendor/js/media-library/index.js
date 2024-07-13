if( typeof isFormPage !== 'undefined' && isFormPage === '1' ){
  $("#mediaUpload").hide();

  // Media upload form
  const dropzone = document.querySelector('.dropzone');
  const fileInput = document.querySelector('.file-input');
  const filePreviews = document.querySelector('.file-previews');

  dropzone.addEventListener('click', function() {
    fileInput.click();
  });

  fileInput.addEventListener('change', function() {
    resetErrorMessages();
    $(".preview-text").show();
    filePreviews.innerHTML = '';
  
    const files = fileInput.files;
  
    if ( files.length ) {
      if( files.length > 10 ){
        $("label[for='media']").html("Please select no more than 10 files");
        $(".invalid-feedback").css("display","block");
        $('#loader-wrapper').hide();

        return;
      }
  
      handleFiles(files);
    }
  });

  function handleFiles(files) {
    $(".preview-text").hide();
  
    for (let i = 0; i < files.length; i++) {
      let file = files[i];
  
      // Create a new div element for the file preview
      const filePreview = document.createElement('div');
      filePreview.classList.add('file-preview', 'col-12', 'col-sm-6', 'col-md-4', 'col-lg-3');
  
      const wrapper = document.createElement('div');
      wrapper.classList.add('d-flex');
  
      const imageWrapper = document.createElement('div');
      imageWrapper.classList.add('col-auto');

      // Create a new image element for the file thumbnail
      const img = document.createElement('img');
      img.alt = file.name;

      // Set the src attribute of the image to display the file thumbnail
      switch( file.type ){
        case "audio/mpeg" : img.src = '/backend/assets/images/audio.png'; break;
        case "video/mp4" : img.src = '/backend/assets/images/video.png'; break;
        case "application/msword" : img.src = '/backend/assets/images/doc.png'; break;
        case "application/vnd.openxmlformats-officedocument.wordprocessingml.document" : img.src = '/backend/assets/images/doc.png'; break;
        case "text/csv" : img.src = '/backend/assets/images/xls.png'; break;
        case "application/vnd.ms-excel" : img.src = '/backend/assets/images/xls.png'; break;
        case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" : img.src = '/backend/assets/images/xls.png'; break;
        case "application/vnd.ms-powerpoint" : img.src = '/backend/assets/images/ppt.png'; break;
        case "application/vnd.openxmlformats-officedocument.presentationml.presentation" : img.src = '/backend/assets/images/ppt.png'; break;
        case "application/pdf" : img.src = '/backend/assets/images/pdf.png'; break;
        case "application/x-zip-compressed": img.src = '/backend/assets/images/zip.png'; break;
        case "application/zip" : img.src = '/backend/assets/images/zip.png'; break;
        case "application/vnd.rar" : img.src = '/backend/assets/images/zip.png'; break;
        default: img.src = URL.createObjectURL(file);
      }
      imageWrapper.appendChild(img)
  
      const textWrapper = document.createElement('div');
      textWrapper.classList.add('col');
  
      // Create a new p element for the file name
      const p = document.createElement('p');
      p.textContent = file.name;
  
      // Append the image and p elements to the file preview div
      textWrapper.appendChild(p);
      wrapper.appendChild(imageWrapper);
      wrapper.appendChild(textWrapper);
      filePreview.appendChild(wrapper);
  
      // Append the file preview div to the file previews container
      filePreviews.appendChild(filePreview);
    }

    $('#loader-wrapper').hide();
  }
  
  function sendToServer(files, mediaGroupId) {
    $("#mediaForm").hide();
    $("#mediaUpload").show();
   
    for (let i = 0; i < files.length; i++) {
      let file = files[i];
      postMedia(file, mediaGroupId);
    }

    $('#loader-wrapper').hide();
  }
  
  function postMedia(file, mediaGroupId){
    const uploadedFilesContainer = document.querySelector('.uploaded-files');
  
    // Create a new element for the uploaded file
    const uploadedFile = document.createElement('div');
    uploadedFile.classList.add('uploaded-file');
  
    // Create an image element to display the thumbnail (if available)
    const thumbnail = document.createElement('img');
    thumbnail.alt = file.name;
  
    const mediaThumbnail = getMediaThumbnail(file.type);
    thumbnail.src = mediaThumbnail ? mediaThumbnail : URL.createObjectURL(file);
  
    // Create a span element to display the file name
    const fileName = document.createElement('span');
    fileName.textContent = file.name;
  
    // Append the thumbnail and file name to the uploaded file element
    uploadedFile.appendChild(thumbnail);
    uploadedFile.appendChild(fileName);
  
    const responseText = document.createElement('span');
    responseText.textContent = 'please wait while uploading...';
    uploadedFile.appendChild(responseText);

    const formData = new FormData();
    formData.append("media", file);
    formData.append("mediaGroupId", mediaGroupId);
  
    httpClient.post(routes.MEDIA_LIBRARY_FILE_ADD, formData)
    .then( response => {
      let { status, data } = response;
      
      if( status === 201 && data.status === "SUCCESS" ){
        responseText.classList.add('successfully');
        responseText.textContent = 'file uploaded successfully';
        uploadedFile.appendChild(responseText);
      } 
    })
    .catch( error => {
      let { status, data } = error.response
      let errorMessage = '';

      if( status === 422 && data.status === "VALIDATION_ERRORS" ){
        errorMessage = data.errors && data.errors.media && typeof data.errors.media[0] !== 'undefined' ? `- ${data.errors.media[0]}` : '';
      }

      responseText.classList.add('unsuccessfully');
      responseText.textContent = `failed to upload file ${errorMessage}`;
      uploadedFile.appendChild(responseText);
    })

    uploadedFilesContainer.append(uploadedFile);
  }

  $(document).ready(function() {

    $("#uploadMedia").on("click", function(e){
      e.preventDefault();        
      resetErrorMessages();
  
      const files = fileInput.files;
      const mediaGroupId = $("#mediaLibraryGroupId").val();
  
      if( !files.length ){
        $("label[for='media']").html("Please select files to upload");
        $(".invalid-feedback").css("display","block");
        $('#loader-wrapper').hide();
        return;
      }else if( files.length > 10  ){
        $("label[for='media']").html("Please select no more than 10 files");
        $(".invalid-feedback").css("display","block");
        $('#loader-wrapper').hide();
        return;
      }
  
      sendToServer(files, mediaGroupId);
    });

  });
}

if( typeof isListPage !== 'undefined' && isListPage === '1' ){

  function copyHandler(e){
    e.preventDefault();
    const source = $(this).data("url");
    navigator.clipboard.writeText(source);
  }

  function deleteHandler(e){
    e.preventDefault();
    const code = $(this).data("code");
    
    const formdata = new FormData();
    formdata.append('mediaId', code);

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
        
        httpClient.post(routes.MEDIA_LIBRARY_FILE_DELETE, formdata)
        .then( response => {
          let { status, data } = response;
      
          if( status === 200 && data.status === "SUCCESS" ){
            const mediaElement = document.getElementById(code);
            mediaElement.remove();
          }
        })
        .catch( error => {
          let { status, data } = error.response
          
          if( status === 422 && data.status === "ALERT" ){
            Swal.fire({
              icon: data.alertIcon,
              title: data.alertTitle,
              text: data.alertText
            });
          }
        })
      }
    })
  }

  $(document).ready(function() {
    $(".galleryContainer").on('click', ".copyToClip", copyHandler);
    $(".galleryContainer").on('click', ".deleteMediaBtn", deleteHandler);
  });
}