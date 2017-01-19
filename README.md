# Twitter Mashup Widget

Hey thanks for taking on our programming challenge. Please work for 1-2 hours, but don't stress too hard. We don’t expect you to finish this challenge (unless you really want to); it’s more to get a sense of your approach to programming.

## Objective

Write a WordPress widget that shows a mashup of Twitter activity from selected users. Deliver plugin via github or bitbucket repo.

## Instructions

* Clone this repo. It contains a WordPress plugin and widget stub
* The widget admin should accept a comma-separated list of Twitter usernames
* The widget frontend should display the 3 most recent activity items from each user, in chronological order (most recent first). Activity should be fetched server-side, not client-side.
* On the frontend, the user can press a little gear icon to add more users. They are stored in a cookie unless the user is authenticated, in which case they are stored in his user settings.
* Activity from user-supplied Twitter handles should be combined with the system-supplied Twitter handles.
* Send a pull request to me when you're done or when it's been 2 hours

## Bonus points (in order of WOW factor)

* Use of `npm`, `webpack`, and `es6` in the build process
* PHP7 compatibility
* Caching the query results for 60 minutes


