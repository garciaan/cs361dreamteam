<?php
/**
 * Template Name: mentor_contact
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
					// this test to see if the user is logged in when makes a 
					// query to the DB to see if there is an id for the user 
					// and if so to set it equal to mentee_id

					$user_id = get_current_user_id();
					$sql = 'select `mentee_id` from wpid_to_mid where `wp_id`= ' . $user_id;
					$mentee_id = (int)($wpdb->get_var($sql));

					// If we got a valid id then go ahead, if not then ask the user to sign in.
					if ($mentee_id == 0){
						echo "<h1>Please Become a Mentee First!</h1>";
					}
					else{
						//THis is test code to see what the id is.
						//echo "My mentee ID: " . $mentee_id . "<br>";
						
						//check to see if we got a contact name passed into the form.
						// if we did look up the name and email to populate the form.
						if(isset($_POST['contact_mentor'])) {
							$mentor_id = $_POST['contact_mentor'];
							$sql = 'SELECT `full_name`,`email` FROM mentor WHERE mentor.id = "' . $mentor_id . '"';
							
							//Test code to verify the results
							//echo $sql;
							
							//set local variables to the name and email address
							$results = $wpdb->get_row($sql);
							$full_name = $results->full_name;
							$email = $results->email;

						}
						else {
							$full_name = '';
							$email = '';
						}

						//echo "Full name: " . $full_name;
						//echo "Email: " . $email;
					


				?>
				
				<!-- contact form -->
				<form method="post" id="contactus_form">
					Mentor Name:<input type="text" name="yourname" id="yourname" rows="1" value="<?php echo $full_name; ?>" />
					<br /><br />
					Mentor Email:<input type="text" name="email" id="email" rows="1" value="<?php echo $email; ?>" />
					<br /><br />
					Subject:<input type="text" name="subject" id="subject" rows="1" value=""></p>
					<br /><br />
					Message:<textarea name="message" id="message" ></textarea>
					<br /><br />
					<input type="submit" name="submit" id="submit" value="Send"/>
				</form>


				<?php

					// Check to see that the user sumitted something, then set a "dirty" flag
					// check each input type to make sure is is in the correct format.  If it is wrong
					//print a message.
					if(isset($_POST['submit']))
					{
						$flag=1;
						if($_POST['yourname']=='')
							{
								$flag=0;
								echo "Please Enter Your Name<br>"; 
							} else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['yourname'])) 
							{
								$flag=0;
								echo "Please Enter Valid Name<br>";
							}

						if($_POST['email']=='') 
							{ 
								$flag=0;echo "Please Enter E-mail<br>"; 
							} else if(!eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $_POST['email'])) 
							{ 
								$flag=0;
								echo "Please Enter Valid E-Mail<br>"; 
							}

						if($_POST['subject']=='') 
							{ 
								$flag=0;
								echo "Please Enter Subject<br>"; 
							} 

						if($_POST['message']=='') 
							{ 
								$flag=0;
								echo "Please Enter Message"; 
							}

						if ( empty($_POST) ) 
							{ 
								print 'Sorry, your message did not verify.'; 
								exit; 
							} else 
							{ 
								// everything is successful, format and send the email
								if($flag==1) 
									{ 
										wp_mail(get_option("admin_email"),trim($_POST[yourname])." sent you a message from ".get_option("blogname"),stripslashes(trim($_POST[message])),"From: ".trim($_POST[yourname])." <".trim($_POST[email]).">rnReply-To:".trim($_POST[email]));
										echo "Mail Successfully Sent"; 
									}  
							}
					}
				?>
				<?php } //ends the if mentee_id == 0 
				?>

			</main><!-- #main -->

		</div><!-- #primary -->

	<?php
		// this builds all the sidebar content, it is an overide of sidebar.php as supplied in the theme.  The content is specific
		// as to whether you are loggind in and what type of user you are.

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
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-78"><a href="My-Goals">My Goals</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-78"><a href="My-Chart">My Progress</a></li>';
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