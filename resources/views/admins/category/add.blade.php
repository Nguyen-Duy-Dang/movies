@extends('layouts.layout-admin')
@section('content')
    <div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="main__title">
					<h2>Thêm danh mục</h2>
				</div>
			</div>

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
			<div class="col-12">
				<div class="sign__wrap">
					<div class="">
						<!-- biểu mẫu chi tiết -->
						<div class="">
						<form action="{{ route('admin.category.create') }}" method="POST" class="sign__form sign__form--profile sign__form--first">
								@csrf
								<div class="row">
									<div class="col-12">
										<h4 class="sign__title">Chi tiết</h4>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group">
											<label class="sign__label" for="username">ID</label>
											<input id="username" type="text" disabled class="sign__input" value="Auto">
										</div>
									</div>
									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group">
											<label class="sign__label" for="name">Nội dung</label>
											<input id="name" type="text" name="name" class="sign__input" placeholder="Nội dung">
											@error('name')
												<span style="color: #df4a32">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group">
											<label class="sign__label" for="username">Ngày tạo</label>
											<input id="username" type="text" disabled class="sign__input" value="Auto">
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
@endsection
