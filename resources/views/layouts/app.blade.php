<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Pawsitive Hub</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />


        <!-- Scripts -->
        @vite(['resources/js/app.js'])


        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <style>
            body {
                background: #e4e4e4;
                background-repeat: no-repeat;
                background-size: 50% auto; /* Adjust the percentage as needed */
                background-position: center center; /* Ensures the image is centered */
            }



            .navbar-nav .nav-item.dropdown .nav-link.dropdown-toggle {
              color: white;
            }

            .navbar-nav .nav-item.dropdown .nav-link.dropdown-toggle:hover {
              color: violet;
            }

            .navbar-nav .nav-item.dropdown .nav-link.dropdown-toggle:active{
              color: violet;
            }

            .navbar-nav .nav-link {
              color: white;
            }

            .navbar-nav .nav-link:hover {
              color: violet;
            }

            .card {
                background-color: #fff;
                border-radius: 20px;
            }

            .style-table {
                width: 100%;
                border-collapse: collapse;
                background-color: white;
                border-radius: 10px;
                overflow: hidden;
            }

            .style-table th,
            .style-table td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            .style-table th {
                background-color: #f4f4f4;
            }

            .style-table tr:last-child td {
                border-bottom: none;
            }


            .flip-container {
                width: 100%;
                padding-top: 100%;
                position: relative;
                perspective: 1000px;
                cursor: pointer;
            }

            .flipper {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                transform-style: preserve-3d;
                transition: transform 0.6s;
                transition-delay: 0.3s;
            }

            .front,
            .back {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                backface-visibility: hidden;
            }

            .front img,
            .back img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .back {
                transform: rotateY(180deg);
            }

            .flip-container.flipped .flipper {
                transform: rotateY(180deg);
            }

            .dashboard-header {
                background-color: #f8f9fa;
                padding: 20px;
                border-bottom: 1px solid #dee2e6;
            }

            .large-card {
                background-color: #fff;
            }
            .metric-card {
                background: linear-gradient(135deg, #6e3f9d, #5d2a77);
                color: #fff;
                border-radius: 10px;
                padding: 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .metric-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .metric-card h2 {
                font-size: 2.5rem;
            }
            .metric-card .icon {
                font-size: 3rem;
            }
            .status-card {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                padding: 20px;
            }
            .stat-icon {
                font-size: 2rem;
                margin-bottom: 10px;
            }

            .nav-tabs .nav-link {
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                margin-bottom: -1px;
            }
            .nav-tabs .nav-link.active {
                background-color: #ffffff;
                border-color: #dee2e6 #dee2e6 #ffffff;
            }
            .tab-content {
                border: 1px solid #dee2e6;
                border-top: 0;
                padding: 15px;
                background-color: #ffffff;
            }
            .carousel {
                width: 100%;
                padding-top: 100%;
                position: relative;
            }

            .carousel-inner,
            .carousel-item,
            .carousel-item img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .carousel-control-prev,
            .carousel-control-next {
                top: 50%;
                transform: translateY(-50%);
            }

            .grayed-out {
                position: relative;
                z-index: 200;
                opacity: .6;
            }

            .grayed-out::before {
                content: "Unavailable";
                position: absolute;
                top: 35%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: rgba(0, 0, 0, 0.7);
                font-size: 2rem;
                font-weight: bold;
                z-index: 10;
                text-transform: uppercase;
                pointer-events: none;
            }
/* POPUP IMAGE */
.pop-up-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.8);
    z-index: 1000;
    width: 100%;
    overflow: hidden;
}

.pop-up-image {
    position: absolute;
    top: 53%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 80%;
    max-height: 80vh;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.close-button {
    position: absolute;
    top: 10%;
    right: 15%;
    font-size: 24px;
    color: white;
    cursor: pointer;
}

.carousel-control-prev, .carousel-control-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 24px;
    color: white;
    background: transparent;
    border: none;
    cursor: pointer;
}

