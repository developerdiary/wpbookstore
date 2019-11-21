<?php
/*
Template Name: Display All Authors
*/

get_header();
?>
	<?php
		$allUsers = get_users('orderby=post_count&order=DESC');

		$users = array();
		// Remove subscribers from the list as they won't write any articles
		foreach($allUsers as $currentUser)
		{
			if(!in_array( 'subscriber', $currentUser->roles )){
				$users[] = $currentUser;
			}
		}
	?>

	<div id="primary" class="content">
			<?php				
			foreach($users as $user) {										
			?>
			<div class="author">
				<div class="authorAvatar"><?php echo get_avatar( $user->user_email, '228' ); ?></div>
				<div class="authorInfo">
					<h2 class="authorName"><?php echo $user->data->display_name; ?></h2>
					<p class="authorDescrption"><?php echo get_user_meta($user->ID, 'description', true); ?></p>
					<p class="authorLinks"><a href="<?php echo get_author_posts_url( $user->ID ); ?>">View Author Links</a></p>
				</div>
			</div>
			<?php
			}
			?>	
	</div><!-- #primary -->
<?php
get_footer();