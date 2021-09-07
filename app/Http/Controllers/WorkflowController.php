<?php

namespace App\Http\Controllers;

use App\Models\Workflow;
use Illuminate\Http\Request;

class WorkflowController extends Controller
{
    public function edit()
    {
        $data = Workflow::where('title', 'alur')->first();

        return view('backend.workflow.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Workflow::where('title', 'alur')->first()->update([
            'title' => 'alur',
            'value' => $request->value,
        ]);

        return back()->with('success', 'Berhasil update alur');
    }


    public function upload(Request $request)
    {
        $validated = $request->validate([
            'upload'   => 'required|mimes:jpg,bmp,png,gif',
        ]);

        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function index()
    {
        $data = Workflow::where('title', 'alur')->first();

        return view('front.workflow', compact('data'));
    }
}
