<?php
$cs_title = get_field('cs_title');
$cs_description = get_field('cs_description');
$cs_image = get_field('cs_image');
$cs_image_title = get_field('cs_image_title');
?>
<section class="commercial green-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="commercial-info">
                    <h2 class="h-one cs-title"><?= $cs_title; ?></h2>
                    <p class="commercial-description"><?= $cs_description; ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="commercial-image relative-parent">
                    <?php if( $cs_image ) {
                        echo wp_get_attachment_image( $cs_image, 'full' );
                    } ?>
                    <div class="commercial-image-title">
                        <p class="ci-title"><?= $cs_image_title; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>