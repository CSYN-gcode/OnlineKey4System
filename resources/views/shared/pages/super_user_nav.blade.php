<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh">

    <!-- System title and logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('public/images/pricon_logo2.png') }}" alt="OITL" class="brand-image img-circle elevation-3"
            style="opacity: .8">

        <span class="brand-text font-weight-light font-size">
            <h5>Key 4 Monitoring</h5>
        </span>
    </a> <!-- System title and logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ url('../RapidX') }}" class="nav-link">
                        <i class="nav-icon fas fa-arrow-left"></i>
                        <p>Return to RapidX</p>
                    </a>
                </li>

                <li class="nav-header font-weight-bold" id="user_header" style="display: none;">User Management</li>
                <li class="nav-item has-treeview" id="user_settings" style="display: none;">
                    <a href="{{ route('user_management') }}" class="nav-link">
                        <i class="fas fa-user"></i>
                        <p >User Settings</p>
                    </a>
                </li>

                <li class="nav-item font-weight-bold" id="dashboard-header" style="display: none;">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                    <p style="font-size: 15px;">Dashboard Management</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="dashboard-energy" style="display: none;">
                    <a href="{{ route('dashboard-energy') }}" class="nav-link">
                        <i class="fas fa-charging-station"></i>
                        <i style="font-size: 15px;" class="nav-icon fas fa-tachometer-alt"></i>
                        <p >Energy Consumption</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="dashboard-water" style="display: none;">
                    <a href="{{ route('dashboard-water') }}" class="nav-link">
                        <i class="fas fa-tint"></i> &nbsp;
                        <i style="font-size: 15px;" class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Water Consumption</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="dashboard-ink" style="display: none;">
                    <a href="{{ route('dashboard-ink') }}" class="nav-link">
                        <i class="fas fa-fill-drip"></i>
                        <i style="font-size: 15px;" class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Ink Consumption</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="dashboard-paper" style="display: none;">
                    <a href="{{ route('dashboard-paper') }}" class="nav-link">
                        <i class="fas fa-file"></i> &nbsp;
                        <i style="font-size: 15px;" class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Paper Consumption</p>
                    </a>
                </li>

                <li class="nav-header font-weight-bold">Consumption Management</li>
                <li class="nav-item has-treeview" id="energyNav" style="display: none;">
                    <a href="{{ route('energy_consumption') }}" class="nav-link">
                        <i class="fas fa-charging-station"></i> &nbsp;
                        <p>Energy Consumption</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="waternav" style="display: none;">
                    <a href="{{ route('water_consumption') }}" class="nav-link">
                        <i class="fas fa-tint"></i> &nbsp;&nbsp;&nbsp;
                        <p>Water Consumption</p>
                    </a>
                </li>

                {{-- <li class="nav-item has-treeview" id="inknav" style="display: none;">
                    <a href="{{ route('ink_consumption') }}" class="nav-link">
                    <i class="fas fa-fill-drip"></i> &nbsp;
                        <p>Ink Consumption</p>
                    </a>
                </li> --}}

                <li class="nav-item has-treeview" id="inknav_sg" style="display: none;">
                    <a href="{{ route('ink_consumption_sg') }}" class="nav-link">
                    <i class="fas fa-fill-drip"></i> &nbsp;
                        <p>Ink Consumption - SG</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="inknav_prod" style="display: none;">
                    <a href="{{ route('ink_consumption_prod') }}" class="nav-link">
                    <i class="fas fa-fill-drip"></i> &nbsp;
                        <p>Ink Consumption - PROD</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="papernav" style="display: none;">
                    <a href="{{ route('paper_consumption') }}" class="nav-link">
                        <i class="fas fa-file"></i> &nbsp;&nbsp;&nbsp;
                        <p>Paper Consumption - PROD</p>
                    </a>
                </li>

                {{-- <li class="nav-item has-treeview" id="papernav" style="display: none;">
                    <a href="{{ route('paper_consumption') }}" class="nav-link">
                        <i class="fas fa-file"></i> &nbsp;&nbsp;&nbsp;
                        <p>Paper Consumption - F3</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="inknav_sg" style="display: none;">
                    <a href="{{ route('ink_consumption_sg') }}" class="nav-link">
                    <i class="fas fa-fill-drip"></i> &nbsp;
                        <p>Ink Consumption - F3</p>
                    </a>
                </li> --}}

                <li class="nav-header font-weight-bold" id="reports_header" style="display: none;" >Report Generation</li>
                <li class="nav-item has-treeview" id="reportsnav" style="display: none;" >
                    <a href="{{ route('reports') }}" class="nav-link">
                    <i style="font-size: 15px;" class="nav-icon fas fa-file-alt"></i>
                        <p>Report Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div><!-- Sidebar -->
</aside>

