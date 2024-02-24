<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $comments = Comment::all();

        return response()->json([
            "message" => "comments display it successfully",
            "comments" => $comments
        ]);
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Comment $comment)
    {
        //

        $comments = $comment->create($request->all());
        return response()->json([
            "message" => "comments deleted successfully",
            $comment => $comments
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        return response()->json([
            "message" => "comments display it successfully",
            "comments" => $comment
        ]);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment, $id)
    {
        //

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return response()->json([
            "message" => "comments deleted successfully",
            "comment" => $comment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $comment = Comment::findOrFail($id);
        $comment->delete($id);
        return response()->json([
            "message" => "comments deleted successfully",
        ]);
    }
}
