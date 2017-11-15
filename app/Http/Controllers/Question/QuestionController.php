<?php

namespace App\Http\Controllers\Question;

use App\Customer;
use App\Http\Requests\QuestionRequest;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index() {
        $questions = Question::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'desc')->get();
        $customers = Customer::where('tenant_id', Auth::user()->tenant_id)->get();
        return view('question.question_index', compact('questions', 'customers'));
    }

    public function create() {
        $selectCustomers = Customer::where('tenant_id', Auth::user()->tenant_id)->orderBy('name', 'asc')->get();
        return view('question.add_question', compact('selectCustomers'));
    }

    public function store(QuestionRequest $request) {
        Question::create([
            'customer_id' => $request->customer_id,
            'question' => $request->question,
            'is_need_call' => ($request->is_need_call == 'on' ? 1:0),
            'tenant_id' => Auth::user()->tenant_id
        ]);
        return redirect()->route('question.index')->with(['status' => 'Question has been added']);
    }

    public function edit(Question $question) {
        $selectCustomers = Customer::where('tenant_id', Auth::user()->tenant_id)->orderBy('name', 'asc')->get();
        return view('question.edit_question', compact('question', 'selectCustomers'));
    }

    public function update(QuestionRequest $request, Question $question) {
        $question->update([
            'customer_id' => ($request->customer_id == 'null' ? null:$request->customer_id),
            'question' => $request->question,
            'is_need_call' => ($request->is_need_call == 'on' ? 1:0),
        ]);
        return redirect()->route('question.index')->with(['status' => 'Question has been updated']);
    }

    public function deleteQuestion(Request $request) {

    }
}
