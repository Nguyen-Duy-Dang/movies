@extends('layouts.layout-admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="main__title">
                <h2>Thêm phim</h2>
            </div>
        </div>
    
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
        <div class="col-12">
            <div class="sign__wrap">
                    <!-- biểu mẫu chi tiết -->

                        <form action="{{route('admin.movie.add')}}" enctype="multipart/form-data" class="sign__form sign__form--profile sign__form--first" method="post">
                            @csrf 
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="sign__title">Chi tiết</h4>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">Tiêu đề</label>
                                        <input type="text" name="title" class="sign__input input__data" placeholder="Tiêu đề">
                                        <span class="input__error" style="color: #df4a32">Tiêu đề là bắt buộc!</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">Hình ảnh</label>
                                        <input type="file" name="thumbnail_add" class="sign__input input__data">
                                        <span class="input__error" style="color: #df4a32">Hình ảnh là bắt buộc!</span>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">Diễn viên</label>
                                        <input type="text" name="cast" class="sign__input input__data" placeholder="Diễn viên" value="{{old('cast')}}">
                                        <span class="input__error" style="color: #df4a32">Diễn viên là bắt buộc!</span>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">Đạo diễn</label>
                                        <input type="text" name="director" class="sign__input input__data" placeholder="Đạo diễn" value="{{old('director')}}">
                                        <span class="input__error" style="color: #df4a32">Đạo diễn là bắt buộc!</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">Năm phát hành</label>
                                        <input type="number " name="release_year" class="sign__input input__data" placeholder="Năm phát hành" value="{{old('release_year')}}">
                                        <span class="input__error" style="color: #df4a32">Năm phát hành là bắt buộc</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">Quốc gia</label>
                                        <input type="text" name="country" class="sign__input input__data" placeholder="Quốc gia" value="{{old('country')}}">
                                        <span class="input__error" style="color: #df4a32">Quốc gia là bắt buộc!</span>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">Thời lượng (phút)</label>
                                        <input type="number " name="duration" class="sign__input input__data" placeholder="Thời lượng" value="{{old('duration')}}">
                                        <span class="input__error" style="color: #df4a32">Thời lượng là bắt buộc!</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label" for="status">Tình trạng</label>
                                        <select class="js-example-basic-single input__data" id="status" name="status">
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                        <span class="input__error" style="color: #df4a32"></span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label" for="id_category">Danh mục</label>
                                        <select class="js-example-basic-single input__data" id="id_category" name="id_category">
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input__error" style="color: #df4a32"></span>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label" for="isSeries">Phim bộ</label>
                                        <select class="js-example-basic-single input__data" id="isSeries" name="isSeries">
                                           <option value="0" selected>Không</option>
                                           <option value="1">Phải</option>
                                        </select>
                                        <span class="input__error" style="color: #df4a32"></span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                                    <div class="sign__group">
                                        <label class="sign__label">Mô tả</label>
                                        <textarea class="sign__textarea input__data" name="description" id="" cols="30" rows="10" placeholder="Mô tả">{{old('description')}}</textarea>
                                        <span class="input__error" style="color: #df4a32">Mô tả là bắt buộc!</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 d-flex" style="padding-right: 0">
                                    <h2 class="sign__title" style="width: fit-content;margin-right:auto">Đường dẫn</h2>
                                    <button class="btn add__button" style="height: fit-content" id="add__url" type="button" disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                                    </button>
                                </div>
                                <div id="url__items" style="width:100%" >
                                    <div class="row item__url" type__url="movie">
                                        <div class="col-12 d-flex">
                                            <h4 class="sign__title-small">Đường dẫn 1</h4>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                                            <div class="sign__group">
                                                <div class="d-flex justify-content-between">
                                                    <label class="sign__label label__video__input">Video</label>
                                                    <div class="d-flex">
                                                        <div class="d-flex mr-2">
                                                            <label class="sign__text" style="margin: 0 10px 0 0">Tải lên file</label>
                                                            <input type="radio" class="sign__input--radio change__video__input sign__input--radio-checked" value="file">
                                                        </div>
                                                        <div class="d-flex">
                                                            <label class="sign__text" style="margin: 0 10px 0 0">Tự điền</label>
                                                            <input type="radio" class="sign__input--radio change__video__input" value="url">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="file" name="url[]" class="sign__input video__input">
                                                <span style="color: #df4a32" class="video__input__error"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" class="video__uploaded">
                                        <div class="col-12 col-md-4 col-lg-12 col-xl-4">
                                            <div class="sign__group">
                                                <label class="sign__label">Server</label>
                                                <select class="sign__select server__select" name="server[]">
                                                    <option value="">Chưa chọn</option>
                                                    <option value="server 1">Server 1</option>
                                                    <option value="server 2">Server 2</option>
                                                    <option value="server 3">Server 3</option>
                                                </select>
                                                <span style="color: #df4a32;text-transform: capitalize" class="server__select__error"></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-12 col-xl-4">
                                            <div class="sign__group">
                                                <label class="sign__label">Độ phân giải</label>
                                                <select class="sign__select resolution__select" name="resolution[]" disabled>
                                                    <option value="">Chọn server trước</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-12 col-xl-4">
                                            <div class="sign__group">
                                                <label class="sign__label">Premium</label>
                                                <select class="sign__select premium__select" name="premium[]">
                                                    <option value="0">Không</option>
                                                    <option value="1">Có</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="upload__progress__container">
                                                <div class="upload__progress__bar">0%</div>
                                            </div>
                                            <button class="sign__btn sign__btn--upload" uploaded="true" type="button">Tải lên</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="sign__btn submit__btn" type="button" type__add="movie" is__add="true" disabled>Lưu</button>
                            </div>
                        </form>
                    </div>
                    <!-- kết thúc biểu mẫu chi tiết -->
            </div>
                <!-- end content tabs -->
        </div>
    </div>
</div>
@endsection
