<?php

namespace Sienekib\Proto\Support;

use Sienekib\Proto\Proto;

class Helpers
{
    protected $viewPath = 'views/';
    protected $viewExtension = '.typos.php';

    /**
     * Renderiza uma view completa.
     *
     * @param string $pathToView Caminho para a view.
     * @param array $options Opções para a view, incluindo dados.
     */
    public function view(string $pathToView, array $options = [])
    {
        $view = $this->resolveViewPath($this->viewPath, $pathToView);

        if (!file_exists($view)) {
            echo 'Tela não Encontrada';
            exit(1);
        }

        $content = $this->renderView($view, $options);

        echo $content;
    }

    /**
     * Resolve o caminho absoluto para a view.
     *
     * @param string $in Diretório base.
     * @param string $pathToView Caminho relativo da view.
     * @return string Caminho absoluto da view.
     */
    private function resolveViewPath(string $in, string $pathToView): string
    {
        $path = $this->abs_path() . $in;

        if (str_contains($pathToView, '.')) {
            $partsView = explode('.', $pathToView);
            foreach ($partsView as $part) {
                if (is_dir($path . $part)) {
                    $path .= $part . '/';
                }
            }
            $view = $path . end($partsView) . $this->viewExtension;
        } else {
            $view = $path . $pathToView . $this->viewExtension;
        }

        return $view;
    }

    /**
     * Renderiza uma view e retorna o conteúdo.
     *
     * @param string $view Caminho da view.
     * @param array $options Opções para a view, incluindo dados.
     * @return string Conteúdo renderizado da view.
     */
    private function renderView(string $view, array $options): string
    {
        extract($options['data'] ?? []);

        ob_start();
        require $view;
        $content = ob_get_contents();
        ob_end_clean();

        $content = $this->replacePlaceholders($content, $options);

        return $content;
    }

    /**
     * Substitui placeholders no conteúdo da view.
     *
     * @param string $content Conteúdo da view.
     * @param array $options Opções para a view, incluindo dados.
     * @return string Conteúdo com placeholders substituídos.
     */
    private function replacePlaceholders(string $content, array $options): string
    {
        $content = str_replace('{{ title }}', $options['title'] ?? 'untitled', $content);

        $content = preg_replace_callback('/{{ asset\((.*?)\) }}/', function ($matches) {
            return $this->asset(trim($matches[1], '"\''));
        }, $content);

        $content = preg_replace_callback('/{{ partial\((.*?)\) }}/', function ($matches) use ($options) {
            $parts = explode(',', $matches[1]);
            $partialPath = trim(array_shift($parts), '"\'');
            $partialOptions = eval('return ' . implode(',', $parts) . ';') ?? [];
            return $this->partial($partialPath, array_merge($options, $partialOptions));
        }, $content);

        return $content;
    }

    /**
     * Retorna o caminho do asset.
     *
     * @param string $asset Caminho do asset.
     * @return string Caminho relativo do asset ou mensagem de erro.
     */
    private function asset(string $asset): string
    {
        $filePath = $this->abs_path() . "public/assets/{$asset}";
        if (file_exists($filePath)) {
            return "/assets/{$asset}?v=".time();
        }
        return "Arquivo de asset não encontrado: {$asset}";
    }

    /**
     * Renderiza um partial e retorna o conteúdo.
     *
     * @param string $partial Caminho do partial.
     * @param array $options Opções para o partial, incluindo dados.
     * @return string Conteúdo renderizado do partial.
     */
    private function partial(string $partial, array $options = []): string
    {
        $partialView = $this->resolveViewPath($this->viewPath . 'partials/', $partial);

        if (!file_exists($partialView)) {
            return "Partial não encontrado: {$partial}";
        }
        return $this->renderView($partialView, $options);
    }

