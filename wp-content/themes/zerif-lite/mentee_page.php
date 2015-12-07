<?php
/**
 * Template Name: mentee_page
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
					//get current user id to get current mentor id
					$user_id = get_current_user_id();
					$sql = 'select `mentor_id` from wpid_to_mid where `wp_id`= ' . $user_id;
					$mentor_id = (int)($wpdb->get_var($sql));
					
					if ($mentor_id == 0){ //if not mentor
						echo "<h1>Please Become a Mentor First!</h1>";
					}
					else {
					//get all the mentees of the current mentor
					$results = $wpdb->get_results("SELECT * FROM mentee Join mentor2mentee ON mentee.mentee_id = mentor2mentee.mentee_id JOIN mentor_career ON mentee.mentee_id = mentor_career.mentee_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID WHERE mentor2mentee.mentor_id = '".$mentor_id."'");
					
		
						if(!empty($results)) { //makes sure there are some
							//create the form to contact mentee
							echo '<form method="post" action="http://dreamplanner.campuslifeohs.com/mentee-contact/" id="contact_mentee">';
							echo "<table border=0>";
	     					foreach($results as $r) {	 //display each mentee
	          					
	          					echo "<tr>";
	          					echo "<td rowspan=2 width=200><img class= wp-image-34 size-thumbnail src=" .$r->photo. " width= 150 /></td>";
	          					echo "<td><h1>".$r->full_name."</h1><h2>".$r->employer."</h2></td>";
	          					echo "</tr>";
	          					echo "<tr><td><h3>Seeking expertise in:</h3>:" .$r->Career_Name. "</td></tr>";
	          					echo "<tr><td></td><td>Years Experience: ".$r->yrs_exp."</td></tr>";
	          					echo "<tr><td></td><td>".$r->desc_exp."</td></tr>";
	          					echo "<tr><td></td><td>Address: ".$r->address." ".$r->State.", ".$r->Country."</td></tr>";
	          					echo "<tr><td></td><td>Contact Me:</td></tr>";
	          					echo "<tr><td></td><td>Preferred Method: ".$r->contact_meth."</td></tr>";
	          					echo "<tr><td></td><td>Email: ".$r->email."</td></tr>";
	          					echo "<tr><td></td><td>Phone: ".$r->phone."</td></tr>";
	          					echo "<tr><td></td><td>".$r->session_num." Sessions of ".$r->session_time." mins per year requested</td></tr>";
	          					echo "<tr><td></td><td>References: ".$r->ref_1."<br/>References: ".$r->ref_2."</td></tr>";
	          					echo "<tr><td></td><td>Why I am a Mentee: ".$r->why_mentee."</td></tr>";
	          					echo "<tr><td></td><td><button type='submit' value='" . $r->mentee_id . "' name='contact_mentee'>Contact Mentee</button></td></tr>";
	     					}
	     					echo "</table>";
	     					echo '</form>';
						} else { //either no mentees or error
	     					$error = $wpdb->print_error();
	     					if ($error){
	     						echo "<p>ERROR: SELECT returned with ". $error . "</p>";
	     					}
	     					else {
	     						echo "<p>You do not yet have any mentees!</p>";

	     					}	 	 
						}
					

				?>
				<?php } //ends the if mentor_id == 0 ?>
			</main><!-- #main -->

		</div><!-- #primary -->

	<?php
		//side links
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
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a href="Mentor-Skills">My Skills</a></li>';
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