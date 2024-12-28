@extends('layouts.layout-admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <!-- tiêu đề chính -->
    <div class="col-12">
      <div class="main__title">
        <h2>Phim</h2>

      </div>
    </div>

    <!-- users -->
    <div class="col-12">
      <div class="main__table-wrap">
        <table class="main__table">
          <thead>
            <tr>
              <th> Tiêu đề </th>
              <th> Hình ảnh </th>
              <th> Lượt xem </th>
              <th> Tình trạng </th>
              <th> Danh mục </th>
              <th> Ngày tạo </th>
              <th> Hành động </th>
            </tr>
          </thead>

          <tbody>
            @if ($movies->count() > 0)
              @foreach ($movies as $movie)
              <tr class="tr__remove" id_remove="{{$movie->id}}">
                <td>
                  <div class="main__table-text"><a target="_blank" class="limit__text" href="{{route('movie',$movie->id)}}">{{$movie->title}}</a></div>
                </td>
                <td>
                  <div class="main__table-text"><img src="{{asset($movie->thumbnail)}}" alt=""></div>
                </td>
                <td>
                  <div class="main__table-text">{{$movie->views}}</div>
                </td>
                <td>
                  @if ($movie->status == 1)
                    <div title="Hiển thị" class="status__item__update main__table-text main__table-text--green">Hiển thị</div>
                  @else
                    <div title="Ẩn" class="status__item__update main__table-text main__table-text--red">Ẩn</div>    
                  @endif
                </td>
                <td>
                  <div class="main__table-text">{{$movie->category->name}}</div>
                </td>
                <td>
                  <div class="main__table-text limit__text">{{$movie->created_at}}</div>
                </td>
                <td>
                  <div class="main__table-btns">
                    @if ($movie->isSeries)
                      <a class="main__table-btn main__table-btn--view" href="{{route("admin.episode.add",$movie->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M160-120v-720h80v80h80v-80h320v80h80v-80h80v720h-80v-80h-80v80H320v-80h-80v80h-80Zm80-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm400 320h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80ZM400-200h160v-560H400v560Zm0-560h160-160Z"/></svg>                  
                      </a>
                    @endif
                    <button class="main__table-btn main__table-btn--banned status__update__btn" id_status="{{$movie->id}}" type_status="movie">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                    </button>
                    <a href="{{route("admin.movie.update",$movie->id)}}" class="main__table-btn main__table-btn--edit">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
                    </a>
                    <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$movie->id}}" type_remove="movie">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="main__table-text">Không có dữ liệu</td>
              </tr>
              @endif
            </tbody>
          </table>
          @if ($movies->count() > 0)
          <!-- paginator -->
          <div class="col-12">
            <div class="paginator paginator__container">
              <span class="paginator__pages"></span>

              <ul class="paginator__paginator" type_paginator="movie" page="{{request()->input("page",1)}}">
              </ul>
            </div>
          </div>
          <!-- end paginator -->
          @endif
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
    
