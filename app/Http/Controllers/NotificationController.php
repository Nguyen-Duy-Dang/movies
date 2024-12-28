<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Notifications;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function listNotifications(){
    $notifications = Notifications::with('send_user', 'receive_user')
    ->whereNotNull('id_send_user')
    ->where("isDeleted", 0)
    ->selectRaw('
        MAX(id) as id,
        content,
        MAX(id_send_user) as id_send_user,
        MAX(created_at) as created_at
    ')
    ->groupBy('content') 
    ->orderBy('created_at', 'desc')
    ->get()
    ->map(function ($notification) {
        // Truy vấn tất cả người nhận theo content
        $receive_users = Notifications::where('content', $notification->content)
            ->pluck('id_receive_user');  // lấy tất cả id_receive_user

        // Lấy chi tiết của tất cả người nhận
        $notification->receive_users = User::whereIn('id', $receive_users)->get();
        
        return $notification;
    });

    return view('admins.notification.list', ['notifications' => $notifications], ["selected" => "notification"]);
}

function addNotification(Request $request)
{
    $request->validate([
        'content' => 'required|max:255',
    ], [
        'content.required' => 'Nội dung là bắt buộc.',
        'content.max' => 'Nội dung không được vượt quá 255 ký tự.'
    ]);
    $id_send_user = Auth::id(); 
    $content = $request->input('content');

    $users = DB::table('users')->pluck('id');
    

    foreach ($users as $user_id) {
        DB::table('notifications')->insert([
            'id_send_user' => $id_send_user,
            'id_receive_user' => $user_id,
            'content' => $content
        ]);
    }

    return redirect('/admin/notification/list')->with('success', 'Thông báo đã được gửi thành công!');
}


function deleteNotification($id)
{
    $notificationToDelete = Notifications::find($id);

    if ($notificationToDelete) {       
        $content = $notificationToDelete->content;

        DB::table('notifications')->where('content', $content)->update([
            "isDeleted" => 1
        ]);
        return response()->json([
            "success" => true,
            "message" => "Thông báo đã được xóa!",
        ]);
    }

    return response()->json([
        "success" => false,
        "message" => "Thông báo không tồn tại hoặc xóa thất bại."
    ]);
}


}