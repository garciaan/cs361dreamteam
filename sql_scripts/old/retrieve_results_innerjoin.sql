select name,career_cats.category from mentors inner join career_cats on mentors.career_cat=career_cats.career_cat_id where career_cats.category = 'Business'