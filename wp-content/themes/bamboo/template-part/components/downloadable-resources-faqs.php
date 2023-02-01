<?php
$title = get_sub_field('title');
echo '<section class="downloadable-resources-faqs most-current-news">
    <div class="container">
        <div class="drf-wrap">';
            echo '<div class="fb-cat-row d-flex">';
                if ( $title ) {
                    echo '<div class="filter-column">
                        <div class="filter-listitem">';
                            if ( $title ) echo '<span class="checkbox-list">'.$title.'</span>';
                        echo '</div>
                    </div>';
                }
                if ( have_rows('add_downloadable_resources') ) {
                    echo '<div class="filterlist">';
                        $i=1;
                        while (have_rows('add_downloadable_resources')) {
                            the_row();
                            $eyebrow_text = get_sub_field('eyebrow_text');
                            $selected='';
                            if( $i == 1) $selected =' selected';
                            if($eyebrow_text)  echo '<div class="gallery-catlist'.$selected.'"><span data-href="#tab'.$loop.$i .'">'.$eyebrow_text.'</span></div>';
                            $i++;
                        }
                    echo '</div>';
                }
            echo '</div>';
            if ( have_rows('add_downloadable_resources') ) {
                echo '<div class="faq-section tabs-wrapper">';
                    $j=1;
                    echo '<div class="tabs-content-wrap">';
                        while ( have_rows('add_downloadable_resources') ) {
                            the_row();
                            $heading = get_sub_field('heading');
                            $add_tabs = get_sub_field('add_tabs');
                            $selected='';
                            if($j==1){
                                $selected=' selected';
                            }
                            echo '<div id="tab'.$loop.$j .'" class="tab-content'.$selected .'">
                                <div class="tb-content">';
                                    echo '<div class="tabs-nav">';
                                        if($heading)  echo '<div class="tabs-item"><h4>'.$heading.'</h4></div>';
                                    echo '</div>';
                                    if( $add_tabs ) {
                                        echo '<div class="accordion-wrapper">';
                                            $i = 1;
                                            while( have_rows('add_tabs') ) { the_row();
                                                $title = get_sub_field( 'tab_title' );
                                                $answer = get_sub_field( 'tab_descriptions' );
                                                echo '<div class="accordion-single" rel="accordion-'.$i.'">
                                                        <div class="list-head">
                                                            <h5>'.$title.'</h5>
                                                        </div>
                                                        <div class="list-desc">';
                                                            if( $answer ) {
                                                                echo '<div class="list-desc-wrapper">'.$answer.'</div>';
                                                            }
                                                        echo '</div>';
                                                echo  '</div>';
                                                $i++;
                                            }
                                        echo '</div>';
                                    }
                                echo '</div>';
                            echo '</div>';
                            $j++;
                        }
                    echo '</div>';
                echo '</div>';
            }
        echo '</div>
    </div>
</section>';