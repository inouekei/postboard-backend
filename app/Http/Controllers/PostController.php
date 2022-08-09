<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Post::all();
        $messages = [];
        foreach ($items as $item) {
            $message['id'] = $item->id;
            $message['uid'] = $item->uid;
            $message['content'] = $item->content;
            $message['likes'] = $item->likes;
            $user = User::where('uid', $item->uid)->get();
            $message['username'] = $user[0]->name;
            array_push($messages, $message);
        }
        return response()->json([
            'data' => $messages
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->all();
        $item = Post::create($form);
        return response()->json([
            'data' => $item
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $item = Post::find($post);
        $message = [];
        if ($item) {
            $message['id'] = $item[0]->id;
            $message['uid'] = $item[0]->uid;
            $message['content'] = $item[0]->content;
            $message['likes'] = $item[0]->likes;
            $user = User::where('uid', $item[0]->uid)->get();
            $message['username'] = $user[0]->name;
            $comments = $item[0]->comments;
            $message['comments'] = [];
            foreach ($comments as $comment) {
                $commentusers = User::where('uid', $comment->uid)->get();
                $comment['username'] = $commentusers[0]->name;
                array_push($message['comments'] ,$comment);
            }
            return response()->json([
                'data' => $message
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $item = Post::where('id', $post->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
