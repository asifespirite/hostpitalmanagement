<!-- Sidebar wrapper starts -->
<nav id="sidebar" class="sidebar-wrapper">

    <!-- Sidebar profile starts -->
    <div class="sidebar-profile">
        <img src="{{ asset('assets/images/user6.png') }}" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
        <div class="m-0">
            <h5 class="mb-1 profile-name text-nowrap text-truncate">{{ Auth::user()->name }}</h5>
            <p class="m-0 small profile-name text-nowrap text-truncate">
                {{ Auth::user()->getRoleNames()->implode(', ') }}
            </p>
        </div>
    </div>
    <!-- Sidebar profile ends -->

    <!-- Sidebar menu starts -->
    <div class="sidebarMenuScroll">
        <ul class="sidebar-menu">

            {{-- Common for all roles who can login --}}
            <li class="active current-page">
                <a href="{{ url('/') }}">
                    <i class="ri-home-6-line"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            {{-- Admin only --}}
            @role('admin')
            <li class="treeview">
                <a href="#!">
                    <i class="ri-stethoscope-line"></i>
                    <span class="menu-text">Doctors</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('doctors.index') }}">Doctors List</a></li>
                    <li><a href="{{ route('doctors.create') }}">Add Doctor</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#!">
                    <i class="ri-nurse-line"></i>
                    <span class="menu-text">Staff</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('staff.index') }}">Staff List</a></li>
                    <li><a href="{{ route('staff.create') }}">Add Staff</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('departments.index') }}">
                    <i class="ri-building-2-line"></i>
                    <span class="menu-text">Departments</span>
                </a>
            </li>
            @endrole

            {{-- Doctor --}}
            @role('doctor')
            <li>
                <a href="{{ route('patients.index') }}">
                    <i class="ri-heart-pulse-line"></i>
                    <span class="menu-text">Patients</span>
                </a>
            </li>
            <li>
                <a href="{{ route('appointments.index') }}">
                    <i class="ri-dossier-line"></i>
                    <span class="menu-text">Appointments</span>
                </a>
            </li>
            @endrole

            {{-- Staff --}}
            @role('staff')
            <li>
                <a href="{{ route('appointments.index') }}">
                    <i class="ri-dossier-line"></i>
                    <span class="menu-text">Appointments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('rooms.index') }}">
                    <i class="ri-hotel-bed-line"></i>
                    <span class="menu-text">Rooms</span>
                </a>
            </li>
            @endrole

            {{-- Driver --}}
            @role('driver')
            <li>
                <a href="{{ route('ambulances.index') }}">
                    <i class="ri-car-washing-line"></i>
                    <span class="menu-text">Ambulance</span>
                </a>
            </li>
            @endrole

            {{-- Medical Store --}}
            @role('medical_store')
            <li>
                <a href="{{ route('pharmacy.index') }}">
                    <i class="ri-capsule-line"></i>
                    <span class="menu-text">Pharmacy</span>
                </a>
            </li>
            @endrole

        </ul>
    </div>
    <!-- Sidebar menu ends -->

    <!-- Sidebar contact starts -->
    <div class="sidebar-contact">
        <p class="fw-light mb-1 text-nowrap text-truncate">Emergency Contact</p>
        <h5 class="m-0 lh-1 text-nowrap text-truncate">0987654321</h5>
        <i class="ri-phone-line"></i>
    </div>
    <!-- Sidebar contact ends -->

</nav>
<!-- Sidebar wrapper ends -->
