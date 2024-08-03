<div class="container-fluid">

    <div class="p-4">
        <div class="row" wire:ignore>
            @livewire('admin.partials.page-table-header', ['title' => 'المستخدمين', 'label' => 'مستخدم', 'model' => 'user', 'perm' => 'user'])
        </div>
    </div>

    <div class="row" wire:ignore>

        <div class="row px-5 mb-3">

            <div class="col-md-3">
                <div class="form-outline">
                    <i class="fab fa-searchengin trailing text-primary"></i>
                    <input type="search" id="search" wire:model.live="search" class="form-control form-icon-trailing"
                        aria-describedby="textExample1" />
                    <label class="form-label" for="search">البحث</label>
                </div>
            </div>

            <div class="col-md-2">
                <select class="select" multiple wire:model.live="search_type">
                    <option value="charity">جمعية خيرية</option>
                    <option value="donor">متبرع</option>
                    <option value="admin">أدمن</option>
                </select>
            </div>

            <div class="col-md-2">
                <select class="select" multiple wire:model.live="search_status">
                    <option value="active">نشط</option>
                    <option value="inactive">غير نشط</option>
                </select>
            </div>
        </div>

    </div>

    <div class="table-responsive-md text-center">
        <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
            <thead>
                <tr>
                    <th class="th-sm"><strong>ID</strong></th>
                    <th class="th-sm"><strong>الصورة</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>الاسم</strong></th>
                    <th data-mdb-sort="false" class="th-sm"><strong>الهاتف</strong></th>
                    <th data-mdb-sort="false" class="th-sm"><strong>الايميل</strong></th>
                    <th data-mdb-sort="false" class="th-sm"><strong>نوع الحساب</strong></th>
                    <th data-mdb-sort="false" class="th-sm"><strong>الحالة</strong></th>
                    <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                </tr>
            </thead>

            <tbody wire:loading.remove wire:target='add()'>
                @forelse ($users_models as $user)
                    <tr data-mdb-toggle="animation" data-mdb-animation="fade-in" data-mdb-animation-start="onLoad"
                        data-mdb-animation-delay="300">
                        <td>{{ $user->id }}</td>
                        <td>
                            <div class="lightbox">
                                <img src="{{ $user->photo ? $user->photo : asset('assets/admin/images/no-image-available.jpg') }}"
                                    data-mdb-img="{{ $user->photo }}" alt="User Photo" style="width: 30px;">
                            </div>
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->type == 'admin')
                                <span style="font-size: 12px;" class="badge rounded-pill badge-danger">ادمن</span>
                            @endif

                            @if ($user->type == 'charity')
                                <span style="font-size: 12px;" class="badge rounded-pill badge-warning">جمعية
                                    خيرية</span>
                            @endif

                            @if ($user->type == 'donor')
                                <span style="font-size: 12px;" class="badge rounded-pill badge-info">متبرع</span>
                            @endif
                        </td>
                        <td>
                            <div class="switch">
                                <label>
                                    نشط
                                    <input wire:click="changeStatus({{ $user->id }})" type="checkbox"
                                        {{ $user->status == 'active' ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    غير نشط
                                </label>
                            </div>
                        </td>

                        <x-actions delete="delete_user" edittype="link" edit="edit_user" :show="false"
                            :link="route('admin.users.edit', ['user' => $user->id])" :id="$user->id"></x-actions>
                    </tr>

                @empty

                    <tr>
                        <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="datatable-loader bg-light" style="height: 8px;" wire:loading wire:target='add()'>
            <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
        </div>
        <p class="text-center text-muted my-4" wire:loading wire:target='add()'>جاري تحميل البيانات ...</p>
    </div>

    <div class="d-flex justify-content-between mt-4">

        <nav aria-label="...">
            <ul class="pagination pagination-circle">
                {{ $users_models->withQueryString()->onEachSide(0)->links() }}
            </ul>
        </nav>

        <div class="col-md-1" wire:ignore>
            <select class="select" wire:model.live="pagination">
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>


    <x-modal size="modal-lg" model="user" :tabs="['بيانات المستخدم', 'بيانات اللوكيشن', 'التواصل الاجتماعي']">
        <x-slot name="contents">

            <div class="tab-pane fade show active" id="tabs-0" role="tabpanel" aria-labelledby="tab-0">

                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-inputs.input label="اسم المستخدم" model="user" type="text" name="name"
                                maxlength="30"></x-inputs.input>
                        </div>

                        <div class="col-md-6">
                            <x-inputs.input label="رقم الجوال" model="user" type="tel" name="phone"
                                maxlength="10"></x-inputs.input>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-inputs.file label="صورة المستخدم" name="photo" model="user"></x-inputs.file>
                        </div>

                        <div class="col-md-6">
                            <x-inputs.input label="الايميل" type="email" name="email" maxlength="50"
                                model="user"></x-inputs.input>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-inputs.single-select id="user-type" label="نوع الحساب" name="type" model="user"
                                modalid="#model-modal" :options="['charity' => 'جمعية خيرية', 'donor' => 'متبرع', 'admin' => 'أدمن']"></x-inputs.single-select>
                        </div>

                        <div class="col-md-6">
                            <x-inputs.input label="كلمة السر" type="password" name="password" maxlength="50"
                                model="user"></x-inputs.input>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary fw-bold" data-mdb-dismiss="modal">
                        إغلاق
                    </button>

                    <button type="button" class="btn btn-primary fw-bold" wire:click='add()'>إضافة</button>

                </div>
            </div>

            <div class="tab-pane fade" id="tabs-1" role="tabpanel" aria-labelledby="tab-1">

                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-inputs.single-select id="user-region" label="المنطقة" name="region_id" model="user"
                                modalid="#model-modal" :options="select_regions(true)"></x-inputs.single-select>
                        </div>

                        <div class="col-md-6">
                            <x-inputs.single-select id="user-city" label="المدينة" name="city_id" model="user"
                                modalid="#model-modal" :options="select_cities(true)"></x-inputs.single-select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-inputs.input label="العنوان" type="text" name="address" maxlength="50"
                                model="user"></x-inputs.input>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary fw-bold" data-mdb-dismiss="modal">
                        إغلاق
                    </button>

                    <button type="button" class="btn btn-primary fw-bold" wire:click='add()'>إضافة</button>

                </div>

            </div>

            <div class="tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="tab-2">

                <div class="modal-body">

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

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary fw-bold" data-mdb-dismiss="modal">
                        إغلاق
                    </button>

                    <button type="button" class="btn btn-primary fw-bold" wire:click='add()'>إضافة</button>

                </div>

            </div>

        </x-slot>
    </x-modal>

</div>

@push('modal-script')
    <script>
        $(document).ready(function() {

            Livewire.on("data-submitted-successfully", function() {
                $(".reset-validation").text("");
                $("#user-modal").modal('hide');
            });

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
