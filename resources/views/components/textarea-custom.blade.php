@props(['type' => 'text', 'model' => '', 'placeholder' => '', 'label' => '', 'value' => '', 'disabled' => false])

<div class="mb-4">
    <label for="{{ $model }}" class="form-label">{{ ucfirst($label) }}</label>
    
    <textarea
        @if($disabled) disabled @endif
        wire:model="{{ $model }}" 
        type="{{ $type }}" 
        id="{{ $model }}" 
        name="{{ $model }}"
        class="form-control @error($model) is-invalid @enderror"
        placeholder="{{ $placeholder }}"
        autocomplete="{{ $model }}" 
        autofocus
        required
    >{{ $value }}</textarea>
    
    @error($model)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
