<?php
/**
 * Template Name: mentee_progress_2
 */
get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">

	<div class="container">

	<?php
		if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) ) {
			echo '<div class="content-left-wrap col-md-12">';
		}
		else {
			echo '<div class="content-left-wrap col-md-9">';
		}
		?>

		<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">

				<?php 
					$user_id = get_current_user_id();
					$sql = 'select `mentor_id` from wpid_to_mid where `wp_id`= ' . $user_id;
					$mentor_id = (int)($wpdb->get_var($sql));
					
					if ($mentor_id == 0){
						echo "<h1>Please Become a Mentor First!</h1>";
					}
					else {
						// Query to get the names of the series
						$results = $wpdb->get_results("SELECT DISTINCT 'goal_name' FROM mentee_goals");
						$labels = array();
						$i = 1;
						if(!empty($results)) {
							foreach($results as $r) {
								$labels[$i] = $r->goal_name;
								$i++;
							}
						} else
						{
							echo "ERROR: SELECT returned with no results";
						}
						// Add filters to draw the graphs
						add_filter( 'mycustom_series_filter', 'bar_chart_series', 165, 1);
						add_filter( 'mycustom_data_filter', 'line_chart_data', 165, 1 );
						add_filter( 'mycustom_data_filter', 'line_chart_data', 169, 2 );
						//Function to draw the data for each graph type
						function line_chart_data( $data, $chart_id, $type ) {
	    					if($chart_id == 169){
	    						$data = array(
	    							array('Aug',3000),
	    							array('Sep',5000),
	    							array('Oct',1000),
	    							array('Nov',1000),
	    							array('Dec',20000),
	    							array('Goal',24000)
    							);
	    					} else {
	    						
	    						$data = array(
		    						array('Aug',2,10,1,7),
		    						array('Sep',10,20,3,12),
		    						array('Oct',14,51,4,14),
		    						array('Nov',18,60,7,16),
		    						array('Dec',35,80,10,20),
		    						array('Goal',100,100,100,100)
	    						);
	    					}
	    					
	    					return $data;
						}
						// Function to name all the series
						function bar_chart_series( $series, $chart_id, $type) {
	    					$series = array(
	    						array('label' => 'Month','type' => 'string'),
	    						array('label' => 'Learning about my career','type' => 'number'),
	    						array('label' => 'Reading the Starfleet Manual','type' => 'number'),
	    						array('label' => 'Memorizing Starfleet Regulations','type' => 'number'),
	    						array('label' => 'Financing','type' => 'number')
								);
	    					return $series;
						}
					}
				?>



			</main><!-- #main -->

		</div><!-- #primary -->

	<?php
		if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) ) {
			echo '</div>';
		}
		else {
			echo '</div>';
			echo '<div class="sidebar-wrap col-md-3 content-left-wrap">';
				//get_sidebar();
			echo'<div id="secondary" class="widget-area" role="complementary">';


			echo'<aside id="nav_menu-3" class="widget widget_nav_menu"><h2 class="widget-title">Actions</h2>';
			echo'<div class="menu-actions-container">';
			echo'<ul id="menu-actions" class="menu">';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-77"><a href="mentor-profile-2/">Edit Profile</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-74"><a href="List-Mentees/">My Mentees</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-74"><a href="Mentee-Add/">Add Mentees</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-75"><a href="Mentee-Progress/">Post Mentee Progress</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a href="Mentee-Contact">Communicate with a Mentee</a></li>';
			echo'</ul>';
			echo'</div>';
			echo'</aside>';


			echo'<aside id="meta-2" class="widget widget_meta"><h2 class="widget-title">Meta</h2>';
			echo'<ul>';
			echo'<li><a href="wp-admin/">Site Admin</a></li>';
			echo'<li><a href="wp-login.php?action=logout&#038;_wpnonce=f8c3f072d6">Log out</a></li>';
			echo'</ul>';
			echo'</aside>';
			echo'</div>';
			
			echo '</div>';
		}
		?>	

	</div><!-- .container -->

<?php get_footer(); ?>
