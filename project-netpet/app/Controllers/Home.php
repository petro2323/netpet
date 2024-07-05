<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $os = PHP_OS;

        if ($os === 'WINNT') {
        
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

            return view('index', ['local_data' => $adapters, 'public_data' => $public_info]);

        } else if ($os === 'Linux') {
            
            ob_start();
            system('ifconfig');
            $info = ob_get_clean();

            $adapters = [];
            $lines = explode("\n", str_replace("\r", "", $info));
            $currentAdapter = null;

            foreach ($lines as $line) {
                if (preg_match('/^(\S+): flags=/', trim($line), $matches)) {
                    $currentAdapter = $matches[1];
                    $adapters[$currentAdapter] = [];
                } else if ($currentAdapter && preg_match('/^\s*inet\s+((10\.\d+\.\d+\.\d+)|(172\.(1[6-9]|2\d|3[01])\.\d+\.\d+)|(192\.168\.\d+\.\d+))\s+netmask\s+(\d+\.\d+\.\d+\.\d+)/', trim($line), $matches)) {
                    $adapters[$currentAdapter]['IP Address'] = $matches[1];
                    $adapters[$currentAdapter]['Subnet Mask'] = $matches[6];
                }
            }

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
            
            return view('index', ['local_data' => $adapters[$currentAdapter], 'public_data' => $public_info]);
        }
    }

    public function privacy() 
    {
        return view('privacy');
    }
}
