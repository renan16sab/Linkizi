<?php
@$action = $_POST['action'];

if(@$action == "register") {

    // $response = $_POST['captcha'];
    // $secret = '6LeHfT8UAAAAAMCToaalMuHB81YAoxx6SQXDpiOG;';
    
    // $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    // $captcha_success=json_decode($verify);
    // if ($captcha_success->success==false) {
    //     console.log("log: error");
    // } else if ($captcha_success->success==true) {
        if($_POST['resultado'] = true){
            if (isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['telefone'])) {
                $email = $_POST['email'];
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];
                $telefone = $_POST['telefone'];
                $object = new Usuario();
                $object->Cadastro($email, $nome, $senha, $telefone);
                $object->Login($email, $senha);
            }
        }
    }
}

if(@$action == "login") {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(($email) && ($senha)) {
        $object = new Usuario();
        $checkLogin = $object->Login($email, $senha);

        if($checkLogin == true) {
            echo "logged";
            // exit();
           } else {
            echo "erro1";
        }
    }
}
?>