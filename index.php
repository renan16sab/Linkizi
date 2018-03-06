


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Título da página</title>
    <script type="text/javascript" language="javascript">
    
    $(document).ready(function() {
 $('#salvar').click(function() {


$.ajax({
    type: 'POST',
    dataType: 'json',
    url: '._class/Actions.php',
    async: true,
    data: {action: 'register'},
}
    
});


    </script>
 
    <meta charset="utf-8">
  </head>
  <body>
  <h4>Cadastro de usuario</h4>
  <form id="cadUsuario" action="" method="post">
      <label>Nome:</label><input type="text" name="nome" id="nome" />
      <label>Email:</label><input type="text" name="email" id="email" />
      <label>Senha:</label> <input type="text" name="senha" id="senha" />
      <br/><br/>
      <input type="button" value="Salvar" id="salvar" />
  </form>
  </body>
</html>
