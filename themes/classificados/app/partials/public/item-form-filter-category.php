    <select class="select-searchform" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
        <option value=""><?= $title ?></option>
        <option value="<?= get_post_type_archive_link( $post_type ) ?>">Todos</option>
        <?php
        $categories = get_terms( $tax );
        foreach ( $categories as $item ) { ?>
            <option value="<?= get_term_link( $item->term_id, $tax ) ?>"><?= $item->name ?></option>
        <?php } ?>
    </select>
