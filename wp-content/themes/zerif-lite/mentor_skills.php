<?php/** * Template Name: mentor_skills */get_header(); ?><div class="clear"></div></header> <!-- / END HOME SECTION  --><div id="content" class="site-content">	<div class="container">	<?php		if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) ) {			echo '<div class="content-left-wrap col-md-12">';		}		else {			echo '<div class="content-left-wrap col-md-9">';		}		?>		<div id="primary" class="content-area">			<main id="main" class="site-main" role="main">				<?php				// define variables and set to empty values										if(isset($_POST['submit']))					{						$flag=1;						if($_POST['mentor_id']=='')						{							$flag=0; 							echo "Please Enter a Mentor ID<br>"; 						} else if(!preg_match('/[0-9]*/',$_POST['mentor_id']))						{							$flag=0;							echo "Please Enter Valid Number<br>";						} else						{							$id = $_POST['mentor_id'];							global $wpdb;							$results = $wpdb->get_results("SELECT * FROM mentor Where id = ".$id);							$results1 = $wpdb->get_results("SELECT * FROM mentor JOIN mentor_career ON id = mentor_career.mentor_ID JOIN career_type ON career_type.Career_id = mentor_career.career_ID Where id = ".$id);														if(!empty($results)) 							{ 		     					foreach($results as $r) 		     					{	 		          					echo "<H1>".$r->fname."&nbsp " . $r->lname. "</H1>";		     					}							} else 							{		     					echo "<p>We couldn't find anything that is in all these groups!</p>";	 	 							} 							echo "<table border=0>";							echo "<tr border=0><td border=0><h3>Expertise</h3></td></tr>";							if(!empty($results1)) 							{ 		     					foreach($results1 as $r) 		     					{	 		          					echo "<tr border=0><td border=0>" .$r->Career_Name. "</td></tr>";		     					}							} else 							{		     					echo "<p>We couldn't find anything that is in all these groups!</p>";	 	 							} 							echo "</table>";						}					}				?>				<form method="post" id="contactus_form">					<select name="mentor_id" id="mentor_id">					  <option value="4">James T. Kirk</option>					  <option value="5">Mr. Spock</option>					  <option value="6">Leonard McCoy</option>					  <option value="7">Lt. Uhura</option>					  <option value="8">Montgomery Scott</option>					</select>					<!--Mentor:<input type="text" name="mentor_id" id="mentor_id" rows="1" value="" /> -->					<br /><br />					<input type="submit" name="submit" id="submit" value="Send"/>				</form>			</main><!-- #main -->		</div><!-- #primary -->	<?php		if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) ) {			echo '</div>';		}		else {			echo '</div>';			echo '<div class="sidebar-wrap col-md-3 content-left-wrap">';				//get_sidebar();			echo'<div id="secondary" class="widget-area" role="complementary">';			echo'<aside id="nav_menu-3" class="widget widget_nav_menu"><h2 class="widget-title">Actions</h2>';			echo'<div class="menu-actions-container">';			echo'<ul id="menu-actions" class="menu">';				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-77"><a href="http://localhost/mentor-profile-2/">Edit Profile</a></li>';				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-74"><a href="http://localhost/List-Mentees/">My Mentees</a></li>';				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-74"><a href="http://localhost/Mentee-Add/">Add Mentees</a></li>';				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-75"><a href="http://localhost/Mentee-Progress/">Post Mentee Progress</a></li>';				echo'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a href="http://localhost/Mentee-Contact">Communicate with a Mentee</a></li>';			echo'</ul>';			echo'</div>';			echo'</aside>';			echo'<aside id="meta-2" class="widget widget_meta"><h2 class="widget-title">Meta</h2>';			echo'<ul>';			echo'<li><a href="http://localhost/wp-admin/">Site Admin</a></li>';			echo'<li><a href="http://localhost/wp-login.php?action=logout&#038;_wpnonce=f8c3f072d6">Log out</a></li>';			echo'</ul>';			echo'</aside>';			echo'</div>';			echo '</div>';		}		?>		</div><!-- .container --><?php get_footer(); ?>