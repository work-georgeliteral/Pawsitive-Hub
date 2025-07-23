<div class="col large-card p-4 rounded-4">
    <div class="row mb-1">
        <h4 class="text-uppercase text-center">{{ $title }}</h4>
    </div>
    <div class="row g-4">

        <div class="col-sm-12">
            <div class="metric-card">
                <h5>Cats</h5>
                <h2>{{ $catsCount }}</h2>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="metric-card">
                <h5>Dogs</h5>
                <h2>{{ $dogsCount }}</h2>
            </div>
        </div>

        <div class="col-sm-12">
            <a href="{{ $link }}" wire:navigate>
                <div class="metric-card">
                    <h5>Total</h5>
                    <h2>{{ $petsCount }}</h2>
                </div>
            </a>
        </div>

    </div>
</div>
