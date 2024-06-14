<?php

namespace Sienekib\Proto\Http;


class Request extends Response
{
    protected $data;
    protected $post;
    protected $server;
    protected $cookies;
    protected $files;
    protected $headers; 

    public function __construct()
    {
        $this->data = $_GET ?? [];
        $this->post = $_POST ?? [];
        $this->server = $_SERVER ?? [];
        $this->cookies = $_COOKIE ?? [];
        $this->files = $_FILES ?? [];
        $this->headers = $this->getHeaders();
    }

    protected function getHeaders()
    {
        if (function_exists('getallheaders')) {
            return getallheaders();
        }

        $headers = [];
        foreach ($this->server as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }

    public function all()
    {
        return (object) [
            'data' => $this->data,
            'post' => $this->post,
            'server' => $this->server,
            'cookies' => $this->cookies,
            'files' => $this->files,
        ];
    }

    public function get($key, $default = null)
    {
        return $this->get[$key] ?? $default;
    }

    public function post($key, $default = null)
    {
        return $this->post[$key] ?? $default;
    }

    public function server($key, $default = null)
    {
        return $this->server[$key] ?? $default;
    }

    public function cookie($key, $default = null)
    {
        return $this->cookies[$key] ?? $default;
    }

    public function file($key)
    {
        return $this->files[$key] ?? null;
    }

    public function header($key, $default = null)
    {
        $key = str_replace('_', '-', strtolower($key));
        return $this->headers[$key] ?? $default;
    }

    public function method()
    {
        return $this->server('REQUEST_METHOD', 'GET');
    }

    public function isPost()
    {
        return $this->method() === 'POST';
    }

    public function isGet()
    {
        return $this->method() === 'GET';
    }

    public function getUri()
    {
        return $this->server('REQUEST_URI', '/');
    }

    public function getPath()
    {
       $uri = $this->getUri();
       $queryString = $this->server('QUERY_STRING', '');
       return $queryString ? str_replace('?' . $queryString, '', $uri) : $uri;
    }


    public function validate(array $rules)
    {
        // Implementar validação baseada nas regras fornecidas
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    public function removeHeader($key)
    {
        unset($this->headers[$key]);
    }

    public function session($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function bind(array $request)
    {
        $entry = [];

        if ($this->isGet()) {
            $_GET = $request;
            $entry = $_GET;
        }

        if ($this->isPost()) {
            $_POST = $request;
            $entry = $_POST;
        }

        $this->filterInput($entry);
    }

    private function filterInput(array $entryPoint)
    {
        foreach ($entryPoint as $key => $value) {
            //$this->data[$key] = $this->isXmlHttpRequest() ? $value : strip_tags($value);
            //$this->entryPoint[$key] = $this->isXmlHttpRequest() ? $value : strip_tags($value);
            $this->entryPoint[$key] = strip_tags($value);
        }
    }

    /*
    

    private function renderRequestedData()
    {
        // Adicione os cabeçalhos CORS permitindo solicitações de qualquer origem
        // header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        // header("Access-Control-Allow-Credentials: true");

        $this->setHeader('Access-Control-Allow-Origin', '*');
        $this->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $this->setHeader('Access-Control-Allow-Headers', 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
        $this->setHeader('Access-Control-Allow-Credentials', 'true');
        $this->sendHeaders();

        if ($this->method() == 'GET') {
            foreach ($_GET as $key => $value) {
                $this->data[$key] = ($this->isXmlHttpRequest()) ? $value : strip_tags($value);
            }
        }

        if ($this->method() == 'POST') {
            foreach ($_POST as $key => $value) {
                $this->data[$key] = ($this->isXmlHttpRequest()) ? $value : strip_tags($value);
            }
        }

        return $this->data;
    }
    */

    public function __get($key)
    {

        return $this->data[$key] ? $this->data[$key] : $this->post[$key] ?? null;
    }

    private function isXmlHttpRequest()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
}