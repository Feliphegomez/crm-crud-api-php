<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * Git: https://github.com/Feliphegomez/crm-crud-api-php
 * *******************************
 */
 
require_once('config.php');
class BaseClass {
	public $folders;
	public $module;
	
	public $protocol;
	public $port;
	public $host;
	public $path;
	
	function __construct() {
		$this->setServer();
		$this->path = $this->getPath();
		$this->folders = new stdClass();
		$this->folders->principal = dirname(dirname(__FILE__) . '..' . DIRECTORY_SEPARATOR);
		$this->folders->admin = (dirname(__FILE__));
		$this->module = $this->getModule();
		
	}
	
	function getPath() : string {
		$a = null;
		
        if (!isset($_SERVER['REQUEST_URI'])) {
            $_SERVER['REQUEST_URI'] = '/';
        }
		$a = $_SERVER['REQUEST_URI'];
		return $a;
	}
	
	function getModule() : string {
		$a = 'default';
		
		
        if (!isset($_SERVER['REQUEST_URI'])) {
            $_SERVER['REQUEST_URI'] = '/';
        }
		$a = $_SERVER['REQUEST_URI'];
		return $a;
	}
	
    function setServer()
    {
        $this->protocol = @$_SERVER['HTTP_X_FORWARDED_PROTO'] ?: @$_SERVER['REQUEST_SCHEME'] ?: ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") ? "https" : "http");
        $this->port = @intval($_SERVER['HTTP_X_FORWARDED_PORT']) ?: @intval($_SERVER["SERVER_PORT"]) ?: (($this->protocol === 'https') ? 443 : 80);
        $this->host = @explode(":", $_SERVER['HTTP_HOST'])[0] ?: @$_SERVER['SERVER_NAME'] ?: @$_SERVER['SERVER_ADDR'];
        $this->port = ($this->protocol === 'https' && $this->port === 443) || ($this->protocol === 'http' && $this->port === 80) ? '' : ':' . $this->port;
        $this->path = @trim(substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '/openapi')), '/');
		return true;
    }
	
    public function register(string $method, string $path, array $handler)
    {
        $routeNumber = count($this->routeHandlers);
        $this->routeHandlers[$routeNumber] = $handler;
        if ($this->registration) {
            $parts = explode('/', trim($path, '/'));
            array_unshift($parts, $method);
            $this->routes->put($parts, $routeNumber);
        }
    }
	
    public static function getOperation(): string
    {
        $method = $request->getMethod();
        $path = RequestUtils::getPathSegment($request, 1);
        $hasPk = RequestUtils::getPathSegment($request, 3) != '';
        switch ($path) {
            case 'openapi':
                return 'document';
            case 'columns':
                return $method == 'get' ? 'reflect' : 'remodel';
            case 'records':
                switch ($method) {
                    case 'POST':
                        return 'create';
                    case 'GET':
                        return $hasPk ? 'read' : 'list';
                    case 'PUT':
                        return 'update';
                    case 'DELETE':
                        return 'delete';
                    case 'PATCH':
                        return 'increment';
                }
        }
        return 'unknown';
    }
}

class SubClass extends BaseClass {
	function __construct() {
		parent::__construct();
		print "En el constructor SubClass\n";
	}
}

class CRM extends BaseClass {
	
	function __construct(){
		// heredando el constructor BaseClass::__construct()
		parent::__construct();
		// Detectar folder principal
		echo 'folder_principal: ' . $this->folders->principal;
		echo '<hr> ';
		// Detectar folder `crm-admin`
		echo 'folder_principal: ' . $this->folders->admin;
		echo '<hr> ';
		// Detectar protocol actual
		echo 'protocol: ' . $this->protocol;
		echo '<hr> ';
		// Detectar port actual
		echo 'port: ' . $this->port;
		echo '<hr> ';
		// Detectar host actual
		echo 'host: ' . $this->host;
		echo '<hr> ';
		// Detectar path actual
		echo 'path: ' . $this->path;
		echo '<hr> ';
	}
}

