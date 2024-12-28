<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Slides;
use Illuminate\Http\Request;
use App\Http\Requests\Validate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    public function admin__view(){
        $slides = Slides::with('movie')
        ->where("isDeleted",0)
        ->orderBy('id','desc')
        ->paginate(request()->input('per_page', 8), ['*'], 'page', request()->input('page', 1));
        // dd($slides);
        return view('admins.slides.list', [
            "slides" => $slides,
            "selected" => "slide"
        ]);
    }

    public function admin__add(){
        $movies = DB::table("movies")
        ->where('isDeleted',0)
        ->where('status',1)
        ->get();

        return view('admins.slides.add', [
            "movies" => $movies,
            "selected" => "slide"
        ]);
    }

    public function admin__update__form($id){
        $movies = DB::table("movies")
        ->where('isDeleted',0)
        ->where('status',1)
        ->get();
        $slide = Slides::with('movie')->find($id);
        return view('admins.slides.update', [
            "movies" => $movies,
            "slide" => $slide,
            "selected" => "slide"
        ]);
    }
    public function admin__create(Validate $request)
    {
        $validated = $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,svg,webp,png',
        ], [
            'image.required' => 'Hình ảnh là bắt buộc.',
            'image.mimes' => 'Hình ảnh phải thuộc loại: jpeg, png, jpg, svg, webp.'
        ]);

        $image = $validated['image'];
        $uniqueName = time() . '_' . $image->getClientOriginalName();
        $imagePath = 'images/slides/' . $uniqueName;
        $image->move(public_path('images/slides'), $uniqueName);
    

        // Lưu thông tin slide vào cơ sở dữ liệu
        Slides::create([
            'id_movie' => $request->id_movie,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.slide.list')->with('success', 'Slide đã được thêm!');
    }

    // update slide
    public function admin__update(Validate $request, $id)
    {
        // Xác thực dữ liệu
        $validated = $request->validated();
    
        // Lấy slide cũ từ database
        $slide = Slides::findOrFail($id);
    
        // Kiểm tra nếu có hình ảnh mới
        if ($request->hasFile('thumbnail')) {
            // Xóa hình ảnh cũ (nếu có)
            if (file_exists(public_path($slide->image))) {
                unlink(public_path($slide->image));
            }
    
            // Lưu hình ảnh mới
            $image = $request->file('thumbnail');
            $uniqueName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'images/slides/' . $uniqueName;
            $image->move(public_path('images/slides'), $uniqueName);
    
            // Cập nhật đường dẫn hình ảnh trong cơ sở dữ liệu
            $slide->image = $imagePath;
        }
    
        // Cập nhật các thông tin khác của slide
        $slide->id_movie = $request->id_movie;
        $slide->status = $request->status;
    
        // Lưu thông tin đã cập nhật
        $slide->save();
    
        // Quay lại danh sách với thông báo thành công
        return redirect()->route('admin.slide.list')->with('success', 'Slide đã được cập nhật!');
    }
    public function admin__status__update($id){
        $show = false;
        $status = DB::table("slides")->where("id", $id)->value("status");
        
        if ($status == 0) {
            DB::table("slides")->where("id", $id)->update([
                "status" => 1
            ]);
            $show = true;
        } else {
            DB::table("slides")->where("id", $id)->update([
                "status" => 0
            ]);
        }
        return response()->json([
            "show" => $show,
            "success" => true
        ]);
    }
    public function admin__delete($id){
        $url = DB::table("slides")->where("id",$id)->update([
            "isDeleted" => 1
        ]);
        return response()->json([
            "success" => true
        ]);
    }
}