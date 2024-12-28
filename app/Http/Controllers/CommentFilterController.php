<?php

namespace App\Http\Controllers;

use App\Models\Comment_Filters;
use Illuminate\Http\Request;

class CommentFilterController extends Controller
{
    public function listAdmin()
    {
        $commentFilters = Comment_Filters::orderBy('created_at','desc')->paginate(request()->input('per_page', 8), ['*'], 'page', request()->input('page', 1));; 
        return view('admins.comment_filter.list', ['commentFilters' => $commentFilters, "selected" => "comment_filter"]);
    }

    // Show the form for creating a new comment filter
    public function create()
    {
        return view('admins.comment_filter.create');
    }

    // Store a new comment filter
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'content' => 'required|max:255',
        ],[
            'content.required' => 'Nội dung là bắt buộc.',
            'content.max' => 'Nội dung phải ít hơn hoặc bằng 255 kí tự.',
        ]);
        // Create the new comment filter
        Comment_Filters::create([
            'content' => $request->content,
        ]);

        // Redirect back to the list with a success message
        return redirect()->route('comment_filter.listAdmin')->with('success', 'Lọc bình luận đã thêm thành công!');
    }
    public function destroy($id)
    {
        // Find the comment filter by its ID
        $commentFilter = Comment_Filters::findOrFail($id);

        // Delete the comment filter
        $commentFilter->delete();

        // Redirect back with a success message
        return response()->json([
            "success" => true
        ]);
    }
    
}