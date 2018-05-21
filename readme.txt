=== Site Creation Utilities ===
Contributors: mackensen
Tags: wpmu
Requires at least: 4.5
Tested up to: 4.7.2
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin improves the Multisite site creation process by eliminating undesired features.

== Description ==

This plugin suppresses features of the Multisite site creation process:

- It suppresses the welcome email sent to new site administrators on site creation
- It cancels the site creation process if the given email does not exist, instead of creating a local user

It also flushes rewrite rules on site creation to address https://core.trac.wordpress.org/ticket/20171.

== Installation ==

1. Upload the `site-creation-utilities` folder to the `/wp-content/plugins/` directory
1. Network activate the plugin through the 'Plugins' menu in the WordPress Network Admin

== Privacy ==

This plugin neither collects nor stores any personal, private, or identifying information about any user.

== Changelog ==
= 1.0.3 =

* New feature: flush rewrite rules on site creation.

= 1.0.2 =

* Resolved conflicting version numbers.

= 1.0.1 =

* Updated front matter.
* Resolved a PHP notice.

= 1.0 =

* Initial release.
