<?php
/**
 * Template Name: mentor_skills
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
				// define variables and set to empty values	
				//$skillErr = "";

				//$skill1 = $skill2 = $skill3 = $skill4 = $skill5 = $skill6 = $skill7 = $skill8 = $skill9 = $skill10 = "";
				
				$skillErrs = array();
				$skills = array();

				$wp_id = get_current_user_id();

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					

					for ($i = 0; $i < 10; $i++){
						$skill_name = "skill" . ($i + 1);
						if (!empty($_POST[$skill_name])){

							$skills[] = test_input($_POST[$skill_name]);	// check if name only contains letters and whitespace
							if (!preg_match("/^[a-zA-Z ]*$/",end($skills))) {
								$skillErrs[] = "Only letters and white space allowed";
							}
							else {
								$skillErrs[] = '';
							}

						}

					}

					echo "<h2>Your Skills:</h2>";
					foreach ($skills as $skill){
						echo $skill . "<br>";
					}
				}
					
					function test_input($data) {
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						return $data;
					}
				?>

				<h2>Please Enter Relevant Skills</h2>
				<?php 

				$sql = 'SELECT * FROM `skills` WHERE `wp_id` = ' . $wp_id;
				$results = $wpdb->get_results($sql);
				$i = 0;
				foreach ($results as $row) {
					$skills[$i] = $row->skill;
					$i++;
				}
				?>
				<form method="post" id="mentorskill_form">
					<?php 
					for ($i = 0; $i < 10; $i++){
						$skill_display_name = "Skill" . ($i + 1);
						$skill__form_name = "skill" . ($i + 1);
						$skill_err_name = "skillErr" . ($i + 1);
						$input_line = $skill_display_name . ': <input type="text" name="' . $skill__form_name . '" value="' . $skills[$i] . '">';
						if ($skillErrs[$i] != ''){
							$input_line .= '<span class="error">* ' . $skillErrs[$i] . '</span>';
						}  
						$input_line .= '<br><br>';
						echo $input_line;
							
							

					} 
					echo '<input type="submit" name="submit" id="submit" value="Send"/>';
					echo '</form>';
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

			if($wpdb->insert_id)
			{
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
			}

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