@props(['model' => '', 'label' => '', 'options' => []])

<div class="mb-4">
    <label for={{ $model }} class="form-label">{{ ucfirst($label) }}</label>
    <div class="d-flex">
        @foreach ($options as $option)
        <div class="form-check me-2">
            <input 
                wire:model.defer="{{ $model }}"
                value="{{ $option->name ?? $option }}"
                type="radio"
                id="{{ $model . '_' . $loop->iteration }}"
                name="{{ $model }}"
                class="form-check-input"
            >
            <label class="form-check-label" for="{{ $model . '_' . $loop->iteration }}">
                {{ ucfirst($option) }}
            </label>
        </div>
        @endforeach
    </div>
</div>
