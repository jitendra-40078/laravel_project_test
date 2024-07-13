<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 2</h6>
      </div>

      <div class="card-body">
        <ul class="nav nav-tabs nav-primary" role="tablist">
          <li class="nav-item" role="presentation">
            <a
              class="nav-link active"
              data-bs-toggle="tab"
              href="#section2Info"
              role="tab"
              aria-selected="true"
            >
              <div class="d-flex align-items-center">
                <div class="tab-icon">
                  <i class="bx bx-copy-alt font-18 me-1"></i>
                </div>
                <div class="tab-title">Info</div>
              </div>
            </a>
          </li>

          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              data-bs-toggle="tab"
              href="#section2Cards"
              role="tab"
              aria-selected="false"
            >
              <div class="d-flex align-items-center">
                <div class="tab-icon">
                  <i class="bx bx-list-ol font-18 me-1"></i>
                </div>
                <div class="tab-title">Cards</div>
              </div>
            </a>
          </li>

        </ul>

        <div class="tab-content py-3">

          <!-- TAB 1 - DETAILS -->
          <div
            class="tab-pane fade show active"
            id="section2Info"
            role="tabpanel"
          >
          @include('backend.page.components.whatRiaas.section2.partials.info')
          </div>

          <div
            class="tab-pane fade"
            id="section2Cards"
            role="tabpanel"
          >
          @include('backend.page.components.whatRiaas.section2.partials.cards')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>