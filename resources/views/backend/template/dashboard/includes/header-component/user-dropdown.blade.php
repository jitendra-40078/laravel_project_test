<li class="nav-item dropdown dropdown-user-setting">
  <a
    class="nav-link dropdown-toggle dropdown-toggle-nocaret"
    href="#"
    data-bs-toggle="dropdown"
  >
    <div class="user-setting d-flex align-items-center">
      <img
        src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}"
        class="user-img"
        alt=""
      />
    </div>
  </a>
  <ul class="dropdown-menu dropdown-menu-end">
    <li>
      <a class="dropdown-item" href="#">
        <div class="d-flex align-items-center">
          <img
            src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}"
            alt=""
            class="rounded-circle"
            width="54"
            height="54"
          />
          <div class="ms-3">
            @if ( Auth::guard('admin')->check() && Auth::guard('admin')->user()->name )
            <h6 class="mb-0 dropdown-user-name">{{  ucfirst(Auth::guard('admin')->user()->name ?? 'Admin') }}</h6>
            <!-- <small class="mb-0 dropdown-user-designation text-secondary">HR Manager</small> -->
            @endif
          </div>
        </div>
      </a>
    </li>

    <li><hr class="dropdown-divider" /></li>

    <li>
      <a class="dropdown-item" href="{{ route('cms.account.profile') }}">
        <div class="d-flex align-items-center">
          <div class=""><i class="bi bi-person-fill"></i></div>
          <div class="ms-3"><span>Profile</span></div>
        </div>
      </a>
    </li>

    <li><hr class="dropdown-divider" /></li>

    <li>
      <a
        class="dropdown-item"
        href="{{ route('api.admin.logout') }}">
        <div class="d-flex align-items-center">
          <div class=""><i class="bi bi-lock-fill"></i></div>
          <div class="ms-3"><span>Logout</span></div>
        </div>
      </a>
    </li>
  </ul>
</li>