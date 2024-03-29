<?php

/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($tabs)) : ?>

<div class="category-tab shop-details-tab">
	<div class="col-sm-12">

		<ul class="nav nav-tabs" role="tablist">
			<?php $s = 0;
				foreach ($tabs as $key => $tab) : ?>
			<li <?php if ($s == 0) {
							echo 'active';
						} ?> class="<?php echo esc_attr($key); ?>_tab" id="tab-title-<?php echo esc_attr($key); ?>" role="tab" aria-controls="tab-<?php echo esc_attr($key); ?>">
				<a data-toggle="tab" href="#tab-<?php echo esc_attr($key); ?>"><?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', esc_html($tab['title']), $key); ?></a>
			</li>
			<?php $s++;
				endforeach; ?>
		</ul>
		<div class="tab-content">
			<?php $i = 0;
				foreach ($tabs as $key => $tab) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel  tab-pane <?php if ($i == 0) : ?> active in<?php endif; ?>>--<?php echo esc_attr($key); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr($key); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr($key); ?>">
				<?php if (isset($tab['callback'])) {
							call_user_func($tab['callback'], $key, $tab);
						} ?>
			</div>
			<?php $i++;
				endforeach; ?>
		</div>
	</div>
</div>

<?php endif; ?>