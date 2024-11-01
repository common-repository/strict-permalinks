=== Strict Permalinks ===
Contributors: dphiffer
Tags: permalinks
Requires at least: 2.8
Tested up to: 2.9
Stable tag: 1.1

Restricts permalink syntax and disables permalink editing after a post is published.

== Description ==
      
Strict Permalinks does two things:

1. Restricts the `post_name` portion of the permalink to alphanumerics and hyphens
1. Disables permalink editing once a post is published

Like me, you may have been under the impression that post slugs are already restricted to alphanumerics and hyphens. In the current WordPress 2.8.5, a title that includes certain kinds of punctuation (e.g., "smartquotes") will result in URL-encoded characters in the `post_name` field. Many browsers handle this oddity seamlessly, however this may cause difficulties when integrating with systems expecting a more limited URL syntax.

== Installation ==

1. Upload the `strict-permalinks` folder to the `/wp-content/plugins/` directory or install directly through the plugin installer.
1. Activate the plugin through the 'Plugins' menu in WordPress or by using the link provided by the plugin installer.

== Screenshots ==

1. With and without Strict Permalinks

== Upgrade ==

1. Use the plugin updater in WordPress or...
1. Delete the previous `strict-permalinks` folder from the `/wp-content/plugins/` directory
1. Upload the new `strict-permalinks` folder to the `/wp-content/plugins/` directory

== Usage ==

1. In all cases the `post_title` to `post_name` conversion (i.e., the `sanitize_title` filter) will be limited to a-z, 0-9 and hyphens (-).
1. If a post is not yet published, the permalink can be edited as usual.
1. Once a post is published, the permalink editing interface is disabled.

== Changelog ==

= 1.1 (2010-03-17): =
* Fixed a bug that was preventing the edit post tag cloud from working

= 1.0 (2009-11-06): =
* Initial Public Release
