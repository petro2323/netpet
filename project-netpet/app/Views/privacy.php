<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="icon" href="<?= base_url() ?>/photos/icon.png">
    <title>NetPet - View Network Details</title>
</head>
<body>

<div class="image-container text-center">
    <a href="<?= base_url('/') ?>"><img src="<?= base_url('photos/logo.png') ?>"></a>
</div>
    
<div class="container text-white text-center">
    <h1><u>Privacy Policy</u></h1>
</div>

<div class="container text-white text-center mt-4">
    <p class="fs-5 fw-bold">What type of information does NetPet collect?</p>
    <p class="fs-5 mt-4">Our services are completely anonymous, and no information is logged.</p>
    <p class="fs-5 fw-bold mt-4">I see my public IP address is displayed, is this somehow logged or stored?</p>
    <p class="fs-5 mt-4">The IP address is displayed directly on the screen for your reference only and is not logged or stored in any way.</p>
    <p class="fs-5 fw-bold mt-4">Does NetPet use cookies?</p>
    <p class="fs-5 mt-4">No.</p>
    <p class="fs-5 fw-bold mt-4">How can I be sure that my activity on NetPet remains private?</p>
    <p class="fs-5">NetPet is committed to ensuring your privacy. We do not log, store, or share any information about your activity. All interactions are anonymous, and any data displayed is for your reference only and is not saved anywhere.</p>
</div>

<footer class="mt-5 text-white py-4">
    <div class="container text-center">
        <p>&copy; 2024 NetPet v1.0 - <a href="<?= base_url('privacy') ?>" class="text-white">Privacy Policy</a></p>
    </div>
</footer>

</body>
</html>