<?php


namespace AdnanHussainTurki\ListMonk;

use AdnanHussainTurki\ListMonk\Controllers\ListsController;
use AdnanHussainTurki\ListMonk\Controllers\SubscribersController;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ListMonk
{
    private $serverUrl;
    private $username;
    private $password;
    private $listsController;
    private $subscribersController;

    public function __construct($serverUrl, $username, $password)
    {
        $this->serverUrl = $serverUrl;
        $this->username = $username;
        $this->password = $password;
    }

    public function lists()
    {
        $this->listsController = new ListsController($this);
        return $this->listsController;
    }

    public function subscribers()
    {
        $this->subscribersController = new SubscribersController($this);
        return $this->subscribersController;
    }

    public function getServerUrl()
    {
        return $this->serverUrl;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function http($path, $method = "get", $data = [])
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Basic ' . base64_encode($this->username . ":" . $this->password)
        ];
        if (strtolower($method) == "get") {
            $request = new Request(strtoupper($method), $this->serverUrl . $path, $headers);
        } else {
            $headers['Content-Type'] = 'application/json';
            $request = new Request(strtoupper($method), $this->serverUrl . $path, $headers, json_encode($data));
        }
        $res = $client->sendAsync($request)->wait();
        return $res->getBody();
    }
}
