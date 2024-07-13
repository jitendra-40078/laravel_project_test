let page = 1;
let filterData = 'all';

const fetchMedia = () => {
  $("#loadMoreRecord").hide();

  let url = `api/web/news/fetch?page=${page}&type=${filterData}`;

  httpClient.get(url)
  .then( response => {
    const { data, status } = response;

    if( status === 200 && data && data.records && data.records.data && data.records.data.length > 0 ){
      data.records.data.forEach(element => {
        const card = `<div class="col-md-5 col-lg-4">
          <a href="/news/${element.slug}" class="newsBox">
            <div class="newsPic">
              <img src="/${element.image[locale]}" alt="${element.title[locale]}" />
            </div>
            <div class="newsContent">
              <span>${ capitalizeFirstWord(element.type) }</span>
              <h4>${element.title[locale]}</h4>
              <p>${element.short_description[locale]}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="col date">${ formatDate(element.publish_date) }</div>
              </div>
            </div>
          </a>
        </div>`;

        $(".newsContainer").append(card);
      });

      if( data.records.next_page_url ){
        $("#loadMoreRecord").show();
      }
    }
  })
  .catch( error => {
    // console.log(error)
  })
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

const capitalizeFirstWord = (sentence) => {
  let words = sentence.split(" ");
  words[0] = words[0].charAt(0).toUpperCase() + words[0].slice(1);

  return words.join(" ");
}

$(document).ready(function() {

  $('.newsListingBtn button').click(function() {
    const parentLi = $(this).closest('li');

    $('.newsListingBtn li').removeClass('active');
    parentLi.addClass('active');

    const filterValue = parentLi.data('id');
    filterData = filterValue;
    page = 1;

    $(".newsContainer").empty();
    fetchMedia();
  });

  $("#loadMoreRecord").on("click", function(){
    page += 1;
    fetchMedia();
  });

  fetchMedia();
});