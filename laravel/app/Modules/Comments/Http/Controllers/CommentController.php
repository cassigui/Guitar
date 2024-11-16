<?php

namespace App\Modules\Comments\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Comments\Http\Requests\CommentRequest;
use App\Modules\Comments\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(CommentService $comment_service)
    {
        // $this->authorizeResource("App\Modules\Comments\Comment", "App\Modules\Comments\Comment");
        $this->comment_service = $comment_service;
    }

    public function store(CommentRequest $request)
    {
        return response()->json([
            'error' => false,
            'message' => __('wf.comments::toasts.store'),
            'comment' => $this->comment_service->store($request->toArray()),
        ]);
    }

    public function update(CommentRequest $request, $id)
    {
        return response()->json([
            'error' => false,
            'message' => __('wf.comments::toasts.update'),
            'comment' => $this->comment_service->update($request->toArray(), $id),
        ]);
    }

    public function destroy($id)
    {
        $this->comment_service->destroy($id);

        return response()->json([
            'error' => false,
            'message' => __('wf.comments::toasts.destroy'),
        ]);
    }

    public function restore($id)
    {
        $this->comment_service->restore($id);

        return response()->json([
            'error' => false,
            'message' => __('wf.comments::toasts.restore'),
        ]);
    }

    public function get(Request $request)
    {
        return response()->json([
            'error' => false,
            'comments' => $this->comment_service->api->get($request->toArray()),
        ]);
    }

    public function find(Request $request)
    {
        return response()->json([
            'error' => false,
            'comment' => $this->comment_service->api->find($request->toArray()),
        ]);
    }

    public function paginate(Request $request)
    {
        return response()->json(
            $this->comment_service->api->paginate($request->toArray())
        );
    }

    protected function resourceAbilityMap()
    {
        return array_merge(parent::resourceAbilityMap(), [
            'ngTableGet' => 'view',
            'restore' => 'restore',
        ]);
    }
}
