<section class="mt-md-4 pt-md-2 mb-5 p-5">

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-users bg-primary-demo mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">المستخدمين</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('User') }}</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-map-location-dot bg-primary-demo mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">المناطق</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('Region') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city bg-primary-demo mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">المدن</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('City') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-clipboard-list bg-primary-demo mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">طلبات الفائض</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('Order') }}</h4>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
