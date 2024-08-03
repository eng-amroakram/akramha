<label class="form-label"><strong>{{ $label }}</strong></label>
<select class="select" id="{{ $id }}" wire:model.live="{{ $name }}" data-mdb-filter="true"
    data-mdb-container="{{ $modalid }}">
    @foreach ($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>
<div class="form-helper text-danger {{ $name }}-validation reset-validation">
</div>
