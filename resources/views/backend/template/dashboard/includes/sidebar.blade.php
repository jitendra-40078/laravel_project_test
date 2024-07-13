<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img
        src="{{ asset('backend/assets/images/favIcon.png') }}"
        class="logo-icon"
        alt="logo icon"
      />
    </div>
    <div>
      <h4 class="logo-text">DareeSoft</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class="bi bi-list"></i></div>
  </div>

  <!--navigation-->
  <ul class="metismenu" id="menu">
    
    <li>
      <a href="/cms/dashboard">
        <div class="parent-icon"><i class="lni lni-dashboard"></i></div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>

    <hr />

    @if ( Auth::guard('admin')->check() && Auth::guard('admin')->user()->type === 'SA' )
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="lni lni-users"></i></div>
        <div class="menu-title">Administration</div>
      </a>
      <ul>
        <li>
          <a href="/admin/roles"><i class="lni lni-angle-double-right"></i>Manage roles</a>
        </li>
        <li>
          <a href="/admin/users"><i class="lni lni-angle-double-right"></i>Manage users</a>
        </li>
      </ul>
    </li>    
    @endif

    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="lni lni-gallery"></i></div>
        <div class="menu-title">Media library</div>
      </a>
      <ul>
        <li><a href="/cms/media-library/group"><i class="lni lni-angle-double-right"></i>Groups</a></li>
        <li><a href="/cms/media-library"><i class="lni lni-angle-double-right"></i>Library</a></li>
      </ul>
    </li>

    {{-- <li class="menu-label">CMS</li> --}}
    <hr />

    <!-- PAGE WISE CMS -->
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="lni lni-display-alt"></i></div>
        <div class="menu-title">CMS</div>
      </a>

      <ul>
        <!-- PAGES -->
        <li>
          <a href="{{ route('cms.page.list') }}">
            <div class="parent-icon"><i class="lni lni-library"></i></div>
            <div class="menu-title">Pages</div>
          </a>
        </li>

        <!-- TESTIMONIAL -->
        <li>
          <a href="{{ route('cms.testimonial.list') }}">
            <div class="parent-icon"><i class="lni lni-video"></i></div>
            <div class="menu-title">Testimonials</div>
          </a>
        </li>

        <!-- PRODUCTS -->
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-cart"></i></div>
            <div class="menu-title">Products</div>
          </a>
          <ul>
            <li><a href="{{ route('cms.productProperty.list') }}"><i class="lni lni-angle-double-right"></i>Properties</a></li>
            <li><a href="{{ route('cms.product.list') }}"><i class="lni lni-angle-double-right"></i>Products</a></li>
          </ul>
        </li>

        <!-- CASE STUDY -->
        <li>
          <a href="{{ route('cms.casestudy.list') }}">
            <div class="parent-icon"><i class="lni lni-write"></i></div>
            <div class="menu-title">Case Study</div>
          </a>
        </li>

        <!-- MILESTONE -->
        <li>
          <a href="{{ route('cms.milestone.list') }}">
            <div class="parent-icon"><i class="lni lni-cup"></i></div>
            <div class="menu-title">Milestones</div>
          </a>
        </li>

        <!-- LEADERSHIP -->
        <li>
          <a href="{{ route('cms.leadership.list') }}">
            <div class="parent-icon"><i class="lni lni-users"></i></div>
            <div class="menu-title">Leadership</div>
          </a>
        </li>

        <!-- LEADERSHIP -->
        <li>
          <a href="{{ route('cms.office.list') }}">
            <div class="parent-icon"><i class="lni lni-apartment"></i></div>
            <div class="menu-title">Offices</div>
          </a>
        </li>

        <!-- NEWS -->
        <li>
          <a href="{{ route('cms.news.list') }}">
            <div class="parent-icon"><i class="lni lni-world-alt"></i></div>
            <div class="menu-title">News</div>
          </a>
        </li>

        <!-- JOBS -->
        <li>
          <a href="{{ route('cms.job.list') }}">
            <div class="parent-icon"><i class="lni lni-briefcase"></i></div>
            <div class="menu-title">Jobs</div>
          </a>
        </li>
        
        <!-- BLOGS -->
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-gallery"></i></div>
            <div class="menu-title">Blogs</div>
          </a>
          <ul>
            <li><a href="{{ route('cms.blogcategory.list') }}"><i class="lni lni-angle-double-right"></i>Category</a></li>
            <li><a href="{{ route('cms.blog.list') }}"><i class="lni lni-angle-double-right"></i>Blogs</a></li>
          </ul>
        </li>

      </ul>
    </li>

    <hr />
    
    <!-- ENQUIRIES -->
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="lni lni-wechat"></i></div>
        <div class="menu-title">Enquiry</div>
      </a>

      <ul>
        <!-- CONTACT US -->
        <li>
          <a href="{{ route('cms.enquiry.contact') }}">
            <div class="parent-icon"><i class="lni lni-phone"></i></div>
            <div class="menu-title">Contact Us</div>
          </a>
        </li>

        <!-- NEWSLETTER -->
        <li>
          <a href="{{ route('cms.enquiry.career') }}">
            <div class="parent-icon"><i class="lni lni-briefcase"></i></div>
            <div class="menu-title">Career</div>
          </a>
        </li>

        <!-- NEWSLETTER -->
        <li>
          <a href="{{ route('cms.enquiry.newsletter') }}">
            <div class="parent-icon"><i class="lni lni-envelope"></i></div>
            <div class="menu-title">Newsletter</div>
          </a>
        </li>

      </ul>
    </li>

    <hr />

    <!-- SETTINGS -->
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="lni lni-cog"></i></div>
        <div class="menu-title">Settings</div>
      </a>

      <ul>
        <!-- EMAILER SETTING -->
        <li>
          <a href="{{ route('cms.settings.email') }}">
            <div class="parent-icon"><i class="lni lni-envelope"></i></div>
            <div class="menu-title">Emails</div>
          </a>
        </li>

        <li>
          <a href="{{ route('cms.master-permission.list') }}">
            <div class="parent-icon"><i class="lni lni-envelope"></i></div>
            <div class="menu-title">Permissions</div>
          </a>
        </li>

        <!-- MASTERS -->
        {{-- <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-gallery"></i></div>
            <div class="menu-title">Masters</div>
          </a>
          <ul>
            <li>
              <a href="{{ route('cms.master-permission.list') }}"><i class="lni lni-angle-double-right"></i>Permissions</a>
            </li>
          </ul>
        </li> --}}

      </ul>
    </li>

  </ul>
  <!--end navigation-->
</aside>

{{-- file:///C:/development/template/snacked/icons-boxicons.html --}}

{{-- settings - cog --}}