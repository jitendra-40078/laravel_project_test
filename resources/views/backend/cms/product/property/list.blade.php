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
          <li class="breadcrumb-item">
            <a href="{{ route('cms.product.list') }}">Products</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Properties
          </li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
    </div>
  </div>

  <div class="card bg-violet">

    <div class="card-header card-title">
      <h6 class="mb-0">ADD PRODUCT PROPERTY</h6>
    </div>

    <div class="card-body">
      <form id="productPropertyAddForm" class="row g-3">
              
        @include('backend.partials.inputs.text', [
          'wrapperClass' => 'col-12 col-md-4',
          'inputLabel' => 'Name (English)',
          'inputId' => 'nameEn',
          'placeHolder' => 'Enter name',
          'value' => ''
        ])

        @include('backend.partials.inputs.text', [
          'wrapperClass' => 'col-12 col-md-4',
          'inputLabel' => 'Name (Korean)',
          'inputId' => 'nameKr',
          'placeHolder' => 'Enter name',
          'value' => ''
        ])

        <div class="col-12 col-md-4">
          <div class="d-grid col-md-6">
            <label class="form-label">&nbsp;</label>
            <button type="submit" class="btn btn-primary">Add Property</button>
          </div>
        </div>

      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="productPropertyTable" class="table align-middle">
              <thead class="table-light">
                <tr>
                  <th>Action</th>
                  <th>Status</th>
                  <th>Name (En)</th>
                  <th>Name (Kr)</th>
                  <th>Created Date</th>
                  <th>Updated Date</th>
                  <th>Last Updated By</th>
                </tr>
              </thead>

              <tbody>

                @if (isset($propertyRecords) && count($propertyRecords) > 0 )
                  @foreach ($propertyRecords as $property)
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        <a
                          href="{{ route('cms.productProperty.update', $property->id) }}"
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
                          data-itemtodelete="{{ $property->id }}"
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
                      <span class="{{ $property->status === 'A' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $property->status === 'A' ? 'ACTIVE' : 'DEACTIVE' }}</span>
                    </td>
                    <td>{{ $property->nameEn ?? '' }}</td>
                    <td>{{ $property->nameKr ?? '' }}</td>
                    <td>{{ date("d-m-Y", strtotime($property->created_at)) }}</td>
                    <td>{{ date("d-m-Y", strtotime($property->updated_at)) }}</td>
                    <td>{{ $property->admin->name ?? '' }}</td>
    
                  </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection