<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $data = Question::orderBy('id', 'DESC')->paginate('5');

        return view('backend.faq.index', compact('data'));

    }

    public function create()
    {
        return view('backend.faq.create');
    }

    public function store(Request $request)
    {
        $data = new Question;
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->save();

        return back()->with('success', 'Berhasil menambahkan FAQ');
    }

    public function edit($id)
    {
        $data = Question::findorfail($id)->first();
        return view('backend.faq.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Question::find($id)->update([
            'question' => $request->question,
            'answer'   => $request->answer,
        ]);

        return back()->with('success', 'Berhasil mengubah FAQ');

    }

    public function destroy($id)
    {
        $data = Question::findorfail($id)->destroy($id);
        return back();
    }

    public function show()
    {
        $data = Question::paginate('7');

        return view('front.faq', compact('data'));
    }
}
