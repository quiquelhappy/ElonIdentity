<?php

use DG\Twitter\Twitter;

class Person
{

    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function shareTweet()
    {

        /* fill with your app tokens */

        $settings = array(
            'oauth_access_token' => "",
            'oauth_access_token_secret' => "",
            'consumer_key' => "",
            'consumer_secret' => ""
        );
        $twitter = new TwitterAPIExchange($settings);

        $url = 'https://api.twitter.com/1.1/statuses/update.json';
        $requestMethod = 'POST';

        $postfields = array(
            'status' => "@offensiveprank ".$this->name.", ".$this->age." años",
            'in_reply_to_status_id' => '1188511636447023104'
        );

        $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();
    }
}
