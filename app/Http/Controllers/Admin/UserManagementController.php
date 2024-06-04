<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{
    function index(){
        $soLuongNhanVienChuaXacMinh = DB::table('users')
            ->where('is_verified', 0)
            ->where('is_admin', 0)
            ->count();
        $nhanvien=DB::table('users')
            ->where('is_verified', 1)
            ->where('is_admin', 0)
            ->paginate(15);
        return view('admin/usermanagement',['nhanviens'=>$nhanvien,'count'=>$soLuongNhanVienChuaXacMinh,'verified'=>1]);
    }
    function indexDuyet(){
        $nhanvien = DB::table('users')
            ->where('is_verified', 0)
            ->where('is_admin', 0)->paginate(15);
        return view('admin/usermanagement',['nhanviens'=>$nhanvien,'count'=>0,'verified'=>0]);
    }
    function getInfo($id){
        $nhanvien = DB::table('users')->where('id', $id)->first();
        return view('admin/updateUserInformation',['user'=>$nhanvien]);
    }

    function updateInfo(Request $request, $id)
    {
        $user=DB::table('users')->where('id', $id)->first();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'NgaySinh' => 'required|date',
            'GioiTinh' => 'required|string',
            'CCCD' => ['required', 'string', 'max:12', 'min:9'],
            'PhongBan' => 'required|string',
            'QueQuan' => 'required|string',
            'ChucVu' => 'required|string',
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // 4. Cập nhật thông tin người dùng
        try {
            DB::beginTransaction();
            DB::table('users')->where('id', $id)->update($validator->validated());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Đã xảy ra lỗi khi cập nhật thông tin.']);
        }
        return back()->withInput(['success'=>'Cập nhật thông tin người dùng thành công!']);
    }
    function approve($id){
        DB::table('users')->where('id', $id)->update(['is_verified' => 1]);
        return back();
    }
    function delete($id){
        DB::table('users')->where('id', $id)->delete();
        return back();
    }
    public function destroy($id)
    {

        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('admin.userManagement');
    }

}
