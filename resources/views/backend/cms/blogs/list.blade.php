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
            Blogs
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
          <a href="{{ route('cms.blog.add') }}" class="btn btn-outline-primary px-5 float-xl-end w-100 w-xl-auto">Add New Blog</a>
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
        <table id="blogTable" class="table align-middle">
          <thead class="table-light">
            <tr>
              <th>Action</th>
              <th>Status</th>
              <th>Language</th>
              <th>Category</th>
              <th>Title</th>
              <th>Views</th>
              <th>Trending</th>
              <th>Popular</th>
              <th>Publish Date</th>
              <th>Updated Date</th>
              <th>Last Updated By</th>
            </tr>
          </thead>

          <tbody>

            @if (isset($blogRecords) && count($blogRecords) > 0 )
              @foreach ($blogRecords as $blog)
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3 fs-6">
                    <a
                      href="{{ route('cms.blog.update', $blog->id) }}"
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
                      data-itemtodelete="{{ $blog->id }}"
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
                  <span class="{{ $blog->status === 'A' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $blog->status === 'A' ? 'ACTIVE' : 'DEACTIVE' }}</span>
                </td>
                <td>
                  <span class="{{ $blog->language === 'en' ? 'badge bg-english' : ( $blog->language === 'kr' ? 'badge bg-korean' : 'badge bg-hybrid') }}">{{ $blog->language === 'en' ? 'English' : ( $blog->language === 'kr' ? 'Korean' : 'Both') }}</span>
                </td>
                <td>{{ Str::ucfirst( in_array($blog->language ?? 'en', ['en', 'both']) ? ($blog->category->nameEn ?? '') : ($blog->category->nameKr ?? '') ) }}</td>
                <td>{{ in_array($blog->language ?? 'en', ['en', 'both']) ? $blog->title['en'] : $blog->title['kr'] }}</td>
                <td>{{ $blog->views ?? 0  }}</td>
                <td>{{ Str::ucfirst( $blog->is_trending ?? '' )  }}</td>
                <td>{{ Str::ucfirst( $blog->is_popular ?? '' )  }}</td>
                <td>{{ $blog->publish_date ? date("d-m-Y", strtotime($blog->publish_date)) : '' }}</td>
                <td>{{ $blog->updated_at ? date("d-m-Y", strtotime($blog->updated_at)) : '' }}</td>
                <td>{{ $blog->admin->name ?? '' }}</td>
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