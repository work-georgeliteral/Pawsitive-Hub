<nav class="navbar navbar-expand-lg" style="position: fixed; top: 0; left: 0; right: 0; background-color: #250046; box-shadow: 0 0 10px #000; z-index: 1030;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="" class="nav-link"><img src="{{ asset('/pictures/taaralogo.png') }}" alt="" style="max-width: 45px; margin: 0px;"></a>
        </li>
        @if (auth()->user()->type === 'admin')

        <li class="nav-item mt-2 me-lg-4">
          <x-nav-link-custom href="/dashboard" wire:navigate :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
          </x-nav-link-custom>
        </li>

        {{-- <li class="nav-item mt-2 me-lg-4 dropdown">
          <a class="nav-link dropdown-toggle" :active="request()->routeIs('breeds/index')" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Breed
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/breeds" wire:navigate>View</a></li>
            <li><a class="dropdown-item" href="/breeds/type" wire:navigate>Add</a></li>
          </ul>
        </li>

        <li class="nav-item mt-2 me-lg-4 dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pet
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/pets" wire:navigate>View</a></li>
            <li><a class="dropdown-item" href="/pets/type" wire:navigate wire:navigate>Add</a></li>
          </ul>
        </li> --}}

        @php
$activeBreed = request()->routeIs('breeds/*');
$activePet = request()->routeIs('pets/*');
@endphp

<li class="nav-item mt-2 me-lg-4 dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
     style="{{ $activeBreed ? 'font-weight: bold; color: violet;' : '' }}">
    Breed
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="/breeds" wire:navigate
           style="{{ request()->is('breeds') ? 'font-weight: bold; color: violet;' : '' }}">View</a></li>
    <li><a class="dropdown-item" href="/breeds/type" wire:navigate
           style="{{ request()->is('breeds/type') ? 'font-weight: bold; color: violet;' : '' }}">Add</a></li>
  </ul>
</li>

<li class="nav-item mt-2 me-lg-4 dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
     style="{{ $activePet ? 'font-weight: bold; color: violet;' : '' }}">
    Pet
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="/pets" wire:navigate
           style="{{ request()->is('pets') ? 'font-weight: bold; color: violet;' : '' }}">View</a></li>
    <li><a class="dropdown-item" href="/pets/type" wire:navigate
           style="{{ request()->is('pets/type') ? 'font-weight: bold; color: violet;' : '' }}">Add</a></li>
  </ul>
</li>

        <li class="nav-item mt-2 me-lg-4">
          @livewire('admin.application-nav-item-with-count')
        </li>

        <li class="nav-item mt-2 me-lg-4">
          <x-nav-link-custom href="/create-report">
            {{ __('Create Report') }}
          </x-nav-link-custom>
        </li>
        @else
        <li class="nav-item mt-2 me-lg-4">
          <x-nav-link-custom href="/pets/browse" wire:navigate :active="request()->routeIs('pets/browse')">
            {{ __('Browse Pets') }}
          </x-nav-link-custom>
        </li>

        <li class="nav-item mt-2 me-lg-4">
          @livewire('customer.my-applications-nav-item-with-count')
        </li>
        @endif
      </ul>
    </div>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <x-nav-link-custom :active="request()->routeIs('profile.show')" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->email }}
            </x-nav-link-custom>
            <ul class="dropdown-menu ">
              <li><x-nav-link-custom :active="request()->routeIs('profile.show')" href="{{ route('profile.show') }}" style="color: black">Profile</x-nav-link-custom></li>
              <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                  <x-nav-link-custom :active="false" href="{{ route('logout') }}" @click.prevent="$root.submit();" style="color: black" >
                    {{ __('Log Out') }}
                  </x-nav-link-custom>
                </form>
              </li>
            </ul>
          </li>

    </ul>
  </div>
</nav>
