<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Group;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Retrieves the list of answers for a given group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $request->validate([
            'group_id' => 'required|integer|exists:App\Models\Group,id'
        ]);

        $group = Group::find($request->group_id);
        $user = $request->user();

        if (!$group->users->contains($user)) {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }
        return $user->answers()->where('group_id', $group->id)->get();
    }

    /**
     * Creates or updates the answer for a given group and question.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'group_id' => 'required|integer|exists:App\Models\Group,id',
            'question_id' => 'required|integer|exists:App\Models\Question,id',
            'value' => 'required|integer|in:1,2,3,4'
        ]);

        $group = Group::find($request->group_id);
        $question = Question::find($request->question_id);

        $user = $request->user();
        if (!$group->users->contains($user)) {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }

        Answer::updateOrCreate(
            ['user_id' => $user->id, 'group_id' => $group->id, 'question_id' => $question->id],
            ['value' => $request->value]
        );
    }
}
