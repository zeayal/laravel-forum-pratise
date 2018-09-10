<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Reply;

class RepliesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request, Thread $thread) {

        $thread->addReply($request->toArray());
        return back();
    }
}
