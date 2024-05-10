<!DOCTYPE html>
<?php
include 'conexaoMysql.php';
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Banco</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }

        input[type="text"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <button id="btnVoltar">Voltar</button>

        <h2>Cadastro de Banco</h2>
        
        <div class="form">
            <form method="post" action="manipula.php">
                <input type="text" name="nomeBanco" id="nomeBanco" placeholder="Nome do Banco">
                <button name="salvar" value="CDBanco" id="btnSalvarBanco">Salvar</button>
            </form>
        </div>
        

        <h2>Bancos Cadastrados</h2>

        <table id="tabelaBancos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Banco</th>
                </tr>
            </thead>
            <tbody id="corpoTabela">
                <?php
                    $query = "select * from tb_banco order by idTB_BANCO";
                    $resultado = mysqli_query($conexao, $query);
                    $dados_array = mysqli_fetch_assoc($resultado);
                    do{
                        
                        echo "<tr>";
                            echo"<td>".$dados_array['idTB_BANCO']."</td>";
                            echo"<td>".$dados_array['NomeBanco']."</td>";
                        echo "</tr>";
                    }while($dados_array = mysqli_fetch_assoc($resultado))
                ?>
                <!-- Aqui serão listados os bancos cadastrados -->
            </tbody>
        </table>
    </div>
<!--
    <script>
        
        // Simulação de dados
        let bancos = [];

        // Carregar os bancos cadastrados na tabela
        function carregarBancos() {
            const corpoTabela = document.getElementById("corpoTabela");
            corpoTabela.innerHTML = "";
            bancos.forEach((banco, index) => {
                const row = `<tr><td>${index + 1}</td><td>${banco}</td></tr>`;
                corpoTabela.innerHTML += row;
            });
        }

        // Adicionar evento de clique ao botão de salvar
        document.getElementById("btnSalvarBanco").addEventListener("click", () => {
            const nomeBanco = document.getElementById("nomeBanco").value.trim();
            if (nomeBanco !== "") {
                bancos.push(nomeBanco);
                carregarBancos();
                document.getElementById("nomeBanco").value = "";
            } else {
                alert("Por favor, insira o nome do banco.");
            }
        });
        
        // Inicializar a tabela ao carregar a página
        window.onload = () => {
            carregarBancos();
        };
    </script>
    -->
    <script>
        
        // Adicionar evento de clique ao botão voltar
        document.getElementById("btnVoltar").addEventListener("click", () => {
            window.location.href = "index.html";
        });
        
    </script>
</body>
</html>