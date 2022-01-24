<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\Question;
use Illuminate\Http\Client\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Quiz::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuizRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizRequest $request)
    {
        $quiz = Quiz::create($request->all());
        $questions = $request->questions;
        foreach ($questions as $question) {
            $q = $quiz->questions()->create(array_merge($question, ['quiz_id' => $quiz->id,]));

            // print_r($question);
            $choices = $question['choices'];
            foreach ($choices as $choice) {
                $q->choices()->create(array_merge($choice, ['question_id' => $question['id'],]));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return $quiz;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuizRequest  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        $quiz->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        $questions = $quiz->questions();
        foreach ($questions as $q) {
            $choices = $q->choices();
            foreach ($choices as $c) {
                $c->delete();
            }
            $q->delete();
        }
    }


    public function publish($id)
    {
        Quiz::find($id)->update(array('published' => true));
    }


    public function unpublish($id)
    {
        Quiz::find($id)->update(array('published' => false));
    }


    public function getQuestions($id)
    {
        return response()->json(Quiz::find($id)->questions());
    }
}
