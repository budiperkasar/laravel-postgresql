<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbstractController extends Controller
{
    protected $statusCode;
    protected $message;
    protected $data;

    public function setStatus(int $code)
    {
        $this->statusCode = $code;
    }

    public function getStatus()
    {
        return $this->statusCode;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getResponse()
    {
        $json = array();
        $json['status']['code'] = $this->getStatus() ?? 404;
        $json['status']['message'] = $this->getMessage() ?? 'not found';
        $json['data'] = $this->getData();

        return $json;
    }
}
