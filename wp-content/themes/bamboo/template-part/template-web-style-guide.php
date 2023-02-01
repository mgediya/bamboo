<?php
/**
 * Template Name: Web Style Guide
 */

if ( !defined( 'ABSPATH' ) || !function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

get_header();
echo '<!-- content area part -->
<div class="main-content container py-30">
    <h1>75px H1 heading</h1>
    <h2>58px H2 heading</h2>
    <h3>50px H3 heading</h3>
    <h4>42px H4 heading</h4>
    <h5>20px H5 heading</h5>
    <h6>16px H6 heading</h6>
    <hr>
    <small>Small Label</small>
    <hr>
    <div class="row">
        <div class="cell-12">
            <p><a href="#">Lorem ipsum dolor sit amet,</a> consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud hyperlink style ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehend hover hyperlink style in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
        <div class="cell-12 bullet-styled">
            <br>
            <ul>
                <li>Mauris quis justo at tellus faucibus suscipit non ut leo. Donec ullamcorper nisi mi, ac mattis leo convallis ut Quisque vel ipsum massa. Mauris quis justo at tellus faucibus. 
                </li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo. Donec ullamcorper nisi mi, ac mattis leo convallis ut.
                    <ul>
                        <li>Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo.</li>
                        <li>Donec ullamcorper nisi mi, ac mattis leo convallis ut. Lorem ipsum dolor sit amet.</li>
                    </ul>
                    <ol>
                        <li>Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo.</li>
                        <li>Donec ullamcorper nisi mi, ac mattis leo convallis ut. Lorem ipsum dolor sit amet.</li>
                    </ol>
                </li>
                <li>This may still come in handy in some situations.</li>
            </ul>
            <br>
            <ol>
                <li>Mauris quis justo at tellus faucibus suscipit non ut leo. Donec ullamcorper nisi mi, ac mattis leo convallis ut Quisque vel ipsum massa. Mauris quis justo at tellus faucibus. 
                </li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo. Donec ullamcorper nisi mi, ac mattis leo convallis ut.
                    <ol>
                        <li>Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo.</li>
                        <li>Donec ullamcorper nisi mi, ac mattis leo convallis ut. Lorem ipsum dolor sit amet.</li>
                    </ol>
                    <ul>
                        <li>Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo.</li>
                        <li>Donec ullamcorper nisi mi, ac mattis leo convallis ut. Lorem ipsum dolor sit amet.</li>
                    </ul>
                </li>
                <li>This may still come in handy in some situations.</li>
            </ol>
        </div>
        <hr>
        <h3>Bullet check style</h3>
        <div class="cell-12 bullet-check">
            <br>
            <ul>
                <li>Mauris quis justo at tellus faucibus suscipit non ut leo. Donec ullamcorper nisi mi, ac mattis leo convallis ut Quisque vel ipsum massa. Mauris quis justo at tellus faucibus. 
                </li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo. Donec ullamcorper nisi mi, ac mattis leo convallis ut.
                    <ul>
                        <li>Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo.</li>
                        <li>Donec ullamcorper nisi mi, ac mattis leo convallis ut. Lorem ipsum dolor sit amet.</li>
                    </ul>
                    <ol>
                        <li>Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo.</li>
                        <li>Donec ullamcorper nisi mi, ac mattis leo convallis ut. Lorem ipsum dolor sit amet.</li>
                    </ol>
                </li>
                <li>This may still come in handy in some situations.</li>
            </ul>
            <br>
            <ol>
                <li>Mauris quis justo at tellus faucibus suscipit non ut leo. Donec ullamcorper nisi mi, ac mattis leo convallis ut Quisque vel ipsum massa. Mauris quis justo at tellus faucibus. 
                </li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo. Donec ullamcorper nisi mi, ac mattis leo convallis ut.
                    <ol>
                        <li>Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo.</li>
                        <li>Donec ullamcorper nisi mi, ac mattis leo convallis ut. Lorem ipsum dolor sit amet.</li>
                    </ol>
                    <ul>
                        <li>Quisque vel ipsum massa. Mauris quis justo at tellus faucibus suscipit non ut leo.</li>
                        <li>Donec ullamcorper nisi mi, ac mattis leo convallis ut. Lorem ipsum dolor sit amet.</li>
                    </ul>
                </li>
                <li>This may still come in handy in some situations.</li>
            </ol>
        </div>
    </div>
    <hr>
    
    <div class="p-30">
        <span class="h6">Buttons on White </span> <br><br>
        <div class="row">
            <div class="cell-md-3">
                <a href="#" class="btn">Learn More</a>
            </div>
            <div class="cell-md-3">
                <a href="#" class="btn-secondary">Learn More</a>
            </div>
            <div class="cell-md-3">
                <a href="#" class="btn-link">Learn More</a>
            </div>
            <div class="cell-md-3">
                <a href="#" class="btn-link -arrow">Learn More</a>
            </div>
            <div class="cell-md-3">
                <a href="#" class="btn-arrow">Learn More</a>
            </div>
        </div>
    </div>
    <div class="pagination d-flex justify-content-center ajax-page">
        <ul class="page-numbers"><li><a href="javascript:void(0);" class="prev disabled" disable="">Prev</a></li></ul>
        <ul class="page-numbers">
            <li><span aria-current="page" class="page-numbers current">1</span></li>
            <li>of</li>
            <li><a class="page-numbers" href="#">5</a></li>
            <li><a class="next page-numbers" href="#">Next</a></li>
        </ul>
    </div>
</div>';

get_footer();
?>