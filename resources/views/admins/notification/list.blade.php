@extends('layouts.layout-admin')
@section('content')
<div class="container-fluid">
	<div class="row">
		<!-- tiêu đề chính -->
		<div class="col-12">
			<div class="main__title">
				<h2>Thông báo</h2>

			</div>
		</div>

		<!-- users -->
		<div class="col-12">
			<div class="main__table-wrap">
				<table class="main__table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Người gửi</th>
							<th>Gửi tới</th>
							<th>Nội dung</th>
							<th>Ngày tạo</th>
							<th>Hành động</th>
						</tr>
					</thead>

					<tbody>
						@foreach($notifications as $notification)
						<tr class="tr__remove" id_remove="{{$notification->id }}">
							<td>
								<div class="main__table-text">{{ $notification->id  }}</div>
							</td>
							<td>
								<div class="main__table-text">{{ $notification->send_user->name }}</div>
							</td>
							<td>
								@if ($notification->receive_users->count() > 1)
									<div class="status__item__update main__table-text main__table-text--green">Tất cả</div>
								@else
									<div class="status__item__update main__table-text">{{ $notification->receive_users[0]->name }}</div>
								@endif
							</td>
							<td>
								<div class="main__table-text limit__text">{{ $notification->content }}</div>
							</td>
							<td>
								<div class="main__table-text">{{ $notification->created_at }}</div>
							</td>
						

						<td>
							<div class="main__table-btns">
								<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$notification->id}}" type_remove="notification">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
										<path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
									</svg>
								</a>

							</div>
						</td>
						@endforeach
					</tbody>
				</table>
			</div>
			<div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
				<h6 class="modal__title">Xóa mục</h6>

				<p class="modal__text">Bạn có chắc chắn muốn xóa mục này không?</p>

				<div class="modal__btns">
					<button class="modal__btn modal__btn--apply" id="modal__remove__btn" type="button">Xóa</button>
					<button class="modal__btn modal__btn--dismiss" type="button">Bỏ qua</button>
				</div>
			</div>
		</div>
		<!-- end users -->


	</div>
</div>

<!-- end main content -->
@endsection