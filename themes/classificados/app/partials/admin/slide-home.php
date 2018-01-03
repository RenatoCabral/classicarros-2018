<style>
	.url-slide{
		width: 400px;
	}
</style>
<p>
	<label>Insira o Link para a imagem</label><br>
	<input class="url-slide" name="link" type="url" placeholder="http://www.exemplo.com" value="<?= $link ?>">

    <br>
    <label>
        Abrir em outra guia?
        <input type="checkbox" class="open-target-blank-slide" name="open-target-blank-slide"
               value="_blank" <?php checked( $open_target_blank_slide, '_blank' ); ?> >
    </label>
</p>