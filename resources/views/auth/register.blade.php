<x-guest-layout>
    <div class="col-lg-6">
        <h1 class="display-1 text-center">Sign Up</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Enter your Full Name"/>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- Email Input -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="my@gmail.com" />
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="mobile_number" class="form-label">{{ __('Mobile Number') }}</label>
                    <input type="text" id="mobile_number" name="mobile_number" class="form-control" value="{{ old('mobile_number') }}" required autofocus autocomplete="mobile_number" placeholder="Enter phone no." />
                    @error('mobile_number') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}" required autofocus autocomplete="password" placeholder="Enter password"/>
                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- Password Confirmation Input -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" required autofocus autocomplete="password_confirmation" placeholder="Enter password"/>
                    @error('password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

            <button class="btn btn-primary mb-2 w-100">Sign up</button>
        </form>
        <p class="text-center">Already have an account? <a href="/login" wire:navigate>Sign in here</a></p>
    </div>
</x-guest-layout>
