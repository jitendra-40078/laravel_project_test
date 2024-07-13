<!-- Bootstrap bundle JS -->
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

<!--plugins-->
<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>

<!--app-->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('backend/plugins/sweetalert/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('backend/vendor/js/collections/routes.js') }}"></script>
<script src="{{ asset('backend/vendor/js/http.js') }}"></script>

@if (isset($activeMenu) && $activeMenu === "dashboard")
<!-- <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script> -->
<!-- <script src="assets/js/index.js"></script> -->
@endif

@if (isset($activeMenu) && $activeMenu === "medialibrary-crop")
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.12/dist/cropper.min.js"></script>
@endif

@if (isset($enableMediaLibrary) && $enableMediaLibrary)
<script src="{{ asset('backend/vendor/js/media-library.js') }}{{ $assetVersion }}"></script>
@endif

@if (isset($isListPage) && $isListPage)
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend/vendor/js/table.js') }}{{ $assetVersion }}"></script>
<script>const isListPage = '{{ $isListPage }}'; </script>  
@endif

@if (isset($isFormPage) && $isFormPage)
<script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script src="{{ asset('backend/vendor/js/form-addons.js') }}{{ $assetVersion }}"></script>
@endif

<script>const enableMediaLibrary = '{{ $enableMediaLibrary ?? '' }}'; </script>
<script>const isFormPage = '{{ $isFormPage ?? '' }}'; </script>
<script>const isEditFormPage = '{{ $isEditFormPage ?? '' }}'; </script>
<script>const activeMenu = '{{ $activeMenu ?? '' }}'; </script>
<script>const MEDIA_URL = '{{ url('') }}'; </script>

@if (isset($customScriptName) && $customScriptName)
<script src="{{ asset('backend/vendor/js/'.$customScriptName.'.js') }}{{ $assetVersion }}"></script>
@endif