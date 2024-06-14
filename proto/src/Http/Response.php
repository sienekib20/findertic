<?php

namespace Sienekib\Proto\Http;

class Response
{
    private array $headers = [];
    private int $statusCode = 200;

    public function __construct()
    {
        //$this->setHeader('Access-Control-Allow-Origin', '*');
        $this->setHeader('Access-Control-Allow-Headers', 'Content-Type');
        $this->setHeader('Access-Control-Allow-Credentials', 'true');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            $this->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
            $this->send();
        }
    }

    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function json(mixed $data, $status = 200)
    {
        http_response_code($status);
        $this->setHeader('Content-Type', 'application/json');
        $this->send(json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    public function setHeader(string $header, string $value)
    {
        $this->headers[$header] = $value;
    }

    public function send(string $content = '')
    {
        $this->sendHeaders();
        echo $content;
        exit;
    }

    public function sendHeaders()
    {
        if (!headers_sent()) {
            foreach ($this->headers as $header => $value) {
                header("$header: $value");
            }
            http_response_code($this->statusCode);
        }
    }
}
?>
<?php
/*
class Response
{
    protected $content;
    protected $statusCode;
    protected $headers;

    public function __construct($content = '', $statusCode = 200, $headers = [])
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    public function send()
    {
        http_response_code($this->statusCode);

        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }

        echo $this->content;
    }

    public static function json($data, $statusCode = 200, $headers = [])
    {
        $headers['Content-Type'] = 'application/json';
        $content = json_encode($data);

        $response = new self($content, $statusCode, $headers);
        return $response;
    }

    public static function text($data, $statusCode = 200, $headers = [])
    {
        $headers['Content-Type'] = 'text/plain';
        $response = new self($data, $statusCode, $headers);
        return $response;
    }
}

// Exemplo de uso:

// Cria uma resposta HTML
$response = new Response('<h1>Hello, World!</h1>', 200, ['Content-Type' => 'text/html']);
$response->send();

// Cria uma resposta JSON
$jsonResponse = Response::json(['message' => 'Hello, World!'], 200);
$jsonResponse->send();

// Cria uma resposta de texto simples
$textResponse = Response::text('Hello, World!', 200);
$textResponse->send();


*/