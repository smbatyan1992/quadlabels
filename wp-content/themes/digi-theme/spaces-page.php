<?php
/* Template Name: Design Spaces */
get_header();
?>
<section class="design-specs">
    <h1 class="h-one text-center about-us-title products-page-title"><?php the_title(); ?></h1>
    <div class="page-main-content"><?php the_content(); ?></div>
    <div class="container">
        <div class="specs-container">
            <div class="row">
              <div class="col-lg-4">
                  <div class="specs-navigation">
                      <?php
                      if( have_rows('design_specs') ):
                        $count_t = 1;
                          while( have_rows('design_specs') ) : the_row();
                              $title = get_sub_field('title'); ?>
                              <div class="specs-tab-title <?php if($count_t == 1): echo 'active-tab'; endif; ?>" data-id="<?= $count_t; ?>">
                                  <p><?= $title; ?></p>
                              </div>
                          <?php $count_t++; endwhile;
                      endif; ?>
                  </div>
              </div>
              <div class="col-lg-8">
                  <div class="specs-tabs">
                      <?php
                      if( have_rows('design_specs') ):
                        $count_d = 1;
                          while( have_rows('design_specs') ) : the_row();
                              $description = get_sub_field('description'); ?>
                              <div class="specs-tab-desc <?php if($count_d == 1): echo 'active'; endif; ?>" id="spec-<?= $count_d; ?>">
                                  <?= $description; ?>
                              </div>
                          <?php $count_d++; endwhile;
                      endif; ?>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>
<?php require_once("templates/get-in-touch.php"); ?>
<?php get_footer(); ?>