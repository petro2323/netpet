<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Response;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function privacy() 
    {
        return view('privacy');
    }

    public function fetch_ip_data()
    {
        $client_ip = $this->request->getGet('ip');
        $error = new Error();

        if ($client_ip && preg_match('/^(?:[0-9]{1,3}\.){3}[0-9]{1,3}$/', $client_ip)) {
            $apiKey = getenv('GEOLOCATION_API_KEY');
            $ch = curl_init('https://api.ipgeolocation.io/ipgeo?apiKey=' . $apiKey . '&ip=' . $client_ip);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            $geo_info = json_decode($response, true);

            array_walk($geo_info, function(&$value) {
                if ($value == '') {
                    $value = null;
                }
            });

            $netpet_fetch = [
                'Ip Address' => $client_ip,
                'Continent' => $geo_info['continent_name'] ?? 'N/A',
                'Country' => $geo_info['country_name'] ?? 'N/A',
                'Country Code' => $geo_info['country_code3'] ?? 'N/A',
                'City' => $geo_info['city'] ?? 'N/A',
                'Zipcode' => $geo_info['zipcode'] ?? 'N/A',
                'Organization' => $geo_info['organization'] ?? 'N/A',
                'Connection Type' => $geo_info['connection_type'] ?? 'N/A',
                'Currency' => $geo_info['currency']['code'] ?? 'N/A'
            ];

            return $this->response->setJSON($netpet_fetch);
        } else {
            $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
            return $error->error_message('Client not found', $this->response->getStatusCode());
        }
    }
}
