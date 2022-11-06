<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema da clínica</title>
    <link rel="stylesheet" href="view/main.css">
</head>
<body>

    <div id="footer">
        <img id="doctorSVG" src="view/images/doctor.svg" alt="">
        <p id="magnoclinicaFooter">Magnoclínica</p>
    </div>

    <div id="loginContainer">
        <form action="main.php" method="post">
            <input spellcheck=false class="loginInput" type="text" value="drMagnovaldo">
            <input class="loginInput" type="password" value="qualquerSenha">
            <button type="button">Entrar no sistema</button>
        </form>
    </div>

    <div id="tablesContainer">
        <div id="tablesOptions">
            <button class="requisitesButton" id="requisite01" type="button">
                <p>Lista dos 5 itens com maior consumo nos atendimentos</p>
            </button>
            <button class="requisitesButton" id="requisite02" type="button">
                <p>Relatórios com todos atendimentos e valores</p>
            </button>
            <button class="requisitesButton" id="requisite03" type="button">
                <p>Evoluções com o diagnóstico de reação alérgica grave</p>
            </button>
            <button class="requisitesButton" id="requisite04" type="button">
                <p>Itens cadastrados no sistema</p>
            </button>
            <button class="requisitesButton" id="requisite05" type="button">
                <p>Realizar novas evoluções</p>
            </button>
            <button class="requisitesButton" id="requisite06" type="button">
                <p>Realizar novos atendimentos</p>
            </button>
        </div>

        <div id="tablesInfos">
            <div id="info01">
                <div class="tableInfo01">
                    <div class="descriptionAndQuantity01"><p>Descrição</p></div>
                    <div class="descriptionAndQuantity01"><p>Quantidade</p></div>
                </div>
                <?php
                    foreach ($data->getRequisito01() as $key => $value) {
                        echo "<div class=\"tableInfoItems01\">";
                            echo "<div class=\"item01\">".$key."</div>";
                            echo "<div class=\"item01\">".$value."</div>";
                        echo "</div>";
                    }
                ?>
            </div>
            <div id="info02">
                <p>Selecione o período</p>
                <form action="controller/relatorios_controller.php" method="post">
                    <div>
                        <input required type="date" name="startDate02">
                        <p>a</p>
                        <input required type="date" name="endDate02">
                    </div>
                    <button type="submit">Gerar relatórios</button>
                </form>
            </div>
            <div id="info03">
                <div class="tableInfo01">
                        <div class="descriptionAndQuantity01"><p>Paciente</p></div>
                        <div class="descriptionAndQuantity01"><p>Medicamento</p></div>
                </div>
                <?php
                    foreach ($data->getRequisito03() as $key => $value) {
                        echo "<div class=\"tableInfoItems01\">";
                            echo "<div class=\"item01\">".$key."</div>";
                            echo "<div class=\"item01\">".$value."</div>";
                        echo "</div>";
                        }
                ?>
            </div>
            <div id="info04">
                <div class="tableInfo01">
                            <div class="descriptionAndQuantity01"><p>Item disponível</p></div>
                            <div class="descriptionAndQuantity01"><p>Preço</p></div>
                </div>
                <?php
                    foreach ($data->getRequisito04() as $key => $value) {
                        echo "<div class=\"tableInfoItems01\">";
                            echo "<div class=\"item01\">".$key."</div>";
                            echo "<div class=\"item01\">R$ ".$value."</div>";
                        echo "</div>";
                    }
                ?>
            </div>
            <div id="info05">
                    <form action="controller/novasEvolucoes_controller.php" method="post">
                        <div>
                            <label for="textAreaDesc05">
                                Digite uma descrição
                            </label>
                            <textarea id="textAreaDesc05" name="description05" rows="4" cols="50"></textarea>
                        </div>
                        
                        <div>
                            <label for="numberInputID05">
                                Digite o ID do atendimento
                            </label>
                            <input required id="numberInputID05" type="number" name="id05">
                        </div>  

                        <div>
                            <label for="dateInputID05">
                                Selecione a data da evolução
                            </label>
                            <input required id="dateInputID05" type="date" name="date05">
                        </div>

                        <div>
                            <label for="timeInputID05">
                                Selecione o horário (horas:minutos:segundos)
                            </label>
                            <input required id="timeInputID05" type="text" name="time05" placeholder="05:05:50">
                        </div>

                        <button type="submit">Enviar a evolução</button>
                    </form>
            </div>
            <div id="info06">
                <form action="controller/novosAtendimentosConfirmation_controller.php" method="post">
                    <div id="patientIDContainer06">
                        <label for="patientID06">
                                ID do paciente
                        </label>
                        <input required id="patientID06" type="number" name="patientID06">
                    </div>

                    <div id="dataInputContainer06">
                            <label for="dateInputID06">
                                Selecione a data da evolução
                            </label>
                            <input required id="dateInputID06" type="date" name="date06">
                        </div>

                        <div id="timeInputContainer06">
                            <label for="timeInputID06">
                                Selecione o horário (horas:minutos:segundos)
                            </label>
                            <input required id="timeInputID06" type="text" name="time06" placeholder="05:05:50">
                        </div>

                    <div>
                        <input required type="number" name="itemID060" placeholder="Digite o ID do item">
                        <input required type="number" name="itemQuantity060" placeholder="Digite a quantidade">
                    </div>

                    <button id="newItem06" type="button" style="background-color: rgb(158, 198, 245);">Adicionar novo item</button>
                    <button id="deleteLastItem06" type="button" style="background-color: rgb(202, 80, 80);">Remover o último item</button>

                    <button type="submit">Enviar o atendimento</button>
                </form>
            </div>
        </div>
    </div>

    <script src="view/main.js"></script>
</body>
</html>