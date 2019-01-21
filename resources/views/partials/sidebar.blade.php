<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link @if(Request::is('dashboard')) active @endif" href="/" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect  sidebar-link @if(Request::is('employees')) active @endif" href="/employees" aria-expanded="false"><i class=" fas fa-users"></i><span class="hide-menu">Employees</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect  sidebar-link @if(Request::is('companies')) active @endif" href="/companies" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">companies</span></a></li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->