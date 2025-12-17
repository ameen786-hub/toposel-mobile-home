<?php get_header(); ?>

<section class="hero">
  <img src="<?php the_field('hero_image', 'option'); ?>">
  <h1><?php the_field('hero_heading', 'option'); ?></h1>
  <p><?php the_field('hero_subheading', 'option'); ?></p>
  <a href="<?php the_field('hero_button_link', 'option'); ?>">
    <?php the_field('hero_button_text', 'option'); ?>
  </a>
</section>

<section class="brands">
  <?php if (have_rows('brand_logos', 'option')): ?>
    <?php while (have_rows('brand_logos', 'option')): the_row(); ?>
      <img src="<?php the_sub_field('logo'); ?>">
    <?php endwhile; ?>
  <?php endif; ?>
</section>

<section class="new-arrivals">
  <h2>New Arrivals</h2>

  <?php
  $category = get_field('new_arrivals_category', 'option');
  $args = [
    'post_type' => 'product',
    'posts_per_page' => 2,
    'tax_query' => [[
      'taxonomy' => 'product_cat',
      'field'    => 'term_id',
      'terms'    => $category
    ]]
  ];
  $loop = new WP_Query($args);
  while ($loop->have_posts()) : $loop->the_post();
    global $product;
  ?>
    <div class="product-card">
      <?php echo $product->get_image(); ?>
      <h3><?php the_title(); ?></h3>
      <span><?php echo $product->get_price_html(); ?></span>
    </div>
  <?php endwhile; wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>
