@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
<main class="page-content">

  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Enquiry</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="{{ route('cms.account.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Job Applications
          </li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
    </div>
  </div>

  <div class="card">
    
    <div class="card-body">
      <div class="table-responsive">
        <table id="careerTable" class="table align-middle">
          
          <thead class="table-light">
            <tr>
              <th>Date</th>
              <th>Position</th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Resume</th>
              <th>Cover Letter</th>
              <th>Other Doc</th>
            </tr>
          </thead>

          <tbody>
            @if (isset($jobRecords) && count($jobRecords) > 0 )
              @foreach ($jobRecords as $r)
              <tr>
                <td>{{ date("d-m-Y", strtotime($r->created_at)) }}</td>
                <td>{{ in_array($r->job->language ?? '', ['en', 'both']) ? ($r->job->title['en'] ?? '') : ($r->job->title['kr'] ?? '') }}</td>
                <td>{{ $r->first_name.' '.$r->last_name }}</td>
                <td>{{ $r->email }}</td>
                <td>{{ $r->mobile }}</td>
                <td><a href="{{ asset($r->resume) }}" target="_blank">view</a></td>
                <td>
                  @if ($r->cover_letter)
                  <a href="{{ asset($r->cover_letter) }}" target="_blank">view</a>
                  @endif
                </td>
                <td>
                  @if ($r->other_doc)
                  <a href="{{ asset($r->other_doc) }}" target="_blank">view</a></td>
                  @endif
                </td>
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