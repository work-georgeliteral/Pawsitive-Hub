<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawsitive Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    body {
        background-color: #f0f2f5;
    }
    .hero {
        background: linear-gradient(to right, #f5f7fa, #c3cfe2);
        padding: 5rem 0;
        color: #333;
    }
    .hero h1 {
        font-size: 3rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }
    .carousel-item img {
        height: 500px; /* Fixed height */
        object-fit: cover; /* Maintain aspect ratio without distortion */
        width: 250%; /* Full width of the container */
        border-radius: 1rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }
    .pet-info-card {
        background: linear-gradient(135deg, #e2e2e2, #ffffff);
        border-radius: 1rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 1.5rem;
        transition: transform 0.3s, box-shadow 0.3s;
        margin-top: 50px;
    }
    .pet-info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }
    .pet-info-card h1 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 1rem;
    }
    .pet-info-card ul {
        padding-left: 0;
        margin-bottom: 1rem;
    }
    .pet-info-card ul li {
        font-size: 1.1rem;
        color: #4a5d23;
        border-bottom: 1px solid #e0e0e0;
        padding: 0.75rem 0;
        transition: background-color 0.3s, padding-left 0.3s;
        padding-left: 1rem;
    }
    .pet-info-card ul li:last-child {
        border-bottom: none;
    }
    .pet-info-card ul li:hover {
        background-color: #f5f7f3;
        padding-left: 1.5rem;
    }
    .pet-info-card strong {
        color: #2e3a12;
    }
    .text-muted {
        color: #666;
    }
    .header {
    background: #250046;
    justify-content: center;
    text-align: center;
    position: fixed; /* This will make it stick to the top */
    width: 100%; /* Ensure it spans the full width */
    z-index: 1030; /* Place it above other elements */
    top: 0%
}
    .container-logo{
        justify-content: center;
        gap: 10px;
    }
    .container-logo img{
    width: 50px;
    }
</style>
</head>

<body>

<header class="header fixed-top text-light py-2">
    <div class="container-logo text-center d-flex">
        <img src="{{asset('pictures/taaralogo.png')}}" alt="">
        <h1 class="m-0">Pawsitive Hub</h1>
    </div>
</header>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 align-content-center mb-4">
                <div class="card rounded-4 w-75">
                    <div id="flip" class="flip-container">
                        <div class="flipper">
                            <div class="front p-3">
                                <div id="carousel-{{ $pet->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($pet->image_filenames as $index => $filename)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('pet-images/' . $pet->images_folder . '/' . $filename) }}" class="d-block w-100 rounded-3" alt="{{ $pet->name }}">
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $pet->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $pet->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="pet-info-card">
                    <h1 class="display-4">{{ $pet->name }}</h1>
                    <ul class="list-unstyled mb-4">
                        <li><strong>Breed:</strong> {{ $pet->breed->name }}</li>
                        <li><strong>Age:</strong> {{ $pet->age }} years</li>
                        <li><strong>Color:</strong> {{ $pet->color }}</li>
                        <li><strong>Size:</strong> {{ $pet->size }} kg</li>
                        <li><strong>Gender:</strong> {{ ucfirst($pet->gender) }}</li>
                        <li><strong>Activity Level:</strong> {{ ucfirst($pet->activity_level) }}</li>
                        <li><strong>Status:</strong> {{ ucfirst($pet->status) }}</li>
                        <li><strong>Type:</strong> {{ ucfirst($pet->type) }}</li>
                    </ul>
                    <p class="text-muted">{{ $pet->description }}</p>
                    <div class="cta-text mt-4">
                        <p>Interested? Adopt a Pet now!</p>
                    </div>
                    <div class="adopt-button mt-3">
                        <a href="/login" class="btn btn-primary btn-lg">Adopt Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
