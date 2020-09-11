<?php

add_action('rest_api_init', 'secopsRegisterEvents');

function secopsRegisterEvents()
{
    register_rest_route('secops/v1', 'event', [
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'secopsEventsResult'
    ]);
}

function getCityID($parametr)
{
    $defaultCityID = 93;
    if ($_GET[$parametr]) {
        $post = get_page_by_path($_GET[$parametr], '', 'city');
        $cityID = $post->ID;
    } else {
        $cityID = $defaultCityID;
    }

    return $cityID;
}

function secopsEventsResult($data)
{
    $today = date('Ymd');
    $currentEvents = new WP_Query([
        'post_type' => 'event',
        'posts_per_page' => 4,
        'orderby' => 'meta_value_num',
        'meta_key' => 'event_date_start',
        'order' => 'ASC',
        'paged' => $data['page'],
        'meta_query' => array(
            array(
                'key' => 'event_date_start',
                'value' => $today,
                'compare' => '>=',
                'type' => 'numeric'
            ), array(
                'key' => 'related_cities',
                'compare' => 'LIKE',
                'value' => '"' . getCityID("currentCity") . '"'
            )
        )
    ]);

    $data = [];
    while ($currentEvents->have_posts()) {
        $currentEvents->the_post();
        array_push($data, [
            'event_start_date' => get_field('event_date_start'),
            'title' => get_the_title(),
            'content' => get_the_content(),
            'template_uri' => get_template_directory_uri(),
        ]);
    }
    return $data;
}
