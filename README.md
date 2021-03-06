﻿# SteamCompletionist Reloaded
----


This is my fork of [SteamCompletionist](https://github.com/Bio2hazard/SteamCompletionist).
My goal is to ~~reverse engineer the missing bits from the original repository (such as Config class and DBSchema)~~ *[Got those from the original author - thanks!]*, and then add some little bells and whistles to it. I'm thinking of, for example:
* Visible (and searchable) game names
* different sorting methods (amount of time played, percentage of achievements, that kind of thing)
* Adding average times to play through a game (like at [HowLongToBeat](http://www.howlongtobeat.com))

Author: Christian Syska <syska.christian@gmail.com>


The rest of the file is the original info, as it's still relevant:

----
 

This project is an attempt at learning more about the steam API, HTML 5 and CSS 3. The website itself is to motivate people to beat their backlog of steam games by providing a slick interface to mark games as "actively playing", launch games and view your achievement progress. Functionality to mark a game as beaten / blacklisted is also included.
The way the website displays the list of games also helps in remembering all the amazing games you own that you forgot about.

**Requirements**:

* Steam API Key ( Obtainable at [steamcommunity.com](http://steamcommunity.com/dev/apikey) )
* PHP 5.3+
* MySQLIi or PDO extension

**Makes use of**:

 * LightOpenID class Copyright (c) 2010, Mewp under the MIT license
 * CSS reset stylesheet [http://meyerweb.com/eric/tools/css/reset/](http://meyerweb.com/eric/tools/css/reset/)
 * jQuery Javascript Framework [http://jquery.com/](http://jquery.com/)
 * jQueryUI Javascript Framework [http://jqueryui.com/](http://jqueryui.com/)
 * jQuery.fn.sortElements by James Padolsey [http://james.padolsey.com/javascript/sorting-elements-with-jquery/](http://james.padolsey.com/javascript/sorting-elements-with-jquery/)
 * Google Charts [https://developers.google.com/chart/](https://developers.google.com/chart/)

Author: Felix Kastner <felix@chapterfain.com>

Creation date: January 2013 - April 2013
