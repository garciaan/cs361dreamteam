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
				function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				//create arrays for skills and skills errors
				$skillErrs = array();
				$skills = array();
				for ($i = 0; $i < 10; $i++){
					$skills[] = NULL;
				}
				//get user id
				$wp_id = get_current_user_id();

				if ($_SERVER["REQUEST_METHOD"] == "POST") { //if submitted
					
					//if there is a skill box filled, validate it and store it
					for ($i = 0; $i < 10; $i++){
						$skill_name = "skill" . ($i + 1);
						if (!empty($_POST[$skill_name])){

							//check inputs for destructive inputs
							$skills[$i] = test_input($_POST[$skill_name]);	// check if name only contains letters and whitespace
							if (!preg_match("/^[a-zA-Z ]*$/",end($skills))) {
								$skillErrs[] = "Only letters and white space allowed";
							}
							else {
								$skillErrs[] = '';
							}

						}

					}

					//insert into the database by creating a crazy sql string.
					$sql = "INSERT INTO `skills` (`wp_id`, `skill1`, `skill2`, `skill3`, `skill4`, `skill5`, `skill6`, `skill7`, `skill8`, `skill9`, `skill10`) VALUES(" . $wp_id;
					for ($i = 0; $i < 10; $i++){
						$sql .= ", ";
						if ($skills[$i] == NULL){
							$sql .= 'NULL';
						}
						else{
							$sql .= "'" . $skills[$i] . "'";
						}
					}
					$sql .= ") ON DUPLICATE KEY UPDATE ";
					$sql .= "`skill1` = '" . $skills[0] . "'";
					for ($i = 1; $i < 10; $i++){
						$skill_name = "`skill" . ($i + 1) . "`";
						$sql .= ', ';
						$sql .= $skill_name . '=';
						if ($skills[$i] == NULL){
							$sql .= 'NULL';
						}
						else{
							$sql .= "'" . $skills[$i] . "'";
						}
					}
					//runs the sql command
					$results = $wpdb->get_results($sql);

					//TESTING
					//gets the result from select and stores them in an array
					$output_skills = array();
					$test_sql = 'SELECT * FROM `skills` WHERE `wp_id` = ' . $wp_id;
					$row = $wpdb->get_row($test_sql);
					$output_skills[] = $row->skill1;
					$output_skills[] = $row->skill2;
					$output_skills[] = $row->skill3;
					$output_skills[] = $row->skill4;
					$output_skills[] = $row->skill5;
					$output_skills[] = $row->skill6;
					$output_skills[] = $row->skill7;
					$output_skills[] = $row->skill8;
					$output_skills[] = $row->skill9;
					$output_skills[] = $row->skill10;

					echo "<hr><hr><hr><hr>";
					echo "<h2>FOR TESTING PURPOSES ONLY</h2>";
					echo "<p>SQL Command: " . $sql . "</p><br>";
					echo "<p>TESTING SQL STATEMENT: " . $test_sql . "</p><br>";
					echo "<hr><p>Expected output:</p>";
					print_r($skills);
					echo "<hr><p>Actual output: </p>";
					print_r($output_skills);
					echo "<hr>";
					echo '<table style="width:30%"><tr><td>Does input equal output?</td>';
					//compares input to output and displays in a green or red box for  pass or fail
					if ($skills == $output_skills){
						echo '<td bgcolor="#008000"> PASS </td>';
					}
					else {
						echo '<td bgcolor="#FF0000"> FAIL </td>';
					}
					echo "</tr></table>";
					echo "<hr><hr><hr><hr>";

					//END TESTING

					//displays each skill
					echo "<h2>Your Skills:</h2>";
					foreach ($skills as $skill){
						if (!empty($skill)){
							echo $skill . "<br>";
						}
					}
				}
					
					
				?>

				<h2>Please Enter Relevant Skills</h2>
				<?php 
				//displays form for editing current skills
				$skills = array();
				$sql = 'SELECT * FROM `skills` WHERE `wp_id` = ' . $wp_id;

				//get current skills (even if null)
				$row = $wpdb->get_row($sql);
				$skills[] = $row->skill1;
				$skills[] = $row->skill2;
				$skills[] = $row->skill3;
				$skills[] = $row->skill4;
				$skills[] = $row->skill5;
				$skills[] = $row->skill6;
				$skills[] = $row->skill7;
				$skills[] = $row->skill8;
				$skills[] = $row->skill9;
				$skills[] = $row->skill10;
				?>
				<form method="post" id="mentorskill_form">
					<?php 
					for ($i = 0; $i < 10; $i++){ //creates entries and pre fills them with current skills
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