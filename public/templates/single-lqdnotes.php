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
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
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
                    <form>
                        <h3>Add Your Own Notes Here</h3>
                        <textarea id="free_form_notes" rows="5"></textarea>
                        <h3>Enter email address and click Send Notes button</h3>
                        <input id="send_to_email" type="email" class="lqdnotes-email" required>
                        <input id="send_notes" type="submit" value="Send Notes">
                    </form>
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
