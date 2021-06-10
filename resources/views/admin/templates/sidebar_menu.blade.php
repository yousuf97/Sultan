<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                <i class="far fa-user" style="font-size: 40px;color: #3bc8e7;"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block">Sultan Al Khatib</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">



            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('admin/home') }}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>

                <li class="nav-header">MANAGE SITE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                            Manage competition
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/events/create_events') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/events/manage_events') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List competition</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('admin/events/participants') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Competition Participants</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cloud-upload-alt"></i>
                        <p>
                            Uploads
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="{{ url('admin/uploads/create_new_uploads') }}" class="nav-link">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>New upload</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ url('admin/uploads/list_uploads') }}" class="nav-link">
                                <i class="fas fa-file-video nav-icon"></i>
                                <p>List all uploads</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">SITE MASTER DATA</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/masterdata/add_institution') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Institutions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/masterdata/manage_institutions') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Institutions</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ url('admin/manage_user') }}" class="nav-link">
                      <i class="nav-icon fa fa-users"></i>
                      <p>
                        Manage User
                      </p>
                    </a>
                  </li> --}}

                  <li class="nav-item">
                    <a href="{{ url('admin/settings/web') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                      <p>
                        Web Settings
                      </p>
                    </a>
                  </li>

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cloud-upload-alt"></i>
                        <p>
                            Manage Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-video nav-icon"></i>
                                <p>Add Users</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{ url('admin/users/manage_roles') }}" class="nav-link">
                                <i class="fas fa-file-video nav-icon"></i>
                                <p>Manage Roles</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{ url('admin/users/manage_permissions') }}" class="nav-link">
                                <i class="fas fa-file-video nav-icon"></i>
                                <p>Manage Permissions</p>
                            </a>
                        </li>

                    </ul>
                </li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
