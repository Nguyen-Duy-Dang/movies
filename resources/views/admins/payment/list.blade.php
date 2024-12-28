@extends('layouts.layout-admin')
@section('content')
<div class="container-fluid">
	<div class="row">
		<!-- tiêu đề chính -->
		<div class="col-12">
			<div class="main__title">
				<h2>Thanh toán</h2>

			</div>
		</div>

		<!-- users -->
		<div class="col-12">
			<div class="main__table-wrap">
				<table class="main__table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên</th>
							<th>Thời hạn</th>
							<th>Giá</th>
							<th>Ngày tạo</th>
							<th>Hành động</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($subscriptions as $subscription)
						<tr class="tr__remove" id_remove="{{$subscription->id}}">
							<td>
								<div class="main__table-text">{{ $subscription->id }}</div>
							</td>
							<td>
								<div class="main__table-text">{{ $subscription->name }}</div>
							</td>
							<td>
								<div class="main__table-text">{{ $subscription->duration }} Ngày</div>
							</td>
							<td>
								<div class="main__table-text">{{$subscription->price ? number_format($subscription->price, 0, ',', '.') : '0'}} VND</div>
							</td>
							<td>
								<div class="main__table-text">{{ $subscription->created_at }}</div>
							</td>


							<td>
								<div class="main__table-btns">
									<a href="/admin/payment/update/{{$subscription->id}}" class="main__table-btn main__table-btn--edit">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" />
										</svg>
									</a>
									@if ($subscription->subscriptions->contains(function ($item) {
										return $item->end_date > time();
									}))
										<button class="main__table-btn main__table-btn--delete" disabled>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
										</button>
									@else
										<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$subscription->id}}" type_remove="payment">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
										</a>
									@endif
								</div>
							</td>
							@endforeach
					</tbody>
				</table>
				<!-- paginator -->
				<div class="col-12">
				  <div class="paginator paginator__container">
					<span class="paginator__pages"></span>
	  
					<ul class="paginator__paginator" type_paginator="subscription_plan" page="{{request()->input("page",1)}}">
					</ul>
				  </div>
				</div>
				<!-- end paginator -->
			</div>
		<!-- end users -->


	</div>
</div>

<!-- end main content -->
 <!-- modal delete -->
 <div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
	<h6 class="modal__title">Xóa mục</h6>

	<p class="modal__text">Bạn có chắc chắn muốn xóa mục này không?</p>

	<div class="modal__btns">
	   <button class="modal__btn modal__btn--apply" id="modal__remove__btn" type="button">Xóa</button>
	   <button class="modal__btn modal__btn--dismiss" type="button">Bỏ qua</button>
	</div>
  </div>
  <!-- end modal delete -->
@endsection