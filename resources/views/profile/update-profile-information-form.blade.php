<form wire:submit.prevent="updateProfileInformation">
    <div class="container mt-4">
        <h3>{{ __('Profile Information') }}</h3>
        <p>{{ __('Update your account\'s profile information and email address.') }}</p>

        <div class="row mb-3">
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="col-md-6">
                    <!-- Profile Photo File Input -->
                    <input type="file" id="photo" class="d-none"
                           wire:model.live="photo"
                           x-ref="photo"
                           x-on:change="
                               photoName = $refs.photo.files[0].name;
                               const reader = new FileReader();
                               reader.onload = (e) => {
                                   photoPreview = e.target.result;
                               };
                               reader.readAsDataURL($refs.photo.files[0]);
                           " />

                    <label for="photo" class="form-label">{{ __('Photo') }}</label>

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-circle img-thumbnail" style="height: 120px; width: 120px; object-fit: cover;">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="d-block rounded-circle" style="height: 120px; width: 120px; background-image: url('{{ photoPreview }}'); background-size: cover; background-position: center;"></span>
                    </div>

                    <button type="button" class="btn btn-secondary mt-2 me-2" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </button>

                    @if ($this->user->profile_photo_path)
                        <button type="button" class="btn btn-secondary mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </button>
                    @endif

                    <x-input-error for="photo" class="mt-2" />
                </div>
            @endif
        </div>

        <div class="row mb-3">
            <!-- Name -->
            <div class="col-md-6">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control" wire:model="state.name" required autocomplete="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control" wire:model="state.email" required autocomplete="username" />
                <x-input-error for="email" class="mt-2" />

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                    <p class="text-muted mt-2">
                        {{ __('Your email address is unverified.') }}

                        <button type="button" class="btn btn-link p-0" wire:click.prevent="sendEmailVerification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if ($this->verificationLinkSent)
                        <p class="mt-2 text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                @endif
            </div>
        </div>

        <div class="me-3">
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
        </div>

        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </button>
    </div>
</form>
