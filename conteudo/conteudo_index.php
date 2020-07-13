<main id="conteudo" class="container">

    <section class="secao_cards mt-3">

        <!--MODAL GRÁFICO-->
        <div class="modal fade" id="modalgrafico" tabindex="-1" role="dialog" aria-
            labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="gridSystemModalLabel">COVID-19 FSA</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        
                        <canvas id="myChart"></canvas>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                    </div>
                </div>
            </div>
        </div>
        <!--FIM MODAL -->

        <a href="#" data-toggle="modal" data-target="#bannerformmodal" class="ml-2">
                    
            <button class="btn-email btn-position-email">
                <i class="fa fa-envelope"></i>
            </button>
        </a>

        <h4 class="mb-2">Dados do Coronavírus até:
            <strong>
                 <?php echo date('d/m/yy', strtotime(dtBoletim())); ?>
            </strong>
        </h4>
        <p style="margin-top: -15px">
            <strong style="font-size: 8px">Dados retirados de 
                <a rel="noopener noreferrer" target="_blank" href="https://www.combateaocoronavirus.feira.br">
                    Combate ao Corona Vírus 
                </a>
            </strong>
        </p>
        
        <div class="card-deck">
            <div class="card bg-vermelho">
                <div class="card-body">
                <h5 class="card-title">QTDE INFECTADOS</h5>
                <p class="card-text pt-3"><?php echo qtdeInfectado(); ?></p>
                </div>
            </div>

            <div class="card bg-verde mt-1">
                <div class="card-body">
                <h5 class="card-title">QTDE RECUPERADOS</h5>
                <p class="card-text pt-3"><?php echo qtdeCurados(); ?></p>
                </div>
            </div>

            <div class="card bg-amarelo mt-1">
                <div class="card-body">
                <h5 class="card-title">QTDE ÓBITOS</h5>
                <p class="card-text pt-3"><?php echo qtdeObitos(); ?></p>
                </div>
            </div>

            <div class="card bg-amarelo mt-1" style="background: #00c4cc">
                <div class="card-body">
                <h5 class="card-title">TOTAL DE DESPESAS<br><span style="font-size: 8px">em fase de pagamento</span></h5>
                <p class="card-text pt-3" style="font-size: 26px;text-align: center"><?php echo qtdeGastos(); ?></p>
                </div>
            </div>
        </div>

    </section> 

    <section class="secao_boletins mt-4">
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
                            <th scope="row" style="text-align: center"><?php echo date('d/M', strtotime($dados['data_boletim'])); ?></th>

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

    <section class="secao_gastos mt-5"><!-- SEÇAO TABELA DE GASTOS COMPILADA-->
        <h4>Resumo Despesas COVID-19 FSA</h4>
        
        <p style="margin-top: -15px;">
            <strong style="font-size: 8px;"> 
                Dados retirados do 
                <a rel="noopener noreferrer" target="_blank" href="http://www.transparencia.feiradesantana.ba.gov.br/index.php?view=despesascovid">
                    Portal de Transparência
                </a>
            </strong>
        </p>

        <p style="margin-top: -10px">
            <strong style="font-size: 12px;background: #007c34;padding: 3px;border-radius: 5px"> 
                <a href="#" data-toggle="modal" data-target="#tabelamodal" style="color: #fff">
                    CLIQUE PARA VER DE FORMA DETALHADA
                </a>
            </strong>
        </p>

        <div class="table-responsive table-striped mt-4">
            <table class="table table-borderless" style="width: 95%;margin:0 auto;font-size: 17px">
                <thead>
                    <tr style="background: #00c4cc;color: #fff;font-weight: bold">                        
                        <th scope="col" style="text-align: center">NATUREZA</th>
                        <th scope="col" style="text-align: center">VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT 
                    Natureza,
                    format(Valor,2,'de_DE') as VL
                    FROM gastos
                    GROUP BY Natureza  
                    ORDER BY Valor  DESC
                    ";
                    $query = $mysqli->query($sql);
                    while ($dados = $query->fetch_array()) {
                    ?>
                    <tr>
                            
                        <td style="text-align: center;vertical-align: middle;font-weight: normal;font-size: 15px">
                            <?php echo $dados['Natureza']; ?>
                        </td>
                        <td style="text-align: center;vertical-align: middle;font-weight: normal;font-size: 15px">
                            R$ <?php echo $dados['VL']; ?>
                        </td>                                                       
                    </tr>

                    <?php } ?>

                    <tr style="background: #00c4cc;color: #fff;font-weight: bold">
                            
                        <td style="text-align: center;vertical-align: middle;font-weight: normal;font-size: 20px">
                            TOTAL
                        </td>
                        <td style="text-align: center;vertical-align: middle;font-weight: normal;font-size: 17px">
                            R$ <?php echo qtdeGastos(); ?>
                        </td>                                                       
                    </tr>

                   
                </tbody>
            </table>
    </section>

    <div class="modal fade" id="tabelamodal" tabindex="-1" role="dialog" aria-
        labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="gridSystemModalLabel">
                        COVID-19 FSA                    
                    </h6>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="margin-top: -20px;">

                    <section class="secao_gastos mt-5" style="overflow-x: visible !important;"><!-- SEÇÃO COM OS GASTOS -->
                            
                        <div class="table-responsive">
                            <table class="table table-borderless"  id="example">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center">Data de Publicação</th>
                                        <th scope="col" style="text-align: center">Bem Serviço Prestado</th>
                                        <th scope="col" style="text-align: center">Credor</th>
                                        <th scope="col" style="text-align: center">Valor</th>
                                        <th scope="col" style="text-align: center">Natureza</th>
                                        <th scope="col" style="text-align: center">Fase</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $sql = "SELECT 
                                    gastos.*,
                                    format(Valor,2,'de_DE') as VL 
                                    FROM gastos
                                    ORDER BY Data_de_Publicacao desc
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
                                                <?php echo "Pagamento";//$dados['Modalidade']; ?>
                                            </td>                            
                                        </tr>

                                    <?php } ?>

                                
                                </tbody>
                            </table>
                        </div>
                    </section>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                </div>
            </div>

        </div>
    </div>

    <section class="secao_depoimentos mt-5">
        <h4>Depoimentos</h4>
        <div class="box_depoimentos mt-4">
            <!-- Primeira linha -->
            <!-- A classe clickable faz o modal ser aberto -->
            <div class="card-deck">
                <div class="card card_depoimentos mt-3 clickable">
                    <img class="img_card_depoimentos" src="midia/depoimentos.jpg" alt="Card image cap">
                    <div class="conteudo_card_depoimentos">
                        <p class="titulo_card_depoimentos">
                            Rafael Araújo Rocha
                            <br>
                            23 anos
                        </p>
                    </div>
                </div>
                <div class="card card_depoimentos mt-3 clickable">
                    <img class="img_card_depoimentos" src="midia/depoimentos.jpg" alt="Card image cap">
                    <div class="conteudo_card_depoimentos">
                        <p class="titulo_card_depoimentos">
                            Rafael Araújo Rocha
                            <br>
                            23 anos
                        </p>
                    </div>
                </div>
                <div class="card card_depoimentos mt-3">
                    <img class="img_card_depoimentos" src="midia/depoimentos.jpg" alt="Card image cap">
                    <div class="conteudo_card_depoimentos">
                        <p class="titulo_card_depoimentos">
                            Rafael Araújo Rocha
                            <br>
                            23 anos
                        </p>
                    </div>
                </div>
                <div class="card card_depoimentos mt-3">
                    <img class="img_card_depoimentos" src="midia/depoimentos.jpg" alt="Card image cap">
                    <div class="conteudo_card_depoimentos">
                        <p class="titulo_card_depoimentos">
                            Rafael Araújo Rocha
                            <br>
                            23 anos
                        </p>
                    </div>
                </div>
            </div>  
            <!-- Segunda linha -->                              
            <div class="card-deck">
                <div class="card card_depoimentos mt-3">
                    <img class="img_card_depoimentos" src="midia/depoimentos.jpg" alt="Card image cap">
                    <div class="conteudo_card_depoimentos">
                        <p class="titulo_card_depoimentos">
                            Rafael Araújo Rocha
                            <br>
                            23 anos
                        </p>
                    </div>
                </div>
                <div class="card card_depoimentos mt-3">
                    <img class="img_card_depoimentos" src="midia/depoimentos.jpg" alt="Card image cap">
                    <div class="conteudo_card_depoimentos">
                        <p class="titulo_card_depoimentos">
                            Rafael Araújo Rocha
                            <br>
                            23 anos
                        </p>
                    </div>
                </div>
                <div class="card card_depoimentos mt-3">
                    <img class="img_card_depoimentos" src="midia/depoimentos.jpg" alt="Card image cap">
                    <div class="conteudo_card_depoimentos">
                        <p class="titulo_card_depoimentos">
                            Rafael Araújo Rocha
                            <br>
                            23 anos
                        </p>
                    </div>
                </div>
                <div class="card card_depoimentos mt-3">
                    <img class="img_card_depoimentos" src="midia/depoimentos.jpg" alt="Card image cap">
                    <div class="conteudo_card_depoimentos">
                        <p class="titulo_card_depoimentos">
                            Rafael Araújo Rocha
                            <br>
                            23 anos
                        </p>
                    </div>
                </div>
            </div>  

            <div class="mais_depoimentos mt-4">
                <a href="depoimentos.php" class="btn btn_depoimentos">
                    <i class="fa fa-plus"></i>
                    Mais depoimentos
                </a>
            </div>                            
        </div>
    </section>

    <div class="overlay">
        <div class="modal_covid mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-4 p-3">
                        <img class="img_card_depoimentos" src="midia/depoimentos.jpg" alt="Card image cap">
                        <div class="conteudo_card_depoimentos">
                            <p class="titulo_card_depoimentos">
                                Rafael Araújo Rocha
                                <br>
                                23 anos
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-8 p-3 initial-mobile">
                        <h2>Depoimento</h2>
                        <p class="mt-3 text-justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis architecto magnam asperiores provident odit maiores quam eligendi. Tempore amet a iusto culpa dolores, autem rerum cumque enim aperiam sit tempora.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal_close mb-3">
                <i class="fa fa-arrow-left"></i>
            </div>
        </div>
    </div>

    <section class="secao_tweets mt-5">
        <h4>Últimas informações</h4>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 mt-4 mb-2" style="height: 400px;overflow-x: hidden;overflow-y: auto">
                    <a class="twitter-timeline" href="https://twitter.com/PrefeituraFeira?ref_src=twsrc%5Etfw">&nbsp;</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="col-sm-12 col-md-4 mt-4 mb-2"  style="height: 400px;overflow-x: hidden;overflow-y: auto">
                    <a class="twitter-timeline" href="https://twitter.com/colbertprefeito?ref_src=twsrc%5Etfw">&nbsp;</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                </div>
                <div class="col-sm-12 col-md-4 mt-4 mb-2"  style="height: 400px;overflow-x: hidden;overflow-y: auto">
                    <a class="twitter-timeline" href="https://twitter.com/Acordacidade?ref_src=twsrc%5Etfw">&nbsp;</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">                      
                        <h4 class="modal-title" id="myModalLabel">Sua mensagem</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="requestacallform" method="post" name="requestacallform">

                            <div class="input-group mb-2">
                                <input type="email" name="cp1" required class="form-control input_user" placeholder="Seu email" id="validationCustom01">
                            </div> 
                            <div class="input-group mb-2">
                                <textarea class="form-control" rows="5" required name="cp2" style="font-size: 12px"></textarea>
                            </div>  
                    </div>

                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                        </div> 

                        </form>       
                </div>
            </div>
        </div>
    </div>

</main>



