<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetID = (int) $request->route('tweetId');
        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetID)) {
            throw new AccessDeniedHttpException('You are not allowed to edit this tweet');
        }
        $tweet = Tweet::where('id', $tweetID)->firstOrFail();
        return view('tweet.edit', ['tweet' => $tweet]);
    }
}
