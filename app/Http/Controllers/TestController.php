<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Category;
use App\Question;
use DB;
use App\Answer;
use Log;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $test = Test::select('tests.*','categories.title')->join('categories', 'tests.id_category', '=', 'categories.id')->get();
      return response()->json(['test' => $test]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // $question = Question::where('id_test', $id)->get();
      $question = Question::where('id_test', $id)->get();
      $prueba = $question->count();
      for ($i=0; $i < $prueba; $i++) {
        error_log([i]);
      }
      // $answerCount = $question->count();
      // $answer = Answer::where('id_test', $id)->get();
      // $merged = $answer->merge($question);
      // $collection_one->merger($answer);
      return response()->json(['question' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
