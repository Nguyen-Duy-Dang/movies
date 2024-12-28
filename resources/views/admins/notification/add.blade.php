@extends('layouts.layout-admin')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="main__title">
				<h2>Thêm Thông báo</h2>
			</div>
		</div>

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
				<div class="col-12">
					<div class="sign__wrap">
						<div class="">
							<!-- biểu mẫu chi tiết -->
							<div class="">
								<form action="/admin/notification/add" class="sign__form sign__form--profile sign__form--first" method="post">
									@csrf
									<div class="row">
										<div class="col-12">
											<h4 class="sign__title">Thông báo</h4>
										</div>

										<div class="col-12 col-md-6 col-lg-12 col-xl-12">
											<div class="sign__group">
												<label class="sign__label" for="id_receive_user">Người nhận</label>
												<input type="text" value="Tất cả" class="sign__input" name="id_receive_user" disabled>
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-12 col-xl-12">
											<div class="sign__group">
												<label class="sign__label" for="content">Nội dung</label>
												<textarea id="content" class="sign__input" name="content"></textarea>
												@error('content')
													<span style="color: #df4a32">{{$message}}</span>
												@enderror
											</div>
										</div>
										<!-- <div class="col-12 col-md-6 col-lg-12 col-xl-6">
											<div class="sign__group">
												<label class="sign__label" for="status">Trạng thái</label>
												<input id="status" type="number" class="sign__input" name="status">
											</div>
										</div>

										<div class="col-12 col-md-6 col-lg-12 col-xl-6">
											<div class="sign__group">
												<label class="sign__label" for="created_at">Ngày tạo</label>
												<input id="created_at" type="date" class="sign__input" name="created_at">
											</div>
										</div> -->

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