<?php
/**
 * Template Name: Single Liquid Note
 *
 * Removes header/footer/other extraneous to show well on mobile.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset=""<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="page">
<div class="content">
    <div id="primary" class="content-area" style="margin-left:20px; margin-right:20px;">
        <main id="main" class="site-main" role="main">
		    <?php
		    while( have_posts() ) : the_post();
			    ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content" style="margin:auto; max-width:1000px;">
                    <?php
                        the_content();
                    ?>
                </div>
            </article>
            <?php
		    endwhile;
		    ?>
        </main>
    </div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
