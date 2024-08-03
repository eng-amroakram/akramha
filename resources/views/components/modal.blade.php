<div class="modal fade" id="model-modal" tabindex="-1" data-mdb-backdrop="static"
    data-mdb-keyboard="false"aria-hidden="true" wire:ignore>


    <div class="modal-dialog {{ $size }} cascading-modal" style="margin-top: 4%">
        <div class="modal-content">
            <div class="modal-c-tabs">

                <!-- Tabs navs -->
                <ul class="nav md-tabs nav-tabs" id="user" role="tablist" style="background-color: #303030;">

                    @foreach ($tabs as $index => $tab)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fw-bold fs-6 {{ $index == 0 ? 'active' : '' }} "
                                id="{{ 'tab-' . $index }}" href="#{{ 'tabs-' . $index }}" role="tab"
                                aria-controls="{{ '-tabs-' . $index }}" data-mdb-toggle="pill">
                                <i class="fas fa-circle-info me-1"></i>
                                <strong>
                                    {{ $tab }}
                                </strong>
                            </a>
                        </li>
                    @endforeach

                </ul>

                <div class="tab-content" id="ex1-content">
                    {{ $contents }}
                </div>

            </div>
        </div>
    </div>

</div>
