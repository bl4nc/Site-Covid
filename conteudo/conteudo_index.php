<main class="container">
    <section class="secao_cards mt-3">
        <!-- <h4>Dados do <strong>Coronavírus</strong></h4>
        <p>Dados até: <b><?php echo date('d/m/yy', strtotime(dtBoletim())); ?></b><br>
            <span style="color: #007c34;font-size: 16px">Dados retirados de: https://www.combateaocoronavirus.feira.br/</span>
        </p> -->

        <h4 class="mb-2">Dados do Coronavírus até:
            <strong>
                 <?php echo date('d/m/yy', strtotime(dtBoletim())); ?>
            </strong>
        </h4>
        <p>
            <strong style="font-size: 16px">Dados retirados de 
                <a rel="noopener noreferrer" target="_blank" href="https://www.combateaocoronavirus.feira.br">
                    Combate ao Corona Vírus 
                </a>
            </strong>
        </p>
        

        <div class="card-deck">
            <div class="card bg-vermelho">
                <div class="card-body">
                <h5 class="card-title">QUANTIDADE DE INFECTADOS</h5>
                <p class="card-text pt-3"><?php echo qtdeInfectado(); ?></p>
                </div>
            </div>

            <div class="card bg-verde">
                <div class="card-body">
                <h5 class="card-title">QUANTIDADE DE CURADOS</h5>
                <p class="card-text pt-3"><?php echo qtdeCurados(); ?></p>
                </div>
            </div>

            <div class="card bg-amarelo">
                <div class="card-body">
                <h5 class="card-title">QUANTIDADE DE GASTOS</h5>
                <p class="card-text pt-3" style="font-size: 30px">R$ <?php echo qtdeGastos(); ?><br>Milhões</p>
                </div>
            </div>
        </div>
    </section> 

    <section class="secao_boletins mt-5">
        <div class="table-responsive" style="overflow-y: auto;height: 400px !important;">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">DATA BOLETIM</th>
                        <th scope="col" style="text-align: center">QUANTIDADE DE INFECTADOS</th>
                        <th scope="col" style="text-align: center">QUANTIDADE DE CURADOS</th>
                        <th scope="col" style="text-align: center">QUANTIDADE DE ÓBITOS</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- *** BOLETIM 10/06/2020 *** -->
                    <?php
                    $sql = "SELECT 
                    data_boletim,
                    casos_confirmados,
                    curados,
                    obitos 
                    FROM base_corona
                    ORDER BY data_boletim DESC
                    ";
                    $query = $mysqli->query($sql);
                    while ($dados = $query->fetch_array()) {
                    ?>
                        <tr>
                            <!-- DATA BOLETIM -->
                            <th scope="row" style="text-align: center"><?php echo date('d/m/yy', strtotime($dados['data_boletim'])); ?></th>

                            <!-- QUANTIDADE DE INFECTADOS -->
                            <td>
                                <div class="row">
                                    <div class="col-sm-3 align-self-center">
                                        <div><?php echo $dados['casos_confirmados']; ?></div>
                                    </div>
                                    <div class="col-sm-9 align-self-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-vermelho" role="progressbar" style="width: <?php echo ($dados['casos_confirmados']/qtdeInfectado())*100; ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="<?php echo $dados['casos_confirmados']; ?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- QUANTIDADE DE CURADOS -->
                            <td>
                                <div class="row">
                                    <div class="col-sm-3 align-self-center">
                                        <div><?php echo $dados['curados']; ?></div>
                                    </div>
                                    <div class="col-sm-9 align-self-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-verde" role="progressbar" style="width: <?php echo ($dados['curados']/qtdeCurados())*100; ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="<?php echo $dados['curados']; ?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- QUANTIDADE DE OBITOS -->
                            <td>
                                <div class="row">
                                    <div class="col-sm-3 align-self-center">
                                        <div><?php echo $dados['obitos']; ?></div>
                                    </div>
                                    <div class="col-sm-9 align-self-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-amarelo" role="progressbar" style="width: <?php echo ($dados['obitos']/qtdeObitos())*100; ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="<?php echo $dados['obitos']; ?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php } ?>

                   
                </tbody>
            </table>
        </div>
    </section>

    <section class="secao_gastos mt-5"><!-- SEÇÃO COM OS GASTOS -->
            <h4>Valores Investidos no Combate a COVID-19 FSA</h4>
            <p>
                <strong> 
                    Dados retirados do 
                    <a rel="noopener noreferrer" target="_blank" href="http://www.transparencia.feiradesantana.ba.gov.br/index.php?view=despesascovid">
                        Portal de Transparência
                    </a>
                </strong>
            </p>

        <div class="table-responsive">
            <table class="table table-borderless"  id="example">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">Data de Publicação</th>
                        <th scope="col" style="text-align: center">Bem Serviço Prestado</th>
                        <th scope="col" style="text-align: center">Credor</th>
                        <th scope="col" style="text-align: center">Valor</th>
                        <th scope="col" style="text-align: center">Natureza</th>
                        <th scope="col" style="text-align: center">Modalidade</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT 
                    gastos.*,
                    format(Valor,2,'de_DE') as VL 
                    FROM gastos
                    ORDER BY Data_de_Publicacao ASC
                    ";
                    $query = $mysqli->query($sql);
                    while ($dados = $query->fetch_array()) {
                    ?>
                        <tr>
                            <!-- DATA BOLETIM -->
                            <th scope="row" style="text-align: center;vertical-align: middle;font-weight: normal;font-size: 12px"><?php echo date('d/m/yy', strtotime($dados['Data_de_Publicacao'])); ?>
                            </th>                            
                            <td style="text-align: center;vertical-align: middle;font-weight: normal;font-size: 12px">
                                <?php echo $dados['Bem_Servico_Prestado']; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;font-weight: normal;font-size: 12px">
                                <?php echo $dados['Credor']; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;font-weight: normal;font-size: 12px">
                                R$ <?php echo $dados['VL']; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;font-weight: normal;font-size: 12px">
                                <?php echo $dados['Natureza']; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;font-weight: normal;font-size: 12px">
                                <?php echo $dados['Modalidade']; ?>
                            </td>                            
                        </tr>

                    <?php } ?>

                   
                </tbody>
            </table>
        </div>
    </section>

    <section class="secao_tweets mt-5">
        <h4>Últimas informações</h4>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mt-4 mb-4" style="height: 400px;overflow-x: hidden;overflow-y: auto">
                    <a class="twitter-timeline" href="https://twitter.com/PrefeituraFeira?ref_src=twsrc%5Etfw">&nbsp;</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="col-sm-4 mt-4 mb-4"  style="height: 400px;overflow-x: hidden;overflow-y: auto">
                    <a class="twitter-timeline" href="https://twitter.com/colbertprefeito?ref_src=twsrc%5Etfw">&nbsp;</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                </div>
                <div class="col-sm-4 mt-4 mb-4"  style="height: 400px;overflow-x: hidden;overflow-y: auto">
                    <a class="twitter-timeline" href="https://twitter.com/Acordacidade?ref_src=twsrc%5Etfw">&nbsp;</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </section>



</main>

