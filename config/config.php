<?php 
namespace config;

/*
 * Arquivo de Configuração
 *
 * Este arquivo contém as configurações base deste aplicação:
 *  - Constantes Base
 *  - Constantes de Diretórios
 *  - Configuração da Base de Dados
 *  - Definições de erros
 */

//1. Constantes Base
define('ROOT', dirname(__FILE__) . '/../');
define('URL', 'http://localhost/mt4/');
define('APP_TITLE', 'MT4 App');
define('SITE_TITLE', 'MT4 App');
define('PATH_IMAGES', URL  . 'assets/images/');

//2. Constantes de Diretórios
define('DIR_MODELS', ROOT  . 'src/App/Models/');
define('DIR_VIEWS', ROOT  . 'src/App/Views/');
define('DIR_CONTROLLERS', ROOT . 'src/App/Controllers/');

//3. Configuração da Base de Dados
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mt4');
define('DB_USER', 'root');
define('DB_PASS', '');

/*
 * 4. Definições de Erros
 *
 * Defina error_reporting:
 *  para -1 de forma a mostrar todos os erros que ocorrem;
 *  para  0 de forma a ocultar todos os erros gerados.
 */
error_reporting(E_ALL ^E_NOTICE);
ini_set( 'display_errors','-1');
