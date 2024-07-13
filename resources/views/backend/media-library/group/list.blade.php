@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
<main class="page-content">

  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Media Library</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="{{ route('cms.account.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Groups
          </li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
    </div>
  </div>

  <div class="card bg-violet">

    <div class="card-header card-title">
      <h6 class="mb-0">ADD MEDIA GROUP</h6>
    </div>

    <div class="card-body">
      <form id="mediaGroupAddForm" class="row g-3">
              
        @include('backend.partials.inputs.text', [
          'wrapperClass' => 'col-12 col-md-4',
          'inputLabel' => 'Name',
          'inputId' => 'name',
          'placeHolder' => 'Enter name',
          'value' => ''
        ])

        <div class="col-12 col-md-4">
          <div class="d-grid col-md-6">
            <label class="form-label">&nbsp;</label>
            <button type="submit" class="btn btn-primary">Add Group</button>
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
            <table id="mediaGroupTable" class="table align-middle">
              <thead class="table-light">
                <tr>
                  <th>Action</th>
                  <th>Status</th>
                  <th>Name</th>
                  <th>Media Files</th>
                  <th>Created Date</th>
                  <th>Updated Date</th>
                  <th>Last Updated By</th>
                </tr>
              </thead>

              <tbody>

                @if (isset($mediaGroupRecords) && count($mediaGroupRecords) > 0 )
                  @foreach ($mediaGroupRecords as $group)
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        <a
                          href="{{ route('cms.medialibrarygroup.update', $group->id) }}"
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
                          data-itemtodelete="{{ $group->id }}"
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
                      <span class="{{ $group->status === 'A' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $group->status === 'A' ? 'ACTIVE' : 'DEACTIVE' }}</span>
                    </td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->media_count }}</td>
                    <td>{{ date("d-m-Y H:i:s", strtotime($group->created_at)) }}</td>
                    <td>{{ date("d-m-Y H:i:s", strtotime($group->updated_at)) }}</td>
                    <td>{{ $group->admin->name ?? '' }}</td>
    
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