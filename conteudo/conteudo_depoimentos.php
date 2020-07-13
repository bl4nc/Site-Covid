    <main id="conteudo" class="container">
        <div style="padding-top: 2px">
            <section class="secao_depoimentos mt-4 mb-5">
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
        </div>
    </main>

    <?php require_once "conteudo/footer.php"?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/modal_covid.js"></script>
  </body>
</html>