@extends('layouts.layout-admin')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="main__title">
					<h2>Nhân viên</h2>
				</div>
			</div>

			<div class="col-12">
				<h3 style="color: #ffffff;font-weight:500;margin-bottom:20px;font-size:23px">Admin</h3>
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
								@if ($user->role == "admin")
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
										<div class="status__item__update main__table-text main__table-text--red">Bị cấm</div>
										
										@else
										<div class="status__item__update main__table-text main__table-text--green">Bình thường</div>
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
											@if (auth()->user()->role == "admin")
												<a href="/admin/user/update/{{$user->id}}" class="main__table-btn main__table-btn--edit">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
												</a>
											@else
												<button class="main__table-btn main__table-btn--delete" disabled>
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
												</button>
											@endif
										</div>
									</td>
									<!-- modal delete -->
									<!-- end modal delete -->
								@endif
							@endforeach
                        </tbody>
                    </table>
                </div>
			</div>

			<div class="col-12">
				<h3 style="color: #ffffff;font-weight:500;margin:20px 0;font-size:23px">Nhân viên</h3>
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
								@if ($user->role == "staff")
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
										<div class="status__item__update main__table-text main__table-text--red">Bị cấm</div>
										
										@else
										<div class="status__item__update main__table-text main__table-text--green">Bình thường</div>
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
											<div class="role__item__update main__table-text">Admin</div>
										@elseif($user->role == "staff")
											<div class="role__item__update main__table-text">Nhân viên</div>
										@else
											<div class="role__item__update main__table-text">Khách hàng</div>
										@endif
									</td>
									<td>
										<div class="main__table-btns">
											@if (auth()->user()->role == "admin" || $user->id == auth()->id())
												<a href="/admin/user/update/{{$user->id}}" class="main__table-btn main__table-btn--edit">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
												</a>
											@else
												<button class="main__table-btn main__table-btn--delete" disabled>
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
												</button>
											@endif
											@if (auth()->user()->role == "admin")
												<a href="#modal-role" class="main__table-btn main__table-btn--view open-modal role__update__btn" id_update="{{$user->id}}">
													<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M790-57 488-359q-32 54-87 86.5T280-240q-100 0-170-70T40-480q0-66 32.5-121t86.5-87L57-790l57-56 732 733-56 56Zm50-543 120 120-183 183-127-126 50-37 72 54 75-74-40-40H553l-80-80h367ZM280-320q51 0 90.5-27.5T428-419l-56-56-48.5-48.5L275-572l-56-56q-44 18-71.5 57.5T120-480q0 66 47 113t113 47Zm0-80q-33 0-56.5-23.5T200-480q0-33 23.5-56.5T280-560q33 0 56.5 23.5T360-480q0 33-23.5 56.5T280-400Z"/></svg>
												</a>
												<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$user->id}}" type_remove="user">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
												</a>
											@endif
										</div>
									</td>
								</tr>
								@endif
							@endforeach
                        </tbody>
                    </table>
                </div>
			</div>

			<div class="col-12">
				<h3 style="color: #ffffff;font-weight:500;margin:20px 0;font-size:23px">Người dùng</h3>
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
								@if ($user->role == "user")
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
										<div class="status__item__update main__table-text main__table-text--red">Bị cấm</div>
										
										@else
										<div class="status__item__update main__table-text main__table-text--green">Bình thường</div>
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
											@if (auth()->user()->role == "admin")
												<a href="/admin/user/update/{{$user->id}}" class="main__table-btn main__table-btn--edit">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
												</a>
											@endif
											
											<a href="#modal-role" class="main__table-btn main__table-btn--banned open-modal role__update__btn" id_update="{{$user->id}}">
												<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-720q-33 0-56.5-23.5T400-800q0-33 23.5-56.5T480-880q33 0 56.5 23.5T560-800q0 33-23.5 56.5T480-720ZM360-80v-520H120v-80h720v80H600v520h-80v-240h-80v240h-80Z"/></svg>
											</a>

											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$user->id}}" type_remove="user">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
											</a>
										</div>
									</td>
								</tr>
								@endif
							@endforeach
                        </tbody>
                    </table>
					<!-- paginator -->
					<div class="col-12">
					<div class="paginator paginator__container">
					  <span class="paginator__pages"></span>
		
					  <ul class="paginator__paginator" type_paginator="employee_user" page="{{request()->input("page",1)}}">
					  </ul>
					</div>
					</div>
					<!-- end paginator -->
                </div>
			</div>
		</div>
	</div>
			
			<!-- end main content -->
			
			
	<!-- modal role -->
	<div id="modal-role" class="zoom-anim-dialog mfp-hide modal">
	<h6 class="modal__title">Thay đổi vai trò</h6>
	<p class="modal__text">Bạn có chắc chắn muốn thay đổi vai trò người dùng này không?</p>
	<div class="modal__btns">
		<button class="modal__btn modal__btn--apply" id="modal__role__btn" type="button">Có</button>
		<button class="modal__btn modal__btn--dismiss" type="button">Bỏ qua</button>
	</div>
	</div>
	 <!-- end modal role -->
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
