<?php
$cta_title = get_field('cta_title', 57);
$cta_subtitle = get_field('cta_subtitle', 57);
$cta_button = get_field('cta_button', 57);
?>
<section class="cta">
    <div class="container">
        <div class="d-flex cta-flex">
            <div class="cta-title">
                <h4 class="h-four cta-title"><?= $cta_title; ?></h4>
                <p class="cta-subtitle"><?= $cta_subtitle; ?></p>
            </div>
            <div class="cta-button-block">
                <a href="<?= $cta_button['url']; ?>" class="primary-button cta-button"><?= $cta_button['title']; ?></a>
            </div>
        </div>
    </div>
</section>