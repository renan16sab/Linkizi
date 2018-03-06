<?php
require_once('Conexao.class.php');

class Usuario extends Conexao {


    public function cadastro($nome, $sobrenome, $email, $senha){
        // if(!Usuario::emailExiste($email == true)){
            $pdo = parent::getDB();

            $cadastrar = $pdo->prepare("INSERT INTO usuario (nome, sobrenome, email, senha) VALUES (:nome, :sobrenome, :email, :senha)");
            $cadastrar->bindParam("nome", $nome);
            $cadastrar->bindParam("sobrenome", $sobrenome);
            $cadastrar->bindParam("email", $email);
            $cadastrar->bindParam("senha", $senha);

            $cadastrar->execute();

        }
    // }

    // public function emailExiste($email) {
	// 	$pdo = parent::getDB();

	// 	$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email=:email LIMIT 1");
	// 	$sql->bindParam('email', $email);
	// 	$sql->execute();
	// 	// $sql->fetch(PDO::FETCH_ASSOC);

	// 	$count = $sql->rowCount();

	// 	if($count >= 1) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }
   
    public function login($email){

        $pdo = parent::getDB();

        $login = $pdo->prepare("SELECT * FROM usuario WHERE email = :email LIMIT 1");
        $login->bindParam('email', $email);
        $login->execute();

        $count = $login->rowCount();

        $userdata = $logim->fetch(PDO::FETCH_OBJ);

        $passtest = $userdata->senha;
		$validPassword = password_verify($senha, $passtest);
		
		if($validPassword) {
			if($count == 1) {
				$dados = $userdata;
				session_start();
				$_SESSION['email'] = $dados->email;
				$_SESSION['nome'] = $dados->nome;
				$_SESSION['userid'] = $dados->id;
				$_SESSION['sobrenome'] = $dados->telefone;
				$_SESSION['logado'] = true;
				return true;
			} else {
				return false;
			}
		}


    }

    public static function deslogar() {
		if(isset($_SESSION['logado'])):
			unset($_SESSION['logado']);
			session_destroy();
			header("Location: ./index.php");
		endif;
	}

    
}

$usuario = new Usuario;
$var = $usuario->cadastro('renan', 'araujo', 'renan-ano11@hotmil.com', 'renan16');

?>