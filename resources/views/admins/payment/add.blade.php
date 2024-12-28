@extends('layouts.layout-admin')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="main__title">
				<h2>Thêm Thanh Toán</h2>
			</div>
		</div>

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
				<div class="col-12">
					<div class="sign__wrap">
						<div class="">
							<!-- biểu mẫu chi tiết -->
							<div class="">
								<form action="/admin/payment/add" class="sign__form sign__form--profile sign__form--first" method="post">
									@csrf
									<div class="row">
										<div class="col-12">
											<h4 class="sign__title">Chi tiết</h4>
										</div>

										<div class="col-12 col-md-6 col-lg-12 col-xl-6">
											<div class="sign__group">
												<label class="sign__label" for="username">Tên gói</label>
												<input id="username" type="text" class="sign__input" name="name" value="{{old('name')}}">
												@error('name')
													<span style="color: #df4a32">{{$message}}</span>
												@enderror
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-12 col-xl-6">
											<div class="sign__group">
												<label class="sign__label" for="price">Số ngày</label>
												<input id="price" type="number" class="sign__input" name="duration" value="{{old('duration')}}">
												@error('duration')
													<span style="color: #df4a32">{{$message}}</span>
												@enderror
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-12 col-xl-6">
											<div class="sign__group">
												<label class="sign__label" for="price">Giá</label>
												<input id="price" type="number" class="sign__input" name="price" value="{{old('price')}}">
												@error('price')
													<span style="color: #df4a32">{{$message}}</span>
												@enderror
											</div>
										</div>
										<div class="col-12">
											<button class="sign__btn" type="submit">Thêm</button>
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