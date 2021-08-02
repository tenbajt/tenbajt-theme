<?php
/**
|--------------------------------------------------------------------------
| Fires after the theme is loaded.
|--------------------------------------------------------------------------
|
| This hook is called during each page load, after the theme is initialized.
| It is generally used to perform basic setup, registration, and init
| actions for a theme.
|
| @return void
|
| @link https://developer.wordpress.org/reference/hooks/after_setup_theme/
*/

add_action('after_setup_theme', function (): void {
    /**
     * Allow the use of HTML5 markup for given objects.
     * 
     * @param  string  $feature
     * @param  array  $attributes
     * @return void|bool
     * 
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'style',
        'script',
        'widgets',
        'gallery',
        'caption',
        'search-form',
        'comment-form',
        'comment-list',
    ]);

    /**
     * Allow themes and plugins to manage the document title tag in <head>.
     * 
     * @param  string  $feature
     * @return void|bool
     * 
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable full and wide align option for block editor.
     * 
     * @param  string  $feature
     * @return void|bool
     */
    add_theme_support('align-wide');

    /**
     * Enable WooCommerce's templates override.
     * 
     * @param  string  $feature
     * @return void|bool
     */
    add_theme_support('woocommerce');

    /**
     * Enable theme custom logo option in customizer.
     * 
     * @param  string  $feature
     * @param  array  $attributes
     * @return void|bool
     * 
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
     */
    add_theme_support('custom-logo', [
        'width' => 470,
        'height' => 110,
        'flex-width' => true,
        'flex-height' => true,
    ]);

    /**
     * Add support for editor styles.
     * 
     * @param  string  $feature
     * @return void|bool
     */
    add_theme_support('editor-styles');

    /**
     * Add suport for post thumbnails.
     * 
     * @param  string  $feature
     * @return void|bool
     * 
     * @link @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
     */
    add_theme_support('post-thumbnails');

    /**
     * Add support for block styles.
     * 
     * @param  string  $feature
     * @return void|bool
     */
    add_theme_support('wp-block-styles');

    /**
     * Add support for responsive embedded content.
     * 
     * @param  string  $feature
     * @return void|bool
     */
    add_theme_support('responsive-embeds');

    /**
     * Allow WordPress to place posts and commets RSS feed links to <head>.
     * 
     * @param  string  $feature
     * @return void|bool
     * 
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links
     */
    add_theme_support('automatic-feed-links');

    /**
     * Enable customization for selective refreshing of widgets.
     * 
     * @param  string  $feature
     * @return void|bool
     * 
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
});

/**
|--------------------------------------------------------------------------
| Fires when admin scripts and styles are enqueued.
|--------------------------------------------------------------------------
|
| The proper hook to use when enqueuing scripts and styles that are meant
| to be used in the administration panel. Despite the name, it is used for
| enqueuing both scripts and styles.
|
| It provides a single parameter, $hook_suffix, that informs the current
| admin page. This should be used to enqueue scripts and styles only in the
| pages they are going to be used, and avoid adding script and styles to
| all admin dashboard unnecessarily.
|
| @return void
|
| @link https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
*/

add_action('admin_enqueue_scripts', function(string $current_page): void {
    /**
     * Return URL to parent theme's root directory.
     * 
     * @return string
     * 
     * @link https://developer.wordpress.org/reference/functions/get_stylesheet_directory_uri/
     */
    $theme_root_dir_url = get_template_directory_uri();

    /**
     * Enqueue a CSS stylesheet.
     * 
     * @param  string  $id
     * @param  string  $source
     * @param  string[]  $dependencies
     * @param  string|bool|null  $version
     * @param  string  $media
     * @return void
     * 
     * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
     */
    wp_enqueue_style(
        'tenbajt-admin',
        "{$theme_root_dir_url}/dist/css/admin.css",
        [],
        '1.0.0'
    );
});

/**
|--------------------------------------------------------------------------
| Filters whether to show the front-end toolbar.
|--------------------------------------------------------------------------
|
| Returning false to this hook is the recommended way to hide the toolbar.
| The user’s display preference is used for logged in users.
|
| @link https://developer.wordpress.org/reference/hooks/show_admin_bar/
*/

add_filter('show_admin_bar', '__return_false');

/**
|--------------------------------------------------------------------------
| Filters whether a post type can be edited in the block editor.
|--------------------------------------------------------------------------
|
| Return false to disable the block editor for the post type.
|
| @link https://developer.wordpress.org/reference/hooks/use_block_editor_for_post_type/
*/

add_filter('use_block_editor_for_post_type', '__return_false');

/**
|--------------------------------------------------------------------------
| Fires in the ‘Admin Color Scheme’ section of the user editing screen.
|--------------------------------------------------------------------------
|
| The section is only enabled if a callback is hooked to the action,
| and if there is more than one defined color scheme for the admin.
|
| Remove this hook to hide color picker in the user profile.
|
| @link https://developer.wordpress.org/reference/hooks/admin_color_scheme_picker/
*/

remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');

