<div x-data="{ uploading: false, progress: 0, error: false, spinner: false, statusMessage: '' }" x-on:livewire-upload-start="uploading = true; error = false, spinner=true, statusMessage=''"
    x-on:livewire-upload-finish="uploading = true; error = false, spinner=false, statusMessage = 'Upload successful!'"
    x-on:livewire-upload-cancel="uploading = true; error = false,spinner=false, statusMessage='Upload cancelled!'"
    x-on:livewire-upload-error="uploading = true; error = true, spinner=false, statusMessage='Upload failed!'"
    x-on:livewire-upload-progress="progress = $event.detail.progress">
    <label class="form-label"><strong>{{ $label }}</strong></label>
    <div class="input-group">
        <span class="input-group-text">
            <div class="spinner-border text-primary spinner-border-sm" role="status" x-show="spinner"
                wire:target="{{ $name }}">
                <span class="visually-hidden">Loading...</span>
            </div>
            <i class="far fa-file-lines" x-show="!spinner"></i>
        </span>

        <input type="file" wire:model.defer="{{ $name }}" class="form-control"
            placeholder="ارفق {{ $label }}" />

    </div>
    <div class="form-helper text-danger {{ $name }}-validation reset-validation">
    </div>
    <!-- Progress Bar -->

    <div class="progress mt-2" style="height: 20px;" x-show="uploading">
        <div class="progress-bar" role="progressbar" x-bind:style="'width: ' + progress + '%'"
            x-bind:class="{
                'bg-success': progress == 100 && !error,
                'bg-danger': error
            }"
            x-bind:aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"
            x-text="statusMessage ? statusMessage : progress + '%'">
        </div>
        {{-- <progress class="progress-bar" role="progressbar" max="100" x-bind:value="progress"></progress> --}}
    </div>

</div>
