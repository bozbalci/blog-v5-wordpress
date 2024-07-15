<?php
get_header();
?>

<main id="main-content">
  <article class="wrapper prose">
    <h1>Hello there!</h1>
    <p>
      My name is Berk and I'm a software engineer, coffee enthusiast,
      amateur photographer and musician living in London.
    </p>
    <p>
      I'm currently working for Apple, making Apple Pay work for billions
      of customers around the world.
    </p>
    <p>
      This is my little home on the internet, my online presence outside
      social media.
    </p>

    <h2>Writing</h2>
    <p>I write too.</p>
    <?php while (have_posts()) : the_post(); ?>

    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #cacaca; padding-top: 1rem; padding-bottom: 1rem; max-width: 60ch;">
      <a href="<?php the_permalink(); ?>" style="">
        <span class=""><?php the_title(); ?></span>
      </a>
      <time class=""><?php echo get_the_date(); ?></time>
    </div>

    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #cacaca; padding-top: 1rem; padding-bottom: 1rem; max-width: 60ch;">
      <a href="<?php the_permalink(); ?>" style="">
        <span class="">Slobbering</span>
      </a>
      <time class=""><?php echo get_the_date(); ?></time>
    </div>

    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #cacaca; padding-top: 1rem; padding-bottom: 1rem; max-width: 60ch;">
      <a href="<?php the_permalink(); ?>" style="">
        <span class="">Like a fucking retard!</span>
      </a>
      <time class=""><?php echo get_the_date(); ?></time>
    </div>


    <?php endwhile; ?>
  </article>
</main>

<?php
get_footer();