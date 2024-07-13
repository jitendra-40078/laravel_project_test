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
            Newsletter
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
        <table id="newletterTable" class="table align-middle">
          <thead class="table-light">
            <tr>
              <th>Date</th>
              <th>Email</th>
            </tr>
          </thead>

          <tbody>

            @if (isset($newsletterRecords) && count($newsletterRecords) > 0 )
              @foreach ($newsletterRecords as $newsletter)
              <tr>
                <td>{{ date("d-m-Y", strtotime($newsletter->created_at)) }}</td>
                <td>{{ $newsletter->email }}</td>
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