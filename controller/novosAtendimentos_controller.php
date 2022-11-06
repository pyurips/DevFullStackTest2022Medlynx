<?php
    $patientID = $_POST['patientID'];
    $dataCompleta = $_POST['dataCompleta'];

    $arrayItensID = array();
    $arrayItensQuantity = array();
    foreach ($_POST as $key => $value) {
        if (str_contains($key, 'itemID')) {
            $arrayItensID[] = $value;
        }
    }

    foreach ($_POST as $key => $value) {
        if (str_contains($key, 'itemQuantity')) {
            $arrayItensQuantity[] = $value;
        }
    }

    $arrayItensAndQuantity = array_combine($arrayItensID, $arrayItensQuantity);

    $arrayItensData = array();
    foreach ($arrayItensAndQuantity as $key => $value) {
        $arrayItensData[] = ['id_item' => $key, 'quantidade' => $value];
    }

    $dados = [
        'id_pessoa' => $patientID,
        'data_atendimento' => $dataCompleta,
        'itens' => $arrayItensData
    ];

    $dadosJson = json_encode($dados);

    require_once '../model/novosAtendimentos_model.php';
?>