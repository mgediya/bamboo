<?php

$templateSCSS = false;
if( $templateSCSS ) :
	global $template;
	$template_name = str_replace(".php",".scss",basename($template));
	$template_name = str_replace("template-","",$template_name);
	$template_comp_file_path = get_template_directory().'/assets/scss/templates/_'.str_replace("_","-",$template_name);
	$template_comp_main_file_path = get_template_directory().'/assets/scss/templates/_core.scss';
	$component_main_file_path = get_template_directory().'/assets/scss/components/_core.scss';

	if( !file_exists( $template_comp_file_path ) ) {
		$template_scss_comp_file = fopen( $template_comp_file_path, "w") or die("Unable to open file!");
		fwrite($template_scss_comp_file,$content);

		$current = file_get_contents($template_comp_main_file_path);
		// Append a new person to the file
		$current .= "@import \"".$template_name."\";\n";
		// Write the contents back to the file
		file_put_contents($template_comp_main_file_path, $current);

		fclose($template_scss_comp_file);
	}
endif;

if( have_rows('page_component')) :
	$loop = 1;
    while ( have_rows('page_component') ) :
        the_row();
        $layout = get_row_layout();
        switch ( $layout ) :
            case $layout:
				$php_comp_file_path = get_template_directory().'/template-part/components/'.str_replace("_","-",$layout).'.php';
				$scss_comp_file_path = get_template_directory().'/assets/scss/components/_'.str_replace("_","-",$layout).'.scss';
				if( !file_exists( $php_comp_file_path ) ) {
					$php_comp_file = fopen( $php_comp_file_path, "w") or die("Unable to open file!");
					fclose($php_comp_file);
					// include component for the page
				}
                include(locate_template('template-part/components/'.str_replace("_","-",$layout).'.php'));
				if( !file_exists( $scss_comp_file_path ) ) {
					$scss_comp_file = fopen( $scss_comp_file_path, "w") or die("Unable to open file!");

					$current = file_get_contents($component_main_file_path);
					// Append a new person to the file
					$current .= "@import \"".str_replace("_","-",$layout)."\";\n";

					file_put_contents($component_main_file_path, $current);

					fclose($scss_comp_file);
				}
            break;
		endswitch;
		$loop++;
    endwhile;
endif;
?>
