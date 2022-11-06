<?php

    $descricao = $_POST['description05'];
    $atendimentoID = $_POST['id05'];
    $atendimentoData = $_POST['date05'];
    $atendimentoHorario = $_POST['time05'];
    $dataCompleta= str_replace('/', '-', date_format(date_create($atendimentoData." ".$atendimentoHorario),"d/m/Y H:i:s"));

    $dados = [
        'descricao' => $descricao,
        'id_atendimento' => $atendimentoID,
        'data' => $dataCompleta
    ];

    $dadosJson = json_encode($dados);

    require_once '../model/novasEvolucoes_model.php';
?>