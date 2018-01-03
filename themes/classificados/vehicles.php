<?php include 'header.php';?>

<?php include 'basic-search.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="row title_div_cars ">
                    <h5>Veículos</h5>
                </div>
            </div>

            <div class="input-field col s12 m2 l4 right">
                <div class="col s12 m2 l6">
                    <select>
                        <option value="" disabled selected>Tipo de Veículo</option>
                        <option value="1">Carro</option>
                        <option value="2">Moto</option>
                    </select>
                </div>
                <div class="col s12 m2 l6">
                    <select>
                        <option value="" disabled selected>Filtrar:</option>
                        <option value="1">Menor preço</option>
                        <option value="2">Maior preço</option>
                        <option value="3">A - Z</option>
                        <option value="3">Z - A</option>
                    </select>
                </div>

            </div>

            <div class="col s12 m12 l12">



                <?php for ($i =0; $i <= 11; $i++ ) {
                   include 'partials/item-featured-vehicles.php';
                }  ?>

                <!--paginação-->
                <div>
                    <div class="row all_news_pagination">
                        <ul class="pagination">
                            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                            <li class="active"><a href="#!">1</a></li>
                            <li class="waves-effect"><a href="#!">2</a></li>
                            <li class="waves-effect"><a href="#!">3</a></li>
                            <li class="waves-effect"><a href="#!">4</a></li>
                            <li class="waves-effect"><a href="#!">5</a></li>
                            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>