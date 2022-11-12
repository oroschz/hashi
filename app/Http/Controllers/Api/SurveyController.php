<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Group;
use App\Models\Question;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Retrieves a listing of active groups.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $groups = $user->groups()->get()->fresh(['subject', 'professor']);

        return $groups;
    }

    /**
     * Retrieves the list of answers for a given group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function state(Request $request, Group $group)
    {
        $user = $request->user();
        if (!$group->users->contains($user)) {
            return [];
        }
        return $user->answers()->where('group_id', $group->id)->get();
    }

    /**
     * Creates or updates the answer for a given group and question.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Group $group, Question $question)
    {
        $user = $request->user();
        if (!$group->users->contains($user)) {
            throw new AuthorizationException;
        }

        $value = $request->query("value");

        Answer::updateOrCreate(
            ['user_id' => $user->id, 'group_id' => $group->id, 'question_id' => $question->id],
            ['value' => $value]
        );
    }
}
