 <?php
    //   add theme sport
    function mytheme_add_eshopperwoocommerce_support()
    {
        add_theme_support('woocommerce');
    }

    add_action('after_setup_theme', 'mytheme_add_eshopperwoocommerce_support');
    //   end
    // remove breadcrumb in shope
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    //  remove result
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    // woocommerce_catalog_ordering
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    // woocommerce_template_loop_rating
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    // remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    //     add_action('woocommerce_after_shop_loop_item', "add_cart_button");
    //     \
    // remove   prodoct catagoray
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

    // cart
    add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

    function woocommerce_header_add_to_cart_fragment($fragments)
    {
        global $woocommerce;

        ob_start();

        ?>
 <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
 <?php
        $fragments['a.cart-customlocation'] = ob_get_clean();
        return $fragments;
    }

    // remove_action("woocommerce_product_thumbnails", 'woocommerce_show_product_thumbnails', 20);
    // 	<?php
    /**
     * Hook: woocommerce_single_product_summary.
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_rating - 10
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     * @hooked WC_Structured_Data::generate_product_data() - 60
     * do_action('woocommerce_single_product_summary');
     * 
     */
    function eshopper_sku_single_rating()
    {
        global $product;
        $sku = $product->get_sku();
        $sku_num = ($sku ? $sku : 'N/A');
        ?>
 <div class="custrom-sku">
     <?php _e('web id  ', 'eshoper');
            echo $sku_num; ?>

 </div>
 <?php
    }
    add_action('woocommerce_single_product_summary', 'eshopper_sku_single_rating', 6);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    function is_in_stok_fun()
    {
        global $product;
        $instock = ($product->is_in_stock() ? 'In Stock' : 'No');
        echo '<div class"eshopper-stt">';
        _e('Availability: ', 'eshopper');
        echo $instock;
        echo '</div>';
    }
    add_action("woocommerce_single_product_summary", 'is_in_stok_fun', 39);
    function socia_icon()
    {
        ?>
 <div class="social_icon">
     <a href="" class="btn btn-primary"> <i class="fa fa-facebook"></i> Facebook</a>
     <a href="" class="btn btn-primary"> <i class="fa fa-google-plus"></i> Google Plus</a>

 </div>
 <?php
    }
    add_action('woocommerce_single_product_summary', 'socia_icon', 50);
    //remove_action('woocommerce_single_product_summary','woocommerce_output_product_data_tabs' ,10);
    // custam tab
    /**
     * Add a custom product data tab
     */
    add_filter('woocommerce_product_tabs', 'eshopper_woo_new_product_tab');
    function eshopper_woo_new_product_tab($tabs)
    {

        // Adds the new tab

        $tabs['Company_tab'] = array(
            'title'     => __('Company Profile', 'woocommerce'),
            'priority'     => 50,
            'callback'     => 'woo_new_Company_Profile_tab_content'
        );
        $tabs['Tag_tab'] = array(
            'title'     => __('Tag', 'woocommerce'),
            'priority'     => 50,
            'callback'     => 'woo_new_tag_tab_content'
        );

        return $tabs;
    }
    function woo_new_Company_Profile_tab_content()
    {
        $brands = wp_get_post_terms(get_the_id(), 'brand');
        // The new tab content
        foreach ($brands as $brd) :
            if ($brd) {
                echo "<b> Brand:</b>" . $brd->name;
                echo '<p>' . $brd->decription . '</p>';
            }
        endforeach;
    }
    function woo_new_tag_tab_content()
    {
        $tages = wp_get_post_terms(get_the_id(), 'product_tag');
        echo '<p>';
        foreach ($tages as $tg) :
            echo '<b>' . $tg->name . '</b> ';
        endforeach;
        echo '</p>';
    }
    // eshopper re_orders
    /**
     * Reorder product data tabs
     */
    add_filter('woocommerce_product_tabs', 'eshopper_woo_reorder_tabs', 98);
    function eshopper_woo_reorder_tabs($tabs)
    {
        $tabs['description']['priority'] = 5;
        $tabs['Company_tab']['priority'] = 10;
        $tabs['Tag_tab']['priority'] = 15;
        $tabs['reviews']['priority'] = 20;


        return $tabs;
    }
