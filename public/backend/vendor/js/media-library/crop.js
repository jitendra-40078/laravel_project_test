let cropper;

$(document).ready(function() {
  initializeCropper();
});


function initializeCropper() {
  let imageContainer = document.getElementById('cropImageContainer');
  
  if (cropper) {
    cropper.destroy();  // Destroy the old cropper instance
  }

  cropper = new Cropper(imageContainer, {
    aspectRatio: 4/3, // Set fixed aspect ratio
    viewMode: 1, // View mode to restrict the cropping box within the canvas
    autoCropArea: 1, // Automatically set the cropping box to fill the canvas
    movable: true, // Disable moving the image
    scalable: true, // Disable scaling the image
    zoomable: true, // Disable zooming
    cropBoxResizable: true, // Disable resizing the crop box
    cropBoxMovable: true, // Disable moving the crop box
    responsive: true
  });
}

function cropImage() {
  $('#loader-wrapper').show();

  let mediaType = $("#mediaFileType").val() ? $("#mediaFileType").val() : 'image/png';
  let mediaName = $("#mediaFileName").val() ? $("#mediaFileName").val() : 'crop-image.png';

  var croppedCanvas = cropper.getCroppedCanvas();
  croppedCanvas.toBlob(function (blob) {

    const formData = new FormData();
    formData.append("media", blob, mediaName);
    formData.append("mediaGroupId", $("#mediaGroupId").val());

    httpClient.post(routes.MEDIA_LIBRARY_FILE_ADD, formData)
    .then( response => {
      let { status, data } = response;
      
      if( status === 201 && data.status === "SUCCESS" ){
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Cropped image uploaded successfully.'
        })
        .then((value) => {
          window.location.href = BASE_URL + '/cms/media-library';
        });
      } 
    })
    .catch( error => {
      let { status, data } = error.response
      let errorMessage = '';

      if( status === 422 && data.status === "VALIDATION_ERRORS" ){
        errorMessage = data.errors && data.errors.media && typeof data.errors.media[0] !== 'undefined' ? `- ${data.errors.media[0]}` : '';
      }

      Swal.fire({
        icon: 'error',
        title: 'Failed to upload',
        text: errorMessage
      });
    })
    .finally(function () {
      $('#loader-wrapper').hide();
    });
  }, mediaType);
}