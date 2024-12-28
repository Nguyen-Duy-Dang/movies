@extends('layouts.layout-admin')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="main__title">
					<h2>Người dùng</h2>
				</div>
			</div>
			<div class="col-12">
				<div class="main__table-wrap">
					<table class="main__table">
						<thead>
							<tr>
								<th>TÊN</th>
								<th>EMAIL</th>
								<th>HÌNH ẢNH</th>
								<th>TÌNH TRẠNG</th>
								<th>PREMIUM</th>
								<th>VAI TRÒ</th>
								<th>HÀNH ĐỘNG</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($users as $user)
							<tr class="tr__remove" id_remove="{{$user->id}}">
								<td>
									<div class="main__table-text">{{$user->name}}</div>
								</td>
								<td>
									<div class="main__table-text">{{$user->email}}</div>
								</td>
								<td>
									<div class="main__table-text"><img src="{{ asset($user->image) }}" alt=""></div>
								</td>
								<td>
                                    @if ($user->status == 0)
										<div class="main__table-text main__table-text--red status__item__update">Bị cấm</div>
                                    @else
										<div class="main__table-text main__table-text--green status__item__update">Bình thường</div>
                                    @endif
								</td>
								<td>
                                    @if ($user->premium == 0)
										<div class="main__table-text main__table-text--red">Không</div>
                                    @else
										<div class="main__table-text main__table-text--green">Có</div>
                                    @endif
								</td>
								<td>
									@if ($user->role == "admin")
										<div class="main__table-text">Admin</div>
									@elseif($user->role == "staff")
										<div class="main__table-text">Nhân viên</div>
									@else
										<div class="main__table-text">Khách hàng</div>
									@endif
								</td>
								<td>
									<div class="main__table-btns">
										@if ($user->role !== "admin")
											@if ($user->role == "user" || $user->id == auth()->id() || auth()->user()->role == "admin")
												<button class="main__table-btn main__table-btn--view status__update__btn" id_status="{{$user->id}}" type_status="user">
													<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z"/></svg>
												</button>
											@else
												<button class="main__table-btn main__table-btn--delete status__update__btn" disabled>
													<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z"/></svg>
												</button>
											@endif
										@elseif($user->role == "admin" && auth()->user()->role !== "admin")
											<button class="main__table-btn main__table-btn--delete status__update__btn" disabled>
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
											</button>
										@endif

										@if (auth()->user()->role !== "admin")
											@if (auth()->user()->role == "staff" && $user->role == "user")
												<a href="/admin/user/update/{{$user->id}}" class="main__table-btn main__table-btn--edit">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
												</a>
											@else
												@if ($user->id == auth()->id())
													<a href="/admin/user/update/{{$user->id}}" class="main__table-btn main__table-btn--edit">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
													</a>
												@endif
											@endif
										@else
											<a href="/admin/user/update/{{$user->id}}" class="main__table-btn main__table-btn--edit">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
											</a>
										@endif


										@if (auth()->user()->role == "admin")
											@if ($user->role !== "admin")
												<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$user->id}}" type_remove="user">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
												</a>
											@endif
										@else
											@if($user->role == "staff" && auth()->id() == $user->id)
												<a href="#modal-delete" class="hehe main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$user->id}}" type_remove="user">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
												</a>
											@elseif($user->role == "user")
												<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$user->id}}" type_remove="user">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
												</a>
											@endif
										@endif
									</div>
								</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
					<!-- paginator -->
					<div class="col-12">
					<div class="paginator paginator__container">
					  <span class="paginator__pages"></span>
		
					  <ul class="paginator__paginator" type_paginator="user" page="{{request()->input("page",1)}}">
					  </ul>
					</div>
					</div>
					<!-- end paginator -->
                </div>
			</div>
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
