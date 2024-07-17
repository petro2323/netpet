<?php

namespace App\Controllers;

class Error extends BaseController
{
    public function error_message($message, $code)
    {
        return view('error', ['message' => $message, 'status_code' => $code]);
    }
}
