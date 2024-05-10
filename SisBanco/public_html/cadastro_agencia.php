<!DOCTYPE html>
<?php
    include 'conexaoMysql.php';
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Agência</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        select, input[type="text"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Agência</h2>
        <form method="post" action="manipula.php" id="formCadastroAgencia">
            <label for="selectBanco">Selecione o Banco:</label>
            <select id="selectBanco" name="selectBanco">
                <?php
                    $query = "select * from tb_banco order by idTB_BANCO";
                    $resultado = mysqli_query($conexao, $query);
                    $dados_array = mysqli_fetch_assoc($resultado);
                    do{
                        echo "<option value=".$dados_array['NomeBanco'].">".$dados_array['NomeBanco']."</option>";
                    }while($dados_array = mysqli_fetch_assoc($resultado))
                ?>
            </select>
            <label for="nomeAgencia">Nome da Agência:</label>
            <input type="text" name="nomeAgencia" id="nomeAgencia" placeholder="Nome da Agência">
            <button name="salvar" value="CDAgencia" id="btnSalvarAgencia" type="submit">Salvar</button>
        </form>
    </div>
<!--
    <script>
        // Simulação de dados de bancos
        const bancos = ["Banco A", "Banco B", "Banco C"]; // Substitua pelos seus próprios dados

        // Carregar os bancos no select
        const selectBanco = document.getElementById("selectBanco");
        bancos.forEach(banco => {
            const option = document.createElement("option");
            option.text = banco;
            selectBanco.add(option);
        });

        // Evento de envio do formulário
        document.getElementById("formCadastroAgencia").addEventListener("submit", function(event) {
            event.preventDefault(); // Impede o comportamento padrão de envio do formulário

            const nomeAgencia = document.getElementById("nomeAgencia").value.trim();
            const nomeBanco = selectBanco.value;

            if (nomeAgencia === "") {
                alert("Por favor, insira o nome da agência.");
                return;
            }

            // Aqui você pode adicionar a lógica para salvar a agência, como enviar para o backend, etc.
            console.log("Banco selecionado:", nomeBanco);
            console.log("Nome da agência:", nomeAgencia);

            // Resetar o formulário após salvar
            document.getElementById("formCadastroAgencia").reset();
        });
    </script>
-->
</body>
</html>