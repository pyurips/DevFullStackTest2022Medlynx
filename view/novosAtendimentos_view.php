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
<body style="background-color: rgb(92, 134, 134);">
    <div style="background-color: white; box-shadow: 0px 0px 10px 5px rgb(0, 0, 0, 0.3); width: 700px; height: 540px; position: absolute; margin: auto; left:0; right:0; bottom:0; top:0; display: flex; flex-direction: column; align-content: center; align-items: center; justify-content: center; overflow-y: auto;">
        <p style="font-weight: bold; letter-spacing: 2px;">CONFIRMAÇÃO DOS DADOS</p>
            <br><br><br>
        <p style="font-weight: bold;">Nome do paciente</p>
        <?php echo $data->getUniquePessoas($patientID)->nome ?>
            <br>
            <br>
        <p style="font-weight: bold;">Data e horário do atendimento</p>
        <?php echo $dataCompleta ?>
            <br>
            <br>
        <p style="font-weight: bold;">Itens, quantidades e valores</p>
        <?php
            foreach ($arrayItensData as $key => $value) {
                echo "<p>".$data->getUniqueItens($value['id_item'])->descricao.", ".$value['quantidade'].", R$".floatval($data->getUniqueItens($value['id_item'])->valor) * floatval($value['quantidade'])."</p>";
            }
        ?>
            <br>
            <br>
            <br>

        <form action="../controller/novosAtendimentos_controller.php" method="post">
            <?php 
                echo "<input name=\"patientID\" type=\"text\" value={$patientID} style=\"display: none;\"/>";
                echo "<input name=\"dataCompleta\" type=\"text\" value={$dataCompleta} style=\"display: none;\"/>";
                foreach ($_POST as $key => $value) {
                    if (str_contains($key, 'itemID')) {
                        echo "<input name=\"{$key}\" type=\"text\" value={$value} style=\"display: none;\"/>";
                    }
                }

                foreach ($_POST as $key => $value) {
                    if (str_contains($key, 'itemQuantity')) {
                        echo "<input name=\"{$key}\" type=\"text\" value={$value} style=\"display: none;\"/>";
                    }
                }
            ?>
            <button style="background-color: rgb(70, 168, 95); border: none; font-weight: bold; color: white; padding: 10px; cursor: pointer;" type="submit">Confirmar e enviar atendimento</button>
        </form>
    </div>
</body>
</html>