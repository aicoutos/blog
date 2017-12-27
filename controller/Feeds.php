<?php
namespace app\controller;

use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Item;

class Feeds
{
    public $db;
    public $auth;
    public $view;
    public function index($method)
    {
        $this->db=require_once ROOT.'db.php';
        $this->get();
    }
    public function get()
    {
        /*VARs*/
        $feed = new Feed();
        $channel = new Channel();
        $channel
        ->title('Channel Title')
        ->description('Channel Description')
        ->url('http://blog.example.com')
        ->feedUrl('http://blog.example.com/rss')
        ->language('en-US')
        ->copyright('Copyright 2012, Foo Bar')
        ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
        ->lastBuildDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
        ->ttl(60)
        ->pubsubhubbub('http://example.com/feed.xml', 'http://pubsubhubbub.appspot.com') // This is optional. Specify PubSubHubbub discovery if you want.
        ->appendTo($feed);
        $item = new Item();
        $item
        ->title('Blog Entry Title')
        ->description('<div>Blog body</div>')
        ->contentEncoded('<div>Blog body</div>')
        ->url('http://blog.example.com/2012/08/21/blog-entry/')
        ->author('john@smith.com')
        ->creator('John Smith')
        ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
        ->guid('http://blog.example.com/2012/08/21/blog-entry/', true)
        ->preferCdata(true) // By this, title and description become CDATA wrapped HTML.
        ->appendTo($channel);
        /*RULEs*/
        echo $feed;
    }
}
