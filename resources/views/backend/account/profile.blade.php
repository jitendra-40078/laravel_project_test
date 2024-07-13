@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
<main class="page-content">
  
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
    <div class="breadcrumb-title pe-3">Account</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="{{ route('cms.account.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            My Profile
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->

  <div class="row">

    <!-- Personal Information -->
    <div class="col-xl-6">
      <div class="card bg-violet">
        
        <div class="card-header card-title">
          <h6 class="mb-0">USER INFORMATION</h6>
        </div>

        <div class="card-body">
          <form id="profileUpdateForm">

            <div class="row mb-3">
              <label
                for="inputEnterYourName"
                class="col-sm-3 col-form-label"
                >Name</label>
              <div class="col-sm-9">

                <input 
                  type="text" 
                  id="name" 
                  name="name"
                  class="form-control" 
                  value="{{ $userInfo->name ?? '' }}" />
                <label for="name" class="invalid-feedback"></label>
              </div>
            </div>

            <div class="row mb-3">
              <label
                for="inputEmailAddress2"
                class="col-sm-3 col-form-label"
                >Email</label>
              <div class="col-sm-9">
                <input 
                  type="email" 
                  id="email" 
                  name="email"
                  class="form-control" 
                  value="{{ $userInfo->email ?? '' }}" />
                  <label for="email" class="invalid-feedback"></label>
              </div>
            </div>

            <div class="row mb-3">
              <label
                for="inputEnterYourName"
                class="col-sm-3 col-form-label"
                >Username</label>
              <div class="col-sm-9">
                <input 
                  type="text" 
                  id="username" 
                  name="username"
                  class="form-control" 
                  value="{{ $userInfo->username ?? '' }}" />
                <label for="username" class="invalid-feedback"></label>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-3 col-form-label"></label>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-primary px-5">
                  Save changes
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

    <!-- Change password -->
    <div class="col-xl-6">
      <div class="card bg-violet">

        <div class="card-header card-title">
          <h6 class="mb-0">CHANGE PASSWORD</h6>
        </div>

        <div class="card-body">
          <div class="border p-4 rounded">
            
            <p>
              <strong>Note</strong> - The password must contain letters and digits, include at least one uppercase letter, and only special characters @, $, ! are allowed.
            </p>

            <hr />

            <form id="passwordUpdateForm">
              <div class="row mb-3">
                <label
                  for="inputChoosePassword2"
                  class="col-sm-3 col-form-label"
                  >Old Password</label>
                <div class="col-sm-9">
                  <input
                    type="password" 
                    id="oldPassword" 
                    name="oldPassword"
                    class="form-control" />
                  <label for="oldPassword" class="invalid-feedback"></label>
                </div>
              </div>

              <div class="row mb-3">
                <label
                  for="inputChoosePassword2"
                  class="col-sm-3 col-form-label"
                  >New Password</label>
                <div class="col-sm-9">
                  <input
                    type="password" 
                    id="newPassword" 
                    name="newPassword"
                    class="form-control" />
                  <label for="newPassword" class="invalid-feedback"></label>
                </div>
              </div>

              <div class="row mb-3">
                <label
                  for="inputConfirmPassword2"
                  class="col-sm-3 col-form-label"
                  >Confirm Password</label
                >
                <div class="col-sm-9">
                  <input
                    type="password" 
                    id="cnfPassword" 
                    name="cnfPassword"
                    class="form-control" />
                  <label for="cnfPassword" class="invalid-feedback"></label>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-primary px-5">
                    Save changes
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--end row-->
</main>
@endsection