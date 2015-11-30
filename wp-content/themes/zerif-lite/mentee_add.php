<?php
/**
 * Template Name: mentee_add
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
					$results = $wpdb->get_results("SELECT * FROM mentee JOIN mentor_career ON mentee.mentee_id = mentor_career.mentee_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID GROUP By mentee.mentee_id");

					$user_id = get_current_user_id();
					$sql = 'select `mentor_id` from wpid_to_mid where `wp_id`= ' . $user_id;
					$mentor_id = (int)($wpdb->get_var($sql));

					echo "<table border=0>";

					if(!empty($results)) { 
     					foreach($results as $r) {	 
          					echo "<tr><td>";
          					echo "<table border=0>";
          					echo "<tr>";
          					echo "<td rowspan=2 width=200><img class= wp-image-34 size-thumbnail src=" .$r->photo. " width= 150 /></td>";
          					echo "<td><h1>".$r->full_name."</h1><h2>".$r->employer."</h2></td>";
          					echo "</tr>";
          					echo "<tr><td><h3>Expertise</h3>:" .$r->Career_Name. "</td></tr>";
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
          					echo "<tr><td></td><td><form method=post id=menteeadd_form><input type=hidden name=menteeID id=menteeID value=".$r->mentee_id."><input type=submit value='Add Mentee'></form></td></tr>";
          					echo "</table>";
          					echo "</td></tr>";
     					}
					} else {
     					echo "ERROR: SELECT returned with ".$wpdb->print_error();	 	 
					} 
					echo "</table>";

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