<?php
/**
 * Template for Displaying a Single Liquid Note (CPT Post)
 */
?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
                // Start the Loop
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'partials/content-lqdnotes', get_post_format() );
                endwhile;
                // End of Loop
            ?>

        </main>
    </div>
</div>