@extends('web.page')

@section('webpagestyles')
  <link rel="stylesheet" href="{{ asset('web/css/innerPage.css') }} ">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
@endsection

@section('webpageseo')
  <title>{{ $pageData->seo['metaTitle'] ?? 'Welcome to DareeSoft' }}</title>
  <meta name="description" content="{{ $pageData->seo['metaDescription'] ?? '' }}">
@endsection

@section('webpagecontent')
  <main>

    @include('web.pages.career.components.section-1', $pageData->content['section1'] ?? [])

    @include('web.pages.career.components.section-2', [
      'data' => $pageData->content['section2'] ?? null,
      'jobs' => $jobs ?? null
    ])

    @include('web.pages.partials.newsletter-form', $pageData->content['section3'] ?? [])

  </main>
@endsection

@section('webpagescripts')
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

  <script>
    // sticky effect
    const stickyElement = $("[data-sticky_column]");
    if (stickyElement.length > 0) {
      stickyElement.stick_in_parent({ parent: "[data-sticky_parent]", offset_top: 150 });
    }

    Fancybox.bind("[data-fancybox]", {
      on: {
        "close": (fancybox, eventName) => {
          resetErrorMessages();
          $('#jobApplicationForm')[0].reset();

          // // Find the thumbnail element
          // let thumbnailElement = document.querySelector('.drop-zone__thumb');
          
          // // Remove the thumbnail element if it exists
          // if (thumbnailElement) {
          //   thumbnailElement.remove();
          // }
        },
      }
    });

    // document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    //   const dropZoneElement = inputElement.closest(".drop-zone");

    //   dropZoneElement.addEventListener("click", (e) => {
    //     inputElement.click();
    //   });

    //   inputElement.addEventListener("change", (e) => {
    //     if (inputElement.files.length) {
    //       updateThumbnail(dropZoneElement, inputElement.files[0]);
    //     }
    //   });

    //   dropZoneElement.addEventListener("dragover", (e) => {
    //     e.preventDefault();
    //     dropZoneElement.classList.add("drop-zone--over");
    //   });

    //   ["dragleave", "dragend"].forEach((type) => {
    //     dropZoneElement.addEventListener(type, (e) => {
    //       dropZoneElement.classList.remove("drop-zone--over");
    //     });
    //   });

    //   dropZoneElement.addEventListener("drop", (e) => {
    //     e.preventDefault();

    //     if (e.dataTransfer.files.length) {
    //       inputElement.files = e.dataTransfer.files;
    //       updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    //     }

    //     dropZoneElement.classList.remove("drop-zone--over");
    //   });
    // });

    /**
    * Updates the thumbnail on a drop zone element.
    *
    * @param {HTMLElement} dropZoneElement
    * @param {File} file
    */
    // function updateThumbnail(dropZoneElement, file) {
    //   let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    //   // First time - remove the prompt
    //   if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    //     dropZoneElement.querySelector(".drop-zone__prompt").remove();
    //   }

    //   // First time - there is no thumbnail element, so lets create it
    //   if (!thumbnailElement) {
    //     thumbnailElement = document.createElement("div");
    //     thumbnailElement.classList.add("drop-zone__thumb");
    //     dropZoneElement.appendChild(thumbnailElement);
    //   }

    //   thumbnailElement.dataset.label = file.name;

    //   // Show thumbnail for image files
    //   if (file.type.startsWith("image/")) {
    //     const reader = new FileReader();

    //     reader.readAsDataURL(file);
    //     reader.onload = () => {
    //       thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    //     };
    //   } else {
    //     thumbnailElement.style.backgroundImage = null;
    //   }
    // }
  </script>

  <script>
    $(document).ready(function() {

      $(".careerFormPopup").on("click", function(e){
        const jobId = $(this).data('jobid');
        const jobTitle = $(this).data('jobtitle');

        $("#jobId").val(jobId);
        $("#jobTitle").val(jobTitle);
      });

      $("#jobApplicationForm").on("submit",function(e){
        e.preventDefault();        
        
        const formdata = new FormData(this);
        postForm('jobApplicationForm', 'api/web/career/store', formdata);
      });

      $(".fileInput").on("change", function(e){
        const file = e.target.files[0];
        let errorMessage = '';

        if (file.size > 5242880){
          errorMessage = locale === "en" ? "You have exceeds the maximum upload limit of 5mb." : "첨부파일은 5MB까지 업로드 가능합니다.";
          this.value = ''; // Reset the input
        }

        $("label[for='"+e.target.name+"']").html(errorMessage);
        $(".invalid-feedback").css("display","block");
      });
    });
  </script>
@endsection