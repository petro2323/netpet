<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
    
        $os = PHP_OS; //in development
        
        ob_start();
        system('ipconfig');
        $info = ob_get_clean();
        
        
        $adapters = [];
        $lines = explode("\n", str_replace("\r", "", $info));
        $currentAdapter = null;

        foreach ($lines as $line) {
            if (preg_match('/^(Ethernet adapter|Wireless LAN adapter|Tunnel adapter) (.+):$/', trim($line), $matches)) {
                $currentAdapter = $matches[1] . ' ' . $matches[2];
                $adapters[$currentAdapter] = [];
            } else if ($currentAdapter && preg_match('/^\s*([^:]+)\s*:\s*(.+)$/', trim($line), $matches)) {
                $key = trim($matches[1]);
                $value = trim($matches[2]);
                $adapters[$currentAdapter][$key] = $value;
            }
        }

        $jsonInfo = json_encode($adapters, JSON_PRETTY_PRINT);
        $assoc = json_decode($jsonInfo, true);

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

        return view('index', ['local_data' => $assoc, 'public_data' => $public_info]);
    }

    public function privacy() 
    {
        return view('privacy');
    }
}
