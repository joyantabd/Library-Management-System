<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('backend/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a href="{{route('admin.dashboard')}}" class="simple-text logo-normal">
             Joy's Library
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="">
            <li class="{{Request::is('admin/book*')? 'active': ''}}">
                <a class="nav-link" href="{{route('book.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Books</p>
                </a>
            </li>
            <li class="">
            <li class="{{Request::is('admin/location*')? 'active': ''}}">
                <a class="nav-link" href="{{route('location.index')}}">
                    <i class="material-icons">room</i>
                    <p>Location</p>
                </a>
            </li>


            <li class="{{Request::is('admin/faculty*')? 'active': ''}}">
                <a class="nav-link" href="{{route('faculty.index')}}">
                    <i class="material-icons">perm_contact_calendar</i>
                    <p>Faculty List</p>
                </a>
            </li>

            <li class="{{Request::is('admin/student*')? 'active': ''}}">
                <a class="nav-link" href="{{route('student.index')}}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Student List</p>
                </a>
            </li>

            <li class="{{Request::is('admin/borrow*')? 'active': ''}}">
                <a class="nav-link" href="{{route('borrow.index')}}">
                    <i class="material-icons">credit_card</i>
                    <p>Book Issue List</p>
                </a>
            </li>

            <li class="{{Request::is('admin/slider*')? 'active': ''}}">
                <a class="nav-link" href="{{route('slider.index')}}">
                    <i class="material-icons">perm_media</i>
                    <p>Manage Slider</p>
                </a>
            </li>


        </ul>
    </div>
</div>