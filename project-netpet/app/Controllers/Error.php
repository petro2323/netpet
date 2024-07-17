<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Error extends BaseController
{
    public function error_message($message, $code)
    {
        return view('error', ['message' => $message, 'status_code' => $code]);
    }
}
