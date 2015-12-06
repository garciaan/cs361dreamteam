<?php
/**
 * Template Name: mentor_profile
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

					$wpdb->show_errors();

					$photo = "http://dreamplanner.campuslifeohs.com/wp-content/uploads/2015/11/person-150x150.jpg";
					//$user = "Lt Uhura";

					$user_id = get_current_user_id();
					$sql = 'select `mentor_id` from wpid_to_mid where `wp_id`= ' . $user_id;
					$mentor_id = (int)($wpdb->get_var($sql));
					if ($mentor_id == 0){
						echo "<h1>Please Become a Mentor First!</h1>";
					}
					else {
						global $wpdb;
						$sql = "SELECT * FROM mentor JOIN mentor_career ON mentor.id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where mentor.id = '".$mentor_id."'";
						//echo "SQL Command: " . $sql . "<br>";
						$results = $wpdb->get_results($sql);

						if(!empty($results)) { 
							foreach($results as $r) {	 
								$mentor_id = $r->id;
								$mentor_name = $r->full_name;
								$mentor_phone = $r->phone;
								$mentor_email = $r->email;
								$mentor_address = $r->address;
								$country = $r->location;
								$state = $r->state;
								$time_zone = $r->time_zone;
								$mentor_employer = $r->employer;
								$mentor_category = $r->career_cat;
								$mentor_years = $r->yrs_exp;
								$mentor_experience = $r->desc_exp;
								$mentor_contact = $r->contact_meth;
								$mentor_year1 = $r->session_num;
								$mentor_sessiontime = $r->session_time;
								$mentor_ref1 = $r->ref_1;
								$mentor_ref2 = $r->ref_2;
								$mentor_qualification = $r->why_mentor;
							}
						} else {
							echo "ERROR: SELECT returned with ".$wpdb->print_error();
						}

						if(isset($_POST['submit'])) 
						{ 
							$flag=1;
							if($_POST['mentor_name']=='') 
							{ 
								$flag=0;
								echo "Please Enter Your Name<br>"; 
							} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['mentor_name'])) 
							{ 
								$flag=0; echo "Please Enter Valid Name<br>"; 
							} 

							if($_POST['mentor_phone']=='') 
							{ 
								$flag=0;
								echo "Please Enter Your Phone Number<br>"; 
							} else if(!preg_match('/^[\+0-9\-\(\)\s]*$/',$_POST['mentor_phone'])) 
							{ 
								$flag=0;
								echo "Please Enter a Valid Phone Number<br>"; 
							} 

							if($_POST['mentor_email']=='') 
							{ 
								$flag=0;
								echo "Please Enter E-mail<br>"; 
							} else if(!eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $_POST['mentor_email'])) 
							{ 
								$flag=0;
								echo "Please Enter Valid E-Mail<br>"; 
							} 

							if($_POST['mentor_address']=='') 
							{ 
								$flag=0;
								echo "Please Enter Your Address<br>"; 
							} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['mentor_address'])) 
							{ 
								$flag=0;
								echo "Please Enter a Valid Address<br>"; 
							} 

							if($_POST['mentor_employer']=='') 
							{ 
								$flag=0;
								echo "Please Enter Your Employer<br>"; 
							} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['mentor_employer'])) 
							{ 
								$flag=0;
								echo "Please Enter a Valid Employer<br>"; 
							} 

							if($_POST['mentor_category']=='') 
							{ 
								$flag=0;
								echo "Please Enter a Career Category<br>"; 
							} else if(!preg_match('/[0-9]*/',$_POST['mentor_category'])) 
							{ 
								$flag=0;
								echo "Please Enter a Valid Career Category<br>"; 
							} 

							if($_POST['mentor_years']=='') 
							{ 
								$flag=0;
								echo "Please Enter Years of Experience<br>"; 
							} else if(!preg_match('/[0-9]*/',$_POST['mentor_years'])) 
							{ 
								$flag=0;
								echo "Please Enter a Valid Number of Years<br>"; 
							} 

							if($_POST['mentor_experience']=='') 
							{ 
								$flag=0;
								echo "Please Enter a Description of Your Experience"; 
							}
							
							if($_POST['mentor_year1']=='') 
							{ 
								$flag=0;
								echo "Please Enter Number of Session in the First Year<br>"; 
							} else if(!preg_match('/[0-9]*/',$_POST['mentor_year1'])) 
							{ 
								$flag=0;
								echo "Please Enter a Valid Number of Sessions<br>"; 
							} 

							if($_POST['mentor_sessiontime']=='') 
							{ 
								$flag=0; 
								echo "Please Enter the Duration of Session Time<br>"; 
							} else if(!preg_match('/[0-9]*/',$_POST['mentor_sessiontime'])) 
							{ 
								$flag=0; 
								echo "Please Enter a Valid Number of Minutes<br>"; 
							} 

							if($_POST['mentor_ref1']=='') 
							{ 
								$flag=0; 
								echo "Please Enter a Name and Contact info<br>"; 
							} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['mentor_ref1'])) 
							{ 
								$flag=0; 
								echo "Please Enter a Valid Name and Contact Info<br>"; 
							} 

							if($_POST['mentor_ref2']=='') 
							{ 
								$flag=0;
								echo "Please Enter a Name and Contact info<br>"; 
							} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['mentor_ref2'])) 
							{ 
								$flag=0;
								echo "Please Enter a Valid Name and Contact Info<br>"; 
							} 

							if($_POST['mentor_qualification']=='') 
							{ 
								$flag=0;
								echo "Please Describe What Makes You a Good Mentor"; 
							}

							if ( empty($_POST) ) 
								{ 
									print 'Error: I got no post data'; 
									exit; 
								} else 
								{ 
									if($flag==1) 
										{ 
											
											$mentor_name = $_POST['mentor_name'];
											$mentor_phone = $_POST['mentor_phone'];
											$mentor_address = $_POST['mentor_address'];
											$time_zone = $_POST['time_zone'];
											$mentor_employer = $_POST['mentor_employer'];
											$mentor_category = $_POST['mentor_category'];
											$mentor_years = $_POST['mentor_years'];
											$mentor_contact = $_POST['mentor_contact'];
											$mentor_year1 = $_POST['mentor_year1'];
											$mentor_sessiontime = $_POST['mentor_sessiontime'];
											$mentor_email = $_POST['mentor_email'];
											$country = $_POST['country'];
											$mentor_experience = $_POST['mentor_experience'];
											$mentor_ref1 = $_POST['mentor_ref1'];
											$mentor_ref2 = $_POST['mentor_ref2'];
											$mentor_qualification = $_POST['mentor_qualification'];

											$results = $wpdb->update( 'mentor', array('photo' => $photo, 'full_name' => $mentor_name, 'phone' => $mentor_phone, 'email' => $mentor_email, 'address' => $mentor_address, 'location' => $country, 'State' => $state, 'time_zone' => $time_zone, 'employer' => $mentor_employer, 'career_cat' => $mentor_category, 'yrs_exp' => $mentor_years, 'desc_exp' => $mentor_experience, 'contact_meth' => $mentor_contact, 'session_num' => $mentor_year1, 'session_time' => $mentor_sessiontime, 'ref_1' => $mentor_ref1, 'ref_2' => $mentor_ref2, 'why_mentor' => $mentor_qualification), array('id' => $mentor_id), array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%d', '%s', '%d', '%d', '%s', '%s', '%s'), array('%s'));
					
											if(! $results)
											{
												echo "ERROR: UPDATE returned with ".$results;
											} else
											{
												echo "Congratulations, you have updated";
											}
										}  
								}
						}

				?>

				<h2>My Profile</h2>
				<p>Update your profile</p>
				<?php
					$categories = $wpdb->get_results("select career_type.Career_id,career_type.Career_Name from career_type");
				?>
				<form method="post" id="mentorapp_form">
					<table>
						<tr>
							<td>
								<?php echo "Name:&nbsp<input type=text name=mentor_name id=mentor_name rows=1 value= '".$mentor_name. "' />" ?>
								<?php echo "Phone Number:&nbsp<input type=text name=mentor_phone id=mentor_phone rows=1 value= '".$mentor_phone."' />" ?>
								<?php echo "Email Address:&nbsp<input type=text name=mentor_email id=mentor_email rows=1 value= '".$mentor_email."' />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "Home Address:&nbsp<input type=text name=mentor_address id=mentor_address rows=1 value= '".$mentor_address."' />" ?>
								Select Country (with states):<select id="country" name ="country"></select>
								Select State: <select name ="state" id ="state"></select>
 								<script language="javascript">populateCountries("country", "state");</script>
								<?php echo "Time Zone:&nbsp<input type=text name=time_zone id=time_zone rows=1 value= '".$time_zone."' />" ?>
								<?php echo "Employer:&nbsp<input type=text name=mentor_employer id=mentor_employer rows=1 value= '".$mentor_employer."' />" ?>

							</td>
						</tr>
						<tr>
							<td>
								Career Category:&nbsp
								<select name="mentor_category" id="mentor_category">
								<?php
									global $wpdb;
									$results = $wpdb->get_results("SELECT * from career_type");
									if(!empty($results)) { 
				     					foreach($results as $r) {
				     						if($mentor_category == $r->Career_id)
				          					{
				          						echo "<option value='".$r->Career_id."'selected>".$r->Career_Name."</option>";
				          					} else 
				          					{
				          						echo "<option value='".$r->Career_id."'>".$r->Career_Name."</option>";
				          					}
				     					}
									}
								?>
								</select>
								<?php echo "Years of Experience in Category:&nbsp<input type=text name=mentor_years id=mentor_years rows=1 value=".$mentor_years." />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "Description of experience and what you want to learn:&nbsp<textarea name=mentor_experience id=mentor_experience>".$mentor_experience."</textarea>" ?>
							</td>
						</tr>
						<tr>
							<td>
								Preferred method of contact for mentor sessions:
								<select name="mentor_contact" id="mentor_contact">
								  
										<?php
								 
								 	$results = $wpdb->get_results("SELECT * from contact_method");
								 	if(!empty($results)) { 
				     					foreach($results as $r) {	 
				          					if($mentor_contact == $r->method_num)
				          					{
				          						echo "<option value='".$r->method_num."'selected>".$r->method_name."</option>";
				          					} else 
				          					{
				          						echo "<option value='".$r->method_num."'>".$r->method_name."</option>";
				          					}
				     					}
									}
								?>

								</select>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "Number of mentor sessions you are available for in the first year?:&nbsp<input type=text name=mentor_year1 id=mentor_year1 rows=1 value=".$mentor_year1." />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "Mentor session time allotted (example; 30 minutes on the phone)?&nbsp<input type=text name=mentor_sessiontime id=mentor_sessiontime rows=1 value=".$mentor_sessiontime." />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "Reference 1: Name and contact info (email - Phone)&nbsp<input type=text name=mentor_ref1 id=mentor_ref1 rows=1 value= '".$mentor_ref1."' />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "Reference 2: Name and contact info (email - Phone)&nbsp<input type=text name=mentor_ref2 id=mentor_ref2 rows=1 value= '".$mentor_ref2."' />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "What makes you a good mentor?&nbsp<textarea name=mentor_qualification id=mentor_qualification>".$mentor_qualification."</textarea>" ?>
							</td>
						</tr>
					</table>
					<br /><br />
					<input type="submit" name="submit" id="submit" value="Send"/>
				</form>
				<?php } //ends the if mentor_id == 0 ?>
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