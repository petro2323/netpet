<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>NetPet</title>
</head>
<body>
    
<?php if (isset($local_data) && isset($public_data)): ?>

<div class="container mt-5">
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
                        <td><?= ($public_data['public_ip']) ? $public_data['public_ip'] : 'N/A'?> </td>
                    </tr>
                    <tr>
                        <td>private_ip_address</td>
                        <td><?= ($local_data['Wireless LAN adapter Wi-Fi']['IPv4 Address. . . . . . . . . . .']) ? $local_data['Wireless LAN adapter Wi-Fi']['IPv4 Address. . . . . . . . . . .'] : 'N/A' ?> </td>
                    </tr>
                    <tr>
                        <td>subnet_mask</td>
                        <td><?= ($local_data['Wireless LAN adapter Wi-Fi']['Subnet Mask . . . . . . . . . . .']) ? $local_data['Wireless LAN adapter Wi-Fi']['Subnet Mask . . . . . . . . . . .'] : 'N/A' ?> </td>
                    </tr>
                    <tr>
                        <td>connection_type</td>
                        <td><?= ($public_data['connection_type']) ? $public_data['connection_type'] : 'N/A' ?> </td>
                    </tr>
                    <tr>
                        <td>continent_name</td>
                        <td> <?= ($public_data['continent']) ? $public_data['continent'] : 'N/A' ?> </td>
                    </tr>
                    <tr>
                        <td>country_name</td>
                        <td> <?= ($public_data['country_name']) ? $public_data['country_name'] : 'N/A' ?> </td>
                    </tr>
                    <tr>
                        <td>city</td>
                        <td> <?= ($public_data['city']) ? $public_data['city'] : 'N/A' ?> </td>
                    </tr>
                    <tr>
                        <td>zipcode</td>
                        <td> <?= ($public_data['zipcode']) ? $public_data['zipcode'] : 'N/A' ?> </td>
                    </tr>
                    <tr>
                        <td>internet_service_provider</td>
                        <td> <?= ($public_data['organization']) ? $public_data['organization'] : 'N/A' ?> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<h1>Network Details For Device: <?= gethostname(); ?></h1>

<?php endif; ?>

</body>
</html>