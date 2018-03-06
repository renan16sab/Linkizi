<?php

require_once('defineconexao.php');

class Conexao {

	// const USER = "root";
	// const PASS = "";

	private static $instance = null;

	private static function conectar() {

		try {
			if (self::$instance == null):
				$dsn = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE."";
				self::$instance = new PDO($dsn, DB_USERNAME , DB_PASSWORD);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			endif;
		} catch (PDOException $e) {
			echo "Erro: " . $e->getMessage();
		}
		return self::$instance;
	}

	protected static function getDB() {
		return self::conectar();
	}
}

?>