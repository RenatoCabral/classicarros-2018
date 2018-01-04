<?php

function get_models_by_manufacturer() {
    if ( isset( $_POST['manufacturer'] ) ) {
        $args = [
            'post_type'   => 'veiculo',
            'post_status' => 'publish',
            'tax_query'   =>
                [
                    [
                        'taxonomy' => 'manufacturer',
                        'field'    => 'term_id',
                        'terms'    => $_POST['manufacturer']
                    ]
                ]
        ];

        $posts  = new WP_Query( $args );
        $models = [];
        $output = '<option value="">Modelo</option>';
        while ( $posts->have_posts() ) : $posts->the_post();
            $model = get_post_meta( get_the_ID(), 'model', true );
            if ( ! empty( $model ) ) {
                if ( ! in_array( $model, $models ) ) {
                    $output .= '<option value="' . $model . '">' . $model . '</option>';
                    $models[] = $model;
                }
            }
        endwhile;
        echo $output;
    }
    exit;
}

function get_years_list() {
    if ( isset( $_POST['manufacturer'] ) && isset( $_POST['model'] ) ) {

        $args = [
            'post_type'   => 'veiculo',
            'post_status' => 'publish',
            'tax_query'   =>
                [
                    [
                        'taxonomy' => 'manufacturer',
                        'field'    => 'term_id',
                        'terms'    => $_POST['manufacturer']
                    ]
                ],
            'meta_query'   =>
                [
                    [
                        'key' => 'model',
                        'value'    => $_POST['model'],
                        'compare'    => '='
                    ]
                ]
        ];

        $posts = new WP_Query($args);
        $years = [];

        $output = '<option value="">Ano</option>';
        while ($posts->have_posts()) : $posts->the_post();
            $year = get_post_meta(get_the_ID(), 'year', true);
            if (!empty($year)) {
                if (!in_array($year, $years)) {
                    $years[] = $year;
                }
            }
        endwhile;
        sort($years);

        foreach ($years as $year) {
            $output .= '<option value="' . $year . '">' . $year . '</option>';
        }

        echo $output;
    }
    exit;
}