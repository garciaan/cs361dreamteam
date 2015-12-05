<?php
/**
 * Template Name: mentee_goals
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
				//hard coded for now
				$mentee_id = 1;
				$goal_id = 0;

				// define variables and set to empty values	
				$Err1 = $Err2 = $Err3 = $Err4 = "";
				$description = $completion = $status = $threshold = "";

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if(isset($_POST['submit_edit'])) 
					{ 
						$goal_id = $_POST['myID'];

						//draw a form based on query with my mentee_id
						$sql = "SELECT * FROM goal_progress Where goal_id = '".$goal_id."'";

						$results = $wpdb->get_results($sql);

							// the results read back should match the original Insert
							echo "<h2>My Goals</h2>";
							echo "<form method='post' id='updateGoal_form'>";
							echo "<table>";
							echo "<tr><td>#</td><td>Description</td><td>CompleteValue</td><td>Current Status</td><td>Threshold</td></tr>";
							if(!empty($results)) { 
								foreach($results as $r) {	 
									echo "<tr>";
									echo "<td>".$r->goal_id."<input type='hidden' name='myID' value= '".$r->goal_id."' ></td>";
									echo "<td><input type='text' name='goal_description' value='".$r->goal_description."'></td>";
									echo "<td><input type='text' name='goal_completion' value='".$r->goal_completion."'></td>";
									echo "<td><input type='text' name='current_status' value='".$r->current_status."'></td>";
									echo "<td><input type='text' name='threshold' value='".$r->threshold."'></td>";
									echo "</tr>";
								}
								echo "<tr><td colspan='6'><input type='submit' name='update' id='update' value='Update'/></td></tr>";
							} else {
								echo "ERROR: SELECT returned with ".$wpdb->print_error();
							}
							echo "</table>";
							echo "</form>";

					} else if(isset($_POST['update'])) {

						$goal_id= $_POST['myID'];
						$description = $_POST["goal_description"];
						$completion= $_POST['goal_completion'];
						$status= $_POST['current_status'];
						$threshold= $_POST['threshold'];

						echo $goal_id;
						echo $description;
						echo $completion;
						echo $status;
						echo $threshold;
						echo $mentee_id;

						$results = $wpdb->update( 'goal_progress', 
							array('goal_description' => $description, 'goal_completion' => $completion, 'current_status' => $status, 'threshold' => $threshold, 'mentee_id' => $mentee_id),
							array('goal_id' => $goal_id), 
							array( '%s', '%d', '%d', '%d', '%d'), 
							array('%d'));
														
										if(! $results)
										{
											echo "ERROR: UPDATE returned with ".$results;
										} else
										{
											//echo "Congratulations, you have updated";
										}

						echo "<form method='post' id='OK_form'>";
						echo "<input type='hidden' name='mentee_id' value='".$mentee_id."'>";
						echo "<br><br>";
						echo "<input type='submit' name='ack_form' id='ack_form' value='OK'/>";
						echo "</form>";

					} else if(isset($_POST['add_new'])) {

						//draw a blank form
						echo"<h2>Please Enter or update your Goals</h2>";
						echo "<form method='post' id='menteeGoals_form'>";
						echo "Goal Description: <input type='text' name='goal_description' value='".$description."'>";
						echo "<span class='error'>".$Err1."</span>";
						echo "<br><br>";
						echo "Total Value or % for Completion: <input type='text' name='goal_completion' value='".$completion."'>";
						echo "<span class='error'>".$Err2."</span>";
						echo "<br><br>";
						echo "Current % Complete: <input type='text' name='current_status' value='".$status."'>";
						echo "<span class='error'>".$Err3."</span>";
						echo "<br><br>";
						echo "Threashold Value for Alerts: <input type='text' name='threshold' value='".$threshold."'>";
						echo "<span class='error'>".$Err4."</span>";
						echo "<br><br>";
						echo "<input type='hidden' name='mentee_id' value='".$mentee_id."'>";
						echo "<br><br>";
						echo "<input type='submit' name='submit_form' id='submit_form' value='Send'/>";
						echo "</form>";

					} else if(isset($_POST['submit_form'])) {

						$flag=0;
						if (!empty($_POST["goal_description"])) {
							$description = test_input($_POST["goal_description"]);	// check if name only contains letters and whitespace
							if (!preg_match("/^[a-zA-Z ]*$/",$description)) {
								$Err1 = "Only letters and white space allowed";
								$flag=0;
							} else {
								$flag=1;
							}
						} else {
							$Err1 = "This field can't be empty";
							$flag=0;
						}

						if (!empty($_POST["goal_completion"])) {
							$completion = test_input($_POST["goal_completion"]);	// check if name only contains letters and whitespace
							if (!preg_match("/^[0-9 ]*$/",$completion)) {
								$Err2 = "Only numbers allowed";
								$flag=0;
							} else {
								$flag=1;
							}
						} else {
							$Err2 = "This field can't be empty";
							$flag=0;
						}

						if (!empty($_POST["current_status"])) {
							$status = test_input($_POST["current_status"]);	// check if name only contains letters and whitespace
							if (!preg_match("/^[0-9 ]*$/",$status)) {
								$Err3 = "Only numbers allowed";
								$flag=0;
							} else {
								$flag=1;
							}
						} else {
							$Err3 = "This field can't be empty";
							$flag=0;
						}

						if (!empty($_POST["threshold"])) {
							$threshold = test_input($_POST["threshold"]);	// check if name only contains letters and whitespace
							if (!preg_match("/^[0-9 ]*$/",$threshold)) {
								$Err4 = "Only numbers allowed";
								$flag=0;
							} else {
								$flag=1;
							}
						} else {
							$Err4 = "This field can't be empty";
							$flag=0;
						}

						if($flag == 1){
							//Insert goal here
							echo "<h2>My Goals:</h2>";
							echo $description;
							echo "<br>";
							echo $completion;
							echo "<br>";
							echo $status;
							echo "<br>";
							echo $threshold;
							echo "<br>";
							echo $mentee_id;
							echo "<br>";


							$results = $wpdb->insert( 'goal_progress', 
								array('goal_description' => $description, 'goal_completion' => $completion, 'current_status' => $status, 'threshold' => $threshold, 'mentee_id' => $mentee_id),
								array( '%s', '%d', '%d', '%d', '%d'));
														
										if(! $results)
										{
											echo "ERROR: UPDATE returned with ".$results;
										} else
										{
											//echo "Congratulations, you have updated";
										}

							echo "<form method='post' id='OK_form'>";
							echo "<input type='hidden' name='mentee_id' value='".$mentee_id."'>";
							echo "<br><br>";
							echo "<input type='submit' name='ack_form' id='ack_form' value='OK'/>";
							echo "</form>";
						} else {
							//draw a form for error
							echo"<h2>Please Enter or update your Goals</h2>";
							echo "<form method='post' id='menteeGoals_form'>";
							echo "Goal Description: <input type='text' name='goal_description' value='".$description."'>";
							echo "<span class='error'>".$Err1."</span>";
							echo "<br><br>";
							echo "Total Value or % for Completion: <input type='text' name='goal_completion' value='".$completion."'>";
							echo "<span class='error'>".$Err2."</span>";
							echo "<br><br>";
							echo "Current % Complete: <input type='text' name='current_status' value='".$status."'>";
							echo "<span class='error'>".$Err3."</span>";
							echo "<br><br>";
							echo "Threashold Value for Alerts: <input type='text' name='threshold' value='".$threshold."'>";
							echo "<span class='error'>".$Err4."</span>";
							echo "<br><br>";
							echo "<input type='hidden' name='mentee_id' value='".$mentee_id."'>";
							echo "<br><br>";
							echo "<input type='submit' name='submit_form' id='submit_form' value='Send'/>";
							echo "</form>";
						}
					} else {
						$sql = "SELECT * FROM goal_progress Where mentee_id = '".$mentee_id."'";

						$results = $wpdb->get_results($sql);

							// the results read back should match the original Insert
							echo "<h2>My Goals</h2>";
							echo "<table>";
							echo "<tr><td>#</td><td>Description</td><td>CompleteValue</td><td>Current Status</td><td>Threshold</td></tr>";
							if(!empty($results)) { 
								foreach($results as $r) {	 
									echo "<tr>";
									echo "<td>".$r->goal_id."</td>";
									echo "<td>".$r->goal_description."</td>";
									echo "<td>".$r->goal_completion."</td>";
									echo "<td>".$r->current_status."</td>";
									echo "<td>".$r->threshold."</td>";
									echo "<td><form method='post' id='goalEdit_form'><input type='hidden' name='myID' id='myID' value= ".$r->goal_id."><input type='submit' name='submit_edit' id='submit_edit' value='Edit'></form></td>";
									echo "</tr>";
								}
								echo "<tr><td  colspan='6'><input type='submit' name='add_new' id='add_new' value='Add New'></td></tr>";
							} else {
								echo "ERROR: SELECT returned with ".$wpdb->print_error();
							}
							echo "</table>";
					}

				} else
				{

					$sql = "SELECT * FROM goal_progress Where mentee_id = '".$mentee_id."'";

					$results = $wpdb->get_results($sql);

						// the results read back should match the original Insert
						echo "<h2>My Goals</h2>";
						echo "<table>";
						echo "<tr><td>#</td><td>Description</td><td>CompleteValue</td><td>Current Status</td><td>Threshold</td><td>&nbsp;</td></tr>";
						if(!empty($results)) { 
							foreach($results as $r) {	 
								echo "<tr>";
								echo "<td>".$r->goal_id."</td>";
								echo "<td>".$r->goal_description."</td>";
								echo "<td>".$r->goal_completion."</td>";
								echo "<td>".$r->current_status."</td>";
								echo "<td>".$r->threshold."</td>";
								echo "<td><form method='post' id='goalEdit_form'><input type='hidden' name='myID' id='myID' value= ".$r->goal_id."><input type='submit' name='submit_edit' id='submit_edit' value='Edit'></form></td>";
								echo "</tr>";
							}
							echo "<tr><td colspan='6'><form method='post' id='goalEdit_form'><input type='submit' name='add_new' id='add_new' value='Add New'></form></td></tr>";
						} else {
							echo "ERROR: SELECT returned with ".$wpdb->print_error();
						}

						echo "</table>";

						
				}

					function test_input($data) {
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						return $data;
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