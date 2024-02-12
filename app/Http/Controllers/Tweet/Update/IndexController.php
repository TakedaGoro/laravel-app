<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tweetID = (int) $request->route('tweetId');
        $tweet = Tweet::where('id', $tweetID)->firstOrFail();
        return view('tweet.edit', ['tweet' => $tweet]);
    }
}
