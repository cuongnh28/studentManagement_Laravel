<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;




class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outbox($sender)
    {
        $getdata = DB::table('messages')->select('id','sender','receiver','message','create_at')->where('sender',$sender)->get();
        return view('Message.outbox')->with('outbox', $getdata);
    }

    public function inbox($receiver)
    {
        $getdata = DB::table('messages')->select('id','sender','receiver','message','create_at')->where('receiver',$receiver)->get();
        return view('Message.inbox')->with('inbox', $getdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($receiver)
    {
        return view('Message.create_message',compact('receiver'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $receiver)
    {
        $requestAll = $request->all();
        //Chuc nang nhan tin.
        if(session('check')=='inbox')
        {
            $dataInsert = array(
                'receiver' => $receiver,
                'sender' => session('username'),
                'message' => $requestAll['message']
            );
        }
        //Chuc nang reply
        else
        {
            $dataInsert = array(
                'sender' => $receiver,
                'receiver' => session('username'),
                'message' => $requestAll['message']
            );
        }
        $insertData = DB::table('messages')->insert($dataInsert);
        if($insertData)
        {
            Session::flash('success', 'Gửi tin nhắn thành công. ✔');
        }
        else
        {
            Session::flash('error', 'Gửi tin nhắn thất bại! 〤');
        }

        return redirect()->back();
    }
    public function edit($id)
    {
        //        echo $id;
        //Lấy dữ liệu từ Database với các trường được lấy và với điều kiện id = $id
        $getData = DB::table('messages')->select('id','message')->where('id',$id)->get();

        //Tra ve Data voi id truyen vao.
        return view('Message.edit_message')->with('getMessageByID',$getData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updateData = DB::table('messages')->where('id', $request->id)->update([
            'message' => $request->message,
            'create_at' => now()
        ]);

        //Kiểm tra lệnh update để trả về một thông báo
        if ($updateData) {
            Session::flash('success', 'Sửa tin nhắn thành công! ✔ ');
//            echo "Thanh cong";
        }else {
            Session::flash('error', 'Sửa tin nhắn thất bại! 〤');
//            echo "That bai";
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = DB::table('messages')->where('id', '=', $id)->delete();

        if($deleteData)
        {
            Session::flash('success', 'Xóa tin nhắn thành công! ✔');
        }
        else
        {
            Session::flash('success', 'Xóa tin nhắn thất bại! 〤');
        }
        return redirect()->back();
    }
}
