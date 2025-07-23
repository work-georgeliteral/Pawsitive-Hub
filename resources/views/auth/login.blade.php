<x-guest-layout>
    <div class="col-lg-6">
        <h1 class="display-1 text-center">Sign In</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <x-input-custom type="email" model="email" id="email" label="Email" placeholder="my@email.com"/>

            <x-input-custom type="password" model="password" id="password" label="Password" placeholder="Enter password"/>

            <button class="btn btn-primary mb-2 w-100">Sign in</button>
        </form>
        <p class="text-center">Don't have an account? <a href="/register" wire:navigate>Sign up here</a></p>
    </div>
</x-guest-layout>
