<div
  class="modal fade"
  id="mediaLibraryModal"
  tabindex="-1"
  aria-hidden="true"
>

<input
  type="hidden"
  id="mediaPlaceholder"
  name="mediaPlaceholder" />

  <div class="modal-dialog modal-fullscreen library-model">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Media Library</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>

      <div class="modal-body">
        <div class="card galleryContainer">
          <div class="card-header py-3">
            <div class="row g-3 align-items-center">
      
              <div class="col-lg-3 col-12 me-auto">
                <!-- <a href="/media/upload" class="btn btn-primary mb-3 mb-lg-0">
                  <i class="bi bi-plus-square-fill me-2"></i>Upload Media
                </a> -->
              </div>
      
              <div class="col-lg-3 col-12">
                <div class="ms-auto position-relative">
                  <div
                    class="position-absolute top-50 translate-middle-y search-icon px-3"
                  >
                    <i class="bi bi-search"></i>
                  </div>
                  <input
                    class="form-control ps-5"
                    type="text"
                    id="mediaLibrarySearch"
                    placeholder="search" />
                </div>
              </div>
      
              @isset($mediaLibraryGroups)
              @include('backend.partials.inputs.select', [
                'wrapperClass' => 'col-lg-2 col-12',
                'inputLabel' => '',
                'inputId' => 'mediaLibraryGroup',
                'value' => '',
                'placeholder' => 'Select Group',
                'inputOptions' => $mediaLibraryGroups 
              ])
              @endisset
      
              @isset($mediaLibraryYears)
                @include('backend.partials.inputs.select', [
                  'wrapperClass' => 'col-lg-2 col-12',
                  'inputLabel' => '',
                  'inputId' => 'mediaLibraryYear',
                  'value' => '',
                  'placeholder' => 'Select Years',
                  'inputOptions' => $mediaLibraryYears
                ])
              @endisset
      
              <div class="col-lg-2 col-12">
                <button class="btn btn-primary col-12" id="resetFilter">Reset</button>
              </div>
      
            </div>
          </div>
      
          <div class="card-body">
            <div class="product-grid">
              <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-3 galleryCards">
      
              </div>      
            </div>
      
            <nav class="mt-4 me-auto" aria-label="Page navigation">
              <button type="button" class="btn btn-primary mb-3 mb-lg-0" id="loadMoreRecord">Load more</button>
            </nav>
      
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>