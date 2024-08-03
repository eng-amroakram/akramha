<div class="container-fluid">

    <div class="p-4">
        <div class="row" wire:ignore>
            @livewire('admin.partials.page-table-header', ['title' => 'المدن', 'label' => 'مدينة', 'model' => 'city', 'perm' => 'city'])
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
        </div>

    </div>

    <div class="table-responsive-md text-center">
        <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
            <thead>
                <tr>
                    <th class="th-sm"><strong>ID</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>اسم المدينة</strong></th>
                    <th data-mdb-sort="true" class="th-sm"><strong>المنطقة التابعة لها</strong></th>
                    <th data-mdb-sort="false" class="th-sm"><strong>الحالة</strong></th>
                    <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                </tr>
            </thead>

            <tbody wire:loading.remove wire:target='adds()'>
                @forelse ($cities as $city)
                    <tr data-mdb-toggle="animation" data-mdb-animation="fade-in" data-mdb-animation-start="onLoad"
                        data-mdb-animation-delay="300">
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->region?->name }}</td>

                        <td>
                            <div class="switch">
                                <label>
                                    نشط
                                    <input wire:click="changeStatus({{ $city->id }})" type="checkbox"
                                        {{ $city->status == 'active' ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    غير نشط
                                </label>
                            </div>
                        </td>

                        <x-actions delete="delete_city" edittype="modal" edit="edit_city" :show="false"
                            link="#model-modal" :id="$city->id"></x-actions>
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
                {{ $cities->withQueryString()->onEachSide(0)->links() }}
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


    <x-modal size="" model="city" :tabs="['بيانات المدينة']">
        <x-slot name="contents">
            <div class="tab-pane fade show active" id="city-tabs-1" role="tabpanel" aria-labelledby="city-tab-1">

                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <x-inputs.input label="اسم المدينة" type="text" name="name"
                                maxlength="20"></x-inputs.input>
                        </div>

                        <div class="col-md-12">
                            <x-inputs.single-select label="المنطقة" name="region_id" :options="regions(true)"
                                modalid="#model-modal" id="model-region" model="city"></x-inputs.single-select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary fw-bold close-button" data-mdb-dismiss="modal">
                        إغلاق
                    </button>

                    <button type="button" class="btn btn-primary fw-bold add-button" wire:click='add()'>إضافة</button>
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

            Livewire.on("set-single-select", function(data) {
                const singleSelect = document.querySelector(data[0].id);
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue(data[0].region_id.toString());
                $(".add-button").hide();
                $(".edit-button").show();
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
