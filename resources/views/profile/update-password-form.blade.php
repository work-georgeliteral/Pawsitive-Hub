<form wire:submit.prevent="updatePassword">
    <div class="container mt-4">
        <h3>{{ __('Update Password') }}</h3>
        <p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

        <div class="row mb-3">
            <!-- Current Password -->
            <div class="col-md-6">
                <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                <input id="current_password" type="password" class="form-control" wire:model="state.current_password" autocomplete="current-password" />
                <x-input-error for="current_password" class="mt-2" />
            </div>
        </div>

        <div class="row mb-3">
            <!-- New Password -->
            <div class="col-md-6">
                <label for="password" class="form-label">{{ __('New Password') }}</label>
                <input id="password" type="password" class="form-control" wire:model="state.password" autocomplete="new-password" />
                <x-input-error for="password" class="mt-2" />
            </div>
        </div>

        <div class="row mb-3">
            <!-- Confirm Password -->
            <div class="col-md-6">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" class="form-control" wire:model="state.password_confirmation" autocomplete="new-password" />
                <x-input-error for="password_confirmation" class="mt-2" />
            </div>
        </div>

        <div class="me-3">
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</form>
