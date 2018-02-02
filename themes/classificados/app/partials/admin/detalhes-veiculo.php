<!--Cria os campos na parte de detalhes do carro-->

<p class="item-detalhes">

    <label>Preço</label>
    <input type="text" name="price" id="price" required value="<?= number_format((float) $price, 2, ',','.') ?>">
    <br>
    <small>Informe apenas valores inteiros (sem centavos) | Sujeito a alteração.</small>
</p>
<br>

<p class="item-detalhes">
    <label>Modelo</label>
    <input type="text" name="model" id="model" required value="<?= $model ?>">
</p>

<p class="item-detalhes">
    <label>Ano</label>
    <input type="text" name="year" id="year" required value="<?= $year ?>">
</p>

<p class="item-detalhes">
    <label>Km</label>
    <input type="text" name="km" required value="<?= $km ?>">
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
    <label>Placa</label>
    <input type="text" name="place" required value="<?= $place ?>">
    <br>
    <small>Por Favor, informe a placa completa, ex: ABC1234.</small>
</p>

<p class="item-detalhes">
    <label>Renavam</label>
    <input type="number" name="renavam" required value="<?= $renavam ?>">
    <br>
    <small>O número do Renavam não é publicado. O renavam será utilizado juntamente
        com a placa para verificar a situação do veículo antes do administrador publicar seu anúncio.</small>
</p>
