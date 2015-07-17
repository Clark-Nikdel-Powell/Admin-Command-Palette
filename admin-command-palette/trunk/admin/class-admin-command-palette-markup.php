<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Admin_Command_Palette
 * @subpackage Admin_Command_Palette/data
 * @author     Your Name <email@example.com>
 */
final class Admin_Command_Palette_Markup {

	public function search_box() {

		// Set up data for user content result divs.
		$post_types = get_post_types( array(), 'objects' );
		$taxonomies = get_taxonomies( array(), 'objects' );

		$excluded_post_types = get_option('acp_excluded_post_types');
		$excluded_taxonomies = get_option('acp_excluded_taxonomies');

		// Unset any excluded post types
		if ( !empty($excluded_post_types) ) {

			foreach ( $post_types as $post_type_slug => $post_type_obj ) {

				if ( '1' == $excluded_post_types[$post_type_slug] ) {
					unset( $post_types[$post_type_slug] );
				}

				if ( 'post' == $post_type_slug ) {
					$post_type_obj->menu_icon = 'dashicons-admin-post';
				}
				if ( 'page' == $post_type_slug ) {
					$post_type_obj->menu_icon = 'dashicons-admin-page';
				}
				if ( 'attachment' == $post_type_slug ) {
					$post_type_obj->menu_icon = 'dashicons-admin-media';
				}

			}

		}

		// Unset any excluded taxonomies
		if ( !empty($excluded_taxonomies) ) {

			foreach ( $taxonomies as $taxonomy_slug => $taxonomy_obj ) {

				if ( '1' == $excluded_taxonomies[$taxonomy_slug] ) {
					unset( $taxonomies[$taxonomy_slug] );
				}

			}

		}

		$user_result_lists = array_merge($post_types, $taxonomies);

		?>
		<div class="admin-command-palette admin-command-palette-overlay"></div>
		<div class="admin-command-palette admin-command-palette-modal">
			<div class="search-container">
				<input type="search" placeholder="Start typing..." class="mousetrap" />
			</div>
			<header class="admin-command-palette-results-count"><span class="acp-count-info"><span class="amount" data-amount="0">0</span> Results <a class="clear" href="#" title="&#8984; + &#9003;">Clear</a></span> <span class="loader"><span></span><span></span></span></header>
			<div class="admin-command-palette-results">
				<?php foreach ($user_result_lists as $item_slug => $result_list_obj ) { ?>
				<?php
				// Set up icon and title, which form the heading
				$icon  = '';
				$title = $result_list_obj->labels->name;


				if ( isset($result_list_obj->menu_icon) && '' != $result_list_obj->menu_icon ) {
					$icon = '<div class="wp-menu-image dashicons-before '. $result_list_obj->menu_icon  .'"></div>';
				}

				$heading = $icon . $title;

				?>
				<div class="acp-results hide" data-name="<?php echo $item_slug; ?>">
					<h3 class="subheading"><?php echo $heading; ?></h3>
					<ul class="acp-list">
					</ul>
				</div>
				<?php } ?>
				<div class="acp-results hide" data-name="admin-page">
					<h3 class="subheading">Admin Pages</h3>
					<ul class="acp-list">
					</ul>
				</div>
				<div class="acp-results hide" data-name="admin-action">
					<h3 class="subheading">Admin Actions</h3>
					<ul class="acp-list">
					</ul>
				</div>
			</div>
		</div>
	<?php

	}

}