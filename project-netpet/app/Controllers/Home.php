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
        if ($this->request->getHeader('X-Requested-With') && $this->request->getHeader('X-Requested-With')->getValue() === 'XMLHttpRequest') {
            
            $client_ip = $this->request->getGet('ip');

            $loc_url = getenv('LOCATION_DATA') . $client_ip;
            $location_data = $this->cURL($loc_url);

            array_walk($location_data, function(&$value) {
                if ($value == '') {
                    $value = null;
                }
            });

            $netpet_fetch = [
                'Ip Address' => $client_ip,
                'Country' => $location_data['country'] ?? 'N/A',
                'Country Code' => $location_data['country_iso'] ?? 'N/A',
                'City' => $location_data['city'] ?? 'N/A',
                'Time Zone' => $location_data['time_zone'] ?? 'N/A',
                'ISP' => $location_data['asn_org'] ?? 'N/A',
                'Name Address' => $location_data['hostname'] ?? 'N/A'
            ];

            return $this->response->setJSON($netpet_fetch);
        } else {
            
            $error = new Error();
            $this->response->setStatusCode(Response::HTTP_UNAUTHORIZED);

            return $error->error_message('Access Denied', $this->response->getStatusCode());
        }
    }

    public function cURL($path)
    {
            $ch = curl_init($path);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            return json_decode($response, true);
    }
}
