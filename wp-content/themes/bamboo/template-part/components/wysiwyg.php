<?php
$wysiwyg_heading = get_sub_field('heading');
echo '<section class="post-detail-hero bullet-styled wysiwyg-section">
    <div class="container">
        <div class="pdh-wrapper">';
            echo '<div class="pdh-desc">'.$wysiwyg_heading.'</div>';
        echo '</div>';
    echo '</div>
</section>';