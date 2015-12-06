<?php
/**
 * Template Name: mentor_app
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
				<?php if (is_user_logged_in()){
				?>
				<h2>MENTOR QUESTIONNAIRE</h2>
				<p>This questionnaire is designed so that mentees can verify the authenticity and qualifications of mentors.</p>
				<?php
					$categories = $wpdb->get_results("select career_type.Career_id,career_type.Career_Name from career_type");
				?>
				<form method="post" id="mentorapp_form">
					<table>
						<tr>
							<td>
								Name:&nbsp<input type="text" name="mentor_name" id="mentor_name" rows="1" value="" />
								Phone Number:&nbsp<input type="text" name="mentor_phone" id="mentor_phone" rows="1" value="" />
								Email Address:&nbsp<input type="text" name="mentor_email" id="mentor_email" rows="1" value="" />
							</td>
						</tr>
						<tr>
							<td>
								Home Address:&nbsp<input type="text" name="mentor_address" id="mentor_address" rows="1" value="" />
								Select Country (with states):<select id="country" name ="country"></select>
								Select State: <select name ="state" id ="state"></select>
 								<script language="javascript">populateCountries("country", "state");</script>
 								Time Zone:&nbsp<input type="text" name="time_zone" id="time_zone" rows="1" value="" />
								Employer:&nbsp<input type="text" name="mentor_employer" id="mentor_employer" rows="1" value="" />
							</td>
						</tr>
						<tr>
							<td>
								Career Category:&nbsp
								<select name="mentor_category" id="mentor_category">
									<?php
										foreach ($categories as $category){
											//echo "Category ID: " . $category->career_cat_id . " -- Category: " . $category->category . "<br>";
											echo '<option value="' . $category->Career_id . '" >' . $category->Career_Name . '</option>'; ;
										}

									?>
								</select>
								Years of Experience:&nbsp<input type="text" name="mentor_years" id="mentor_years" rows="1" value="" />
							</td>
						</tr>
						<tr>
							<td>
								Description of Experience:&nbsp<textarea name="mentor_experience" id="mentor_experience"></textarea>
							</td>
						</tr>
						<tr>
							<td>
								Preferred method of contact for mentor sessions:
									<?php
									//global $wpdb;
									$results = $wpdb->get_results("SELECT * from contact_method");
									echo "<select name='mentor_contact' id='mentor_contact'>";

									if(!empty($results)) { 
				     					foreach($results as $r) {	 
				          					echo "<option value='".$r->method_num."'>".$r->method_name."</option>";
				     					}
									} else {
				     					echo "ERROR: SELECT returned no entries";	 	 
									} 
									echo "</select>";
								?>
							</td>
						</tr>
						<tr>
							<td>
								Number of mentor sessions you are available for in the first year?:&nbsp<input type="text" name="mentor_year1" id="mentor_year1" rows="1" value="" />
							</td>
						</tr>
						<tr>
							<td>
								Mentor session time allotted (example; 30 minutes on the phone)?&nbsp<input type="text" name="mentor_sessiontime" id="mentor_sessiontime" rows="1" value="" />
							</td>
						</tr>
						<tr>
							<td>
								Reference 1: Name and contact info (email - Phone)&nbsp<input type="text" name="mentor_ref1" id="mentor_ref1" rows="1" value="" />
							</td>
						</tr>
						<tr>
							<td>
								Reference 2: Name and contact info (email - Phone)&nbsp<input type="text" name="mentor_ref2" id="mentor_ref2" rows="1" value="" />
							</td>
						</tr>
						<tr>
							<td>
								What makes you a good mentor?&nbsp<textarea name="mentor_qualification" id="mentor_qualification"></textarea>
							</td>
						</tr>
					</table>
					<br /><br />
					<input type="submit" name="submit" id="submit" value="Send"/>
				</form>


				<?php

					//$wpdb->show_errors();

					$photo = "http://dreamplanner.campuslifeohs.com/wp-content/uploads/2015/11/person-150x150.jpg";
					$mentor_name = $_POST['mentor_name'];
					$mentor_phone = $_POST['mentor_phone'];
					$mentor_address = $_POST['mentor_address'];
					$mentor_employer = $_POST['mentor_employer'];
					$mentor_category = $_POST['mentor_category'];
					$mentor_years = $_POST['mentor_years'];
					$mentor_contact = $_POST['mentor_contact'];
					$mentor_year1 = $_POST['mentor_year1'];
					$mentor_sessiontime = $_POST['mentor_sessiontime'];
					$mentor_email = $_POST['mentor_email'];
					$country = $_POST['country'];
					$time_zone = $_POST['time_zone'];
					$mentor_experience = $_POST['mentor_experience'];
					$mentor_ref1 = $_POST['mentor_ref1'];
					$mentor_ref2 = $_POST['mentor_ref2'];
					$mentor_qualification = $_POST['mentor_qualification'];

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
								print 'I got nothing from you'; 
								exit; 
							} else 
							{ 
								if($flag==1) 
									{ 
										

										echo "Photo: ".$photo."<br/>";
										echo "Name: ".$mentor_name."<br/>";
										echo "Phone: ".$mentor_phone."<br/>";
										echo "Address: ".$mentor_address."<br/>";
										echo "Employer: ".$mentor_employer."<br/>";
										echo "Career Category: ".$mentor_category."<br/>";
										echo "Years Experience: ".$mentor_years."<br/>";
										echo "Method of Contact: ".$mentor_contact."<br/>";
										echo "How many sessions for the first year: ".$mentor_year1."<br/>";
										echo "Length of the sessions: ".$mentor_sessiontime."<br/>";
										echo "email: ".$mentor_email."<br/>";
										echo "country: ".$country."<br/>";
										echo "time zone: ".$time_zone."<br/>";
										echo "experience: ".$mentor_experience."<br/>";
										echo "Reference 1: ".$mentor_ref1."<br/>";
										echo "Reference 2: ".$mentor_ref2."<br/>";
										echo "Qualifications: ".$mentor_qualification."<br/>";






										$insert_result = $wpdb->insert( 'mentor', array('photo' => $photo, 'full_name' => $mentor_name, 'phone' => $mentor_phone, 'address' => $mentor_address, 'state' => $state, 'employer' => $mentor_employer, 'career_cat' => $mentor_category, 'yrs_exp' => $mentor_years, 'contact_meth' => $mentor_contact, 'session_num' => $mentor_year1, 'session_time' => $mentor_sessiontime, 'email' => $mentor_email, 'location' => $country, 'time_zone' => $time_zone, 'desc_exp' => $mentor_experience, 'ref_1' => $mentor_ref1, 'ref_2' => $mentor_ref2, 'why_mentor' => $mentor_qualification), array( '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%d', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s'));
										$mentor_id = $wpdb->insert_id;			
										if($insert_result == False)
										{
											echo "ERROR: INSERT returned with ".$wpdb->print_error();
										} else
										{
											$insert_result = $wpdb->insert( 'mentor_career', array('mentor_ID' => $wpdb->insert_id, 'career_ID' => $mentor_category), array( '%d', '%d'));
											if($insert_result == False)
											{
												echo "ERROR: INSERT returned with ".$wpdb->print_error();
											} else
											{
												//This connects the wp_id to the mentee id. Inserts if not there, updates if there
												$user_id = get_current_user_id();
												$sql = "INSERT INTO `wpid_to_mid` (`wp_id`, `mentor_id`) VALUES(" . $user_id . "," . $mentor_id . ") ON DUPLICATE KEY UPDATE `mentor_id` = " . $mentor_id;
												//echo "<p>" . $sql . "</p>";
												$result = $wpdb->query($sql);
												if ($result === False){
													echo "ERROR: Could not attach user id to mentor id";
													$wpdb->print_error();

												}
												else {
													echo "Congratulations, you have been added as a Mentor!";
												}
											}
										}
									}  
							}
					}

				?>
				<?php 
				}  //ends the if user is logged in
				else { 
					echo "<h1>Please register or log in first!</h1>";
					echo '<a href="http://dreamplanner.campuslifeohs.com/wp-login.php?action=register" class="btn btn-primary custom-button red-btn">Register Now</a>';
					echo '<a href="http://dreamplanner.campuslifeohs.com/wp-login.php" class="btn btn-primary custom-button green-btn">Log In</a>';
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