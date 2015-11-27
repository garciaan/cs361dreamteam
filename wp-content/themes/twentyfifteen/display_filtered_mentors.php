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
				$career_cat = 1;
			}
			else {
				$career_cat = $_GET['career_category'];
			}
			$sql = "select name,career_cats.category from mentors inner join career_cats on mentors.career_cat=career_cats.career_cat_id where career_cats.career_cat_id = $career_cat";
			$filtered_mentors = $wpdb->get_results($sql);
			$categories = $wpdb->get_results("select career_cats.career_cat_id,career_cats.category from career_cats");
			?>
				<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="get">
					<select name="career_category">
						<?php
						foreach ($categories as $category){
							//echo "Category ID: " . $category->career_cat_id . " -- Category: " . $category->category . "<br>";
							echo '<option value="' . $category->career_cat_id . '" ';
							if ($_GET["career_category"] == $category->career_cat_id){
								echo 'selected="selected"'; 
							}
							echo '>' . $category->category . '</option>'; 
						}

						?>
					</select>
					<input type="submit">
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
							echo "<td>" . $mentor->name . "</td>";
							echo "<td>" . $mentor->category . "</td>";
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
