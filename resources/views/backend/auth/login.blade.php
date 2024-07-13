@extends('backend.template.auth.auth')

@section('authcontent')
<main class="authentication-content">
  <div class="container-fluid">
    <div class="authentication-card">
      <div class="card shadow rounded-5 overflow-hidden">
        <div class="row g-0">

          <div class="col-lg-6 d-flex align-items-center justify-content-center border-end">
            <img src="https://img.freepik.com/free-vector/secure-data-concept-illustration_114360-2510.jpg?w=740&t=st=1662791352~exp=1662791952~hmac=d90f717a99823008ce52a92f59fc382488f46baa82e2bfb150908a693efadd4b" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6">
            <div class="card-body p-4 p-sm-5">
              <!-- <h5 class="card-title">Sign In</h5> -->

              <form class="form-body" id="signinForm">
                <div class="d-block login-logo">
                  <img class="me-2" src="{{ asset('backend/assets/images/dareesoft-logo.svg') }}" alt="dareesoft logo">
                </div>

                <div class="login-separater text-center mb-4"><hr></div> 
                
                <!-- bi-check, bi-x, bi-exclamation-triangle, bi-info-circle -->
                <div 
                  id="dangerAlert" 
                  class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible show fade py-2">
                  <div class="d-flex align-items-center">
                    <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div class="ms-3">
                      <div class="text-danger alert-box-text"></div>
                    </div>
                  </div>
                  <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>

                <div class="row g-3">
                  
                  <div class="col-12">
                    <label class="form-label">Enter Username</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                      <input 
                        type="text" 
                        class="form-control radius-30 ps-5" 
                        id="username" 
                        name="username" 
                        placeholder="Enter username">
                    </div>
                    <label for="username" class="invalid-feedback"></label>
                  </div>

                  <div class="col-12">
                    <label class="form-label">Enter Password</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                      <input 
                        type="password" 
                        class="form-control radius-30 ps-5" 
                        id="password" 
                        name="password"
                        placeholder="Enter Password">
                    </div>
                    <label for="password" class="invalid-feedback"></label>
                  </div>

                  <div class="col-6">
                    <!-- <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                      <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                    </div> -->
                  </div>

                  <div class="col-6 text-end">	
                    <!-- <a href="/admin/forgot-password">Forgot Password ?</a> -->
                  </div>
                    
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                    </div>
                  </div>
                    
                  <!-- <div class="col-12">
                    <p class="mb-0">Don't have an account yet? <a href="authentication-signup.html">Sign up here</a></p>
                  </div> -->
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection