const httpClient = axios.create({
  baseURL: BASE_URL,
  headers: {
    'Content-Type': 'multipart/form-data',
    'Access-Control-Allow-Origin': '*'
  }
});

const postForm = (formInstance, url, formdata) => {
  $('#loader-wrapper').show();
  resetErrorMessages();

  httpClient.post(url, formdata)
  .then( response => {
    let { status, data } = response;

    if([201, 200].includes(status) && data.status === "SUCCESS" ){
      Swal.fire({
        icon: data.alertIcon,
        title: data.alertTitle,
        text: data.alertText
      })

      if( formInstance ){
        $(`#${formInstance}`)[0].reset();
      }

      if( formInstance === 'jobApplicationForm' ){
        Fancybox.close();
      }
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
        firstInputElement = index == 0 ? key : firstInputElement;
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
  $(".invalid-feedback").html("");
  $(".invalid-feedback").css("display","none");
}