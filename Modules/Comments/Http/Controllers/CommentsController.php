<?php

namespace Modules\Comments\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Blogs\Models\Blog;
use Modules\Comments\Http\Requests\CommentRequest;
use Modules\Comments\Models\Comment;
use Modules\Comments\Transformers\CommentResource;

class CommentsController extends Controller
{
    public function showall()
    {
        $comments = Comment::with('replies')->whereNull('parent_id')->get();
        return response()->json([
            'comments' => $comments->map(function ($comment) {
                return [
                    'id' => $comment->id,
                    'content' => $comment->content,
                    'author' => $comment->author->name,
                    'replies' => $comment->replies->map(function ($reply) {
                        return [
                            'id' => $reply->id,
                            'content' => $reply->content,
                            'author' => $reply->author->name,
                        ];
                    })
                ];
            })
        ]);

    }


    public function show($id)
    {
        $comment = Comment::with(['author.photo', 'replies'])->findOrFail($id);

        return new CommentResource($comment);
    }



    public function store(CommentRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();
        $validatedData['commentable_type'] = Blog::class;

        if ($request->has('parent_id') && !Comment::where('id', $request->input('parent_id'))->exists()) {
            return response()->json(['error' => 'Parent comment not found'], 404);
        }

        $comment = Comment::create($validatedData);

        if ($request->hasFile('photo')) {
            $comment->addMediaFromRequest('photo')->toMediaCollection('author');
        }

        return response()->json($comment, 201);
    }


    public function update(CommentRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->update($request->validated());

        return response()->json($comment, 200);
    }

    public function destroy($ids)
    {
        $idsArray = explode(',', $ids);
        $user = auth()->user();

        if ($user->isAdmin()) {
            Comment::destroy($idsArray);
            return response()->json(['message' => 'تم حذف التعليق بنجاح'], 200);
        }

        $comments = Comment::whereIn('id', $idsArray)->where('user_id', $user->id)->get();

        if ($comments->count() !== count($idsArray)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        Comment::destroy($comments->pluck('id')->toArray());

        return response()->json(['message' => 'تم حذف التعليق بنجاح'], 200);
    }




}
