<?php	
	session_start();

	function usuarioEstaLogado() {
		return isset($_SESSION["usuario_logado"]);
	}

	function usuarioLogado() {
		return $_SESSION["usuario_logado"];
	}

	function logaUsuario($email) {
		$_SESSION["usuario_logado"] = $email;
	}

	function verificaUsuario() {
		if(!usuarioEstaLogado()) {
			$_SESSION["danger"] = "Voce nao tem acesso a esta funcionalidade.";
			header("Location: index.php");
			die();
		}
	}

	function logout() {
		session_destroy();
		session_start();
	}