<?php
/**
 * The template for displaying pages
 *
 * Template Name: Testing
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			//get_template_part( 'content', 'page' );
			if (!isset($_GET['career_category'])){
				$career_cat = 100;
			}
			else {
				$career_cat = $_GET['career_category'];
			}
			$sql = "select mentor.full_name,career_type.Career_Name from mentor inner join career_type on mentor.career_cat=career_type.Career_id where career_type.Career_id = $career_cat";
			$filtered_mentors = $wpdb->get_results($sql);
			$categories = $wpdb->get_results("select career_type.Career_id,career_type.Career_Name from career_type");
			?>
				<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="get">
					<select name="career_category" onchange='if(this.value != 0) { this.form.submit(); }'>
						<?php
						foreach ($categories as $category){
							//echo "Category ID: " . $category->career_cat_id . " -- Category: " . $category->category . "<br>";
							echo '<option value="' . $category->Career_id . '" ';
							if ($_GET["career_category"] == $category->Career_id){
								echo 'selected="selected"'; 
							}
							echo '>' . $category->Career_Name . '</option>'; 
						}

						?>
					</select>
				</form>
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Career Category</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($filtered_mentors as $mentor){
							echo "<tr>";
							echo "<td>" . $mentor->full_name . "</td>";
							echo "<td>" . $mentor->Career_Name . "</td>";
							echo "</tr>";
						}
					?>
					</tbody>

					<tfoot>
					</tfoot>

				</table>	
			<?php 

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
