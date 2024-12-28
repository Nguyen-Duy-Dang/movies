<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PaymentSuccessMail;
use App\Models\Subscription_plans;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class PaymentController extends Controller
{
    public function get(){
        $subscriptions = DB::table('subscription_plans')
        ->where("isDeleted",0)
        ->get();
        $plan = request()->has('plan') ? request('plan') : 0;
        return view('clients.subscription', [
            'subscriptions' => $subscriptions,
            'plan' => $plan
        ]);
    }

    function listpayment()
    {
        $subscriptions = Subscription_plans::with("subscriptions")
        ->where("isDeleted",0)
        ->paginate(request()->input('per_page', 8), ['*'], 'page', request()->input('page', 1));
        return view('admins.payment.list', ['subscriptions' => $subscriptions], ["selected" => "pay"]);
    }
    function addpayment(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'duration' => 'required|min:1|integer|max:365',
            'price' => 'required|min:0|integer',
        ], [
            'name.required' => 'Tên gói là bắt buộc.',
            'name.max' => 'Tên gói không được vượt quá 255 ký tự.',
            'duration.required' => 'Số ngày là bắt buộc.',
            'duration.min' => 'Số ngày phải lớn hơn 0.',
            'duration.integer' => 'Số ngày phải là số nguyên dương.',
            'duration.max' => 'Số ngày phải nhỏ hơn hoặc bằng 365.',
            'price.required' => 'Giá gói là bắt buộc.',
            'price.min' => 'Giá gói không được âm.',
            'price.integer' => 'Giá gói phải là số nguyên dương.',
        ]);
        $name = $_POST['name'];
        $duration = $_POST['duration'];
        $price = $_POST['price'];
        $id = DB::table('subscription_plans')->insertGetId([
            'name' => $name,
            'duration' => $duration,
            'price' => $price
        ]);
        return redirect('http://127.0.0.1:8000/admin/payment/list');
    }
    public function edit($id){
        $payment = Subscription_plans::find($id);
        return view('admins/payment/update', ['subscription' => $payment, "selected" => "payment"]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255',
            'duration' => 'required|min:1|integer|max:365',
            'price' => 'required|min:0|integer',
        ], [
            'name.required' => 'Tên gói là bắt buộc.',
            'name.max' => 'Tên gói không được vượt quá 255 ký tự.',
            'duration.required' => 'Số ngày là bắt buộc.',
            'duration.min' => 'Số ngày phải lớn hơn 0.',
            'duration.integer' => 'Số ngày phải là số nguyên dương.',
            'duration.max' => 'Số ngày phải nhỏ hơn hoặc bằng 365.',
            'price.required' => 'Giá gói là bắt buộc.',
            'price.min' => 'Giá gói không được âm.',
            'price.integer' => 'Giá gói phải là số nguyên dương.',
        ]);
        $name = $request->input('name');
        $duration = $request->input('duration');
        $price = $request->input('price');
        $subscriptionsUpdate = Subscription_plans::find($id);
        $subscriptionsUpdate->name = $name;
        $subscriptionsUpdate->duration = $duration;
        $subscriptionsUpdate->price = $price;
        if($subscriptionsUpdate->save()){
            return redirect('admin/payment/list');
        }
    }

    
    public function admin__delete($id){
        $subscriptionsDelete = Subscription_plans::find($id);
        $subscriptionsDelete->isDeleted = 1;
        if($subscriptionsDelete->save()){
            return response()->json([
                "success" => true
            ]);
        }
    }

    public function payment(){
        $subscription_plan = DB::table("subscription_plans")->where("id",request("subscription"))->first();
        // dd(env('VNP_TMN_CODE'));
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route("subscription.payment.return", request("subscription"));
        $vnp_TmnCode = "2R3EHRKU";//Mã website tại VNPAY 
        $vnp_HashSecret = "S9N8HBWL018SAE8XC9N1RUS281OF2UW1"; //Chuỗi bí mật
        
        $vnp_TxnRef = time();
        $vnp_OrderInfo = "Thanh toán " . $subscription_plan->name;
        $vnp_OrderInfo = Str::slug($vnp_OrderInfo, ' ');  // Chuyển sang không dấu
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $subscription_plan->price * 100;
        $vnp_Locale = "vn";
        // $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version

        //Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode(mb_convert_encoding($value, 'UTF-8', 'auto'));
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode(mb_convert_encoding($value, 'UTF-8', 'auto'));
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode(mb_convert_encoding($value, 'UTF-8', 'auto')) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }

    public function payment__return(Request $request, $id_plan)
    {
        $vnp_HashSecret = "S9N8HBWL018SAE8XC9N1RUS281OF2UW1";
        $vnp_SecureHash = $request->input('vnp_SecureHash'); 
        $inputData = array();

        // Lọc các tham số của VNPAY từ request
        foreach ($request->query() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= (empty($hashData) ? '' : '&') . urlencode($key) . "=" . urlencode($value);
        }

        // Kiểm tra tính hợp lệ của hash
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash == $vnp_SecureHash) {
            if ($request->input('vnp_ResponseCode') == '00') {
                // Kiểm tra xem gói cước có tồn tại không
                $subscriptionPlan = DB::table('subscription_plans')->where('id', $id_plan)->first();
                if (!$subscriptionPlan) {
                    return redirect()->route('subscription')->with('error', 'Gói cước không tồn tại!');
                }

                // Kiểm tra xem người dùng đã có subscription chưa
                $subscription = DB::table('subscriptions')->where('id_user', auth()->id())->where('id_plan', $id_plan)->first();

                if ($subscription) {
                    // Cập nhật subscription nếu đã có
                    DB::table('subscriptions')->where('id', $subscription->id)->update([
                        'start_date' => now(),
                        'end_date' => now()->addDays($subscriptionPlan->duration),
                        'payment_status' => 1,
                    ]);
                    $subscription_id = $subscription->id;
                } else {
                    // Tạo mới subscription nếu chưa có
                    $subscription_id = DB::table('subscriptions')->insertGetId([
                        'id_user' => auth()->id(),
                        'id_plan' => $subscriptionPlan->id,
                        'start_date' => now(),
                        'end_date' => now()->addDays($subscriptionPlan->duration),
                        'payment_status' => 1,
                    ]);
                }

                // Thêm bản ghi payment vào bảng Payments
                DB::table('payments')->insert([
                    'id_sub' => $subscription_id,
                    'amount' => $subscriptionPlan->price,
                    'date' => now(),
                    'method' => 'VNPAY',
                    'transactionID' => $request->input('vnp_TransactionNo'),
                    'order_ref' => $request->input('vnp_TxnRef'),
                    'status' => 'paid',
                    'id_user' => auth()->id(),
                ]);

                DB::table("users")->where("id", auth()->user()->id)->update([
                    "premium" => 1
                ]);
                // Gửi email
                Mail::to(auth()->user()->email)->send(new PaymentSuccessMail(auth()->user(), $subscriptionPlan));
                
                DB::table('notifications')->insert([
                    'id_receive_user' => auth()->user()->id,
                    'content' => "{$subscriptionPlan->name} đã được thanh toán thành công! Cảm ơn bạn đã sử dụng dịch vụ"
                ]);

                return redirect()->route('profile')->with('success', 'Thanh toán thành công!');
            } else {
                return redirect()->route('subscription')->with('error', 'Thanh toán thất bại!');
            }
        } else {
            return redirect()->route('subscription')->with('error', 'Dữ liệu không hợp lệ!');
        }
    }
    
}
