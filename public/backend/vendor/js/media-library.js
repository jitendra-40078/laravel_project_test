let page = 1;
let timeout = null;

function isImageMime(mime) {
  return mime.includes('image');
}

function fetchMedia(){
  $("#loadMoreRecord").hide();

  const mediaLibraryGroup = $("#mediaLibraryGroup").val();
  const mediaLibraryYear = $("#mediaLibraryYear").val();
  const mediaLibrarySearch = $("#mediaLibrarySearch").val();

  let url = `${routes.MEDIA_LIBRARY_FILE_LIST}?page=${page}&group=${encodeURIComponent(mediaLibraryGroup)}&year=${encodeURIComponent(mediaLibraryYear)}&search=${encodeURIComponent(mediaLibrarySearch)}`;

  httpClient.get(url)
  .then( response => {
    const { data, status } = response;

    if( status === 200 && data && data.records.data.length > 0 ){
      data.records.data.forEach(element => {

        const mediaThumbnail = getMediaThumbnail(element.meta.mime);
        const thumbnailPath =  mediaThumbnail ? mediaThumbnail : '/'+element.meta.path;
        
        let buttonSet = `<button
          type="button"
          data-url="${MEDIA_URL}/${element.meta.path}"
          data-type="${element.meta.mime}"
          class="btn btn-sm btn-outline-primary copyToClip"><i class="lni lni-clipboard"></i></button>`;

        buttonSet += isImageMime(element.meta.mime) ? `<a
          href="/cms/media-library/crop/${element.code}"
          class="btn btn-sm btn-outline-primary"><i class="lni lni-crop"></i></a>` : '';

        buttonSet += `<button
          type="button"
          data-code="${element.code}"
          class="btn btn-sm btn-outline-danger deleteMediaBtn"><i class="lni lni-trash"></i></button>`;

        const actionButton = typeof activeMenu !== 'undefined' && activeMenu === 'medialibrary-list' ? 
        buttonSet : 
        `<button
          type="button"
          data-url="${element.meta.path}"
          data-type="${element.meta.mime}"
          class="btn btn-sm btn-outline-primary setPlaceholder">select</button>`;

        const card = `<div class="col-lg-3" id="${element.code}">
          <div class="card border h-100 shadow-none mb-0">
            <div class="card-body d-flex h-100 flex-column text-center">
              <div class="col-auto">
                <div class="lbImg">
                  <img
                  src="${thumbnailPath}"
                  class="mb-3"
                  alt="" />
                </div>
              </div>

              <div class="col">
                <h6 class="product-title">${element.meta.originalName}</h6>
                <div class="actions d-flex align-items-center justify-content-center gap-2 mt-3">${actionButton}</div>
              </div>
            </div>
          </div>
        </div>`;

        $(".galleryCards").append(card);
      });

      // if( data.records.count && (data.records.count > ( page * 20 )) ){
      //   $("#loadMoreRecord").show();
      // }

      if( 
        data.records.current_page && 
        data.records.last_page && 
        data.records.current_page !== data.records.last_page
      ){
        $("#loadMoreRecord").show();
      }
    }
  })
  .catch( error => {
    console.log(error)
  })
}

function filterChangeHandler(){
  page = 1;
  $(".galleryCards").empty();
  fetchMedia();
}

function setImageHandler(e){
  e.preventDefault();
  const source = $(this).data("url");
  const type = $(this).data("type");
  const placeholder = $("#mediaPlaceholder").val();

  $(`#${placeholder}`).val(source);
  $(`label[for='${placeholder}']`).html("");
  $(`.${placeholder}MediaAdd`).hide();
  $(`.${placeholder}MediaPreview`).show();
  $(`.${placeholder}MediaPreview`).empty();

  const mediaThumbnail = getMediaThumbnail(type);
  const thumbnailPath =  mediaThumbnail ? mediaThumbnail : '/'+source;

  const previewContent = `<div class="media-preview-wrap">

    <div class="d-flex media-box"><img src="${thumbnailPath}" class="img-fluid" width="100px"></div>
    
    <div class="row mx-0 pt-4 justify-content-center align-items-center iconDiv">
      <div class="col-auto">
        <div class="icon" id="mediaRemoveBtn" data-placeholder="${placeholder}">
        <i class="bi bi-trash3-fill"></i>
        </div>
      </div>
    </div>
  </div>`;

  $(`.${placeholder}MediaPreview`).append(previewContent);

  $(".galleryCards").empty();
  $("#mediaLibraryModal").modal('hide');
}

function addMediaHandler(e){
  e.preventDefault();

  const placeholder = $(this).data("placeholder");
  $("#mediaLibraryModal").modal('show');
  $(".galleryCards").empty();
  $("#mediaPlaceholder").val(placeholder);

  page = 1;
  fetchMedia();
}

function removeMediaHandler(e){
  e.preventDefault();
  const placeholder = $(this).data("placeholder");

  $(`#${placeholder}`).val("");
  $(`.${placeholder}MediaPreview`).empty();
  $(`.${placeholder}MediaPreview`).hide();
  $(`.${placeholder}MediaAdd`).show();
}

$(document).ready(function() {

  $(".page-content").on('click', "#mediaLibraryBtn", addMediaHandler);
  $(".page-content").on('click', "#mediaRemoveBtn", removeMediaHandler);
  $(".galleryContainer").on('click', ".setPlaceholder", setImageHandler);
  $(".galleryContainer").on('change', "#mediaLibraryGroup, #mediaLibraryYear", filterChangeHandler);

  $("#mediaLibrarySearch").on("keyup", function(){
    clearTimeout(timeout);
    
    timeout = setTimeout(function () {
      filterChangeHandler();
    }, 1000);
  });

  $("#resetFilter").on("click", function(){
    page = 1;
    $("#mediaLibraryGroup").val("");
    $("#mediaLibraryYear").val("");
    $("#mediaLibrarySearch").val("");
    
    $(".galleryCards").empty();
    fetchMedia();
  });

  $("#loadMoreRecord").on("click", function(){
    page += 1;
    fetchMedia();
  });

  if( typeof activeMenu !== 'undefined' && activeMenu === 'medialibrary-list' ){
    fetchMedia();
  }

});