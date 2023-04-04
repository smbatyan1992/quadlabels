<?php
$abs_title = get_field('abs_title');
?>
<section class="about-us">
    <div class="container">
        <h2 class="h-one uppercase text-center about-us-title"><?= $abs_title; ?></h2>
        <div class="row">
            <?php
            if( have_rows('about_us') ):
                while( have_rows('about_us') ) : the_row();
                    $title = get_sub_field('title');
                    $description = get_sub_field('description'); ?>
                    <div class="col-md-4">
                        <div class="about-item">
                            <div class="about-title">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 12C21 7.03125 16.9688 3 12 3C7.03125 3 3 7.03125 3 12C3 16.9688 7.03125 21 12 21C16.9688 21 21 16.9688 21 12Z" stroke="#FF8400" stroke-width="1.6" stroke-miterlimit="10"/>
                                    <path d="M17.25 9L12.0061 15L9.75844 12.75M8.99766 15L6.75 12.75M14.3302 9L11.9138 11.7656" stroke="#FF8400" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <h5 class="h-five uppercase white-text ab-title"><?= $title; ?></h5>
                            </div>
                            <div class="ab-description">
                                <p><?= $description; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>