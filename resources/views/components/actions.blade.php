    <td>
        <div class="d-flex justify-content-center">
            @if ($delete)
                <a type="button" class="text-danger  fa-lg me-2 ms-2" wire:click='delete({{ $id }})'
                    title="Delete">
                    <i class="fas fa-trash-can"></i>
                </a>
            @endif

            @if ($edit)

                @if ($edittype == 'modal')
                    <a type="button" data-mdb-toggle="modal" data-mdb-target="{{ $link }}"
                        class="text-dark  fa-lg me-2 ms-2 load-button" wire:click="load({{ $id }})" href="#model-modal"
                        title="Edit">
                        <i class="far fa-pen-to-square"></i>
                    </a>
                @endif

                @if ($edittype == 'link')
                    <a type="button" class="text-dark  fa-lg me-2 ms-2" href="{{ $link }}" title="Edit">
                        <i class="far fa-pen-to-square"></i>
                    </a>
                @endif

            @endif

            @if ($show)
                <a type="button" class="text-primary  fa-lg me-2 ms-2" href="#show"
                    wire:click="show({{ $id }})" title="Show">
                    <i class="fas fa-eye"></i>
                </a>
            @endif

        </div>
    </td>
