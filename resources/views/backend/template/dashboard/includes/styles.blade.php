<!--plugins-->
<link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

<!-- Bootstrap CSS -->
<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

@if (isset($isListPage) && $isListPage)
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endif

@if (isset($isFormPage) && $isFormPage)
<link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
@endif

@if (isset($activeMenu) && $activeMenu === "medialibrary-crop")
<link  href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.12/dist/cropper.min.css" rel="stylesheet">
@endif

<!-- loader-->
<link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />

<!--Theme Styles-->
<link href="{{ asset('backend/assets/css/dark-theme.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/light-theme.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/semi-dark.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/header-colors.css') }}" rel="stylesheet" />

<link href="{{ asset('backend/plugins/sweetalert/css/sweetalert2.min.css') }}" rel="stylesheet" />

<style>

  /* loader */
  #loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.9);
    z-index: 1000;
  }

  #loader {
    display: block;
    position: absolute;
    left: 50%;
    top: 50%;
    width: 50px;
    height: 50px;
    margin: -25px 0 0 -25px;
    border-radius: 50%;
    border: 5px solid transparent;
    border-top-color: #3498db;
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  /* media library */
  .uploadPic{
    border: 1px solid #6c757d;
    /* width: 100%; */
    height: auto;
    border-radius: 5px;
    position: relative;
    /* padding-bottom: 8px; */
    padding: 1rem;
  }

  .picMediaPreview{
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 5px;
  }

  .uploadPic .btn{
    width: 100%;
    height: 100px;
    /* background: none; */
  }

  .uploadPic ul{
    margin: 0;
    padding: 0;
    list-style-type: none;
  }

  .uploadPic ul li{
    font-size: 13px;
  }

  .media-preview-wrap{
    width: 100%;
    /* display: flex; */
  }

  .media-preview-wrap img{
    width: 100%;
    max-width: 150px;
    max-height: 110px;
    height: auto;
    margin: auto;
    object-fit: cover;
  }

  .media-preview-wrap button{
    position: absolute;
  }

  .media-preview-wrap .closes {
    position: relative;
    top: 0px;
    right: 0px;
    z-index: 100;
    background-color: #e72e2e;
    padding: 3px 3px;
    color: #ffffff;
    font-weight: bold;
    cursor: pointer;
    text-align: center;
    font-size: 13px;
    border-radius: 50%;
    border: 2px solid #ffffff;
  }

  .iconDiv{
    position: relative;
    width: 100%;
    /* bottom: 10px;
    left: 0px; */
    font-size: 13px;
  }

  .iconDiv i{
    font-size: 14px;
  }

  .icon{
    border-radius: 5px;
    border:1px solid #ccc;
    width: 30px;
    height: 30px;
    text-align: center;
    line-height: 30px;
  }

  .galleryContainer .lbImg {
    height: 0; 
    padding-top: 56.6%; 
    position: relative; 
    margin-bottom: 15px;
  }
  
  .galleryContainer .lbImg img {
    width:100%; 
    height:100%; 
    object-fit: contain; 
    position: absolute; 
    top: 0; 
    left: 0;
  }
  
  .galleryContainer .product-title {min-height: 40px;}
  .galleryContainer .btn i { margin-left: 0px; }

  .mediaLibraryUpload .dropzone {
    /* display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center; */
    min-height: 200px;
    padding: 20px;
    border: 2px dashed #ccc;
    border-radius: 10px;
    font-size: 18px;
    color: #888;
    cursor: pointer;
  }

  .mediaLibraryUpload .dropzone:hover {
    background-color: #f2f2f2;
    color: #333;
    border-color: #333;
  }

  .mediaLibraryUpload .dropzone:focus {
    outline: none;
    box-shadow: 0 0 0 2px #2c3e50;
  }

  .mediaLibraryUpload .dropzone p {
    margin: 0;
  }

  .mediaLibraryUpload .file-input {
    display: none;
  }

  .mediaLibraryUpload .dropzone .file-preview {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-top: 10px;
  }

  .mediaLibraryUpload .dropzone .file-preview img {
    display: block;
    width: 80px;
    height: 80px;
    object-fit: cover;
    margin-right: 10px;
  }

  .mediaLibraryUpload .dropzone .file-preview p {
    font-size: 16px;
    font-weight: bold;
    margin: 0;
    word-break: break-word;
  }

  .mediaLibraryUpload .dropzone .error {
    color: red;
    font-size: 16px;
    font-weight: bold;
    margin-top: 10px;
  }

  .mediaLibraryUpload .uploaded-file {
    display: flex;
    align-items: center;
    margin-top: 10px;
    padding: 15px;
    background-color: #f2f2f2;
    border-radius: 5px;
  }

  .mediaLibraryUpload .uploaded-file img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
    object-fit: cover;
  }

  .mediaLibraryUpload .uploaded-file span {
    font-weight: bold;
    flex: 1;
  }

  .mediaLibraryUpload .successfully {color: #2cda89;}
  .mediaLibraryUpload .unsuccessfully {color: red;}

  .redColor{
    background-color: #b90f16;
    border-color: #b90f16;
    margin-left: 9px; 
  } 

  .library-model .lbImg {height: 0; padding-top: 56.6%; position: relative; margin-bottom: 15px;}
  .library-model .lbImg img {width:100%; height:100%; object-fit: contain; position: absolute; top: 0; left: 0;}
  .library-model .product-title {min-height: 40px;}
  
  /* card */
  .card-title{
    background-color: #8932ff!important;
    padding: 11px;
    color: white !important;
    border-radius: 7px;
  }

  .card.bg-violet{
    background-color: #e1d8ed !important;
    border: 1.5px solid #8932ff;
  }

  .card.bg-violet.section-container.error{
    background-color: #ff655f24 !important;
    border: 1.5px solid red;
  }

  .card.bg-violet.section-container.error > div.card-title {
    background-color: #a60037!important;
  }

  /* form label */
  label.form-label, .col-form-label{
    font-weight: 600;
  }

  /* for error message */
  .invalid-feedback {
    font-weight: 500;
  }

  .accordion-header {
    /* Ensures the header takes full width if not already doing so */
    width: 100%;
  }  

  .accordion-button {padding-left: 2.5rem}
  .accordion-button .removeRowBtn {position: absolute; top:18px; right:60px;}
  
  .my-handle { font-size:1rem; position: absolute;left:1rem;}

  .bg-korean{ background-color: #3a3eff!important; padding: 5px; }
  .bg-english{ background-color: #9C27B0!important; padding: 5px; }
  .bg-hybrid{ background-color: #00BCD4!important; padding: 5px; }
  .bg-danger { background-color: #bb1313!important; }
  .bg-success { background-color: #0e811a!important; }
</style>