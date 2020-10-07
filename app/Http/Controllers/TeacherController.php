<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Lấy dữ liệu từ Database với các trường được lấy và với điều kiện id = $id
        $getData = DB::table('Users')->select('id','username','name', 'email', 'phone', 'password')->where('id',$id)->get();

        //Tra ve Data voi id truyen vao.
        return view('Teacher.edit_teacher')->with('getTeacherById',$getData);
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
        //Cap nhat sua giao vien
        $newPassword = $request->password;
        $getData = DB::table('Users')->select('password')->where('id', $request->id)->get();
        $oldPassword = $getData[0]->password;
        if($newPassword != $oldPassword)
        {
            $newPassword = bcrypt($newPassword);
        }
        //Thực hiện câu lệnh update với các giá trị $request trả về
        $updateData = DB::table('Users')->where('id', $request->id)->update([
            'password' => $newPassword,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        //Kiểm tra lệnh update để trả về một thông báo
        if ($updateData)
        {
            Session::flash('success', 'Sửa thông tin thành công! ✔');
        }
        else
        {
            Session::flash('error', 'Sửa thông tin thất bại! 〤');
        }

        //Thực hiện chuyển trang
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
        //
    }
}
