<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawsitive Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            padding: 150px 40px;
            min-height: calc(100vh - 72px);
            display: flex;
            align-items: center;
        }

        .content::before {
            content: "";
            background-image: url('https://www.pixelstalk.net/wp-content/uploads/2016/03/Dog-and-cat-wallpaper-download.jpg');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: right center;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 50%;
            z-index: 1;
        }

        .text-content {
            z-index: 2;
            position: relative;
            color: #333;
        }

        .line2 {
            color: #FF2D20;
        }
    </style>
</head>
<body>

<!-- Header -->
<!-- <header class="bg-light py-3">
    <div class="container">
        <h1 class="m-0">PetPal</h1>
    </div>
</header> -->

<!-- Main Content -->
<div class="content">
    <div class="container text-content">
        <div class="row">
            <div class="col">
                <h1 class="display-3 fw-bold">
                    <span class="line1">Find Your Perfect</span><br>
                    <span class="line2">Furry Friend</span>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <p class="lead mt-4 mb-5">Welcome to Pawsitive Hub, where we help you find the perfect companion to bring joy and love into your life.</p>
            </div>
        </div>

        <a href="/dashboard" class="btn btn-success btn-lg rounded-pill">Adopt a Pet</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
