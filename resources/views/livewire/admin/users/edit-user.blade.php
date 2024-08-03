<div class="container-fluid">
    <div class="p-4 mb-4" wire:ignore>

        <!-- Page Header-->
        <div class="row mb-4">

            <!-- Page Title  -->
            <h2 style="font-weight: bold;">تعديل المستخدم: {{ $model->name }}</h2>
            <!-- Page Title  -->

            <!-- Breadcrumb -->
            <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="font-weight: bold;">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="#">إدارة المستخدمين</a></li>
                            <li class="breadcrumb-item active"><a href="#">تعديل المستخدم: {{ $model->name }}</a>
                            </li>
                        </ol>
                    </nav>

                </div>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <!-- Page Header-->


        <div class="row">

            <div class="col-lg-4">
                <div class="card mb-4">

                    <div class="card-header">
                        <h5 class="fw-bold">صورة المستخدم</h5>
                    </div>

                    <div class="card-body text-center">

                        <div class="lightbox">
                            <img src="{{ $model->photo ? $model->photo : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}"
                                data-mdb-img="{{ $model->photo }}" alt="avatar" class="rounded-circle" width="200"
                                height="200">
                        </div>
                        <h5 class="my-3">{{ $model->name }}</h5>
                    </div>
                </div>
            </div>


            <div class="col-lg-8">
                <div class="card mb-4" id="user-card">
                    <div class="card-header">
                        <h5 class="fw-bold">بيانات المستخدم</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <x-inputs.input label="اسم المستخدم" model="user" type="text" name="name"
                                    maxlength="30"></x-inputs.input>
                            </div>

                            <div class="col-md-6">
                                <x-inputs.input label="رقم الجوال" model="user" type="tel" name="phone"
                                    maxlength="10"></x-inputs.input>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <x-inputs.file label="صورة المستخدم" name="photo" model="user"></x-inputs.file>
                            </div>

                            <div class="col-md-6">
                                <x-inputs.input label="الايميل" type="email" name="email" maxlength="50"
                                    model="user"></x-inputs.input>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <x-inputs.single-select id="user-type" label="نوع الحساب" name="type" model="user"
                                    modalid="#user-card" :options="['charity' => 'جمعية خيرية', 'donor' => 'متبرع', 'admin' => 'أدمن']"></x-inputs.single-select>
                            </div>

                            <div class="col-md-6">
                                <x-inputs.input label="كلمة السر" type="password" name="password" maxlength="50"
                                    model="user"></x-inputs.input>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color" wire:click='edit()'>تحديث</button>
                    </div>

                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4" id="model-modal">

                    <div class="card-header">
                        <h5 class="fw-bold">بيانات اللوكيشن</h5>
                    </div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <x-inputs.single-select id="user-region" label="المنطقة" name="region_id" model="user"
                                    modalid="#model-modal" :options="select_regions(true)"></x-inputs.single-select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <x-inputs.single-select id="user-city" label="المدينة" name="city_id" model="user"
                                    modalid="#model-modal" :options="select_cities(true)"></x-inputs.single-select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <x-inputs.input label="العنوان" type="text" name="address" maxlength="50"
                                    model="user"></x-inputs.input>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color" wire:click='edit()'>تعديل</button>
                    </div>

                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4" id="model-modal">

                    <div class="card-header">
                        <h5 class="fw-bold">التواصل الاجتماعي</h5>
                    </div>

                    <div class="card-body">

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <x-inputs.input label="الفيسبوك" type="text" name="facebook" maxlength="100"
                                    model="user"></x-inputs.input>
                            </div>
                            <div class="col-md-6">
                                <x-inputs.input label="منصة اكس" type="text" name="twitter" maxlength="100"
                                    model="user"></x-inputs.input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <x-inputs.input label="اليوتيوب" type="text" name="youtube" maxlength="100"
                                    model="user"></x-inputs.input>
                            </div>
                            <div class="col-md-6">
                                <x-inputs.input label="لينكد ان" type="text" name="linkedin" maxlength="100"
                                    model="user"></x-inputs.input>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color" wire:click='edit()'>تعديل</button>
                    </div>

                </div>
            </div>


        </div>

    </div>

    @push('modal-script')
        <script>
            $(document).ready(function() {
                var $type = "{{ $model->type }}";
                var $region_id = "{{ $model->region_id }}";
                var $city_id = "{{ $model->city_id }}";

                if ($type) {
                    const singleSelect = document.querySelector("#user-type");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($type);
                }

                if ($region_id) {
                    const singleSelect = document.querySelector("#user-region");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($region_id);
                }

                if ($city_id) {
                    const singleSelect = document.querySelector("#user-city");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($city_id);
                }

                Livewire.on("validation-errors", function(errors) {
                    $(".reset-validation").text("");
                    for (let key in errors[0]) {
                        if (errors[0].hasOwnProperty(key)) {
                            $("." + key + "-validation").text(errors[0][key]);
                        }
                    }
                });


                Livewire.on('setSelectCities', function(data) {
                    var $input = $("#user-city");
                    var singleSelect = document.querySelector("#user-city");
                    var singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    $input.empty();

                    $.each(data[0], function(index, value) {
                        $input.append('<option value="' + index + '">' + value + '</option>');
                    });
                });

            });
        </script>
    @endpush


</div>
