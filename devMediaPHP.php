<?php
session_start();
include_once 'conexao.php'; 
//conexao.php somente faz a conexão com banco de dados, define as credenciais e atrubi a variável $conn
//$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
 
$btn = filter_input(INPUT_POST, 'namebtn', FILTER_SANITIZE_STRING);
 
if($btn){
    //Recebe os dados do form
    $nom = filter_input(INPUT_POST, 'namenome', FILTER_SANITIZE_STRING);
    $sob = filter_input(INPUT_POST, 'namesobrenome', FILTER_SANITIZE_STRING);
    $rad = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_STRING);
 
    //Insere os dados no banco
    $get_data = "INSERT INTO info_tabela (nome, sobrenome, sexo) VALUES (:namenome, :namesobrenome, :radio)";
 
    $insert_data = $conn->prepare($get_data);
    $insert_data->bindParam(':namenome', $nom);
    $insert_data->bindParam(':namesobrenome', $sob);
    $insert_data->bindParam(':radio', $rad);
 
    if($insert_data->execute()){
        header("Location:pagina2.php"); //Se enviar corretamente redireciona para segunda página
    }else{
        $_SESSION['msg'] = "<p style='color:tomato;background:#fff;'>Não foi possível enviar suas informações, verifique e tente novamente.</p>";
        header("Location:index.php"); //Se não apresenta o erro
    }
}else{
    $_SESSION['msg'] = "<p style='color:tomato;'>Não foi possível enviar suas informações, verifique e tente novamente.</p>";
    header("Location:index.php"); 
}

?>

<!-- PÁGINA PAGINA2.PHP -->
<?php
    session_start();
?>
<html>
<form method="POST" action="2.php">
    <!-- ACTION 2.PHP RESPECTIVAMENTE -->
    <input type="text" name="namecidade" placeholder="Cidade">
    <input type="text" name="nameendereco" placeholder="Endereço">
    <input type="tex" name="namecep" placeholder="Cep">
    <input type="submit" name="namebtn" value="Próximo Passo">
</form>

</html>