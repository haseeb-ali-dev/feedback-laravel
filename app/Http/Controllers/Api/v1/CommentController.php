<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\CommentRequest;
use App\Models\{Comment, Feedback};
use Auth;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function index($feedback_id)
    {
        $feedback = $this->feedback_exists($feedback_id);
        $comments = $feedback->comments()->with('user:id,name')->latest()->get();

        return response()->json([
            'status' => 'success',
            'data'   => $comments,
        ], JsonResponse::HTTP_OK);
    }

    public function store(CommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $comment = Comment::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Comment posted successfully',
            'data'    => $comment,
        ], JsonResponse::HTTP_OK);
    }

    protected function feedback_exists($id)
    {
        $feedback = Feedback::find($id);

        if (!isset($feedback))
        {
            abort(
                response()->json([
                    'status'  => 'error',
                    'message' => 'No such feedback found',
                ], JsonResponse::HTTP_NOT_FOUND)
            );
        }

        return $feedback;
    }
}
