<?php
$code = isset($_GET['code']) ? $_GET['code'] : '';

if ( !empty($code) ) {
    $query = new WP_Query( [
        'post_type'   => 'veiculo',
        'post_status' => 'publish',
        'p'           => $_GET['code']
    ] );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) : $query->the_post();
            ?>
            <script>
                var link = <?= json_encode( get_permalink( get_the_ID() ) ); ?>;
                window.location.href = link;
            </script>
            <?php
        endwhile;
    }
} else {

    $manufacturer = isset($_GET['manufacturer']) ? $_GET['manufacturer'] : '';
    $model = isset($_GET['model']) ? $_GET['model'] : '';
    $year = isset($_GET['year']) ? $_GET['year'] : '';
    $pricemax = isset($_GET['pricemax']) ? $_GET['pricemax'] : '';

    $final_query = [
        'post_type' => 'veiculo',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'meta_value_num',
        'order' => 'desc',
        'meta_key' => 'price'
    ];

    if (!empty($manufacturer)) {
        $query = [
            'tax_query' => [
                [
                    'taxonomy' => 'manufacturer',
                    'field' => 'term_id',
                    'terms' => $manufacturer
                ]
            ]
        ];
        $final_query = array_merge($final_query, $query);
    }

    $query_model = [];
    $query_price = [];
    $query_year = [];

    if (!empty($model)) {
        $query_model = array(
            'key' => 'model',
            'value' => $model,
        );
    }

    if (!empty($year)) {
        $query_year = [
            'key' => 'year',
            'value' => $year,
        ];
    }

    if (!empty($pricemax)) {
        if ($pricemax === '999999') {
            $query_price = [
                'key' => 'price',
                'value' => 50000,
                'compare' => '>=',
                'type' => 'numeric'
            ];
        } else {
            $query_price = [
                'key' => 'price',
                'value' => $pricemax,
                'compare' => '<=',
                'type' => 'numeric'
            ];

        }


    }

    $meta_query = [
        'meta_query' => [
            'relation' => 'AND',
            $query_model,
            $query_year,
            $query_price
        ]
    ];

    $final_query = array_merge($final_query, $meta_query);


    $loop = new WP_Query($final_query);

    if (!$loop->have_posts()) { ?>
        <p style="text-align: center;width: 100%;">Resultado não encontrado!</p>
    <?php } else {
        while ($loop->have_posts()): $loop->the_post();
            require 'app/partials/public/item-featured-vehicles.php';
        endwhile;
    }
}