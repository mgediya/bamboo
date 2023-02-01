<?php
$tabs = get_sub_field('add_tabs');
$count = count($tabs);
$tab_heading = '';
if ($count < 2){
    $tab_heading = ' single-tab';
}
$offset_top = get_sub_field('offset_top');
$margin='';
if($offset_top == 1){
    $margin = ' mt-minus';
}

$bg_option = get_sub_field('background');
$bg='';
if($bg_option == 1){
    $bg = ' -color';
}

echo '<section class="'.$margin.' faq-section '.$bg.$tab_heading.'">
    <div class="container">
        <div class="tabs-wrapper">';
            if($tabs){
                $i=1;
                echo '<ul class="tabs-nav">';
                    while( have_rows('add_tabs') ) {
                        the_row();
                        $tab_title = get_sub_field('tab_title');
                        $active=' ';
                        if($i==1){
                            $active=' active';
                        }
                        if($tab_title)  echo '<li class="tabs-item '.$active.'"><h4 data-href="#tab'.$loop.$i .'">'.$tab_title.'</h4></li>';
                        $i++;
                    }
                echo '</ul>';

                $j=1;
                echo '<div class="tabs-content-wrap">';               
                    while( have_rows('add_tabs') ) {
                        the_row();
                        $faqs = get_sub_field('add_faqs');
                        $still_questions = get_sub_field('still_questions');
                        $active=' ';
                        if($j==1){
                            $active=' active';
                        }
                        echo '<div id="tab'.$loop.$j .'" class="tab-content'. $active .'">
                            <div class="tb-content">';
                            if( $faqs ) {
                                echo '<div class="accordion-wrapper">';
                                    $i = 1;
                                    while( have_rows('add_faqs') ) { the_row();
                                        $title = get_sub_field( 'question' );
                                        $answer = get_sub_field( 'description' );
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
                                if( $still_questions ) {
                                    echo '<div class="still-questions-wrapper">'.$still_questions.'</div>';
                                }
                            }
                            echo '</div>
                        </div>';  
                        $j++;
                    }  
                echo '</div>';                        
            }
        echo '</div>
    </div>
</section>';
?>