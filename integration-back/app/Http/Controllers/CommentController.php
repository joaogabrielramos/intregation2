<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\User;
use App\Republic;


class CommentController extends Controller
{
    public function createComment(Request $request) {
        $comment = new Comment;
        $comment->text = $request->text;
        $comment->username = $request->username;
        $comment->user_id = $request->user_id;
        $comment->republic_id = $request->republic_id;
        $comment->save();
        return response()->json($comment);
    }

    public function showRepublicWithComments($id){
        $resposta = [];
        $republic = Republic::findOrFail($id);
        $comments = Republic::findOrFail($id)->comments()->get();
        array_push( $resposta, ["republic" => $republic, "comments" => $comments] );
        return response()->json($resposta[0]);
    }

    public function deleteComment($comment_id) {
        $comment = Comment::find($comment_id);
        if($comment){
            Comment::destroy($comment_id);
            return response()->json(['O seu comentário foi deletado com sucesso.'],200);
        }
        else { 
           return response()->json(['Ocorreu um erro ao deletar o comentário.'],404);
        }
    }

    public function updateComment($comment_id ,Request $request){
        $comment = Comment::findOrFail($comment_id);
        $comment->text = $request->text;
        $comment->save();
        return response()->json($comment); 
    }
}
