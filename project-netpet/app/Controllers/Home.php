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

    public function fetch_ip_data()
    {
        $client_ip = $this->request->getGet('ip');

        if ($client_ip) {
            $apiKey = 'd345c82037b14905843f101a253728d5';
            $ch = curl_init('https://api.ipgeolocation.io/ipgeo?apiKey=' . $apiKey . '&ip=' . $client_ip);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            $geo_info = json_decode($response, true);

            $netpet_fetch = [
                'ip_address' => $client_ip,
                'continent_name' => $geo_info['continent_name'],
                'country_name' => $geo_info['country_name'],
                'country_code3' => $geo_info['country_code3'],
                'city' => $geo_info['city'],
                'zipcode' => $geo_info['zipcode'],
                'organization' => $geo_info['organization'],
                'connection_type' => $geo_info['connection_type'],
                'currency_code' => $geo_info['currency']['code']
            ];

            return $this->response->setJSON($netpet_fetch);
        }
    }
}