.carousel-control-prev {
    left: 2%;
}

.carousel-control-next {
    right: 2%;
}

.carousel-control-prev-icon, .carousel-control-next-icon {
    display: inline-block;
    width: 20px;
    height: 20px;
    background-size: 100%, 100%;
    background-image: none;
}

.carousel-control-prev-icon {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%23fff" viewBox="0 0 8 8"><path d="M4.854 0L0 4l4.854 4 .707-.707L1.707 4 5.561.707z"/></svg>');
}

.carousel-control-next-icon {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%23fff" viewBox="0 0 8 8"><path d="M3.146 0L8 4 3.146 8l-.707-.707L6.293 4 2.439.707z"/></svg>');
}

.dog-btn img,
.cat-btn img {
    width: 60%;
    border: 4px solid #5d2a77;
    border-radius: 200px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3); /* Adds depth */
    transition: all 0.3s ease-in-out; /* Smooth transition for effects */
    cursor: pointer;
}

.dog-btn img:hover,
.cat-btn img:hover {
    transform: translateY(-10px); /* Lift the button on hover */
    box-shadow: 0 30px 30px rgb(0, 0, 0); /* More depth on hover */
}

.dog-btn img:active,
.cat-btn img:active {
    transform: translateY(10px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

</style>
    </head>
    <body>
        <x-navigation-menu-custom/>
        <div class="container-fluid p-4">
            {{ $slot }}
        </div>

        <script data-navigate-once src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script data-navigate-once src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script data-navigate-once>
            function toggleFlip(element) {
                element.classList.toggle('flipped');
            }
            document.addEventListener('livewire:navigated', () => {
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

                let selfie = document.querySelector('input[id="selfie"]');
                const pond3 = FilePond.create(selfie, {
                    server: {
                        url: 'selfie',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                });
                let inputElement = document.querySelector('input[id="photo"]');
                const pond = FilePond.create(inputElement, {
                    server: {
                        url: 'upload',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                });

            });

            document.addEventListener('DOMContentLoaded', function () {
                var exampleModal = document.getElementById('exampleModal');
                exampleModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    console.log('he');
                    var name = button.getAttribute('data-name');
                    var description = button.getAttribute('data-description');
                    var age = button.getAttribute('data-age');
                    var color = button.getAttribute('data-color');
                    var size = button.getAttribute('data-size');
                    var gender = button.getAttribute('data-gender');
                    var activityLevel = button.getAttribute('data-activity-level');

                    exampleModal.querySelector('#pet-name').textContent = name;
                    exampleModal.querySelector('#pet-description').textContent = description;
                    exampleModal.querySelector('#pet-age').textContent = age;
                    exampleModal.querySelector('#pet-color').textContent = color;
                    exampleModal.querySelector('#pet-size').textContent = size;
                    exampleModal.querySelector('#pet-gender').textContent = gender;
                    exampleModal.querySelector('#pet-activity-level').textContent = activityLevel;
                });
            });
            // IMAGE POPUP
            let currentPetId = null;
            let currentIndex = 0;
            let images = [];
            function openPopUp(petId, index) {
                currentPetId = petId;
                currentIndex = index;
                images = Array.from(document.querySelectorAll(`img[data-carousel-id="${petId}"]`)).map(img => img.src);
                showImage(currentIndex);
                document.querySelector('.pop-up-container').style.display = 'block';
            }

            function closePopUp() {
                document.querySelector('.pop-up-container').style.display = 'none';
            }

            function showImage(index) {
                if (index >= 0 && index < images.length) {
                    document.querySelector('.pop-up-image').src = images[index];
                    currentIndex = index;
                }
            }

            function changeImage(direction) {
                const newIndex = currentIndex + direction;
                if (newIndex >= 0 && newIndex < images.length) {
                    showImage(newIndex);
                }
            }

        </script>
        @livewireScripts
    </body>
</html>
