<?php
/* Template Name: FAQ */
get_header();
$faq_title = get_field('fs_faq_title');
$faq_subtitle = get_field('fs_faq_subtitle');
?>
<h1 class="h-one text-center about-us-title products-page-title"><?php the_title(); ?></h1>
<section class="single-service-faq">
    <div class="faq-container">
        <?php if(get_the_content()): ?>
        <div class="fq-content">
            <?php the_content(); ?>
        </div>
        <?php endif; ?>
        <div class="service-faq-container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="acc-info">
                        <?php if($faq_title): ?><h4 class="h-four acc-title"><?= $faq_title; ?></h4><?php endif; ?>
                        <?php if($faq_subtitle): ?><p class="acc-description"><?= $faq_subtitle; ?></p><?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="accordion" id="accordionExample">
                        <?php
                        if( have_rows('fs_faq_item') ):
                            $acc_count = 1;
                            while( have_rows('fs_faq_item') ) : the_row();
                                $title = get_sub_field('title');
                                $description = get_sub_field('descriptio'); ?>
                                <div class="accordion-item">
                                    <h4 class="accordion-header" id="heading<?= $acc_count; ?>">
                                        <button class="accordion-button <?php if($acc_count == 1): echo 'active-acc-title'; endif; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $acc_count; ?>" aria-expanded="true" aria-controls="collapse<?= $acc_count; ?>">
                                            <?= $title; ?>
                                        </button>
                                    </h4>
                                    <div id="collapse<?= $acc_count; ?>" class="accordion-collapse collapse <?php if($acc_count == 1): echo 'show'; endif; ?>" aria-labelledby="heading<?= $acc_count; ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?= $description; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                            $acc_count++;
                             endwhile;
                        else :
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once("templates/get-in-touch.php"); ?>
<?php get_footer(); ?>