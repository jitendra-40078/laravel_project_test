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
            Milestones
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
          <a href="{{ route('cms.milestone.add') }}" class="btn btn-outline-primary px-5 float-xl-end w-100 w-xl-auto">Add New Milestone</a>
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
        <table id="milestoneTable" class="table align-middle">
          <thead class="table-light">
            <tr>
              <th>Action</th>
              <th>Status</th>
              <th>Language</th>
              <th>Year</th>
              <th>Month</th>
              <th>Milestone</th>
              <th>Created Date</th>
              <th>Updated Date</th>
              <th>Last Updated By</th>
            </tr>
          </thead>

          <tbody>

            @if (isset($milestoneRecord) && count($milestoneRecord) > 0 )
              @foreach ($milestoneRecord as $milestone)
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3 fs-6">
                    <a
                      href="{{ route('cms.milestone.update', $milestone->id) }}"
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
                      data-itemtodelete="{{ $milestone->id }}"
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
                  <span class="{{ $milestone->status === 'A' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $milestone->status === 'A' ? 'ACTIVE' : 'DEACTIVE' }}</span>
                </td>
                <td>
                  <span class="{{ $milestone->language === 'en' ? 'badge bg-english' : ( $milestone->language === 'kr' ? 'badge bg-korean' : 'badge bg-hybrid') }}">{{ $milestone->language === 'en' ? 'English' : ( $milestone->language === 'kr' ? 'Korean' : 'Both') }}</span>
                </td>
                <td>{{ $milestone->year }}</td>
                <td>{{ $milestone->month }}</td>
                <td>{!!  in_array($milestone->language, ['en', 'both']) ? $milestone->content['en'] : $milestone->content['kr'] !!}</td>
                <td>{{ date("d-m-Y H:i:s", strtotime($milestone->created_at)) }}</td>
                <td>{{ date("d-m-Y H:i:s", strtotime($milestone->updated_at)) }}</td>
                <td>{{ $milestone->admin->name ?? '' }}</td>

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