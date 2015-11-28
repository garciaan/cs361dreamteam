<?php
/**
 * Template Name: mentee_contact
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

				<form method="post" id="contactus_form">
					Mentee Name:<input type="text" name="yourname" id="yourname" rows="1" value="" />
					<br /><br />
					Mentee Email:<input type="text" name="email" id="email" rows="1" value="" />
					<br /><br />
					Subject:<input type="text" name="subject" id="subject" rows="1" value=""></p>
					<br /><br />
					Message:<textarea name="message" id="message" ></textarea>
					<br /><br />
					<input type="submit" name="submit" id="submit" value="Send"/>
				</form>


				<?php

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
								if($flag==1) 
									{ 
										wp_mail(get_option("admin_email"),trim($_POST[yourname])." sent you a message from ".get_option("blogname"),stripslashes(trim($_POST[message])),"From: ".trim($_POST[yourname])." <".trim($_POST[email]).">rnReply-To:".trim($_POST[email]));
										echo "Mail Successfully Sent"; 
									}  
							}
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
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-77"><a href="http://localhost/mentor-profile-2/">Edit Profile</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-74"><a href="http://localhost/List-Mentees/">My Mentees</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-74"><a href="http://localhost/Mentee-Add/">Add Mentees</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-75"><a href="http://localhost/Mentee-Progress/">Post Mentee Progress</a></li>';
				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a href="http://localhost/Mentee-Contact">Communicate with a Mentee</a></li>';
			echo'</ul>';
			echo'</div>';
			echo'</aside>';


			echo'<aside id="meta-2" class="widget widget_meta"><h2 class="widget-title">Meta</h2>';
			echo'<ul>';
			echo'<li><a href="http://localhost/wp-admin/">Site Admin</a></li>';
			echo'<li><a href="http://localhost/wp-login.php?action=logout&#038;_wpnonce=f8c3f072d6">Log out</a></li>';
			echo'</ul>';
			echo'</aside>';
			echo'</div>';

			echo '</div>';
		}
		?>	

	</div><!-- .container -->

<?php get_footer(); ?>