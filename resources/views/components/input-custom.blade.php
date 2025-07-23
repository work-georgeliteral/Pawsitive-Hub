@props(['type' => 'text', 'model' => '', 'placeholder' => '', 'label' => '', 'id' => '', 'disabled' => false, 'value' => ''])

<div class="mb-4">
    <label for="{{ $id ?? $model }}" class="form-label">{{ ucfirst($label) }}</label>
    
    <input
        @if($disabled) disabled @endif
        wire:model.defer="{{ $model }}" 
        value="{{ $value }}"
        type="{{ $type }}" 
        id="{{ $id ?? $model }}" 
        name="{{ $id ?? $model }}"
        class="form-control @error($model) is-invalid @enderror"
        placeholder="{{ $placeholder }}"
        autocomplete="{{ $model }}" 
        autofocus
        required
    >
    
    @error($model)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
