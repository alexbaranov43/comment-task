<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([

            'comments' =>  Comment::select(
            'comments.comment',
            'comments.created_at',
            'users.name as name',
            'users.email as email',
            'users.id as user_id'
        )
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->orderBy('created_at', 'desc')
        ->get()

        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create new comment instance with passed comment and user id
        $comment = new Comment([
            'comment' => $request->get('comment'),
            'user_id' => $request->get('user_id')
        ]);
        $comment->save();

        return response()->json(null, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
