<?php
/* Template Name: Gallery */
get_header();
?>
<script>
  $( document ).ready(function() {
    var mixer = mixitup('.gallery-container', {
    selectors: {
        target: '.item'
    }
    });
  });
</script>
<section class="our-services-content dark-section">
  <div class="container">
      <div class="gallery-filter">
        <p class="filter-item act-mix" data-filter=".all-g">ALL</p>
        <?php
        if( have_rows('gallery') ):
            $count_c = 1;
            while( have_rows('gallery') ) : the_row();
                $images = get_sub_field('gallery_main');
                $title = get_sub_field('titile');
                $gallery_cat = strtolower($title);
                $gallery_cat_name = str_replace(' ', '_', $gallery_cat); ?>
                <p class="filter-item" data-filter=".cat-<?= $count_c; ?>"><?= $title; ?></p>
                <?php $count_c++; ?>
            <?php endwhile;
        endif;?>
      </div>
  </div>
  <div class="gallery-main-c">
    <div class="container">
        <div class="gallery-container">
          <?php
            if( have_rows('gallery') ):
              $count_t = 1;
                while( have_rows('gallery') ) : the_row();
                    $images = get_sub_field('gallery_main');
                    $title = get_sub_field('titile');
                    $gallery_cat = strtolower($title);
                    $gallery_cat_name = str_replace(' ', '_', $gallery_cat);
                    if( $images ): ?>
                          <?php foreach( $images as $image ):
                          $content .= '<div class="item all-g cat-'.$count_t.'">';
                            $content .= '<a href="'.esc_url($image['url']).'">';
                            $content .= '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" />';
                            $content .= '</a>';
                          $content .= '</div>';
                          if ( function_exists('slb_activate') ){
                            $content = slb_activate($content);
                            }
                            
                        echo $content;
                          endforeach;
                  endif;
                  $count_t++;
                endwhile;
            endif;?>
        </div>
    </div>
  </div>
</section>
<?php require_once("templates/get-in-touch.php"); ?>
<?php get_footer(); ?>