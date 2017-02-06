<!-- This file is used to markup the public-facing widget. -->
<?php

function date_compare($a, $b) {
  return strtotime($a['created_at']) < strtotime($b['created_at']);
}

# twitter settings
$settings = array(
  'oauth_access_token' => "357802347-EHhvuIBhOv0KUkrrAAkF6Q06sW0A0NPcL9aiO6RM",
  'oauth_access_token_secret' => "dXd2i1OKZCWoQ6zQQvQgu4XcGDyMBuuanYdk8nE",
  'consumer_key' => "uul96fpiDF2M29V7iruQ",
  'consumer_secret' => "NybOcRKqwJ9OW5gKF7DsMiXoQumg3088XLhCkWfw48"
);

$result = [];
$usernames = explode(',', $instance[ 'usernames' ]);
$twitter = new TwitterAPIExchange($settings);
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';

# loop through each username
foreach($usernames as $username) {

  # set parameters for the call
  $getfield = '?screen_name=' . $username . '&count=3';

  # and pull the most recent 3 tweets
  $tweets = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, 'GET')
    ->performRequest(), true);

  # append to our result array
  foreach($tweets as $tweet) {
    $result[] = array(
      'screen_name' => $tweet['user']['screen_name'],
      'text' => $tweet['text'],
      'profile_image_url' => $tweet['user']['profile_image_url_https'],
      'created_at' => $tweet['created_at']
    );
  }

  # and sort all the tweets by most recent
  usort($result, 'date_compare');
}
?>
<h3>Birdmash</h3>
<ul class="birdmash-widget">
  <?php foreach($result as $tweet) { ?>
    <li>
      <img src="<?php echo $tweet['profile_image_url'] ?>" class="pic">
      <span class="screen-name"><?php echo $tweet['screen_name'] ?></span>
      <span class="date"><?php echo  date('m.d g:i a', strtotime($tweet['created_at'])) ?></span>
      <p class="text"><?php echo $tweet['text'] ?></p>
    </li>
  <?php } ?>
</ul>
<?php echo $args['after_widget'];
