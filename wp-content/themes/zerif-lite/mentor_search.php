<<<<<<< .merge_file_Z2oP3H
<?php/** * Template Name: mentor_search */get_header(); ?><div class="clear"></div></header> <!-- / END HOME SECTION  --><div id="content" class="site-content">	<div class="container">	<?php		if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) ) {			echo '<div class="content-left-wrap col-md-12">';		}		else {			echo '<div class="content-left-wrap col-md-9">';		}		?>		<div id="primary" class="content-area">			<main id="main" class="site-main" role="main">								<?php				    $wpdb->show_errors();					if(isset($_POST['submit']))					{						$flag=1;						if($_POST['career_name']=='')						{							$flag=0; 							echo "Please Select a Career<br>"; 						} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['career_name'])) 						{							$flag=0;							echo "Please Select a Career<br>";						} else						{						// define variables and set to empty values							$career = $_POST['career_name'];							$location = $_POST['location_name'];							$time_zone = $_POST['tz_name'];							echo $career."<br/>";							echo $location."<br/>";							echo $time_zone."<br/>";							//global $wpdb;							$results = $wpdb->get_results("SELECT * FROM mentor JOIN mentor_career ON mentor.id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where mentor.location = '".$location."' AND mentor.time_zone = '".$time_zone."' AND Career_Name = '".$career."'");							echo $results;														echo "<table border=0>";							if(!empty($results)) { 		     					foreach($results as $r) {	 				          			echo "<tr><td>";		          					echo "<table border=0>";		          					echo "<tr>";		          					echo "<td rowspan=2 width=200><img class= wp-image-34 size-thumbnail src=" .$r->photo. " width= 150 /></td>";		          					echo "<td><h1>".$r->full_name."</h1><h2>".$r->employer."</h2></td>";		          					echo "</tr>";		          					echo "<tr><td><h4>Expertise</h4>:" .$r->Career_Name. "</td></tr>";		          					echo "<tr><td></td><td>Years Experience: ".$r->yrs_exp."</td></tr>";		          					echo "<tr><td></td><td>".$r->desc_exp."</td></tr>";		          					echo "<tr><td></td><td>Address: ".$r->address." ".$r->state.", ".$r->location."</td></tr>";		          					echo "<tr><td></td><td>Contact Me: ".$r->email."</td></tr>";		          					echo "<tr><td></td><td>Phone: ".$r->phone."</td></tr>";		          					echo "<tr><td></td><td>".$r->session_num." Sessions of ".$r->session_time." mins per year</td></tr>";		          					echo "<tr><td></td><td>References: ".$r->ref_1."<br/>References: ".$r->ref_2."</td></tr>";		          					echo "<tr><td></td><td>Why I am a Mentor: ".$r->why_mentor."</td></tr>";		          					echo "</table>";		          					echo "</td></tr>";		     					}							} else 							{		     					echo "ERROR: SELECT returned with ".$wpdb->print_error();	 	 							}							echo "</table>";						}					}				?>				<form method="post" id="contactus_form">					<select name="career_name" id="career_name">					  <option value="Military">Military</option>					  <option value="Scientist">Scientist</option>					  <option value="Communications">Communications</option>					  <option value="Medical">Medical</option>					  <option value="Engine Repair">Engine Repair</option>					  <option value="Nuclear Physics">Nuclear Physics</option>					  <option value="Linguistics">Linguistics</option>					</select>					<select name="location_name" id="location_name">					  <option value="Iowa">Iowa</option>					  <option value="Vulcan">Vulcan</option>					  <option value="Georgia">Georgia</option>					  <option value="Africa">Africa</option>					  <option value="Scotland">Scotland</option>					  <option value="Russia">Russia</option>					</select>					<select name="tz_name" id="tz_name">					  <option value="CST">CST</option>					  <option value="VTZ">VTZ</option>					  <option value="EST">EST</option>					  <option value="UTC-1:00">UTC-1:00</option>					  <option value="UTC">UTC</option>					  <option value="GMT+6">GMT+6</option>					</select>					<!--Mentor:<input type="text" name="mentor_id" id="mentor_id" rows="1" value="" /> -->					<br /><br />					<input type="submit" name="submit" id="submit" value="Send"/>				</form>			</main><!-- #main -->		</div><!-- #primary -->	<?php		if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) ) {			echo '</div>';		}		else {			echo '</div>';			echo '<div class="sidebar-wrap col-md-3 content-left-wrap">';				//get_sidebar();						echo'<div id="secondary" class="widget-area" role="complementary">';			echo'<aside id="nav_menu-3" class="widget widget_nav_menu"><h2 class="widget-title">Actions</h2>';			echo'<div class="menu-actions-container">';			echo'<ul id="menu-actions" class="menu">';				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-77"><a href="mentee-profile/">Edit Profile</a></li>';				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-74"><a href="mentor-search/">Search for Mentors</a></li>';				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-75"><a href="list-Mentors/">My Mentors</a></li>';				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a href="contact">Communicate with a mentor</a></li>';				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-78"><a href="My-Finances">My Finances</a></li>';			echo'</ul>';			echo'</div>';			echo'</aside>';			echo'<aside id="meta-2" class="widget widget_meta"><h2 class="widget-title">Meta</h2>';			echo'<ul>';			echo'<li><a href="wp-admin/">Site Admin</a></li>';			echo'<li><a href="wp-login.php?action=logout&#038;_wpnonce=f8c3f072d6">Log out</a></li>';			echo'</ul>';			echo'</aside>';			echo'</div>';			echo '</div>';		}		?>		</div><!-- .container --><?php get_footer(); ?>
=======
<?php
/**
* Template Name: mentor_search
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
					//$wpdb->show_errors();

					if(isset($_POST['submit']))
					{
						$flag=1;
						if($_POST['career_name']=='' && $_POST['location_name']=='' && $_POST['tz_name']=='')
						{
							$flag=0;
							echo "Please Select at least one filter item<br>";
						} else
						{
							// need to make these and or, then check which set
							if($_POST['career_name']=='' || $_POST['location_name']=='' || $_POST['tz_name']=='')
							{
								$career = $_POST['career_name'];
								$time_zone = $_POST['tz_name'];
								$location = $_POST['location_name'];

								//do career
								if($_POST['career_name']!='' && $_POST['location_name']=='' && $_POST['tz_name']=='')
								{
									$results = $wpdb->get_results("SELECT * FROM mentor JOIN mentor_career ON mentor.id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where Career_Name = '".$career."'");
								}

								// do career and location
								if($_POST['career_name']!='' && $_POST['location_name']!='' && $_POST['tz_name']=='')
								{
									$results = $wpdb->get_results("SELECT * FROM mentor JOIN mentor_career ON mentor.id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where mentor.location = '".$location."' AND Career_Name = '".$career."'");
								}

								// do career and timezone
								if($_POST['career_name']!='' && $_POST['location_name']=='' && $_POST['tz_name']!='')
								{
									$results = $wpdb->get_results("SELECT * FROM mentor JOIN mentor_career ON mentor.id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where mentor.time_zone = '".$time_zone."' AND Career_Name = '".$career."'");
								}

								// do location name
								if($_POST['career_name']=='' && $_POST['location_name']!='' && $_POST['tz_name']=='')
								{
									$results = $wpdb->get_results("SELECT * FROM mentor JOIN mentor_career ON mentor.id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where mentor.location = '".$location."'");
								}
								// do location and timezone
								if($_POST['career_name']=='' && $_POST['location_name']!='' && $_POST['tz_name']!='')
								{
									$results = $wpdb->get_results("SELECT * FROM mentor JOIN mentor_career ON mentor.id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where mentor.location = '".$location."' AND mentor.time_zone = '".$time_zone."'");
								}

								// do timezone
								if($_POST['career_name']=='' && $_POST['location_name']=='' && $_POST['tz_name']!='')
								{
									$results = $wpdb->get_results("SELECT * FROM mentor JOIN mentor_career ON mentor.id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where mentor.time_zone = '".$time_zone."'");
								}

								// do all three
								if($_POST['career_name']!='' && $_POST['location_name']!='' && $_POST['tz_name']!='')
								{
									$results = $wpdb->get_results("SELECT * FROM mentor JOIN mentor_career ON mentor.id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where mentor.location = '".$location."' AND mentor.time_zone = '".$time_zone."' AND Career_Name = '".$career."'");
								}
							}
							
							
							

							echo $career." - ";
							echo $location." - ";
							echo $time_zone;

							

							echo "<table border=0>";
								if(!empty($results)) {
									foreach($results as $r) {
										echo "<tr><td>";
										echo "<table border=0>";
										echo "<tr>";
										echo "<td rowspan=2 width=200><img class= wp-image-34 size-thumbnail src=" .$r->photo. " width= 150 /></td>";
										echo "<td><h1>".$r->full_name."</h1><h2>".$r->employer."</h2></td>";
										echo "</tr>";
										echo "<tr><td><h4>Expertise</h4>:" .$r->Career_Name. "</td></tr>";
										echo "<tr><td></td><td>Years Experience: ".$r->yrs_exp."</td></tr>";
										echo "<tr><td></td><td>".$r->desc_exp."</td></tr>";
										echo "<tr><td></td><td>Address: ".$r->address." ".$r->state.", ".$r->location."</td></tr>";
										echo "<tr><td></td><td>Contact Me: ".$r->email."</td></tr>";
										echo "<tr><td></td><td>Phone: ".$r->phone."</td></tr>";
										echo "<tr><td></td><td>".$r->session_num." Sessions of ".$r->session_time." mins per year</td></tr>";
										echo "<tr><td></td><td>References: ".$r->ref_1."<br/>References: ".$r->ref_2."</td></tr>";
										echo "<tr><td></td><td>Why I am a Mentor: ".$r->why_mentor."</td></tr>";
										echo "</table>";
										echo "</td></tr>";
									}
								} else
								{
									echo "ERROR: SELECT returned with no results";
								}
								echo "</table>";
						}
					}
				?>

			<h1>Please select your search criteria from the following:</h1>
			<form method="post" id="contactus_form">
				<select name="career_name" id="career_name">
					<option value="">None</option>
					<option value="Military">Military</option>
					<option value="Scientist">Scientist</option>
					<option value="Communications">Communications</option>
					<option value="Medical">Medical</option>
					<option value="Engine Repair">Engine Repair</option>
					<option value="Nuclear Physics">Nuclear Physics</option>
					<option value="Linguistics">Linguistics</option>
				</select>
				<select name="location_name" id="location_name">
					<option value="">None</option>
					<option value="USA">USA</option>
					<option value="Africa">Africa</option>
					<option value="Scotland">Scotland</option>
					<option value="Russia">Russia</option>
				</select>
				<select name="tz_name" id="tz_name">
					<option value="">None</option>
					<option value="CST">CST</option>
					<option value="VTZ">VTZ</option>
					<option value="EST">EST</option>
					<option value="UTC-1:00">UTC-1:00</option>
					<option value="UTC">UTC</option>
					<option value="GMT+6">GMT+6</option>
				</select>
				<br /><br />
				<input type="submit" name="submit" id="submit" value="Send"/>
			</form>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) )
		{
			echo '</div>';
		}else 
		{
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
>>>>>>> .merge_file_gibeCF
