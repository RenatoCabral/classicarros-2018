                                <!--Cria os campos na parte de detalhes do carro-->

<p class="item-detalhes">
    <label>Preço</label>
    <input type="text" name="price" placeholder="58200" required value="<?= $price ?>">
</p>


<p class="item-detalhes">
    <label>Km</label>
    <input type="text" name="km" placeholder="1000" required value="<?= $km ?>">
</p>


<?php
$colors        = get_colors();
$motors        = get_motors();
$fuels         = get_fuels();
$exchanges     = get_exchanges();
$conservations = get_conservations();

?>

<p class="item-detalhes">
    <label>
        Cor <?php handler_options( 'color', $colors, $color ); ?>
    </label>
</p>

<p class="item-detalhes">
    <label>Quantidade Portas</label>
    <input type="number" name="doors" placeholder="4" required value="<?= $doors ?>">
</p>

<p class="item-detalhes">
    <label>
        Motor <?php handler_options( 'motor', $motors, $motor ); ?>
    </label
</p>

<?php
$marca = json_decode($manufacturer);
$modelo = json_decode($model);
$ano = json_decode($year);
?>

<p class="item-detalhes item-marca">
    <label>Marca</label>
    <select name="manufacturer" class="marca" data-marca-selected="<?= isset( $marca->id) ?  $marca->id : '' ?>">
        <option value="">Selecione</option>
    </select>
</p>

<p class="item-detalhes item-modelo">
    <label>Modelo</label>
    <select name="model" class="modelo" data-modelo-selected="<?= isset( $modelo->id) ?  $modelo->id : '' ?>">
        <option value="">Selecione</option>
    </select>
</p>

<p class="item-detalhes item-ano">
    <label>Ano</label>
    <select name="year" class="ano" data-ano-selected="<?= isset( $ano->id) ?  $ano->id : '' ?>">
        <option value="">Selecione</option>
    </select>
</p>

<p class="item-detalhes">
    <label>
        Combustível <?php handler_options( 'fuel', $fuels, $fuel ); ?>
    </label>
</p>


<p class="item-detalhes">
    <label>
        Câmbio <?php handler_options( 'exchange', $exchanges, $exchange ); ?>
    </label>
</p>

<p class="item-detalhes">
    <label>
        Conservação <?php handler_options( 'conservation', $conservations, $conservation ); ?>
    </label>
</p>

<p class="item-detalhes">
    <label>Final Placa</label>
    <input type="text" name="final_place" placeholder="8" required value="<?= $final_place ?>">
</p>
