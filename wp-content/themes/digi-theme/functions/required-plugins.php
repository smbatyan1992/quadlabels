<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Blank Theme
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . "/class-tgm-plugin-activation.php";

add_action("tgmpa_register", "blank_theme_register_required_plugins");

function blank_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = [
		// This is an example of how to include a plugin bundled with a theme.
		[
			"name"               => "Advanced Custom Fields Pro", // The plugin name.
			"slug"               => "advanced-custom-fields-pro", // The plugin slug (typically the folder name).
			"source"             => get_template_directory() . "/plugins/advanced-custom-fields-pro.zip", // The plugin source.
			"required"           => true, // If false, the plugin is only 'recommended' instead of required.
			"version"            => "", // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			"force_activation"   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			"force_deactivation" => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			"external_url"       => "", // If set, overrides default API URL and points to an external URL.
			"is_callable"        => "", // If set, this callable will be be checked for availability to determine if a plugin is active.
		],
		[
			"name"               => "Formidable Pro", // The plugin name.
			"slug"               => "formidable-pro", // The plugin slug (typically the folder name).
			"source"             => get_template_directory() . "/plugins/formidable.4.0.04.zip", // The plugin source.
			"required"           => true, // If false, the plugin is only 'recommended' instead of required.
			"version"            => "", // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			"force_activation"   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			"force_deactivation" => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			"external_url"       => "", // If set, overrides default API URL and points to an external URL.
			"is_callable"        => "", // If set, this callable will be be checked for availability to determine if a plugin is active.
		],
		[
			"name"               => "Advanced Custom Fields Font Awesome Add-on", // The plugin name.
			"slug"               => "acf-font-awesome-add-on", // The plugin slug (typically the folder name).
			"source"             => get_template_directory() . "/plugins/advanced-custom-fields-font-awesome.zip", // The plugin source.
			"required"           => true, // If false, the plugin is only 'recommended' instead of required.
			"version"            => "", // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			"force_activation"   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			"force_deactivation" => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			"external_url"       => "", // If set, overrides default API URL and points to an external URL.
			"is_callable"        => "", // If set, this callable will be be checked for availability to determine if a plugin is active.
		],
		[
			"name"               => "All in One SEO Pack", // The plugin name.
			"slug"               => "all-in-one-seo-pack", // The plugin slug (typically the folder name).
			"source"             => get_template_directory() . "/plugins/all-in-one-seo-pack.3.1.1.zip", // The plugin source.
			"required"           => true, // If false, the plugin is only 'recommended' instead of required.
			"version"            => "", // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			"force_activation"   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			"force_deactivation" => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			"external_url"       => "", // If set, overrides default API URL and points to an external URL.
			"is_callable"        => "", // If set, this callable will be be checked for availability to determine if a plugin is active.
		],
	];

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = [
		"id"           => "blank-theme",                 // Unique ID for hashing notices for multiple instances of TGMPA.
		"default_path" => "",                      // Default absolute path to bundled plugins.
		"menu"         => "tgmpa-install-plugins", // Menu slug.
		"parent_slug"  => "themes.php",            // Parent menu slug.
		"capability"   => "edit_theme_options",    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		"has_notices"  => true,                    // Show admin notices or not.
		"dismissable"  => true,                    // If false, a user cannot dismiss the nag message.
		"dismiss_msg"  => "",                      // If 'dismissable' is false, this message will be output at top of nag.
		"is_automatic" => false,                   // Automatically activate plugins after installation or not.
		"message"      => "",                      // Message to output right before the plugins table.
	];
	tgmpa($plugins, $config);
}