<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = DB::table('challenges')->select('filename', 'suggest')->get();
        return view('Challenge.index')->with('challenges', $challenges);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return view('challenge.solve', compact('suggest', 'folder'));
    }

    public function solve($folder, Request $request)
    {
        $answer = $request->get('answer').'.txt';
        $dir = 'uploads/challenge/'.$folder.'/';
        $filename = $dir.$answer;
        if(File::exists($filename))
        {
            $content = File::get(public_path($filename));
            return view('challenge.content', compact('content'));
        }
        else
        {
            echo "Sai";
        }
    }

}
