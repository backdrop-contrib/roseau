<?php
/**
 * @file
 * Display generic site information such as logo, site name, etc.
 *
 * Available variables:
 *
 * - $base_path: The base path of the Backdrop installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the home page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $front_page: The URL of the home page. Use this instead of $base_path, when
 *   linking to the home page. This includes the language domain or prefix.
 * - $site_name: The name of the site, empty when display has been disabled.
 * - $site_slogan: The site slogan, empty when display has been disabled.
 * - $menu: The menu for the header (if any), as an HTML string.
 */
?>

<div class="l-header__inner">
  <div class="container l-header__inner__container">
    <div class="site-branding">
      <div class="site-branding__inner">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="logo">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
        <?php endif; ?>
        <?php if ($site_name || $site_slogan): ?>
          <div class="site-branding__text name-and-slogan">
            <?php if ($site_name): ?>
              <?php if (!$is_front): ?>
                <div class="site-branding__name"><strong>
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                </strong></div>
              <?php else: /* Use h1 when the content title is empty */ ?>
                <h1 class="site-branding__name site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                </h1>
              <?php endif; ?>
            <?php endif; ?>
            <?php if ($site_slogan): ?>
              <div class="site-slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div> <!-- /#name-and-slogan -->
        <?php endif; ?>
      </div>
    </div>
    <div class="header-nav">
      <?php if ($menu): ?>
        <nav class="navigation primary-nav">
          <?php print $primary_menu; ?>
        </nav>
        <div class="region region--secondary-menu">
          <nav class="navigation secondary-nav">
            <?php print $menu; ?>
          </nav>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>




