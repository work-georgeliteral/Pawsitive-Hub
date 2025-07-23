@props(['pet' => ''])
<div class="col-sm-12 col-md-6 col-lg-3">
    <div class="card rounded-4 shadow-lg {{ $pet->status != 'New' ? 'grayed-out' : '' }}">
        <div id="flip" class="flip-container">
            <div class="flipper">
                <div class="front p-3">
                    <div id="carousel-{{ $pet->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($pet->image_filenames as $index => $filename)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('pet-images/' . $pet->images_folder . '/' . $filename) }}" class="d-block w-100 rounded-3 carousel-image" alt="{{ $pet->name }}" data-carousel-id="{{ $pet->id }}" onclick="openPopUp('{{ $pet->id }}', {{ $index }})">
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
                <div class="back p-4">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ url('/pets/view-pet/' . $pet->id) }}" alt="QR Code" class="rounded-4" />
                </div>
            </div>
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col text-start">
                    <h5 class="card-title">
                        <marquee behavior="scroll" direction="left" style="overflow: hidden;">
                            {{ $pet->name }}
                        </marquee>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        {{ $pet->breed->name }}
                    </h6>

                    <p>
                        <span class="badge
                            {{
                                $pet->status == 'New' ? 'bg-primary' :
                                ($pet->status == 'Adopted' ? 'bg-success' :
                                'bg-danger')
                            }}">
                            {{ $pet->status }}
                        </span>
                    </p>
                </div>
                <div class="left-0 w-full" style="border-top: 1px solid rgb(177, 177, 177); border-bottom:1px solid rgb(177, 177, 177); padding:2px 0px 2px 0px;">
                    <div class="col d-flex justify-content-between">
                        <button class="btn p-0 border rounded" data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="View details"
                                style="padding: 5px 0px 5px 0px; width:100%; font-size:15px;">
                            <i class="lni lni-eye text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pet->id }}"><span>View</span></i>
                        </button>

                        <button class="btn border rounded" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Share link"
                                onclick="copyToClipboard('{{ url('/pets/view-pet/' . $pet->id) }}')"
                                style="padding: 5px 0px 5px 0px; width:100%; font-size:15px">
                            <i class="lni lni-share"><span>Copy Link</span></i>
                        </button>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Popup Container -->
<div class="pop-up-container" style="display: none;">
    <span class="close-button" onclick="closePopUp()">&times;</span>
    <button id="prevPopUp" class="carousel-control-prev" type="button" onclick="changeImage(-1)">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <img class="pop-up-image" src="" alt="">
    <button id="nextPopUp" class="carousel-control-next" type="button" onclick="changeImage(1)">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<script>
    function copyToClipboard(url) {
        const textarea = document.createElement('textarea');
        textarea.value = url;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);

        alert('Link copied to clipboard!');
    }
</script>
