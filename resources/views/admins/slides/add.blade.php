@extends('layouts.layout-admin')
@section('content')
    <div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="main__title">
					<h2>Thêm slides</h2>
				</div>
			</div>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
			<div class="col-12">
				<div class="sign__wrap">
					<div class="">
						<!-- biểu mẫu chi tiết -->
						<div class="">
							<form action="{{route('admin.slide.add')}}" method="POST" enctype="multipart/form-data" class="sign__form sign__form--profile sign__form--first">
							@csrf
								<div class="row">
									<div class="col-12">
										<h4 class="sign__title">Chi tiết</h4>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group">
											<label class="sign__label">ID</label>
											<input disabled type="text" class="sign__input" placeholder="Auto">
										</div>
									</div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group sign__group__select">
											<label class="sign__label">Phim</label>
											<select class="select__admin" name="id_movie">
												@foreach ($movies as $movie)
													<option value="{{$movie->id}}">{{$movie->title}}</option>
												@endforeach
											</select>
										</div>
									</div>
                                    
									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group">
											<label class="sign__label" for="">Hình ảnh</label>
											<input type="file" name="image" class="sign__input">
											@error('image')
												<span style="color: #df4a32">{{$message}}</span>
											@enderror
										</div>
									</div>

								

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group sign__group__select">
											<label class="sign__label" >Tình trạng</label>
											<select class="select__admin" name="status">
												<option value="1">Hiển thị</option>
												<option value="0">Ẩn</option>
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
