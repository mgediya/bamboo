<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
if (!defined('ABSPATH') || !function_exists('add_filter')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}
get_header();
$title = get_field( 'title', 'options' );
$description = get_field( 'description', 'options' );
echo '<div class="main-content">
	<section class="error-404">
		<div class="container py-30">';
		if( $title ){
			echo '<h1>'.$title.'</h1>';
		}else{
			echo'<h1 class="page-title">';
				echo '<span>'. _e( 'Oops! That page can&rsquo;t be found.') .'</span>';
			echo '</h1>';
		}
		if( $description ){
			echo '<div class="description">'.$description.'</div>';
			echo '<a href="'.get_home_url().'" class="btn mt-15">Back To Home</a>';
		}else{
			echo '<div class="description">
				<p>The Page You Requested Cannot Be Found. The Page You Are Looking For Might Have Been Removed, Had Its Name Changed, Or Is Temporarily Unavailable.</p>
				</br>
				<h5>Please try the following:</h5>
				<ul>
					<li>If you typed the page address in the Address bar, make sure that it is spelled correctly.</li>';
					echo '<li>Open the <a href="'.get_home_url().'">Home Page</a> and look for links to the information you want.</li>';
					echo '<li>Use the navigation bar on the left or top to find the link you are looking for.</li>
				</ul>';
				echo '<a href="'.get_home_url().'" class="btn mt-15">Back To Home</a>';
			echo '</div>';
		}
	echo '</div>
	</section>
</div>';
get_footer();