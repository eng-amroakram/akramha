<nav id="sidenav-1" class="sidenav ps ps--active-y" data-mdb-color="light" style="background-color: #2d2c2c"
    role="navigation" data-mdb-mode="side" data-mdb-right="false" data-mdb-hidden="false" data-mdb-accordion="true">

    <a class="ripple d-flex justify-content-center py-5" style="padding-top: 5rem !important;"
        href="{{ route('admin.index') }}" data-ripple-color="primary">

        <img id="MDB-logo" width="200" src="{{ asset('assets/admin/images/akramha-logo-white-text.png') }}"
            alt="Akramha Logo" />
    </a>

    <ul class="sidenav-menu">

        <li class="sidenav-item">
            <a class="sidenav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-chart-area pr-4 me-2 "></i><span>الصفحة الرئيسية</span></a>
        </li>

        <li class="sidenav-item">
            <a class="sidenav-link">
                <i class="fas fa-users-gear pr-3 me-2"></i>
                <span>إدارة المستخدمين</span>
            </a>

            <ul class="sidenav-collapse">
                <li class="sidenav-item">
                    <a class="sidenav-link" href="{{ route('admin.users.index') }}">
                        <i class="fas fa-users pr-3 me-2"></i>
                        <span>المستخدمين</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="sidenav-item">
            <a class="sidenav-link">
                <i class="fas fa-map-location-dot pr-3 me-2"></i>
                <span>إدارة المناطق</span>
            </a>

            <ul class="sidenav-collapse">
                <li class="sidenav-item">
                    <a class="sidenav-link" href="{{ route('admin.regions.index') }}">
                        <i class="fas fa-map-location-dot pr-3 me-2"></i>
                        <span>المناطق</span>
                    </a>
                </li>

                <li class="sidenav-item">
                    <a class="sidenav-link" href="{{ route('admin.regions.cities') }}">
                        <i class="fas fa-city pr-3 me-2"></i>
                        <span>المدن</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="sidenav-item">
            <a class="sidenav-link">
                <i class="fas fa-clipboard-list pr-3 me-2"></i>
                <span>إدارة طلبات الفائض</span>
            </a>

            <ul class="sidenav-collapse">
                <li class="sidenav-item">
                    <a class="sidenav-link" href="{{ route('admin.orders.index') }}">
                        <i class="fas fa-clipboard-list pr-3 me-2"></i>
                        <span>طلبات الفائض</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
