<?php
get_header();
?>

  <main id="main-content">
    <article class="wrapper">
      <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title();?></h1>
        <div id="article-content" class="prose">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
    </article>
  </main>

<?php
get_footer();