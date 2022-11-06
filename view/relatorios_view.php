<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema da clínica</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body style="background-color: rgb(92, 134, 134); text-align: center; display: flex; flex-direction: column; align-content: center; align-items: center; justify-content: center;">
    <?php
        echo "<p style=\"font-weight: bold; margin-top: 30px; letter-spacing: 2px; font-size: 20px; margin-bottom: 50px;\">Número de relatório(s) encontrado(s): ".count($atendimentosArray)."</p>";

        foreach ($atendimentosArray as $key => $value) {
            echo "<div style=\"background-color: white; box-shadow: 0px 0px 10px 5px rgb(0, 0, 0, 0.3); width: 700px; height: 200px; display: flex; flex-direction: column; align-content: center; align-items: center; justify-content: center; overflow-y: auto; margin-bottom: 50px;\">";
                echo "<p style=\"padding: 5px;\">Data do atendimento: ".$value['data_atendimento']."</p>";
                echo "<br>";
                echo "<p style=\"padding: 5px;\">Nome do paciente: ".$value['nome_paciente']."</p>";
                echo "<br>";
                echo "<p style=\"padding: 5px;\">Itens utilizados e suas quantidades: ".$value['items_usados'][0].", ".$value['items_usados'][1]."</p>";
                echo "<br>";
                echo "<p style=\"padding: 5px;\">Valor total do atendimento: R$ ".$value['valor_total']."</p>";
                echo "<br>";
            echo "</div>";  
        }
    ?>
</body>
</html>