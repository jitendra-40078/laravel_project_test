<div class="row g-3 krFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For Korean</h6>
      </div>

      <div class="card-body">
        <ul class="nav nav-tabs nav-primary" role="tablist">

          <li class="nav-item" role="presentation">
            <a
              class="nav-link active"
              data-bs-toggle="tab"
              href="#koreanInfo"
              role="tab"
              aria-selected="true"
            >
              <div class="d-flex align-items-center">
                <div class="tab-icon">
                  <i class="bx bx-copy-alt font-18 me-1"></i>
                </div>
                <div class="tab-title">Basic Info</div>
              </div>
            </a>
          </li>

          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              data-bs-toggle="tab"
              href="#koreanFeatures"
              role="tab"
              aria-selected="false"
            >
              <div class="d-flex align-items-center">
                <div class="tab-icon">
                  <i class="bx bx-list-ol font-18 me-1"></i>
                </div>
                <div class="tab-title">Features</div>
              </div>
            </a>
          </li>

          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              data-bs-toggle="tab"
              href="#koreanProperties"
              role="tab"
              aria-selected="false"
            >
              <div class="d-flex align-items-center">
                <div class="tab-icon">
                  <i class="bx bx-list-ol font-18 me-1"></i>
                </div>
                <div class="tab-title">Properties</div>
              </div>
            </a>
          </li>
        </ul>

        <div class="tab-content py-3">

          <!-- TAB 1 - DETAILS -->
          <div
            class="tab-pane fade show active"
            id="koreanInfo"
            role="tabpanel"
          >
          @include('backend.cms.product.components.korean.partials.info')
          </div>

          <div
            class="tab-pane fade"
            id="koreanFeatures"
            role="tabpanel"
          >
          @include('backend.page.shared.layouts.layout-6', [
            "sectionId" => "featuresKr",
            "sectionData" => $features['kr'] ?? [],
            "elements" => [],
            "counter" => 1,
            "imageLabel" => "Image (200 x 200 px)"
          ])
          </div>

          <div
            class="tab-pane fade"
            id="koreanProperties"
            role="tabpanel"
          >
          @include('backend.cms.product.components.korean.partials.property')
          </div>

        </div>
      </div>
    </div>
  </div>
</div>