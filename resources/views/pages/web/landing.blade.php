@extends('layouts.web.landing')
@section('content')
    <section id="hero-section">
        <header class="pb-5">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg bg-body">
                <div class="container">
                    <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarExample01"
                        aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarExample01">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" aria-current="page" href="#">الرئيسية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">المميزات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">حول اكرمها</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="navbar-nav d-flex flex-row">
                        <!-- Icons -->
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="#">
                                <i class="text-primary fab fa-facebook"></i>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="#">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </li>

                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="#">
                                <i class="text-danger fab fa-youtube"></i>
                            </a>
                        </li>

                    </ul>




                </div>
            </nav>
            <!-- Navbar -->

            <!-- Background image -->
            <div class="p-5 text-center bg-image"
                style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp'); height: 600px;">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white">
                            <h1 class="mb-3">اكرمها</h1>
                            <h4 class="mb-3">هنا تطبيق اكرمها لنشر الخير</h4>
                            <a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="#!" role="button">تحميل
                                تطبيق اكرمها</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Background image -->
        </header>
    </section>

    <section id="features-section" class="">

        <div class="container my-4 py-4">
            <div class="card">

                <div class="text-center mb-2 mt-2 card-title fs-5 fw-bold">مميزات تطبيق اكرمها</div>
                <div class="row">

                    <div class="col-md-4">
                        <img src="{{ asset('assets/web/images/features.jpeg') }}" alt="Trendy Pants and Shoes"
                            class="img-fluid rounded" />
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12 mb-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">

                                            <div class="align-self-center me-3">
                                                <i class="icon-container fas fa-pencil-alt fa-3x text-white bg-dark"></i>
                                            </div>
                                            <div>
                                                <h5>حفظ النعمة</h5>
                                                <p class="mb-0">حفظ النعمة من فائض الطعام بتيسير الوصل بين المتبرعين
                                                    والجهات المتخصصة والمحتاجين.</p>
                                            </div>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">

                                            <div class="align-self-center me-3">
                                                <i class="icon-container fas fa-pencil-alt fa-3x text-white bg-dark"></i>
                                            </div>

                                            <div>
                                                <h5>تسهيل التبرع</h5>
                                                <p class="mb-0">تسهيل إيصال فائض الطعام للجهات المختصة لتحسينه وتوزيعه.
                                                </p>
                                            </div>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">

                                            <div class="align-self-center me-3">
                                                <i class="icon-container fas fa-pencil-alt fa-3x text-white bg-dark"></i>
                                            </div>

                                            <div>
                                                <h5>دعم الجهات العاملة</h5>
                                                <p class="mb-0">دعم الجهات العاملة في مجال حفظ النعمة بإيصالها إلى
                                                    المتبرعين وتسهيل الوصول إليها.</p>
                                            </div>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">

                                            <div class="align-self-center me-3">
                                                <i class="icon-container fas fa-pencil-alt fa-3x text-white bg-dark"></i>
                                            </div>

                                            <div>
                                                <h5>خدمة المحتاجين</h5>
                                                <p class="mb-0">تيسير وصول فائض الطعام للمحتاجين من خلال تسهيل الوصول
                                                    للجهات الراعية.</p>
                                            </div>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">

                                            <div class="align-self-center me-3">
                                                <i class="icon-container fas fa-pencil-alt fa-3x text-white bg-dark"></i>
                                            </div>

                                            <div>
                                                <h5>الاستفادة القصوى</h5>
                                                <p class="mb-0">تحقيق أقصى فائدة من فائض الطعام عبر ربط الجميع بإتقان
                                                    وكفاءة.</p>
                                            </div>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section class="gradient-custom">
        <div class="container my-3 py-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="text-center mb-4 pb-2">
                        <i class="fas fa-quote-left fa-3x text-white"></i>
                    </div>

                    <div class="card">
                        <div class="card-body px-4 py-5">
                            <!-- Carousel wrapper -->
                            <div id="carouselDarkVariant" data-mdb-carousel-init class="carousel slide carousel-dark"
                                data-mdb-ride="carousel">
                                <!-- Indicators -->
                                <div class="carousel-indicators mb-0">
                                    <button data-mdb-button-init data-mdb-target="#carouselDarkVariant"
                                        data-mdb-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button data-mdb-button-init data-mdb-target="#carouselDarkVariant"
                                        data-mdb-slide-to="1" aria-label="Slide 1"></button>
                                    <button data-mdb-button-init data-mdb-target="#carouselDarkVariant"
                                        data-mdb-slide-to="2" aria-label="Slide 1"></button>
                                </div>

                                <!-- Inner -->
                                <div class="carousel-inner pb-5">
                                    <!-- Single item -->
                                    <div class="carousel-item active">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-10 col-xl-8">
                                                <div class="row">
                                                    <div class="col-lg-4 d-flex justify-content-center">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                                                            class="rounded-circle shadow-1 mb-4 mb-lg-0"
                                                            alt="woman avatar" width="150" height="150" />
                                                    </div>
                                                    <div
                                                        class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                        <h4 class="mb-4">Maria Smantha - Web Developer</h4>
                                                        <p class="mb-0 pb-3">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A
                                                            aliquam amet animi blanditiis consequatur debitis dicta
                                                            distinctio, enim error eum iste libero modi nam natus
                                                            perferendis possimus quasi sint sit tempora voluptatem. Est,
                                                            exercitationem id ipsa ipsum laboriosam perferendis.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single item -->
                                    <div class="carousel-item">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-10 col-xl-8">
                                                <div class="row">
                                                    <div class="col-lg-4 d-flex justify-content-center">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                                                            class="rounded-circle shadow-1 mb-4 mb-lg-0"
                                                            alt="woman avatar" width="150" height="150" />
                                                    </div>
                                                    <div
                                                        class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                        <h4 class="mb-4">Lisa Cudrow - Graphic Designer</h4>
                                                        <p class="mb-0 pb-3">
                                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                            accusantium doloremque laudantium, totam rem aperiam, eaque
                                                            ipsa quae ab illo inventore veritatis et quasi architecto
                                                            beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
                                                            quia voluptas sit aspernatur.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single item -->
                                    <div class="carousel-item">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-10 col-xl-8">
                                                <div class="row">
                                                    <div class="col-lg-4 d-flex justify-content-center">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                                                            class="rounded-circle shadow-1 mb-4 mb-lg-0"
                                                            alt="woman avatar" width="150" height="150" />
                                                    </div>
                                                    <div
                                                        class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                        <h4 class="mb-4">John Smith - Marketing Specialist</h4>
                                                        <p class="mb-0 pb-3">
                                                            At vero eos et accusamus et iusto odio dignissimos qui
                                                            blanditiis praesentium voluptatum deleniti atque corrupti quos
                                                            dolores et quas molestias excepturi sint occaecati cupiditate
                                                            non provident, similique sunt in culpa qui officia mollitia
                                                            animi id laborum et dolorum fuga.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Inner -->

                                <!-- Controls -->
                                <button data-mdb-button-init class="carousel-control-prev" type="button"
                                    data-mdb-target="#carouselDarkVariant" data-mdb-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button data-mdb-button-init class="carousel-control-next" type="button"
                                    data-mdb-target="#carouselDarkVariant" data-mdb-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- Carousel wrapper -->
                        </div>
                    </div>

                    <div class="text-center mt-4 pt-2">
                        <i class="fas fa-quote-right fa-3x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="footer">
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-body-tertiary text-muted">

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>Company name
                            </h6>
                            <p>
                                Here you can use rows and columns to organize your footer content. Lorem ipsum
                                dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Products
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Angular</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">React</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Vue</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Laravel</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful links
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Pricing</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Settings</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Orders</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                info@example.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>
@endsection
