<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\FeedbackRequest;
use App\Models\Feedback;
use Auth;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{
    public function index()
    {
        $limit = request('limit', 25);

        $feedbacks = Feedback::with(['category:id,title', 'user:id,name'])
            ->simplePaginate($limit);

        return response()->json([
            'status' => 'success',
            'result' => $feedbacks,
        ], JsonResponse::HTTP_OK);

    }

    public function store(FeedbackRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $feedback = Feedback::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Feedback created successfully',
            'data'    => $feedback,
        ], JsonResponse::HTTP_OK);
    }
}
