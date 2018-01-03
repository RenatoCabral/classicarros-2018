<?php include 'header.php'?>

<div class="container-fluid">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="col s12 m12 l12 title-advanced-search">
                <div class="row ">
                    <h1>Busca Avançada</h1>
                </div>
            </div>

            <!--Cards-->
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="col s12 m12 l3"> <!--tipo-->
                        <div class="card z-depth-1 card-options-advanced-search">
                            <div class="card-content black-text">
                                <select multiple>
                                    <option value="" disabled selected>Tipo veículo</option>
                                    <option value="1">Carro</option>
                                    <option value="2">Moto</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3"> <!--estado de conservação-->
                        <div class="card z-depth-1 card-options-advanced-search">
                            <div class="card-content black-text">
                                <select multiple>
                                    <option value="" disabled selected>Estado de Conservação</option>
                                    <option value="1">Novo</option>
                                    <option value="2">Seminovo</option>
                                    <option value="3">Usado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3"> <!--marca-->
                        <div class="card z-depth-1 card-options-advanced-search">
                            <div class="card-content black-text">
                                <select multiple>
                                    <option value="" disabled selected>Marca</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3"> <!--modelo-->
                        <div class="card z-depth-1 card-options-advanced-search">
                            <div class="card-content black-text">
                                <select multiple>
                                    <option value="" disabled selected>Modelo</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="col s12 m12 l4"> <!--preço-->
                        <div class="card z-depth-1 card-options-advanced-search card-ano-preco">
                            <div class="card-content black-text">
                                <span class="card-title">Preço</span>
                                <form>
                                    <div class="row">
                                        <div class="input-field col s12 m12 l6">
                                            <input id="email" type="email" class="validate">
                                            <label class="black-text" for="email" data-error="wrong" data-success="right">Preço de:</label>
                                        </div>
                                        <div class="input-field col s12 m12 l6">
                                            <input id="email" type="email" class="validate">
                                            <label class="black-text" for="email" data-error="wrong" data-success="right">Preço até:</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4"><!--ano-->
                        <div class="card z-depth-1 card-options-advanced-search card-ano-preco">
                            <div class="card-content black-text">
                                <span class="card-title">Ano/Modelo</span>
                                <form>
                                    <div class="row">
                                        <select class="col s12 m12 l6">
                                            <option value="" disabled selected>Ano De:</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                        <select class="col s12 m12 l6">
                                            <option value="" disabled selected>Ano Até:</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4"> <!--Cidade-->
                        <div class="card z-depth-1 card-options-advanced-search card-ano-preco">
                            <div class="card-content black-text">
                                <select multiple>
                                    <option value="" disabled selected>Cidade</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--3º linha-->
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="col s12 m12 l3"> <!--Categoria-->
                        <div class="card z-depth-1 card-options-advanced-search card-ano-preco">
                            <div class="card-content black-text">
                                <span class="card-title">Categoria</span>
                                <select multiple>
                                    <option value="" disabled selected>Categoria</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3"> <!--Itens Opcionais-->
                        <div class="card z-depth-1 card-options-advanced-search card-ano-preco">
                            <div class="card-content black-text">
                                <span class="card-title">Itens Opcionais</span>
                                <select multiple>
                                    <option value="" disabled selected>Opções</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3"> <!--Cor-->
                        <div class="card z-depth-1 card-options-advanced-search card-ano-preco">
                            <div class="card-content black-text">
                                <span class="card-title">Cor</span>
                                <select multiple>
                                    <option value="" disabled selected>Cor</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3"> <!--Combústivel-->
                        <div class="card z-depth-1 card-options-advanced-search card-ano-preco">
                            <div class="card-content black-text">
                                <span class="card-title">Combústivel</span>
                                <select multiple>
                                    <option value="" disabled selected>Combústivel</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--4º linha-->
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="col s12 m12 l3"> <!--Final da Placa-->
                        <div class="card z-depth-1 card-options-advanced-search card-ano-preco">
                            <div class="card-content black-text">
                                <span class="card-title">Final da Placa</span>
                                <select multiple>
                                    <option value="" disabled selected>Final da Placa</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3"> <!--Nº de portas-->
                        <div class="card z-depth-1 card-options-advanced-search card-ano-preco">
                            <div class="card-content black-text">
                                <span class="card-title">Nº de portas</span>
                                <select multiple>
                                    <option value="" disabled selected>Nº de portas</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 div-btn-advanced-search">
                    <a href="" class="waves-effect waves-light btn large button-advanced-search">Buscar</a>
<!--                    <a href="" class="return-button btn-small waves-effect waves-light transition-300ms  btn btn-return">Inicio</a>-->

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'?>
