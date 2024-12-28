@extends('layouts.layout-admin')
@section('content')

<div class="container-fluid">
	<div class="row">
		<!-- tiêu đề chính -->
		<div class="col-12">
			<div class="main__title">
				<h2>Lọc bình luận</h2>
			</div>
		</div>

		<!-- users -->
		<div class="col-12">
			<div class="main__table-wrap">
				<table class="main__table">
					<thead>
						<tr>
							<th>ID</th>
							<th>NỘI DUNG</th>
							<th>NGÀY TẠO</th>
							<th>HÀNH ĐỘNG</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($commentFilters as $comment_filter)
							<tr class="tr__remove" id_remove="{{$comment_filter->id}}">
								<td>
									<div class="main__table-text">{{$comment_filter->id}}</div>
								</td>
								<td>
									<div class="main__table-text">{{$comment_filter->content}}</div>
								</td>

								<td>
									<div class="main__table-text">{{$comment_filter->created_at}}</div>
								</td>

								<td>
									<div class="main__table-btns">
										<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$comment_filter->id}}" type_remove="comment_filter">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
										</a>
									</div>
								</td>

						@endforeach
					</tbody>
				</table>
			</div>

		</div>
		<!-- end users -->

		  <!-- paginator -->
          <div class="col-12">
            <div class="paginator paginator__container">
              <span class="paginator__pages"></span>

              <ul class="paginator__paginator" type_paginator="comment_filter" page="{{request()->input("page",1)}}">
              </ul>
            </div>
          </div>
          <!-- end paginator -->
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