    /**
     * Retorna o diretório relativo ao nível especificado.
     *
     * @param string $dir Diretório base.
     * @param int $level Nível de profundidade.
     * @return string Diretório relativo.
     */
    private function dirLevel(string $dir, int $level): string
    {
        return dirname($dir, $level) . '/';
    }

    /**
     * Retorna o caminho absoluto do diretório raiz.
     *
     * @return string Caminho absoluto.
     */
    private function abs_path(): string
    {
        return $this->dirLevel(Proto::abs(), 2);
    }
}


/*
class Session
{
    protected $timeout;

    public function __construct($timeout = 1800) // timeout padrão de 30 minutos
    {
        session_start();
        $this->timeout = $timeout;
        $this->checkSessionTimeout();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy()
    {
        session_unset();
        session_destroy();
    }

    protected function checkSessionTimeout()
    {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $this->timeout)) {
            $this->destroy();
        }

        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public function login($userId)
    {
        $this->set('user_id', $userId);
        $this->set('logged_in', true);
        $this->set('LAST_ACTIVITY', time()); // Atualiza a última atividade
    }

    public function logout()
    {
        $this->destroy();
    }

    public function isLoggedIn()
    {
        return $this->get('logged_in', false);
    }
}

// Exemplo de uso:

$session = new Session(1800); // Timeout de 30 minutos

// Login do usuário
$session->login(12345); // Passe o ID do usuário

if ($session->isLoggedIn()) {
    echo 'Usuário está logado.';
} else {
    echo 'Usuário não está logado ou a sessão expirou.';
}

// Logout do usuário
// $session->logout();


<?php

class Auth
{
    protected $session;
    protected $users;

    public function __construct(Session $session)
    {
        $this->session = $session;
        $this->users = $this->loadUsers();
    }

    protected function loadUsers()
    {
        // Carregar usuários de um armazenamento persistente (arquivo, banco de dados, etc.)
        // Aqui estamos usando um array como exemplo
        return [
            'user1' => ['password' => password_hash('password1', PASSWORD_DEFAULT)],
            'user2' => ['password' => password_hash('password2', PASSWORD_DEFAULT)],
        ];
    }

    public function register($username, $password)
    {
        if (isset($this->users[$username])) {
            throw new Exception("Usuário já existe.");
        }

        $this->users[$username] = [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->saveUsers();
    }

    public function login($username, $password)
    {
        if (!isset($this->users[$username])) {
            throw new Exception("Usuário não encontrado.");
        }

        if (!password_verify($password, $this->users[$username]['password'])) {
            throw new Exception("Senha incorreta.");
        }

        $this->session->login($username);
    }

    public function logout()
    {
        $this->session->logout();
    }

    public function check()
    {
        return $this->session->isLoggedIn();
    }

    public function user()
    {
        if ($this->check()) {
            return $this->session->get('user_id');
        }

        return null;
    }

    protected function saveUsers()
    {
        // Salvar usuários em um armazenamento persistente (arquivo, banco de dados, etc.)
        // Aqui estamos apenas imprimindo para fins de exemplo
        // Em um aplicativo real, você deve implementar a lógica de salvar em um arquivo ou banco de dados
        file_put_contents('users.json', json_encode($this->users));
    }
}

// Exemplo de uso:

$session = new Session(1800); // Timeout de 30 minutos
$auth = new Auth($session);

try {
    // Registrar um novo usuário
    $auth->register('newuser', 'newpassword');

    // Login do usuário
    $auth->login('newuser', 'newpassword');

    if ($auth->check()) {
        echo 'Usuário está logado: ' . $auth->user();
    } else {
        echo 'Usuário não está logado ou a sessão expirou.';
    }

    // Logout do usuário
    $auth->logout();

} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}


<?php

class Cache
{
    protected $cacheDir;
    protected $defaultTtl;

    public function __construct($cacheDir = 'cache/', $defaultTtl = 3600)
    {
        $this->cacheDir = rtrim($cacheDir, '/') . '/';
        $this->defaultTtl = $defaultTtl;

        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0755, true);
        }
    }

    public function set($key, $value, $ttl = null)
    {
        $ttl = $ttl ?? $this->defaultTtl;
        $data = [
            'expires_at' => time() + $ttl,
            'value' => $value
        ];

        $cacheFile = $this->cacheDir . md5($key);
        file_put_contents($cacheFile, serialize($data));
    }

    public function get($key)
    {
        $cacheFile = $this->cacheDir . md5($key);

        if (!file_exists($cacheFile)) {
            return null;
        }

        $data = unserialize(file_get_contents($cacheFile));

        if (time() > $data['expires_at']) {
            unlink($cacheFile);
            return null;
        }

        return $data['value'];
    }

    public function delete($key)
    {
        $cacheFile = $this->cacheDir . md5($key);

        if (file_exists($cacheFile)) {
            unlink($cacheFile);
        }
    }

    public function clear()
    {
        $files = glob($this->cacheDir . '*');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}

// Exemplo de uso:

$cache = new Cache('cache/', 3600);

// Configura um valor no cache com uma chave
$cache->set('username', 'john_doe');

// Obtém o valor do cache usando a chave
echo $cache->get('username'); // john_doe

// Remove um valor do cache
$cache->delete('username');

// Limpa todos os valores do cache
$cache->clear();


<?php

class Redirection
{
    public static function to($url, $statusCode = 302)
    {
        header("Location: $url", true, $statusCode);
        exit();
    }

    public static function back()
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        self::to($referer);
    }

    public static function withMessage($url, $message, $statusCode = 302)
    {
        // Assuming a session or a temporary store for messages
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['flash_message'] = $message;
        self::to($url, $statusCode);
    }

    public static function withError($url, $error, $statusCode = 302)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['flash_error'] = $error;
        self::to($url, $statusCode);
    }
}

// Exemplo de uso:

// Redireciona para uma URL específica
// Redirection::to('https://example.com');

// Redireciona para a página anterior
// Redirection::back();

// Redireciona com uma mensagem flash
// Redirection::withMessage('https://example.com', 'Login successful');

// Redireciona com uma mensagem de erro
// Redirection::withError('https://example.com', 'Login failed');


<?php

class Csrf
{
    protected $sessionKey;
    protected $token;

    public function __construct($sessionKey = 'csrf_token')
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->sessionKey = $sessionKey;
    }

    public function generateToken()
    {
        $this->token = bin2hex(random_bytes(32));
        $_SESSION[$this->sessionKey] = $this->token;
        return $this->token;
    }

    public function getToken()
    {
        if (!isset($_SESSION[$this->sessionKey])) {
            return $this->generateToken();
        }
        return $_SESSION[$this->sessionKey];
    }

    public function validateToken($token)
    {
        if (!isset($_SESSION[$this->sessionKey]) || $_SESSION[$this->sessionKey] !== $token) {
            return false;
        }
        return true;
    }

    public function clearToken()
    {
        unset($_SESSION[$this->sessionKey]);
    }

    public function checkCsrfToken()
    {
        // Apenas para os métodos POST, PUT e DELETE
        if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT' || $_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $submittedToken = $_POST['csrf_token'] ?? '';

            if (!$this->validateToken($submittedToken)) {
                throw new Exception('Token CSRF inválido.');
            }

            // Limpar o token após a validação para evitar reutilização
            $this->clearToken();
        }
    }
}


<?php

class CorsHandler
{
    protected $allowedOrigins;
    protected $allowedMethods;
    protected $allowedHeaders;
    protected $allowCredentials;
    protected $maxAge;

    public function __construct(array $allowedOrigins = [], array $allowedMethods = [], array $allowedHeaders = [], $allowCredentials = true, $maxAge = 86400)
    {
        $this->allowedOrigins = $allowedOrigins;
        $this->allowedMethods = $allowedMethods;
        $this->allowedHeaders = $allowedHeaders;
        $this->allowCredentials = $allowCredentials;
        $this->maxAge = $maxAge;
    }

    public function handlePreflightRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS' && isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
            $origin = $_SERVER['HTTP_ORIGIN'] ?? '*';
            if ($this->isOriginAllowed($origin)) {
                header("Access-Control-Allow-Origin: $origin");
                header("Access-Control-Allow-Methods: " . implode(', ', $this->allowedMethods));
                header("Access-Control-Allow-Headers: " . implode(', ', $this->allowedHeaders));
                header("Access-Control-Max-Age: {$this->maxAge}");
                if ($this->allowCredentials) {
                    header('Access-Control-Allow-Credentials: true');
                }
                exit();
            }
        }
    }

    public function handleActualRequest()
    {
        $origin = $_SERVER['HTTP_ORIGIN'] ?? '*';
        if ($this->isOriginAllowed($origin)) {
            header("Access-Control-Allow-Origin: $origin");
            if ($this->allowCredentials) {
                header('Access-Control-Allow-Credentials: true');
            }
        }
    }

    protected function isOriginAllowed($origin)
    {
        if (in_array('*', $this->allowedOrigins)) {
            return true;
        }

        return in_array($origin, $this->allowedOrigins);
    }
}

// Exemplo de uso:

// Configuração permitindo qualquer origem, qualquer método, qualquer cabeçalho, com credenciais permitidas e tempo máximo de cache de 1 dia
$corsHandler = new CorsHandler(['*'], ['GET', 'POST', 'PUT', 'DELETE'], ['Content-Type'], true, 86400);

// Para lidar com uma requisição de preflight (OPTIONS)
$corsHandler->handlePreflightRequest();

// Para lidar com uma requisição real
$corsHandler->handleActualRequest();

// Se a requisição atual precisa de autorização CORS, essas funções lidarão com ela apropriadamente.


// Exemplo de configuração CORS
$allowedOrigins = ['http://example.com', 'https://example.org'];
$allowedMethods = ['GET', 'POST', 'PUT', 'DELETE'];
$allowedHeaders = ['Content-Type', 'Authorization'];
$allowCredentials = true;
$maxAge = 86400; // 1 dia em segundos
// Inicialização da classe CorsHandler
$corsHandler = new CorsHandler($allowedOrigins, $allowedMethods, $allowedHeaders, $allowCredentials, $maxAge);

$corsHandler->handlePreflightRequest();

$corsHandler->handleActualRequest();

<?php
// index.php ou ponto de entrada da sua aplicação

// Configuração CORS
$allowedOrigins = ['http://example.com', 'https://example.org'];
$allowedMethods = ['GET', 'POST', 'PUT', 'DELETE'];
$allowedHeaders = ['Content-Type', 'Authorization'];
$allowCredentials = true;
$maxAge = 86400; // 1 dia em segundos

// Inicialização da classe CorsHandler
$corsHandler = new CorsHandler($allowedOrigins, $allowedMethods, $allowedHeaders, $allowCredentials, $maxAge);

// Lidar com requisições CORS
$corsHandler->handlePreflightRequest(); // Lidar com requisição de preflight (OPTIONS)
$corsHandler->handleActualRequest(); // Lidar com requisição real

// Restante do código da sua aplicação continua aqui...





<?php

class hh
{
    public static function initSx()
    {
        // Definir um objeto com métodos internos
        $obj = new stdClass();

        $obj->name = function() {
            return "Hello, I'm name()";
        };

        $obj->another = function() {
            return "Hello, I'm another()";
        };

        // Retornar o objeto para permitir chamadas encadeadas
        return $obj;
    }
}

// Uso:
$result = hh::initSx();
echo $result->name();  // Saída: Hello, I'm name()
echo $result->another();  // Saída: Hello, I'm another()
*/
