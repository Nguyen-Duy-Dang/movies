@extends('layouts.layout-admin')
@section('content')
    <div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="main__title">
					<h2>Sửa slides</h2>
				</div>
			</div>
            <div class="col-12">
                <div class="profile__content">
                    <!-- người dùng hồ sơ -->
                    <div class="profile__user">
                        <!-- hoặc đỏ -->
                        <div class="profile__meta profile__meta--green">
                            <h3>ID: {{$slide->id}}</h3>
                            <span>Phim: {{$slide->movie->title}}</span>
                        </div>
                    </div>
                    <!-- kết thúc người dùng hồ sơ -->
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                <div class="col-12">
                    <div class="sign__wrap">
                        <div class="">
                            <!-- biểu mẫu chi tiết -->
                            <div class="">
                                <form action="{{route('admin.slide.update',$slide->id)}}" method="POST" enctype="multipart/form-data"  class="sign__form sign__form--profile sign__form--first">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="sign__title">Chi tiết</h4>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <div class="sign__group">
                                                <label class="sign__label">ID</label>
                                                <input disabled type="text" class="sign__input" value="{{$slide->id}}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <div class="sign__group sign__group__select">
                                                <label class="sign__label">Phim</label>
                                                <select class="select__admin" name="id_movie">
                                                    @foreach ($movies as $movie)
                                                        <option @selected($slide->id_movie == $movie->id) value="{{$movie->id}}">{{$movie->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <div class="sign__group">
                                                <label class="sign__label" for="">Hình ảnh</label>
                                                <div>
                                                    <img class="sign__image" src="{{asset($slide->image)}}" alt="">
                                                    <input type="file" name="thumbnail" class="sign__input">
                                                    @error('thumbnail')
                                                        <span style="color: #df4a32">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    

                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <div class="sign__group sign__group__select">
                                                <label class="sign__label" >Tình trạng</label>
                                                <select class="select__admin" name="status">
                                                    <option @selected($slide->status == 1) value="1">Hiển thị</option>
                                                    <option @selected($slide->status == 0) value="0">Ẩn</option>
                                                </select>
                                            </div>
                                        </div>

                                

                                        <div class="col-12">
                                            <button class="sign__btn">Lưu</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- kết thúc biểu mẫu chi tiết -->
                    </div>
                        <!-- end content tabs -->
            </div>
        </div>
	</div>
	<!-- end main content -->
@endsection
