@props(['model' => '', 'selected' => '', 'label' => '', 'selected' => 'Your answer', 'options' => ['Yes', 'No'], 'disabled' => false])

<div class="mb-4">
    <label for="{{ $model }}" class="form-label">{{ ucfirst($label) }}</label>
    
    <select
        @if($disabled) disabled @endif
        id="{{ $model }}"
        name="{{ $model }}"
        class="form-select {{ $errors->has($model) ? 'is-invalid' : '' }}"
        wire:model.defer="{{ $model }}"
    >
        
        <option value="#" selected>{{ $selected }}</option>

        @foreach ($options as $option)
            <option value="{{ $option->id ?? $option }}" {{ old($model) == $model ? 'selected' : '' }}>{{ $option->name ?? $option }}</option>
        @endforeach
    
    </select>
    
    @error($model)
        <div class="invalid-feedback">
            {{ $errors->first($model) }}
        </div>
    @enderror
</div>
