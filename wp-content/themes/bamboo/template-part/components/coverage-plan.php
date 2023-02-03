<?php
$title = get_sub_field('title');
$plan = get_sub_field('add_plans');
$tabs = get_sub_field('add_tabs');
$image = get_sub_field('image');
$subheading = get_sub_field('sub_heading');
$cta = get_sub_field('cta');
$layout = get_sub_field('select_plan_layout');
$layout_class='';
if($layout == 'renters'){
    $layout_class = ' renters';
}elseif($layout == 'owners'){
    $layout_class = ' owners';
}else{
    $layout_class = ' auto';
}
echo '<section class="coverage-plan-section">
    <div class="cp-plan'.$layout_class.'">
        <div class="container">
            <div class="sec-heading">';
                if($title) echo'<h2>'.$title.'</h2>';
            echo '</div>';
            if($plan){
                echo '<div class="row align-items-center">';
                    echo '<div class="cell-md-6 plan-cell"></div>';
                    while( have_rows('add_plans') ) {
                        the_row();
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $desc = get_sub_field('description'); 
                        $link = get_sub_field('link'); 
                        echo '<div class="cell-md-6 plan-cell">
                            <a href="'.$link.'" class="plan-wrap">
                                <div class="plan-icon">';
                                    echo file_get_contents($icon['url']);
                                echo '</div>
                                <div class="plan-content">
                                    <h4>'.$title.'</h4>';
                                    if($desc) echo $desc;
                                echo '</div>
                            </a>
                        </div>';
                        $count++;
                    }
                echo '</div>';
            }
        echo '</div>
    </div>
    <div class="cp-bottom">
        <div class="cp-tabs">
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
                                if($tab_title)  echo '<li class="tabs-item '.$active.'"><h4 data-href="#tab'. $i .'">'.$tab_title.'</h4></li>';
                                $i++;
                            }
                        echo '</ul>';

                        $j=1;
                        echo '<div class="tabs-content-wrap">';               
                            while( have_rows('add_tabs') ) {
                                the_row();
                                $tab_description = get_sub_field('tab_description');
                                $tab_button = get_sub_field('tab_button');
                                $active=' ';
                                if($j==1){
                                    $active=' active';
                                }

                                echo '<div id="tab'. $j .'" class="tab-content'. $active .'">';
                                    echo '<div class="tab-wrapper">
                                        <div class="tb-content">';
                                            if($tab_description) echo'<p>'.$tab_description.'</p>';
                                            if( $tab_button ) echo acf_link( $tab_button, 'btn-link -arrow have-questions' );
                                        echo '</div>
                                    </div>
                                </div>';

                                $j++;
                            }  
                        echo '</div>';                        
                    }
                echo '</div>
            </div>
        </div>';
        if($image || $subheading || $cta ){
            echo '<div class="cp-innerwrapper">
                <div class="cp-image">';
                    if($image) acf_img($image);
                echo '</div>
                <div class="container">
                    <div class="cp-content">';
                        if( $subheading ) echo '<h2>'.$subheading.'</h2>';
                        if( $cta ) echo acf_link( $cta, 'btn-arrow' );
                    echo '</div>
                </div>
            </div>';
        }
    echo '</div>
</section>';

?>
