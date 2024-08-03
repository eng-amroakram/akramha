<div class="container-fluid">

    <div class="p-4">
        <div class="row" wire:ignore>
            @livewire('admin.partials.page-table-header', ['title' => 'الطلبات', 'label' => 'طلب', 'model' => 'order', 'perm' => 'order'])
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
                <select class="select" multiple wire:model.live="search_status">
                    <option value="active">نشط</option>
                    <option value="inactive">غير نشط</option>
                </select>
            </div>

            <div class="col-md-2">
                <select class="select" multiple wire:model.live="search_region_id">

                    @foreach (regions(true) as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-2">
                <select class="select" multiple wire:model.live="search_city_id">

                    @foreach (cities(true) as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach

                </select>
            </div>
        </div>

    </div>

    <div class="table-responsive-md text-center">
        <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
            <thead>
                <tr>
                    <th class="th-sm"><strong>ID</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>عنوان الطلب</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>صاحب الطلب</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>الجمعية</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>المنطقة</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>المدينة</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>وقت التسليم</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>رقم التواصل</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>حجم الكمية</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>نوع الفائض</strong></th>
                    <th data-mdb-sort="false" class="th-sm"><strong>الحالة</strong></th>
                    <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                </tr>
            </thead>

            <tbody wire:loading.remove wire:target='adds()'>
                @forelse ($orders as $order)
                    <tr data-mdb-toggle="animation" data-mdb-animation="fade-in" data-mdb-animation-start="onLoad"
                        data-mdb-animation-delay="300">

                        <td>{{ $order->id }}</td>
                        <td>{{ $order->title }}</td>
                        <td>{{ $order->charity?->name }}</td>
                        <td>{{ $order->user?->name }}</td>
                        <td>{{ $order->region?->name }}</td>
                        <td>{{ $order->city?->name }}</td>
                        <td>{{ $order->time_receipt->format('Y-m-d') }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>
                            @if ($order->size == 'large')
                                <span style="font-size: 13px;" class="badge rounded-pill badge-success">كبير</span>
                            @endif

                            @if ($order->size == 'medium')
                                <span style="font-size: 13px;" class="badge rounded-pill badge-warning">وسط</span>
                            @endif

                            @if ($order->size == 'small')
                                <span style="font-size: 13px;" class="badge rounded-pill badge-danger">صغير</span>
                            @endif
                        </td>

                        <td>
                            @if ($order->type == 'sacrifices')
                                <span style="font-size: 13px;" class="badge rounded-pill badge-info">ذبائح</span>
                            @endif

                            @if ($order->type == 'buffet')
                                <span style="font-size: 13px;" class="badge rounded-pill badge-warning">بوفيه</span>
                            @endif
                        </td>

                        <td>
                            @if ($order->status == 'pending')
                                <span style="font-size: 13px;" class="badge rounded-pill badge-warning">معلق</span>
                            @endif

                            @if ($order->status == 'progress')
                                <span style="font-size: 13px;" class="badge rounded-pill badge-info">قيد التنفيذ</span>
                            @endif

                            @if ($order->status == 'completed')
                                <span style="font-size: 13px;" class="badge rounded-pill badge-success">تم القبول
                                    والتسليم</span>
                            @endif

                            @if ($order->status == 'canceled')
                                <span style="font-size: 13px;" class="badge rounded-pill badge-danger">طلب مرجع</span>
                            @endif
                        </td>

                        <x-actions delete="delete_order" edittype="modal" edit="edit_order" :show="false"
                            link="#model-modal" :id="$order->id"></x-actions>

                    </tr>

                @empty

                    <tr>
                        <td colspan="12" class="fw-bold fs-6">لا يوجد نتائج !!</td>
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
                {{ $orders->withQueryString()->onEachSide(0)->links() }}
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


    <x-modal size="modal-lg" model="order" :tabs="['بيانات الطلب']">
        <x-slot name="contents">
            <div class="tab-pane fade show active" id="city-tabs-1" role="tabpanel" aria-labelledby="city-tab-1">

                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-inputs.input label="عنوان الطلب" type="text" name="title"
                                maxlength="225"></x-inputs.input>
                        </div>

                        <div class="col-md-6">
                            <x-inputs.single-select label="الجمعية" name="charity_id" :options="charities(true)"
                                modalid="#model-modal" id="model-charity_id" model="order"></x-inputs.single-select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-inputs.single-select label="المنطقة" name="region_id" :options="regions(true)"
                                modalid="#model-modal" id="model-region" model="order"></x-inputs.single-select>
                        </div>

                        <div class="col-md-6">
                            <x-inputs.single-select label="المدينة" name="city_id" :options="cities(true)"
                                modalid="#model-modal" id="model-city" model="order"></x-inputs.single-select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-inputs.input label="عنوان التوصيل" type="text" name="address"
                                maxlength="225"></x-inputs.input>
                        </div>

                        <div class="col-md-6">
                            <x-inputs.datepicker name="time_receipt" label="وقت التوصيل" model="order"
                                control="time-receipt-datepicker-class"></x-inputs.datepicker>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-inputs.input label="رقم التواصل" type="tel" name="phone"
                                maxlength="10"></x-inputs.input>
                        </div>

                        <div class="col-md-6">
                            <x-inputs.single-select label="حجم الفائض" name="size" :options="order_size_options()"
                                modalid="#model-modal" id="model-size" model="order"></x-inputs.single-select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-inputs.single-select label="نوع الفائض" name="type" :options="order_type_options()"
                                modalid="#model-modal" id="model-type" model="order"></x-inputs.single-select>
                        </div>

                        <div class="col-md-6">
                            <x-inputs.single-select label="حالة الطلب" name="status" :options="order_status_options()"
                                modalid="#model-modal" id="model-status" model="order"></x-inputs.single-select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary fw-bold close-button" data-mdb-dismiss="modal">
                        إغلاق
                    </button>

                    <button type="button" class="btn btn-primary fw-bold add-button"
                        wire:click='add()'>إضافة</button>
                    <button type="button" class="btn btn-primary fw-bold edit-button"
                        wire:click='edit()'>تعديل</button>

                </div>
            </div>
        </x-slot>
    </x-modal>


</div>



@push('modal-script')
    <script>
        function initializeEventListeners() {
            var $add_button = $(".add-button");
            var $edit_button = $(".edit-button");
            var $load_button = $(".load-button");
            var $close_button = $(".close-button");

            $edit_button.hide();

            $load_button.on("click", function() {
                $add_button.hide();
                $edit_button.show();
            });

            $close_button.on("click", function() {
                $add_button.show();
                $edit_button.hide();
            });

            $edit_button.on("click", function() {
                $add_button.show();
                $edit_button.hide();
            });

            $add_button.on("click", function() {
                $add_button.show();
                $edit_button.hide();
            });
        }

        $(document).ready(function() {
            initializeEventListeners();

            Livewire.on("data-submitted-successfully", function() {
                $(".reset-validation").text("");
                $("#model-modal").modal('hide');
            });

            Livewire.on("validation-errors", function(errors) {
                $(".reset-validation").text("");

                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-validation").text(errors[0][key]);
                    }
                }
            });

            Livewire.on("set-single-selects", function(data) {

                data.forEach(item => {
                    Object.entries(item).forEach(([key, value]) => {
                        // Assuming you want to set some values in your selects
                        const singleSelect = document.querySelector(key);
                        if (singleSelect) {
                            const singleSelectInstance = mdb.Select.getInstance(
                                singleSelect);
                            singleSelectInstance.setValue(value.toString());
                        }
                    });
                });

                $(".add-button").hide();
                $(".edit-button").show();
            });

            var timeReceipt = document.querySelector('.time-receipt-datepicker-class');
            timeReceipt.addEventListener('dateChange.mdb.datepicker', function(e) {
                let input = e.target.childNodes[1];
                let value = input.value;
                @this.set("time_receipt", value);
            });

            Livewire.on('setSelectCities', function(data) {
                var $input = $("#model-city");
                var singleSelect = document.querySelector("#model-city");
                var singleSelectInstance = mdb.Select.getInstance(singleSelect);
                $input.empty();

                $.each(data[0], function(index, value) {
                    $input.append('<option value="' + index + '">' + value + '</option>');
                });
            });


            Livewire.hook('message.processed', (message, component) => {
                initializeEventListeners();

            });

        });

        Livewire.hook('message.processed', (message, component) => {
            initializeEventListeners();
        });
    </script>
@endpush
