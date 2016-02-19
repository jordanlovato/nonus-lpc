<?php $slider = ct_slider_code();?>
<?php if($slider && !is_search() && !is_404()):?>
	<?php echo do_shortcode($slider);?>
<?php endif;?>
<nav id="MainNav" class="navbar sticky">
    <!-- <a href="#MainNav" class="arrow"></a> -->

    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <!-- This button toggles visibility of menu on mobile devices -->
            </button>
	        <?php if ($logo = ct_get_option('general_logo')) { ?>
                <a class="brand" href="<?php echo home_url(); ?>"><img src="<?php echo esc_url($logo)?>" alt="logo"/></a>
                <?php } elseif ($plain = ct_get_option('general_logo_html')) { ?>
                <?php echo $plain ?>
            <?php };?>

					<?php $lpc_header_text = get_post_meta(get_query_var('queried_object_id'), LPC_HEAD_TOP_NAVBAR_HEADER_TEXT, true); ?>
					<div id="lpc-title"><h1 <?php if (!empty($lpc_header_text)) echo "style='background-color:$lpc_header_text !important'"; ?>><?php bloginfo('name'); ?></h1></div>
		
					<?php $lpc_header_base = get_post_meta(get_query_var('queried_object_id'), LPC_HEAD_TOP_NAVBAR_BASE, true); ?>
	        <div class="nav-collapse collapse" id="nav-main" <?php if (!empty($lpc_header_base)) echo "style='background-color:$lpc_header_base !important'"; ?>>
                <?php if (has_nav_menu('primary_navigation')) {
                wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_id' => 'nav', 'menu_class' => 'nav nav-pills'));
            }?>
            </div>
        </div>
    </div>
</nav>
