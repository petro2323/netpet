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
    <a href="<?= base_url('/') ?>"><img src="<?= base_url('photos/logo.PNG') ?>"></a>
</div>
    
<?php if (isset($local_data) && isset($public_data)): ?>

<div class="container mt-3 mb-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-dark table-striped table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Field</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>public_ip_address</td>
                        <td><?= ($public_data['public_ip']) ? $public_data['public_ip'] : 'N/A' ?></td>
                    </tr>
                    <tr>
                        <td>private_ip_address</td>
                        <td><?= ($local_data['Wireless LAN adapter Wi-Fi']['IPv4 Address. . . . . . . . . . .']) ? $local_data['Wireless LAN adapter Wi-Fi']['IPv4 Address. . . . . . . . . . .'] : 'N/A' ?></td>
                    </tr>
                    <tr>
                        <td>subnet_mask</td>
                        <td><?= ($local_data['Wireless LAN adapter Wi-Fi']['Subnet Mask . . . . . . . . . . .']) ? $local_data['Wireless LAN adapter Wi-Fi']['Subnet Mask . . . . . . . . . . .'] : 'N/A' ?></td>
                    </tr>
                    <tr>
                        <td>connection_type</td>
                        <td><?= ($public_data['connection_type']) ? $public_data['connection_type'] : 'N/A' ?></td>
                    </tr>
                    <tr>
                        <td>continent_name</td>
                        <td><?= ($public_data['continent']) ? $public_data['continent'] : 'N/A' ?></td>
                    </tr>
                    <tr>
                        <td>country_name</td>
                        <td><?= ($public_data['country_name']) ? $public_data['country_name'] : 'N/A' ?></td>
                    </tr>
                    <tr>
                        <td>city</td>
                        <td><?= ($public_data['city']) ? $public_data['city'] : 'N/A' ?></td>
                    </tr>
                    <tr>
                        <td>zipcode</td>
                        <td><?= ($public_data['zipcode']) ? $public_data['zipcode'] : 'N/A' ?></td>
                    </tr>
                    <tr>
                        <td>internet_service_provider</td>
                        <td><?= ($public_data['organization']) ? $public_data['organization'] : 'N/A' ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container text-center mt-3">
    <h1 class="display-6 text-white">Network Details For Device: <?= gethostname() ?></h1>
</div>

<?php endif; ?>


<footer class="mt-5 text-white py-4">
    <div class="container text-center">
        <p>&copy; 2024 NetPet v1.0 - <a href="<?= base_url('privacy') ?>" class="text-white">Privacy Policy</a></p>
    </div>
</footer>

</body>
</html>