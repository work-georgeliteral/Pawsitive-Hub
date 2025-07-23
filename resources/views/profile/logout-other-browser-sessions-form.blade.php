<div class="container mt-4">
    <h3>{{ __('Browser Sessions') }}</h3>
    <p>{{ __('Manage and log out your active sessions on other browsers and devices.') }}</p>

    <div class="max-w-xl text-muted">
        {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
    </div>

    @if (count($this->sessions) > 0)
        <div class="mt-5">
            @foreach ($this->sessions as $session)
                <div class="d-flex align-items-center mb-3">
                    <div>
                        @if ($session->agent->isDesktop())
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-muted">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-muted">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>
                        @endif
                    </div>

                    <div class="ms-3">
                        <div class="text-muted">
                            {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }} - {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                        </div>

                        <div class="text-muted">
                            {{ $session->ip_address }},
                            @if ($session->is_current_device)
                                <span class="text-success fw-bold">{{ __('This device') }}</span>
                            @else
                                {{ __('Last active') }} {{ $session->last_active }}
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="d-flex align-items-center mt-5">
        <button type="button" class="btn btn-primary" wire:click="confirmLogout" wire:loading.attr="disabled">
            {{ __('Log Out Other Browser Sessions') }}
        </button>

        <x-action-message class="ms-3" on="loggedOut">
            {{ __('Done.') }}
        </x-action-message>
    </div>

    <!-- Log Out Other Devices Confirmation Modal -->
    <div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="confirmLogoutModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmLogoutModalLabel">{{ __('Log Out Other Browser Sessions') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}

                    <div class="mt-4">
                        <input type="password" class="form-control" autocomplete="current-password" placeholder="{{ __('Password') }}" wire:model="password" wire:keydown.enter="logoutOtherBrowserSessions" />
                        <x-input-error for="password" class="mt-2" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </button>
                    <button type="button" class="btn btn-primary" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                        {{ __('Log Out Other Browser Sessions') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        @this.on('confirmLogout', () => {
            var myModal = new bootstrap.Modal(document.getElementById('confirmLogoutModal'));
            myModal.show();
        });
    });
</script>
