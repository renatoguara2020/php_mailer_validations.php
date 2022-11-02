<?php
class Conexao {
    var $pdo;
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    }
    public function select($nome, $senha) {
        $stmt = $this->pdo->prepare("select * from login where nome = '$nome' and senha = '$senha'");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':senha', $senha);
        $run = $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}