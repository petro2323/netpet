<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $os = PHP_OS;

        if ($os === 'WINNT') {
            
            $command = 'powershell.exe -Command "(Get-NetRoute -DestinationPrefix \\"0.0.0.0/0\\" | Sort-Object -Property RouteMetric, InterfaceMetric | Select-Object -First 1 | Get-NetIPConfiguration).IPv4Address.IPAddress"';

            ob_start();
            system($command);
            $private_ip_address = ob_get_clean();

            $ch = curl_init('https://api.ipgeolocation.io/ipgeo?apiKey=d345c82037b14905843f101a253728d5');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            $json_data = json_decode($response, true);

            $public_info = [
                'public_ip' => $json_data['ip'],
                'continent' => $json_data['continent_name'],
                'country_name' => $json_data['country_name'],
                'city' => $json_data['city'],
                'zipcode' => $json_data['zipcode'],
                'organization' => $json_data['organization'],
                'connection_type' => $json_data['connection_type']
            ];

            return view('index', ['local_data' => $private_ip_address, 'public_data' => $public_info]);

        } else if ($os === 'Linux') {
            
            $command = "ip addr show \$default_iface | grep 'inet ' | grep -v '127.0.0.1' | awk '{print \$2}' | cut -d/ -f1";
            
            ob_start();
            system($command);
            $private_ip_address = ob_get_clean();

            $ch = curl_init('https://api.ipgeolocation.io/ipgeo?apiKey=d345c82037b14905843f101a253728d5');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            $json_data = json_decode($response, true);

            $public_info = [
                'public_ip' => $json_data['ip'],
                'continent' => $json_data['continent_name'],
                'country_name' => $json_data['country_name'],
                'city' => $json_data['city'],
                'zipcode' => $json_data['zipcode'],
                'organization' => $json_data['organization'],
                'connection_type' => $json_data['connection_type']
            ];
            
            return view('index', ['local_data' => $private_ip_address, 'public_data' => $public_info]);
        } else {
            return view('index');
        }
    }

    public function privacy() 
    {
        return view('privacy');
    }
}
