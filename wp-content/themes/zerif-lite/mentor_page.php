<?php
/**
 * Template Name: mentor_page
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

					global $wpdb;

					$user_id = get_current_user_id();
					$sql = 'select `mentee_id` from wpid_to_mid where `wp_id`= ' . $user_id;
					$mentee_id = (int)($wpdb->get_var($sql));
					//$results = $wpdb->get_results("SELECT * FROM mentor JOIN mentor_career ON id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID GROUP By id");
					
					if ($mentee_id == 0){
						echo "<h1>Please Become a Mentee First!</h1>";
					}
					else {
						$results = $wpdb->get_results("SELECT * FROM mentor Join mentor2mentee ON mentor.id = mentor2mentee.mentor_id JOIN mentor_career ON id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID WHERE mentor2mentee.mentee_id = '".$mentee_id."' GROUP By id");
						

						if(!empty($results)) { 
							echo '<form method="post" action="http://dreamplanner.campuslifeohs.com/contact/" id="contact_mentee">';
							echo "<table border=0>";
	     					foreach($results as $r) {	 
	          					echo "<tr>";
	          					echo "<td rowspan=2 width=200><img class= wp-image-34 size-thumbnail src=" .$r->photo. " width= 150 /></td>";
	          					echo "<td><h1>".$r->full_name."</h1><h2>".$r->employer."</h2></td>";
	          					echo "</tr>";
	          					echo "<tr><td><h3>Expertise</h3>:" .$r->Career_Name. "</td></tr>";
	          					echo "<tr><td></td><td>Years Experience: ".$r->yrs_exp."</td></tr>";
	          					echo "<tr><td></td><td>".$r->desc_exp."</td></tr>";
	          					echo "<tr><td></td><td>Address: ".$r->address." ".$r->state.", ".$r->location."</td></tr>";
	          					echo "<tr><td></td><td>Contact Me: ".$r->email."</td></tr>";
	          					echo "<tr><td></td><td>Phone: ".$r->phone."</td></tr>";
	          					echo "<tr><td></td><td>".$r->session_num." Sessions of ".$r->session_time." mins per year</td></tr>";
	          					echo "<tr><td></td><td>References: ".$r->ref_1."<br/>References: ".$r->ref_2."</td></tr>";
	          					echo "<tr><td></td><td>Why I am a Mentor: ".$r->why_mentor."</td></tr>";
	          					echo "<tr><td></td><td><button type='submit' value='" . $r->id . "' name='contact_mentor'>Contact Mentor</button></td></tr>";
	     					}
	     					echo "</table>";
	     					echo '</form>';
						} else {
     						echo "<p>You do not yet have any mentors!</p>";
     						$wpdb->print_error();
	     					
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
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-77"><a href="mentee-profile/">Edit Profile</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-74"><a href="mentor-search/">Search for Mentors</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-75"><a href="list-Mentors/">My Mentors</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a href="contact">Communicate with a mentor</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-78"><a href="My-Finances">My Finances</a></li>';
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