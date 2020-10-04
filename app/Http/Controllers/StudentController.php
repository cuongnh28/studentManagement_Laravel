<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class StudentController extends Controller
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
        return view('Student.create_student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $allRequest = $request->all();
        $username = $allRequest['username'];
        $email = $allRequest['email'];
        $name = $allRequest['name'];
        $phone = $allRequest['phone'];
        $password = bcrypt($allRequest['password']);
        $dataInsert = array(
            'email' => $email,
            'username' => $username,
            'level' => 1,
            'phone'=>$phone,
            'password'=>$password,
            'name'=>$name
        );
        $insertData = DB::table('Users')->insert($dataInsert);

        if($insertData)
        {
            echo "<div class='form'><h3>Bạn đã thêm sinh viên thành công</h3><br/>Click để Quay lại</div>";
//        return redirect('student/add'); //chua them link
        }
        else
        {
            echo "Thêm thất bại";
        }
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
//        echo $id;
        //Lấy dữ liệu từ Database với các trường được lấy và với điều kiện id = $id
        $getData = DB::table('Users')->select('id','username','name', 'email', 'phone', 'password')->where('id',$id)->get();

        //Tra ve Data voi id truyen vao.
        return view('Student.edit_student')->with('getStudentById',$getData);
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
        //Cap nhat sua sinh vien

        //Thực hiện câu lệnh update với các giá trị $request trả về
        $updateData = DB::table('Users')->where('id', $request->id)->update([
            'password' => $request->password,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        //Kiểm tra lệnh update để trả về một thông báo
        if ($updateData) {
            Session::flash('success', 'Sửa học sinh thành công!');
            echo "Thanh cong";
        }else {
//            Session::flash('error', 'Sửa thất bại!');
            echo "That bai";
        }

        //Thực hiện chuyển trang
//        return redirect('hocsinh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = DB::table('Users')->where('id', '=', $id)->delete();

        if($deleteData)
        {
            echo "Xoa thanh cong";
        }
        else
        {
            echo "Xoa that bai";
        }
    }
}
