@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
<main class="page-content">
  
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
    <div class="breadcrumb-title pe-3">Pages</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="{{ route('cms.account.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Pages
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="pageTable" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Action</th>
              <th>Language</th>
              <th>Name</th>
              <th>Updated Date</th>
              <th>Last Updated By</th>
            </tr>
          </thead>

          <tbody>
            @if (isset($pageRecords) && count($pageRecords) > 0 )
              @foreach ($pageRecords as $page)
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3 fs-6">
                    <a
                      href="{{ route('cms.page.update', $page->code) }}"
                      class="outline-primary"
                      >Edit</a>
                  </div>
                </td>
                <td>
                  <span class="{{ $page->lang === 'en' ? 'badge bg-english' : 'badge bg-korean' }}">{{ $page->lang === 'en' ? 'English' : 'Korean' }}</span>
                </td>
                <td>{{ $page->name }}</td>
                <td>{{ $page->updated_at}}</td>
                <td>{{ $page->admin->name ?? '' }}</td>
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