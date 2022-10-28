<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Group;
use App\Models\Question;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $groups = $user->groups()->get();

        return $groups;
    }

    public function state(Request $request, Group $group)
    {
        $user = $request->user();
        if (!$group->users->contains($user)) {
            return [];
        }
        return $user->answers()->where('group_id', $group->id)->get();
    }

    public function update(Request $request, Group $group, Question $question)
    {
        $user = $request->user();
        if (!$group->users->contains($user)) {
            throw new AuthorizationException("");
        }

        $value = $request->query("value");

        Answer::updateOrCreate(
            ['user_id' => $user->id, 'group_id' => $group->id, 'question_id' => $question->id],
            ['value' => $value]
        );
    }
}
