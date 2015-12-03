<?php
/**
 * Template Name: sql_update
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

					//turn on global errors
					$wpdb->show_errors();

					//set up the global DB access object
					global $wpdb;

					//print the test name
					echo "<p>Update Test</p>";

					//stuff the variables for the select test
					$mentor_id = "11";
					$photo = "http://dreamplanner.campuslifeohs.com/wp-content/uploads/2015/11/insert.jpg";
					$mentor_name = "Insert name";
					$mentor_phone = "Insert phone";
					$mentor_address = "Insert address";
					$time_zone = "Insert tz";
					$mentor_employer = "Insert Employer";
					$mentor_category = "999";
					$mentor_years = "99";
					$mentor_contact = "9";
					$mentor_year1 = "9";
					$mentor_sessiontime = "99";
					$mentor_email = "Insert email";
					$country = "III";
					$mentor_experience = "Insert string1";
					$mentor_ref1 = "Insert ref1";
					$mentor_ref2 = "Insert ref2";
					$mentor_qualification = "Insert string2";


					$results = $wpdb->update( 'mentor', array('photo' => $photo, 'full_name' => $mentor_name, 'phone' => $mentor_phone, 'email' => $mentor_email, 'address' => $mentor_address, 'location' => $country, 'State' => $state, 'time_zone' => $time_zone, 'employer' => $mentor_employer, 'career_cat' => $mentor_category, 'yrs_exp' => $mentor_years, 'desc_exp' => $mentor_experience, 'contact_meth' => $mentor_contact, 'session_num' => $mentor_year1, 'session_time' => $mentor_sessiontime, 'ref_1' => $mentor_ref1, 'ref_2' => $mentor_ref2, 'why_mentor' => $mentor_qualification), array('id' => $mentor_id), array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%d', '%s', '%d', '%d', '%s', '%s', '%s'), array('%s'));

					if(! $results)
					{
						echo "ERROR: UPDATE returned with ".$results;
					} else
					{
						echo "Congratulations, you have updated";
					}

					//print the test name
					echo "<p>SELECT Test</p>";
					
					//run the sql query
					$sql = "SELECT * FROM mentor JOIN mentor_career ON mentor.id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where mentor.id = '".$mentor_id."'";

					$results = $wpdb->get_results($sql);
					// the results read back should match the original Insert
					if(!empty($results)) { 
						foreach($results as $r) {	 
							echo "ID: "; if($mentor_id == $r->id){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Name: "; if($mentor_name == $r->full_name){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Phone: "; if($mentor_phone == $r->phone){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Email: "; if($mentor_email == $r->email){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Address: "; if($mentor_address == $r->address){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Country: "; if($country == $r->location){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "State: "; if($mentor_state == $r->state){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Time Zone: "; if($time_zone == $r->time_zone){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Employer: "; if($mentor_employer == $r->employer){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Career: "; if($mentor_category == $r->career_cat){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Years Exp: "; if($mentor_years == $r->yrs_exp){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Contact: "; if($mentor_contact == $r->contact_meth){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Sessions in year: "; if($mentor_year1 == $r->session_num){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Sessions Length: "; if($mentor_sessiontime == $r->session_time){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Career Exp: "; if($mentor_experience == $r->desc_exp){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Ref 1: "; if($mentor_ref1 == $r->ref_1){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Ref 2: "; if($mentor_ref2 == $r->ref_2){echo "match succeeded<br/>";} else {echo "match failed<br/>";}
							echo "Qualifications: "; if($mentor_qualification == $r->why_mentor){echo "match succeeded<br/>";} else {echo "match failed<br/>";};
						}
					} else {
						echo "ERROR: SELECT returned with ".$wpdb->print_error();
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