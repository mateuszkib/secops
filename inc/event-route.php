<?php

add_action('rest_api_init', 'secopsRegisterMultimedia');

function secopsRegisterMultimedia()
{
    register_rest_route('secops/v1', 'multimedia', [
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'secopsMultimediaResult'
    ]);
}

function secopsMultimediaResult($data)
{
    if (isset($_GET['galleryID'])) {
        $args = [
            'p' => $data['galleryID'],
            'post_type' => 'multimedia',
            'meta_key' => 'multimedia_type',
            'orderBy' => 'publish_date',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'multimedia_type',
                    'value' => 'picture',
                    'compare' => '=',
                )
            )
        ];
        $multimedia = new WP_Query($args);

        $data = [];
        while ($multimedia->have_posts()) {
            $multimedia->the_post();
            array_push($data, [
                'photos' => get_field('photos_content'),
            ]);
        }
        return $data;
    } else if ($_GET['filmID']) {
        $args = [
            'p' => $data['filmID'],
            'post_type' => 'multimedia',
            'meta_key' => 'multimedia_type',
            'meta_query' => array(
                array(
                    'key' => 'multimedia_type',
                    'value' => 'film',
                    'compare' => '=',
                )
            )
        ];
        $multimedia = new WP_Query($args);

        $data = [];
        while ($multimedia->have_posts()) {
            $multimedia->the_post();
            array_push($data, [
                'film' => get_field('multimedia_film'),
            ]);
        }

        return $data;
    }
}
