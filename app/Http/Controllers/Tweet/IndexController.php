<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use App\Models\Tweet;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetServiceGetTweets)
    {
        $tweets = $tweetServiceGetTweets->getTweets();
        return view('tweet.index', compact('tweets'));
    }
}
