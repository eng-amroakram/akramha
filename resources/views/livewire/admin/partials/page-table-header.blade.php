<div wire:ignore>

    <!-- Page Title  -->
    <h2 style="font-weight: bold;">{{ $title }}</h2>
    <!-- Page Title  -->

    <!-- Breadcrumb -->
    <nav class="d-flex navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-weight: bold;">
                    <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="#">إدارة {{ $title }}</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ $title }}</a>
                    </li>
                </ol>
            </nav>

            <div class="d-flex align-items-center pe-3">
                <!-- Notifications -->
                <div class="dropdown">

                    <a data-mdb-toggle="dropdown" class="link-secondary me-3 dropdown-toggle" href="#"
                        id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                        <i class="fas fa-gear"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" data-mdb-toggle="modal" data-mdb-target="#model-modal"
                                href="#model-modal">
                                <i class="far fa-square-plus me-2"></i>
                                <span>إضافة {{ $label }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#export-data" wire:click="exportUsers">
                                <i class="fas fa-file-export me-2"></i>
                                <span>تصدير البيانات</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </nav>
    <!-- Breadcrumb -->
</div>
