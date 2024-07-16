<?php

namespace App\Controllers;

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

    public function error_view($message, $code)
    {
        $this->response->setStatusCode($code);

        return view('error', ['message' => $message, 'status_code' => $code]);
    }

    public function fetch_ip_data()
    {
        $client_ip = $this->request->getGet('ip');

        if ($client_ip && preg_match('/^(?:[0-9]{1,3}\.){3}[0-9]{1,3}$/', $client_ip)) {
            $apiKey = getenv('GEOLOCATION_API_KEY');
            $ch = curl_init('https://api.ipgeolocation.io/ipgeo?apiKey=' . $apiKey . '&ip=' . $client_ip);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            $geo_info = json_decode($response, true);

            $netpet_fetch = [
                'Ip Address' => $client_ip,
                'Continent' => $geo_info['continent_name'],
                'Country' => $geo_info['country_name'],
                'Country Code' => $geo_info['country_code3'],
                'City' => $geo_info['city'],
                'Zipcode' => $geo_info['zipcode'],
                'Organization' => $geo_info['organization'],
                'Connection Type' => $geo_info['connection_type'],
                'Currency' => $geo_info['currency']['code']
            ];

            return $this->response->setJSON($netpet_fetch);
        } else {
            return $this->error_view('Client not found', 404);
        }
    }
}
