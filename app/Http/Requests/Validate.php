<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' =>'sometimes|required',
            'email' => 'sometimes|required|email',
            'password' => 'sometimes|required|min:8',
            'content' => 'sometimes|required|min:8',
            'thumbnail' => 'sometimes|image|mimes:jpeg,jpg,svg,webp,png',
            'title' => 'sometimes|required|string|max:255',
            'cast' => 'sometimes|required|string|max:255',
            'director' => 'sometimes|required|string|max:255',
            'release_year' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
            'country' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'duration' => 'sometimes|required|integer|min:1',
            'comment'=> 'sometimes|required|max:255',
            'filter_comment'=> 'sometimes|required|max:50',
            "episode" => "sometimes|required|min:1",
        ];

        // Nếu có tệp thumbnail thì kiểm tra các quy tắc cho thumbnail
        if ($this->hasFile('thumbnail')) {
            $rules['thumbnail'] = 'file|mimes:jpeg,jpg,svg,webp,png';
        }
        
        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nội dung là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirm' => 'Mật khẩu không khớp.',
            'content.required' => 'Tin nhắn là bắt buộc.',
            'content.min' => 'Tin nhắn phải có ít nhất 8 ký tự.',
            'thumbnail.mimes' => 'Hình ảnh phải thuộc loại: jpeg, png, jpg, svg, webp.',
            'title.required' => 'Tiêu đề là bắt buộc.',
            'cast.required' => 'Diễn viên là bắt buộc.',
            'director.required' => 'Đạo diễn là bắt buộc.',
            'release_year.required' => 'Năm phát hành là bắt buộc.',
            'country.required' => 'Quốc gia là bắt buộc.',
            'description.required' => 'Mô tả là bắt buộc.',
            'duration.required' => 'Thời lượng là bắt buộc.',
            'episode.required' => 'Tập phim là bắt buộc.',
        ];
    }
}
