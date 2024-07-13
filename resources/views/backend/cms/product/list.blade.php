@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
<main class="page-content">

  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">CMS</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="{{ route('cms.account.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Products
          </li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
    </div>
  </div>

  <div class="card">
    
    <div class="card-header py-3">
      <div class="row g-3">
        <!-- Full width on mobile, right-aligned on desktop -->
        <div class="col-12 col-xl-4">
          <a href="{{ route('cms.product.add') }}" class="btn btn-outline-primary px-5 float-xl-end w-100 w-xl-auto">Add New Product</a>
        </div>

        <!-- Hidden on xs to lg, visible on xl -->
        <div class="col-xl-4 d-none d-xl-block">
        </div>

        <!-- Hidden on xs to lg, visible on xl -->
        <div class="col-xl-4 d-none d-xl-block">
        </div>

      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="productTable" class="table align-middle">
          <thead class="table-light">
            <tr>
              <th>Action</th>
              <th>Status</th>
              <th>Language</th>
              <th>Image</th>
              <th>Name</th>
              <th>Created Date</th>
              <th>Updated Date</th>
              <th>Last Updated By</th>
            </tr>
          </thead>

          <tbody>

            @if (isset($productRecords) && count($productRecords) > 0 )
              @foreach ($productRecords as $product)
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3 fs-6">
                    <a
                      href="{{ route('cms.product.update', $product->id) }}"
                      class="text-warning"
                      data-bs-toggle="tooltip"
                      data-bs-placement="bottom"
                      title=""
                      data-bs-original-title="Edit info"
                      aria-label="Edit"
                      ><i class="bi bi-pencil-fill"></i
                    ></a>
                    <a
                      href="javascript:;"
                      class="text-danger deleteBtn"
                      data-itemtodelete="{{ $product->id }}"
                      data-bs-toggle="tooltip"
                      data-bs-placement="bottom"
                      title=""
                      data-bs-original-title="Delete"
                      aria-label="Delete"
                      ><i class="bi bi-trash-fill"></i
                    ></a>
                  </div>
                </td>
                <td>
                  <span class="{{ $product->status === 'A' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $product->status === 'A' ? 'ACTIVE' : 'DEACTIVE' }}</span>
                </td>
                <td>
                  <span class="{{ $product->language === 'en' ? 'badge bg-english' : ( $product->language === 'kr' ? 'badge bg-korean' : 'badge bg-hybrid') }}">{{ $product->language === 'en' ? 'English' : ( $product->language === 'kr' ? 'Korean' : 'Both') }}</span>
                </td>
                <td>
                  <img src="{{ asset(in_array($product->language ?? 'en', ['en', 'both']) ? $product->image['en'] : $product->image['kr']) }}" class="img-fluid" width="100" height="auto" />
                </td>
                <td>{{ in_array($product->language ?? 'en', ['en', 'both']) ? $product->name['en'] : $product->name['kr'] }}</td>
                <td>{{ $product->created_at ? date("d-m-Y", strtotime($product->created_at)) : '' }}</td>
                <td>{{ $product->updated_at ? date("d-m-Y", strtotime($product->updated_at)) : '' }}</td>
                <td>{{ $product->admin->name ?? '' }}</td>
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection