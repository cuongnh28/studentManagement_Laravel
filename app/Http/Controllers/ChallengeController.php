<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Session;


class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('Challenge.add');
    }

    public function list()
    {
        $challenges = DB::table('challenges')->select('filename', 'suggest')->get();
        return view('Challenge.list')->with('challenges', $challenges);
    }

    public function upload(Request $request)
    {
        if($request->hasFile('fileUpload'))
        {
            $file = $request->fileUpload;
            $folder = (string) Str::orderedUuid();
            $dir = 'uploads/challenge/'. $folder.'/';
            $file->move($dir, $file->getClientOriginalName());
            DB::table('challenges')->insert(
                [
                    'filename'=>$folder,
                    'suggest' =>$request->get('suggest')
                ]
            );
            return redirect()->back();
        }
    }

    public function show($folder)
    {
        $challenges = DB::table('challenges')->where('filename', $folder);
        $suggest = $challenges->value('suggest');
        return view('Challenge.solve', compact('suggest', 'folder'));
    }

    public function solve($folder, Request $request)
    {
        $answer = $request->get('answer').'.txt';
        $dir = 'uploads/challenge/'.$folder.'/';
        $filename = $dir.$answer;
        if(File::exists($filename))
        {
            $content = File::get(public_path($filename));
            return view('Challenge.content', compact('content'));
        }
        else
        {
            Session::flash('error', 'Đáp án không chính xác. 〤');
            return redirect()->back();
        }
    }

}
