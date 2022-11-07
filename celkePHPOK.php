<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - Formulario com INSERT</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h2>Cadastrar Usuário</h2>
    <?php

try{
    $conn = new PDO('mysql:host=localhost;dbname=celke', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $stmt = $conn->prepare('INSERT INTO students (firstname, lastname, datanascimento) VALUES (:nome, :email, :message11)');
    // $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
    // $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    // $stmt->bindValue(':message1',$message, PDO::PARAM_STR);
    // $stmt->execute();

    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}




    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); 
    
    if(!empty($dados['SendCadUsuario'])){
        // var_dump($dados);

        $query_usuario = "INSERT INTO usuarios (nome, email, senha, sists_usuario_id, niveis_acesso_id, created) 
                VALUES (:nome, :email, :senha, :sists_usuario_id, :niveis_acesso_id, NOW())";
                $cad_usuario = $conn->prepare($query_usuario);
                $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                $senha_cript = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $cad_usuario->bindParam(':senha', $senha_cript);
                $cad_usuario->bindParam(':sists_usuario_id', $dados['sists_usuario_id'], PDO::PARAM_INT);
                $cad_usuario->bindParam(':niveis_acesso_id', $dados['niveis_acesso_id'], PDO::PARAM_INT);
                // $conn->beginTransaction();

                $cad_usuario->execute();

                if($cad_usuario->rowCount()){
                    echo '<div class="alert alert-success" role="alert">
                             <h3>New record created Successfully !!!<h3>
                          </div>';
                }else{
                    
                    echo '<div class="alert alert-danger" role="alert">
                               Unable to create new record! Try again later !!
                          </div>';
                }
    }


    ?>
    <form method="POST" action="">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome completo" required /><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Melhor e-mail do usuário" required /><br><br>

        <label>Senha: </label>
        <input type="password" name="senha" placeholder="Senha do usuário" required /><br><br>

        <label>Situação do Usuário: </label>
        <input type="number" name="sists_usuario_id" placeholder="Situação do usuário" required /><br><br>

        <label>Nível de Acesso: </label>
        <input type="number" name="niveis_acesso_id" placeholder="Nível de acesso do usuário" required /><br><br>

        <input type="submit" value="Cadastrar" name="SendCadUsuario" />
    </form>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>