<div class="p-5" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col text-center">
            <h1 class="display-5 fw-semibold">
                Select the Type of Pet
            </h1>
            <br>
        </div>
    </div>
    <div class="row justify-content-center gy-4"> 
        <div class="col-md-4">
            <div class="dog-btn text-center">
                 <a href="/pets/create/dog">
                <img src="{{ asset('pictures/Dog.png') }}" alt="" class="img-fluid mb-3">
                 </a>
            </div>
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h1 class="display-4">
                        <a href="/pets/create/dog" class="text-decoration-none d-block" style="color: black;"> <i class="fas fa-dog"> Dog</i></a>
                    </h1>
                </div>
            </div>
        </div>
        
    <div class="col-md-4">
        <div class="cat-btn text-center">
            <a href="/pets/create/cat">
                <img src="{{ asset('pictures/Cat.png') }}" alt="" class="img-fluid mb-3">
            </a>
        </div>
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h1 class="display-4">
                    <a href="/pets/create/cat" class="text-decoration-none" style="color: black;"> <i class="fas fa-cat"> Cat</i></a>
                </h1>
            </div>
        </div>
    </div>
</div>
</div>