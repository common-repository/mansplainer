=== Mansplainer ===
Contributors: morganestes, mrsipstenu
Tags: comments, filter, wtf
Requires at least: 4.4
Tested up to: 4.8
Requires PHP: 5.3
Stable tag: 1.1.0
License: GPLv2+
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Fixes comments to be more technically accurate, naturally.

== Description ==

Want to make sure that post's author knows who _really_ knows what they're trying say? Mansplain in the comments.

What if a post is missing that one detail that only you know? Mansplain in the comments.

Was a post succinct and well-written? Probably not well enough, and you know what that means: Mansplain.

But what if you (accidentally, I'm sure) fail to indicate that you're the savior when you comment? Let Mansplain fix that for you.

Mansplain helps keep your comment section technically correct (which we know is the **best** kind of correct) by prefixing comments with an appropriately helpful phrase to let everyone know that _this_ comment can be relied on to be accurate, helpful, and properly 'splained. :)

== Installation ==

Add the plugin to your site. That's it, nothing else to do.

== Frequently Asked Questions ==

=  WHAT? =

I know, right? You can thank @ipstenu for the inspiration. Thread starts here: https://twitter.com/Ipstenu/status/901916871376551936.

= Can I change the 'splains? =

You sure can, with the handy `'mansplainer_splains'` filter. It's an array of strings that get run through `esc_html`, so keep 'em clean of markup.

= Is this for real? =

Well, yes. It's a real plugin, with real examples of core and custom filters, and very real examples of how *not* to talk to people.

== Changelog ==

= 1.1.0 =
* Changed to targeting random comments instead of all of them.
* Introduced `mansplainer_not_all_comments` filter to enable original behavior of "fixing" all comments.
* Added some new splains.

= 1.0.0 =
* Initial release, in case you didn't already know that.

== Upgrade Notice ==

= 1.1.0 =
This release changes the behavior slightly by adding splains to random comments instead of every one.

To enable the splains on all the comments, add `add_filter( 'mansplainer_not_all_comments', '__return_false' );` to your theme's functions.php file or to another plugin.

== Disclaimer ==

This is a joke, but not really. If you're tempted to comment on a post with one of these phrases, take a break and come back later with a clear head.
