<?php
/**
 * Class Bootstrap
*/

class Bootstrap
{
	private $_url = null;
	private $_controller = null;

	private $_errorFile = 'error.php';

	/**
	 * Inicia o Bootstrap
	 *
	 * @return boolean
	 */
	public function init()
	{
		$this->_getUrl();

		if (empty($this->_url[0])) {
			$this->_url[0] = 'index';
		}

		$this->_controller();
		$this->_method();

		return false;
	}

	/**
	 * Método para obter o conteúdo da variável 'url' de HTTP GET. 
	 * Veja o arquivo .htaccess para obter mais informação.
	 */
	private function _getUrl()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$this->_url = explode('/', $url);
	}

	/**
	 * Método que inicializa o controller que corresponde com a url atual.
	 *
	 * @return bool
	 */
	private function _controller()
	{
		$file = DIR_CONTROLLERS . $this->_url[0] . '.php';

		if (file_exists($file)) {
			require $file;

			$controller = "App\Controllers\\" . $this->_url[0];

			$this->_controller = new $controller($this->_url[0]);

			return false;
		} else {
			$this->_error();
			return false;
		}

	}

	/**
	 * Método que chama o método de acordo com a url buscado acima.
	 */
	private function _method()
	{
		$length = count($this->_url);

		if ($length > 1) {
			if (!method_exists($this->_controller, $this->_url[1])) {
				$this->_error();
			}
		}

		switch ($length) {
			case 5:
				//Controller->Method(Param1, Param2, Param3)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
				break;

			case 4:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
				break;

			case 3:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;

			case 2:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}();
				break;

			default:
				$this->_controller->index();
				break;
		}
	}

	/**
	 * Apresenta uma página de erro se não houver nenhum controller, correspondente com a url atual.
	 */
	private function _error()
	{
		require DIR_CONTROLLERS . $this->_errorFile;

		$this->_controller = new \App\Controllers\Error();
		$this->_controller->index();

		exit;
	}

}
