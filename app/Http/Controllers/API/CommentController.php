<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Validator;
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
        ->limit(5)
        ->get()

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
        //validate inputs
        $this->validate($request, [
            'user_id' => 'required|integer',
            'comment' => 'required|max:140'
        ]);
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
