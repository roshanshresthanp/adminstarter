 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{$setting->company_favicon??Storage::disk('uploads')->url('noimage.jpg') }}" alt="{{ $setting->company_name }}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $setting->company_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <a href="{{ env('APP_URL') }}" target="_blank" class="nav-link">
                    <i class="nav-icon fas fa-globe"></i>
                    <p>
                        Website
                    </p>
                </a>
            </div>
        </li>

          <li class="nav-item {{request()->is('dashboard')? 'menu-open':'' }}">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/user*')? 'menu-open':'' }} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item {{ request()->is('admin/message*')? 'menu-open':'' }} ">
            <a href="{{ route('message.index') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Customer Mail
              </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/subscribers')? 'menu-open':'' }} ">
            <a href="{{ route('subscribers.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Subscribers
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('admin/enroll-course*')? 'menu-open':'' }} ">
            <a href="{{ route('enroll-course.index') }}" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Course Enrollments
              </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is(['admin/student-inquiry*'])? 'menu-open':'' }} ">
            <a href="{{ route('student-inquiry.index') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Student Inquiry
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('admin/student-admission*')? 'menu-open':'' }} ">
            <a href="{{ route('admission.index') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Student Admission
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('admin/student-registration*')? 'menu-open':'' }} ">
            <a href="{{ route('registration.index') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Student Registration
              </p>
            </a>
          </li>
          {{-- <li class="nav-item {{ request()->is('admin/booking*')? 'menu-open':'' }} ">
            <a href="{{ route('booking.index') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Bookings
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item {{ request()->is(['admin/booking*','admin/booking-product*','admin/booking-course*'])? 'menu-open':'' }} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Bookings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('booking.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Plan Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('booking-product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('booking-course.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Booking</p>
                </a>
              </li>
            </ul>
          </li> --}}

            <li class="nav-item">
                <div class="user-panel d-flex">
                    <a href="#" class="nav-link">
                        <p>
                            All CMS
                        </p>
                    </a>
                </div>
            </li>

        <li class="nav-item  {{ request()->is('admin/slider*')? 'menu-open':'' }} ">
            <a href="{{ route('slider.index') }}" class="nav-link">
              <i class="fas fa-film nav-icon"></i>
              <p>Sliders</p>
            </a>
          </li>
          <li class="nav-item {{ request()->is(['admin/popup*'])? 'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-image"></i>
              <p>
                Pop Up
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('popup.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View popups</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('popup.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create popup</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item  {{ request()->is('admin/menu*')? 'menu-open':'' }} ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Menus
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('menu.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Menu List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('menu.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create Menu</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item  {{ request()->is('admin/content*')? 'menu-open':'' }} ">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                  Content
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('content.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Content</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{ route('content.create') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create new Content</p>
                  </a>
              </li>
          </ul>
      </li>

        <li class="nav-item {{ request()->is(['admin/blogs*','admin/blog-category*'])? 'menu-open':'' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Blogs
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('blog-category.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create Blog Category</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('blogs.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Blogs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('blogs.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create New Blog</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item {{ request()->is(['admin/news*'])? 'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                News
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('news.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View News</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('news.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create News</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item {{ request()->is(['admin/notices*'])? 'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                Notice
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('notices.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Notices</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('notices.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Notice</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item {{ request()->is(['admin/courses*','admin/course-category*'])? 'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Courses
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('course-category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('courses.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('courses.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New Course</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ request()->is(['admin/features*'])? 'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Features | Benefits
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('features.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Features</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('features.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New Feature</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item {{ request()->is('admin/team*')? 'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Team
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('teamType.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Team Category</p>
                    </a>
                  </li>

              <li class="nav-item">
                <a href="{{ route('team.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('team.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Team</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ request()->is('admin/testimonial*')? 'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-comment-dots"></i>
              <p>
                Testimonials
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('testimonial.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('testimonial.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Testimonial</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item  {{ request()->is('admin/album*')? 'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Album
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('album.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Albums</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('album.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Album</p>
                </a>
              </li>
            </ul>
          </li>

         <li class="nav-item {{ request()->is('admin/partner*')? 'menu-open':'' }}">
            <a href="{{ route('partner.index') }}" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Partners
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <div class="user-panel">
                <a href="#" class="nav-link">
                    <p>
                        Settings
                    </p>
                </a>
            </div>
        </li>

          <li class="nav-item {{ request()->is(['admin/setting','admin/socialMedia'])? 'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('setting.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('socialMedia') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Media</p>
                </a>
              </li>
            {{-- <li class="nav-item">
              <a href="{{ route('aboutUs') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>About Us</p>
              </a>
            </li> --}}
              {{-- <li class="nav-item">
                <a href="{{ route('extra.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Extra
                  </p>
                </a>
              </li> --}}
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
