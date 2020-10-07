<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Session;

class AssignmentController extends Controller
{
    public function index()
    {
        $directory = 'uploads/assignment/';
        $allfiles = File::files($directory);

        return view('Assignment.index', compact('allfiles'));
    }

    //Submit solution/answer
    public function submit()
    {
        return view('Assignment.submit_solution');
    }

    public function storeAssignment(Request $request)
    {
        if ($request->hasFile('fileUpload'))
        {
            $file = $request->fileUpload;
            $dir = 'uploads/assignment/' . $file->getClientOriginalName();
            if (! File::exists($dir))
            {
                $file->move('uploads/assignment/', $file->getClientOriginalName());
                Session::flash('success', 'Bạn đã thêm bài tập thành công. ✔');
            }
            else
            {
                Session::flash('error', 'Bài tập đã tồn tại. 〤');
            }
        }
        else
        {
            Session::flash('error', 'Bạn chưa chọn file. 〤');
        }
        return redirect()->back();
    }

    public function storeAnswer(Request $request)
    {
        if ($request->hasFile('fileUpload'))
        {
            $file = $request->fileUpload;
            $dir = 'uploads/answer/' . $file->getClientOriginalName();
            if (! File::exists($dir))
            {
                $file->move('uploads/answer/', $file->getClientOriginalName());
                DB::table('assignments')->insert(
                    [
                        'studentUsername' => session('username'),
                        'filename' => $file->getClientOriginalName(),
                        'create_at' => now(),
                    ]);
                Session::flash('success', 'Bạn đã thêm bài làm thành công. ✔');
            }
            else
            {
                Session::flash('error', 'Bài làm đã tồn tại. 〤');
            }
        }
        else{
            Session::flash('error', 'Bạn chưa chọn file. 〤');
        }
        return redirect()->back();
    }

    public function listAnswer(){
        $directory = 'uploads/answer/';
        $allFiles = File::files($directory);
        $submits = (DB::table('assignments'))->select('filename','studentUsername','create_at')->get();;
        return view('Assignment.list_answer', compact('allFiles','submits'));
    }

    public function downloadAssignment($filename)
    {
        $filepath = public_path('uploads/assignment/' .$filename);
        return response()->download($filepath);
    }

    public function downloadAnswer($filename)
    {
        $filepath = public_path('uploads/answer/' .$filename);
        return response()->download($filepath);
    }

}
