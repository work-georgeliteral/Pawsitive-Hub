@props(['title' => '', 'subtitle' => ''])
<h1 class="display-4 text-center mb-4">{{ $title }}</h1>
<div class="card shadow-lg">
    <div class="card-body">
        <div class="card-title">{{ $subtitle }}</div>
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>