let page = 1;
let stickyInitialized = false;

const fetchMedia = () => {
  $('#loader-wrapper').show();
  $("#loadMoreRecord").hide();

  let url = `api/web/blogs/fetch?page=${page}`;

  httpClient.get(url)
  .then( response => {
    const { data, status } = response;

    if( status === 200 && data && data.records && data.records.data && data.records.data.length > 0 ){
      data.records.data.forEach(element => {
        const card = `<li class="col-sm-6 col-lg-12">
        <a href="/blog/${element.slug}">
          <div class="row gx-lg-4">
            <div class="col-lg-6 mb-4 mb-lg-0">
              <div class="blogThumb">
                <img src="/${element.image[locale]}" alt="${element.title[locale]}" />
              </div>
            </div>
            <div class="col-lg-6">
              <h6>${ locale === 'en' ? ( element.category.nameEn ? element.category.nameEn : '' ) : ( element.category.nameKr ? element.category.nameKr : '' )}</h6>
              <h5>${element.title[locale]}</h5>
              <p>${element.short_description[locale]}</p>
              <span>${ formatDate(element.publish_date) }</span>
            </div>
          </div>
        </a>
      </li>`;

        $(".articleListing").append(card);
      });

      if( data.records.next_page_url ){
        $("#loadMoreRecord").show();
      }
    }

    if (!stickyInitialized) {
      initializeStickyScript();
      stickyInitialized = true;
    }
  })
  .catch( error => {
    // console.log(error)
  })
  .finally(function () {
    $('#loader-wrapper').hide();
  });
}

const formatDate = (inputDate) => {
  const date = new Date(inputDate);
  
  const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"];

  const day = date.getDate();
  const month = monthNames[date.getMonth()];
  const year = date.getFullYear();
  const newFormat = month + " " + day + ", " + year;

  return newFormat;
}

$(document).ready(function() {

  $("#loadMoreRecord").on("click", function(){
    page += 1;
    fetchMedia();
  });

  fetchMedia();
});