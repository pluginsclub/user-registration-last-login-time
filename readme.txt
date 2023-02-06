=== User Registration & Last Login Time ===
Contributors: stefanpejcic, pluginsclub
Donate link: https://plugins.club/wordpress/user-registration-last-login-time/
Tags: last login, login time, registration date, users
Requires at least: 5.0
Tested up to: 6.1.1
Stable tag: 1.0
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display registration date and last login time for users.

== Description ==

This plugin will add new columns in the WordPress user list table, one column is for **Registration Date** and the other column is for **Last Login**. The last login column will display the time ago format or "Never" if the user has never logged in.

For more free WordPress plugins please visit [plugins.club](https://plugins.club/).


== Installation ==

1. Upload the plugin file to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

Under the Users list table you will notice two new columns: Registration Date and Last Login

For basic usage, you can also have a look at the [plugin web site](https://plugins.club/wordpress/user-registration-last-login-time/).

== Frequently Asked Questions ==

= I've installed the plugin and it shows "Never" for all users last login time? =

WordPress doesn't keep track of login times at all, so the plugin adds this functionality and thus it can only keep track of logins that have occurred after the plugin has been activated.

= Does this plugin work for Multisite ? =

This plugin should work for a multisite installation as long as it is network activated and the proper hooks and filters are used. However, it's worth noting that the last_login time will only be saved for the site where the user last logged in, and not across the entire network.

= Does this plugin record autologging via external application such as Softaculous or WPToolkit? =

No.

== Upgrade Notice ==

This is new version 1.0

== Screenshots ==

1. Users page showing Registration and Last login time

== Changelog ==
 
= 1.0 =

* Initial release
