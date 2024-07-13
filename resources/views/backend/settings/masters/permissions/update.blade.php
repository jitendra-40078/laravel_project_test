@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
<main class="page-content">

  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
    <div class="breadcrumb-title pe-3">Settings</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="{{ route('cms.account.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item">Masters</li>
          <li class="breadcrumb-item">
            <a href="{{ route('cms.master-permission.list') }}">Permissions</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Update Permission
          </li>
        </ol>
      </nav>
    </div>
  </div>

  @if ($permissionData)
  <div class="row">
    <div class="col-12 mx-auto">
      <div class="card bg-violet">

        <div class="card-header card-title">
          <h6 class="mb-0">UPDATE PERMISSION</h6>
        </div>

        <div class="card-body">
          <div class="border rounded">
            <form class="row g-3" id="rolePermissionUpdateForm">

              @include('backend.partials.inputs.hidden', [
                'inputId' => 'id',
                'value' => $permissionData->id ?? ''
              ])

              @include('backend.partials.inputs.hidden', [
                'inputId' => 'exName',
                'value' => $permissionData->name ?? ''
              ])

              @include('backend.partials.inputs.text', [
                'wrapperClass' => 'col-12 col-md-4',
                'inputLabel' => 'Name',
                'inputId' => 'name',
                'placeHolder' => 'Enter name',
                'value' => $permissionData->name ?? ''
              ])

              @include('backend.partials.inputs.select', [
                'wrapperClass' => 'col-12 col-md-2',
                'inputLabel' => 'Status',
                'inputId' => 'status',
                'value' => $permissionData->status ?? '',
                'inputOptions' => [
                  ['id' => 'A', 'name' => 'Active'],
                  ['id' => 'D', 'name' => 'Deactive']
                ]
              ])

              <div class="col-12">
                <button type="submit" class="btn btn-primary px-4">Update</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>    
  @endif

</main>
@endsection