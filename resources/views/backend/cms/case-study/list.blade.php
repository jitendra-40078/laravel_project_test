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
            Case Study
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
          <a href="{{ route('cms.casestudy.add') }}" class="btn btn-outline-primary px-5 float-xl-end w-100 w-xl-auto">Add New Case Study</a>
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
        <table id="casestudyTable" class="table align-middle">
          <thead class="table-light">
            <tr>
              <th>Action</th>
              <th>Status</th>
              <th>Language</th>
              <th>Title</th>
              <th>Created Date</th>
              <th>Updated Date</th>
              <th>Last Updated By</th>
            </tr>
          </thead>

          <tbody>

            @if (isset($casestudyRecords) && count($casestudyRecords) > 0 )
              @foreach ($casestudyRecords as $casestudy)
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3 fs-6">
                    <a
                      href="{{ route('cms.casestudy.update', $casestudy->id) }}"
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
                      data-itemtodelete="{{ $casestudy->id }}"
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
                  <span class="{{ $casestudy->status === 'A' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $casestudy->status === 'A' ? 'ACTIVE' : 'DEACTIVE' }}</span>
                </td>
                <td>
                  <span class="{{ $casestudy->language === 'en' ? 'badge bg-english' : ( $casestudy->language === 'kr' ? 'badge bg-korean' : 'badge bg-hybrid') }}">{{ $casestudy->language === 'en' ? 'English' : ( $casestudy->language === 'kr' ? 'Korean' : 'Both') }}</span>
                </td>

                <td>{{  in_array($casestudy->language, ['en', 'both']) ? $casestudy->title['en'] : $casestudy->title['kr'] }}</td>
                <td>{{ date("d-m-Y H:i:s", strtotime($casestudy->created_at)) }}</td>
                <td>{{ date("d-m-Y H:i:s", strtotime($casestudy->updated_at)) }}</td>
                <td>{{ $casestudy->admin->name ?? '' }}</td>

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