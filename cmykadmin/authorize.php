<?php
	header("Content-type: text/html; charset=utf-8"); 
  // User name and password for authentication
  // Nome de usuário e senha foi autenticado, exibir página de pedido
  $username = 'teste';
  $password = 'teste';

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    // The user name/password are incorrect so send the authentication headers
	// O nome de usuario/password esta incorreto, enviar para cabeçalho de autenticaçãp
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="CMYK DESIGN"');
    exit('<h2>CMYK DESIGN, AVISO!</h2>Desculpe, você tem que digitar um nome de usuário e senha válidos para acessar está página');
  }
?>
