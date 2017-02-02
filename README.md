# Twitter Mashup Widget

Hey thanks for taking on our programming challenge. Please work for 1-2 hours, but don't stress too hard. We don’t expect you to finish this challenge (unless you really want to); it’s more to get a sense of your approach to programming.

## Objective

Write a WordPress widget that shows a mashup of Twitter activity from selected users.

## Instructions

* Fork and clone this repo. It contains a WordPress plugin and widget stub
* The widget admin should accept a comma-separated list of Twitter usernames
* The widget frontend should display a combined list of the 3 most recent activity items from each user sorted by post date  (most recent first). Activity should be fetched server-side, not client-side.
* Send a pull request to me when you're done or when it's been 2 hours

## Bonus points (in order of WOW factor)

* Use of `composer` packages
* Use of `npm`, `webpack`, and `es6` in the build process
* On the frontend, let the user press a little gear icon to add more Twitter handles. The Twitter handles are stored in a cookie. Activity from user-supplied Twitter handles should be combined with the system-supplied Twitter handles.
* If the user is authenticated, the Twitter handles are stored and loaded from his user settings instead of cookie.
* PHP7 compatibility
* Caching the query results for 60 minutes


