
<?php
if(is_home() || is_singular('veiculo')){
?>
<div class="container-fluid">
    <div class="row title_div_cars">
        <h5>Busca Detalhada</h5>
    </div>
</div>
<?php } ?>

<div class="container-fluid">
    <div class="row"> <!-- div-form-search-->
        <form class="form-search" action="<?= home_url() ?>">

            <input type="hidden" name="s" value="-1">
            <input type="hidden" name="post_type"value="veiculo">
            <input type="hidden" name="search-type" value="detailed">

<!--            <div><!--class="div-item-input-search-form"-->

                <div class="col s12 m6 l2">

                    <?php
                    wp_dropdown_categories(
                        [
                            'name'              => 'manufacturer',
                            'taxonomy'          => 'manufacturer',
                            'hide_if_empty'     => 1,
                            'option_none_value' => '',
                            'class'             => 'select-searchform',
                            'id'                => 'Select-Marca',
                            'show_option_none'  => 'Marca'
                        ]
                    );

                    ?>
                </div>

                <div class="col s12 m6 l2">
                    <select name="model" id="Select-Modelo" class="select-searchform">
                        <option value="">Modelos</option>
                    </select>
                </div>

                <div class="col s12 m6 l2">
                    <select name="year" id="Select-Ano" class="select-searchform">
                        <option value="">Ano</option>
                    </select>
                </div>

                <div class="col s12 m6 l2">
                    <select name="pricemax" id="pricemax" class="select-searchform">
                        <option value="">Valor Máximo</option>
                        <option value="20000">até R$ 20.000</option>
                        <option value="30000">até R$ 30.000</option>
                        <option value="40000">até R$ 40.000</option>
                        <option value="50000">até R$ 50.000</option>
                        <option value="999999">+ que R$ 50.000</option>
                    </select>
                </div>

                <div class="input-field input-searchform col s12 m6 l2">
                    <input id="code" name="code" type="text" class="validate">
                    <label for="code">Código: </label>
                </div>

                <div class="input-searchform col s12 m6 l2 btn_basic_search">
                    <button class="btn waves-effect waves-light" type="submit">Buscar
                        <i class="material-icons right">search</i>
                    </button>
                </div>
<!--            </div>-->
        </form>
    </div>
</div>