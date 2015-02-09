<aside id="sidebar" class="small-12 large-2 columns <?php echo types_render_field( "project-type", array("width" => "100%","height" => "100%","portrait" => "0") );?>">
	<?php do_action('foundationPress_before_sidebar'); ?>
	<?php dynamic_sidebar("sidebar-widgets"); ?>
	<?php do_action('foundationPress_after_sidebar'); ?>
</aside>
