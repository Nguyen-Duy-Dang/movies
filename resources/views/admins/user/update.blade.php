@extends('layouts.layout-admin')
@section('content')
    <div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="main__title">
					<h2>Chỉnh sửa người dùng</h2>
				</div>
			</div>
			<div class="col-12">
						<div class="profile__content">
							<!-- người dùng hồ sơ -->
							<div class="profile__user">
								<div class="profile__avatar">
									<img src="{{asset($user->image)}}" alt="">
								</div>
								<!-- hoặc đỏ -->
								<div class="profile__meta profile__meta--green">
									<h3>{{$user->name}}<span>@if ($user->email_verified_at) (Đã phê duyệt) @endif</span></h3>
									<span>ID: {{$user->id}}</span>
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
							<form action="{{ route('admin.user.update') }}" method="POST" enctype="multipart/form-data" class="sign__form sign__form--profile sign__form--first">
                                @csrf
								<div class="row">
									<div class="col-12">
										<h4 class="sign__title">Chi tiết hồ sơ</h4>
									</div>
                                    <div class="sign__group">
										<input id="username" type="hidden" value="{{$user->id}}" name="id" class="sign__input" >
									</div>
									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group">
											<label class="sign__label" for="username">Tên :</label>
											<input id="username" type="text" value="{{$user->name}}" name="name" class="sign__input">
											@error('name')
												<span style="color: #df4a32">{{$message}}</span>
											@enderror
										</div>
									</div>
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group mt-4">
                                            <label class="sign__label" for="current_image">Ảnh hiện tại :</label>
                                            <img id="current_image" src="{{ asset($user->image) }}" alt="Ảnh hiện tại của người dùng" width="60">
                                        </div>
                                    </div>
									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group">
											<label class="sign__label" for="email">Email</label>
											<input id="email" type="text" value="{{$user->email}}" name="email" class="sign__input" disabled>
										</div>
									</div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="new_image">Chọn ảnh mới:</label>
                                            <input id="new_image" type="file" name="image" class="sign__input">
											@error('image')
												<span style="color: #df4a32">{{$message}}</span>
											@enderror
                                        </div>
                                    </div>


									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group">
											<label class="sign__label" for="status">Trạng thái :</label>
                                            <select class="js-example-basic-single" id="status" name="status">
                                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                                                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Bị cấm</option>
                                            </select>
										</div>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="rights">Vai trò</label>
                                            <select class="js-example-basic-single" id="rights" name="role">
												@if ($user->role == 'admin')
                                                	<option value="admin" selected>Admin</option>
												@else
													<option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Người dùng</option>
													<option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Nhân viên</option>
												@endif
                                            </select>
                                        </div>
                                    </div>

									<div class="col-12">
										<button class="sign__btn" type="submit">Lưu</button>
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
