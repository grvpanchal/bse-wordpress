<?php
/*
Template Name: Container with Title
*/
?>

<?php get_header(); ?>

<div class="container">

		<?php 
        if (have_posts()) : while (have_posts()) : the_post(); 
            ?>
            <div class="page-header">
                <h1><?php the_title(); ?></h1>
            </div>
            <?php
            the_content();
		
		endwhile; 	
		
		else : 

            get_template_part( 'template-parts/content', 'none' ); 
        
        endif; 
        ?>
</div>

<?php get_footer(); ?>