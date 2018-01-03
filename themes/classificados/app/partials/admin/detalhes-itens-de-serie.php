<p class="item-serie">
    <label>
        <input type="checkbox" name="<?= $item ?>" value="<?= ${"{$item}"} ?>" <?php if ( isset ( ${"{$item}"} ) ) {
			checked( ${"{$item}"}, '1' );
		} ?> />
		<?= $value ?>
    </label>

</p>

