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
        $input = $this->request->getJSON();
        $client_ip = $input->ip;

        $apiKey = 'd345c82037b14905843f101a253728d5';
        $ch = curl_init('https://api.ipgeolocation.io/ipgeo?apiKey=' . $apiKey . '&ip=' . $client_ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $this->response->setJSON(json_decode($response, true));
    }
}
