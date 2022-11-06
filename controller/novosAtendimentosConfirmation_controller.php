<?php
    require_once '../model/model.php';
    $data = new APIData();

    $patientID = $_POST['patientID06'];
    $atendimentoData = $_POST['date06'];
    $atendimentoHorario = $_POST['time06'];
    $dataCompleta= str_replace('/', '-', date_format(date_create($atendimentoData." ".$atendimentoHorario),"d/m/Y H:i:s"));

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

    require_once '../view/novosAtendimentos_view.php';
?>