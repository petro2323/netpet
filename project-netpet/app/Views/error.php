<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="icon" href="<?= base_url() ?>/photos/icon.png">
    <title>Error <?= $status_code ?>: <?= $message ?></title>
</head>
<body>

<div class="image-container text-center">
    <a href="<?= base_url('/') ?>"><img src="<?= base_url('photos/logo.png') ?>"></a>
</div>
    
<div class="container text-white text-center">
    <h1>Error <?= $status_code ?>: <?= $message ?></h1>
</div>

<footer class="mt-5 text-white py-4">
    <div class="container text-center">
        <p>&copy; 2024 NetPet v1.0 - <a href="<?= base_url('privacy') ?>" class="text-white">Privacy Policy</a></p>
    </div>
</footer>

</body>
</html>