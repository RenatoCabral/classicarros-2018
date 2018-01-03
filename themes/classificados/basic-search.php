<div class="container-fluid">
    <div class="row title_div_cars">
        <h5>Busque Rápido</h5>
    </div>
</div>

<div class="container-fluid">
    <div class="row div-form-search">
        <form class="form-search" action="<?= home_url() ?>" method="get">
            <input type="hidden" name="s" value="-1">
            <input type="hidden" name="post_type" id="post_type" value="veiculo">

            <div class="row div-item-input-search-form">

                <div class="col s12 m2 l2">
                    <select name="fabricante" id="fabricante" class="select-searchform">
                        <option value="-1">Fabricante</option>
						<?php
						$fabricantes  = $wpdb->get_col( "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'manufacturer'" );

						$marca = json_decode($fabricantes);
						    ?>
                            <option value="<?= $marca->id ?>"><?= $marca->name ?></option>


                    </select>
                </div>

                <div class="col s12 m2 l2">
                    <select name="modelo" id="modelo" class="select-searchform">
                        <option value="-1">Modelos</option>
                    </select>
                </div>

                <div class="col s12 m2 l2">
                    <select name="ano" id="ano" class="select-searchform">
                        <option value="-1">Ano</option>
                    </select>
                </div>

                <div class="col s12 m2 l2">
                    <select name="price_max" id="price_max" class="select-searchform">
                        <option value="-1">Valor Máximo</option>
                        <option value="20000">R$ 20.000</option>
                        <option value="30000">R$ 30.000</option>
                        <option value="40000">R$ 40.000</option>
                        <option value="50000">R$ 50.000</option>
                        <option value="100000">R$ 100.000</option>
                        <option value="999999">+ que R$ 100.000</option>
                    </select>
                </div>

                <div class="input-field input-searchform col s12 m2 l2">
                    <input id="code" name="code" type="text" class="validate">
                    <label for="code">Código: </label>
                </div>
            </div>

            <div class="input-field input-searchform col s12 m12 l12 btn_basic_search">
                <button class="btn waves-effect waves-light" type="submit">Buscar
                    <i class="material-icons right">search</i>
                </button>
            </div>
        </form>
    </div>
</div>