<?php

require get_theme_file_path('/inc/search-route.php');

function university_custom_rest(){
    register_rest_field('post','authorName',array(
            'get_callback' => function() {return get_the_author();}
    ));


}
add_action('rest_api_init', 'university_custom_rest');

function pageBanner($args = NULL) {

    if (!$args['title']) {
        $args['title'] = get_the_title();
    }

    if (!$args['subtitle']) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }

    if (!$args['photo']) {
        if (get_field('page_banner_background_image') AND !is_archive() AND !is_home() ) {
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
        }
    }
    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>;"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
            <div class="page-banner__intro">
                <p><?php echo $args['subtitle']; ?></p>
            </div>
        </div>
    </div>
<?php
}

    function university_files() {
        wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

        wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyAxm494C8Y4lSFWSIDXSrrApo5SC5cMF7w', null, 1.0, true);

        if(strstr($_SERVER['SERVER_NAME'], 'fictional-university.local')){
            wp_enqueue_script('main-university-js', 'http://localhost:3000/bundled.js', null, 1.0, true);
        }else {
            wp_enqueue_script('our-vendors-js', get_theme_file_uri('/bundled-assets/vendors~scripts.a6d527facd974cdcaf68.js'), null, 1.0, true);
            wp_enqueue_script('main-university-js', get_theme_file_uri('/bundled-assets/scripts.2f67fde437a37a809956.js'), null, 1.0, true);
            wp_enqueue_style('our-main-styles', get_theme_file_uri('/bundled-assets/styles.2f67fde437a37a809956.css'));
        }
        wp_localize_script('main-university-js','universityData', array(
                'root_url' => get_site_url(),

        ));
    }

    add_action('wp_enqueue_scripts', 'university_files');

    function university_features() {
       add_theme_support('title-tag');
       add_theme_support('post-thumbnails');
       add_image_size('professorLandscape', 400, 260, true);
       add_image_size('professorPortrait', 480,650, true);
       add_image_size('pageBanner', 1500, 350, true);
    }

    add_action('after_setup_theme', 'university_features');

    function university_adjust_queries($query) {
        if (!is_admin() AND is_post_type_archive('program') AND is_main_query()) {
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
            $query->set('posts_per_page', -1);
        }

       if(!is_admin()And is_post_type_archive('event') and $query->is_main_query()) {
           $today = date('Ymd');
           $query->set('meta_key', 'event_date');
           $query->set('orderby', 'meta_value_num');
           $query->set('order', 'ASC');
           $query->set('meta_query', array(
               array(
                   'key' => 'event_date',
                   'compare' => '>=',
                   'value' => $today,
                   'type' => 'numeric'
               )

           ));
       }
    }
    add_action('pre_get_posts', 'university_adjust_queries');

    function universityMapKey($api) {
        $api['key'] = 'AIzaSyAxm494C8Y4lSFWSIDXSrrApo5SC5cMF7w';
        return $api;
    }


    add_filter('acf/fields/google_map/api', 'universityMapKey');