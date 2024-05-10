<?php
include 'conexaoMysql.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $VAR_BTN = $_POST['salvar'];
    
    if($VAR_BTN == 'CDBanco'){
        $VAR_BANCO = $_POST['nomeBanco'];
    
        echo $VAR_BANCO;
    
        $query = "call cadBanco('$VAR_BANCO')";
    
        $resposta = mysqli_query($conexao, $query);
    
        echo '<script> window.alert("Banco cadastrado")</script>';
        echo "<meta HTTP-EQUIV='refresh' CONTENT='1; URL=cadastro_banco.php'>";
    }
    
    if($VAR_BTN == 'CDAgencia'){
        
        $VAR_BANCO = $_POST['selectBanco'];
        $VAR_AGENCIA = $_POST['nomeAgencia'];
    
        $query = "call cadAgencia('$VAR_BANCO','$VAR_AGENCIA')";
    
        $resposta = mysqli_query($conexao, $query);
    
        echo '<script> window.alert("Agência cadastrada")</script>';
        echo "<meta HTTP-EQUIV='refresh' CONTENT='1; URL=cadastro_agencia.php'>";
    }
    
}

?>