<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head><?php wp_head(); ?></head>
<body>

<div class="announcement-bar">
  <?php the_field('announcement_text', 'option'); ?>
</div>

<header class="mobile-header">
  <img src="<?php the_field('site_logo', 'option'); ?>" alt="Logo">
</header>
