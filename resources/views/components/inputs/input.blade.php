<label class="form-label"><strong>{{ $label }}</strong></label>
<div class="input-group">
    @if ($type != 'tel' && $type != 'password')
        <span class="input-group-text"><i class="fas fa-pen"></i></span>
    @endif

    @if ($type == 'password')
        <span class="input-group-text"><i class="fas fa-key"></i></span>
    @endif

    <input type="{{ $type }}" wire:model.defer="{{ $name }}" maxlength="{{ $maxlength }}"
        class="form-control" placeholder="ادخل {{ $label }}" />


    @if ($type == 'tel')
        <span class="input-group-text" style="padding-bottom:0px;">966+</span>
    @endif


</div>
<div class="form-helper text-danger {{ $name }}-validation reset-validation">
</div>
