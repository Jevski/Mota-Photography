<?php 
get_header(); ?> <!-- Include header -->

<section class="page">
<div class="hero-banner">
    <div class="random-photo">
    <?php
    // Query for fetching a random photo
    $random_photo_args = array(
        'post_type'      => 'photos', 
        'posts_per_page' => 1,
        'orderby'        => 'rand',
    );

    $random_photo = new WP_Query($random_photo_args);

    if ($random_photo->have_posts()) :
        while ($random_photo->have_posts()) : $random_photo->the_post();
            if (has_post_thumbnail()) {
                the_post_thumbnail('full'); // Display the random photo
            }
        endwhile;
        wp_reset_postdata();
    endif; 
    ?>
    </div>
    <div class="hero-title">
    <img src="<?php echo get_template_directory_uri();?>/assets/Titreheader.png" alt="photographe event"/> <!-- Hero title -->
    </div>
</div> 
    
<div class="filters">

    <div class="filters-left">
        <select id="category-select" class="category-filter filter">
            
            <option value="">Category</option>
            <?php
                // Query for fetching categories
                $terms = get_terms(array(
                    'taxonomy' => 'mota-category',
                    'hide_empty' => false,
                ));
                if ($terms && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        echo '<option class="" value="' . $term->term_id . '">' . $term->name . '</option>'; // Display category options
                    }
                }
            ?>
            
        </select>
            </div>
        <!-- Format -->
        <div class="filter-middle">
        <select id="format-select" class="format-filter">
            <option value="">Format</option>
            <?php
                // Query for fetching formats
                $terms = get_terms(array(
                    'taxonomy' => 'mota-format',
                    
                ));
                
                if ($terms && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // Display format options
                    }
                }
            ?>
        </select>
        </div>
      
        <div class="filters-right">
            <select id ="order-select" class="time-filter">
                <option value="">Trier Par</option>
                <option value="asc">Date - Ordre croissant</option>
                <option value="desc">Date - Ordre décroissant</option>
            </select> <!-- Display sorting options -->
        </div>
    </div>
</div>

</div>

<div class="ajax-container"> 
    
</div>
    
<div class="load-more-photos-box">
    <button id="load-more-photos">Charger plus</button> <!-- Load more button -->
</div>

</section>
<?php get_footer(); ?> <!-- Include footer -->