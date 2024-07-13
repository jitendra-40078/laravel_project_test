<div class="row g-3 enFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For English</h6>
      </div>

      <div class="card-body">
        <ul class="nav nav-tabs nav-primary" role="tablist">
          
          <li class="nav-item" role="presentation">
            <a
              class="nav-link active"
              data-bs-toggle="tab"
              href="#englishInfo"
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
              href="#englishCards"
              role="tab"
              aria-selected="false"
            >
              <div class="d-flex align-items-center">
                <div class="tab-icon">
                  <i class="bx bx-list-ol font-18 me-1"></i>
                </div>
                <div class="tab-title">Content</div>
              </div>
            </a>
          </li>

        </ul>

        <div class="tab-content py-3">

          <!-- TAB 1 - DETAILS -->
          <div
            class="tab-pane fade show active"
            id="englishInfo"
            role="tabpanel"
          >
          @include('backend.cms.news.components.english.partials.info')
          </div>

          <div
            class="tab-pane fade"
            id="englishCards"
            role="tabpanel"
          >
          @include('backend.cms.news.components.english.partials.content')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>