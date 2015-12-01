<?php
/**
 * Template Name: mentee_profile
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
					$user = "Eric Anderson";

					$user_id = get_current_user_id();
					$sql = 'select `mentee_id` from wpid_to_mid where `wp_id`= ' . $user_id;
					$mentee_id = (int)($wpdb->get_var($sql));

					global $wpdb;
					$sql = 'SELECT * FROM mentee JOIN mentor_career ON mentee.mentee_id = mentor_career.mentee_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where mentee.mentee_id = "' . $mentee_id . '"';
					$results = $wpdb->get_results($sql);

					if(!empty($results)) { 
						foreach($results as $r) {	 
							$mentee_id = $r->mentee_id;
							$mentee_name = $r->full_name;
							$mentee_phone = $r->phone;
							$mentee_email = $r->email;
							$mentee_address = $r->address;
							$country = $r->location;
							$state = $r->state;
							$mentee_employer = $r->employer;
							$mentee_category = $r->career_cat;
							$mentee_years = $r->yrs_exp;
							$mentee_experience = $r->desc_exp;
							$mentee_contact = $r->contact_meth;
							$mentee_year1 = $r->session_num;
							$mentee_sessiontime = $r->session_time;
							$mentee_ref1 = $r->ref_1;
							$mentee_ref2 = $r->ref_2;
							$mentee_qualification = $r->why_mentee;
						}
					} else {
						echo "ERROR: SELECT returned with ".$wpdb->print_error();
					}

					if(isset($_POST['submit'])) 
					{ 
						$flag=1;
						if($_POST['mentee_name']=='') 
						{ 
							$flag=0;
							echo "Please Enter Your Name<br>"; 
						} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['mentee_name'])) 
						{ 
							$flag=0; echo "Please Enter Valid Name<br>"; 
						} 

						if($_POST['mentee_phone']=='') 
						{ 
							$flag=0;
							echo "Please Enter Your Phone Number<br>"; 
						} else if(!preg_match('/^[\+0-9\-\(\)\s]*$/',$_POST['mentee_phone'])) 
						{ 
							$flag=0;
							echo "Please Enter a Valid Phone Number<br>"; 
						} 

						if($_POST['mentee_email']=='') 
						{ 
							$flag=0;
							echo "Please Enter E-mail<br>"; 
						} else if(!eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $_POST['mentee_email'])) 
						{ 
							$flag=0;
							echo "Please Enter Valid E-Mail<br>"; 
						} 

						if($_POST['mentee_address']=='') 
						{ 
							$flag=0;
							echo "Please Enter Your Address<br>"; 
						} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['mentee_address'])) 
						{ 
							$flag=0;
							echo "Please Enter a Valid Address<br>"; 
						} 

						if($_POST['mentee_employer']=='') 
						{ 
							$flag=0;
							echo "Please Enter Your Employer<br>"; 
						} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['mentee_employer'])) 
						{ 
							$flag=0;
							echo "Please Enter a Valid Employer<br>"; 
						} 

						if($_POST['mentee_category']=='') 
						{ 
							$flag=0;
							echo "Please Enter a Career Category<br>"; 
						} else if(!preg_match('/[0-9]*/',$_POST['mentee_category'])) 
						{ 
							$flag=0;
							echo "Please Enter a Valid Career Category<br>"; 
						} 

						if($_POST['mentee_years']=='') 
						{ 
							$flag=0;
							echo "Please Enter Years of Experience<br>"; 
						} else if(!preg_match('/[0-9]*/',$_POST['mentee_years'])) 
						{ 
							$flag=0;
							echo "Please Enter a Valid Number of Years<br>"; 
						} 

						if($_POST['mentee_experience']=='') 
						{ 
							$flag=0;
							echo "Please Enter a Description of Your Experience"; 
						}
						
						if($_POST['mentee_year1']=='') 
						{ 
							$flag=0;
							echo "Please Enter Number of Session in the First Year<br>"; 
						} else if(!preg_match('/[0-9]*/',$_POST['mentee_year1'])) 
						{ 
							$flag=0;
							echo "Please Enter a Valid Number of Sessions<br>"; 
						} 

						if($_POST['mentee_sessiontime']=='') 
						{ 
							$flag=0; 
							echo "Please Enter the Duration of Session Time<br>"; 
						} else if(!preg_match('/[0-9]*/',$_POST['mentee_sessiontime'])) 
						{ 
							$flag=0; 
							echo "Please Enter a Valid Number of Minutes<br>"; 
						} 

						if($_POST['mentee_ref1']=='') 
						{ 
							$flag=0; 
							echo "Please Enter a Name and Contact info<br>"; 
						} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['mentee_ref1'])) 
						{ 
							$flag=0; 
							echo "Please Enter a Valid Name and Contact Info<br>"; 
						} 

						if($_POST['mentee_ref2']=='') 
						{ 
							$flag=0;
							echo "Please Enter a Name and Contact info<br>"; 
						} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['mentee_ref2'])) 
						{ 
							$flag=0;
							echo "Please Enter a Valid Name and Contact Info<br>"; 
						} 

						if($_POST['mentee_qualification']=='') 
						{ 
							$flag=0;
							echo "Please Describe What Makes You a Good mentee"; 
						}

						if ( empty($_POST) ) 
							{ 

								echo "Error: I got no post data";

							} else 
							{ 
								if($flag==1) 
									{ 
										$mentee_name = $_POST['mentee_name'];
										$mentee_phone = $_POST['mentee_phone'];
										$mentee_email = $_POST['mentee_email'];
										$mentee_address = $_POST['mentee_address'];
										$country = $_POST['country'];
										$state = $_POST['state'];
										$mentee_employer = $_POST['mentee_employer'];
										$mentee_category = $_POST['mentee_category'];
										$mentee_years = $_POST['mentee_years'];
										$mentee_experience = $_POST['mentee_experience'];
										$mentee_contact = $_POST['mentee_contact'];
										$mentee_year1 = $_POST['mentee_year1'];
										$mentee_sessiontime = $_POST['mentee_sessiontime'];
										$mentee_ref1 = $_POST['mentee_ref1'];
										$mentee_ref2 = $_POST['mentee_ref2'];
										$mentee_qualification = $_POST['mentee_qualification'];

										echo "Photo: ".$photo."<br/>";
										echo "Name: ".$mentee_name."<br/>";
										echo "Phone: ".$mentee_phone."<br/>";
										echo "email: ".$mentee_email."<br/>";
										echo "Address: ".$mentee_address."<br/>";
										echo "country: ".$country."<br/>";
										echo "state: ".$state."<br/>";
										echo "Employer: ".$mentee_employer."<br/>";
										echo "Career Category: ".$mentee_category."<br/>";
										echo "Years Experience: ".$mentee_years."<br/>";
										echo "Experience: ".$mentee_experience."<br/>";
										echo "Method of Contact: ".$mentee_contact."<br/>";
										echo "How many sessions for the first year: ".$mentee_year1."<br/>";
										echo "Length of the sessions: ".$mentee_sessiontime."<br/>";
										echo "Reference 1: ".$mentee_ref1."<br/>";
										echo "Reference 2: ".$mentee_ref2."<br/>";
										echo "Qualifications: ".$mentee_qualification."<br/>";


										$results = $wpdb->update( 'mentee', array('photo' => $photo, 'full_name' => $mentee_name, 'phone' => $mentee_phone, 'email' => $mentee_email, 'address' => $mentee_address, 'Country' => $country, 'State' => $state, 'employer' => $mentee_employer, 'career_cat' => $mentee_category, 'yrs_exp' => $mentee_years, 'desc_exp' => $mentee_experience, 'contact_meth' => $mentee_contact, 'session_num' => $mentee_year1, 'session_time' => $mentee_sessiontime, 'ref_1' => $mentee_ref1, 'ref_2' => $mentee_ref2, 'why_mentee' => $mentee_qualification), array('mentee_id' => $mentee_id), array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%d', '%d', '%d', '%s', '%s', '%s'), array('%s'));
														
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

				<h2>MENTEE PROFILE</h2>
				<p>Update your profile</p>
				<?php
					$categories = $wpdb->get_results("select career_type.Career_id,career_type.Career_Name from career_type");
				?>
				<form method="post" id="menteeapp_form">
					<table>
						<tr>
							<td>
								<?php echo "Name:&nbsp<input type=text name=mentee_name id=mentee_name rows=2 value= '".$mentee_name. "' />" ?>
								<?php echo "Phone Number:&nbsp<input type=text name=mentee_phone id=mentee_phone rows=1 value= '".$mentee_phone."' />" ?>
								<?php echo "Email Address:&nbsp<input type=text name=mentee_email id=mentee_email rows=1 value= '".$mentee_email."' />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "Home Address:&nbsp<input type=text name=mentee_address id=mentee_address rows=1 value= '".$mentee_address."' />" ?>
								Select Country (with states):<select id="country" name ="country"></select>
								Select State: <select name ="state" id ="state"></select>
 								<script language="javascript">populateCountries("country", "state");</script>
								<?php echo "Employer:&nbsp<input type=text name=mentee_employer id=mentee_employer rows=1 value= '".$mentee_employer."' />" ?>
							</td>
						</tr>
						<tr>
							<td>
								Career Category Sought:&nbsp
								<select name="mentee_category" id="mentee_category">
													<?php
									global $wpdb;
									$results = $wpdb->get_results("SELECT * from career_type");
									if(!empty($results)) { 
				     					foreach($results as $r) {
				     						if($mentee_category == $r->Career_id)
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
								<?php echo "Years of Experience in Category:&nbsp<input type=text name=mentee_years id=mentee_years rows=1 value=".$mentee_years." />" ?>
							</td>
						</tr>
						<tr>
							<td>
								 <?php echo "Description of experience and what you want to learn:&nbsp<textarea name=mentee_experience id=mentee_experience>".$mentee_experience."</textarea>" ?>
							</td>
						</tr>
						<tr>
							<td>
								Preferred method of contact for mentee sessions:
								<select name="mentee_contact" id="mentee_contact">
								  
								<?php
								 
								 	$results = $wpdb->get_results("SELECT * from contact_method");
								 	if(!empty($results)) { 
				     					foreach($results as $r) {	 
				          					if($mentee_contact == $r->method_num)
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
								<?php echo "Number of mentee sessions requested in the first year?:&nbsp<input type=text name=mentee_year1 id=mentee_year1 rows=1 value=".$mentee_year1." />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "mentee session time requested (example; 30 minutes on the phone)?&nbsp<input type=text name=mentee_sessiontime id=mentee_sessiontime rows=1 value=".$mentee_sessiontime." />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "Reference 1: Name and contact info (email - Phone)&nbsp<input type=text name=mentee_ref1 id=mentee_ref1 rows=1 value= '".$mentee_ref1."' />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "Reference 2: Name and contact info (email - Phone)&nbsp<input type=text name=mentee_ref2 id=mentee_ref2 rows=1 value= '".$mentee_ref2."' />" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "What makes you a good mentee? Why do you want a mentee?&nbsp<textarea name=mentee_qualification id=mentee_qualification>".$mentee_qualification."</textarea>" ?>
							</td>
						</tr>
					</table>
					<br /><br />
					<input type="submit" name="submit" id="submit" value="Send"/>
				</form>



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