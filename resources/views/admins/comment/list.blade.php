@extends('layouts.layout-admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <!-- tiêu đề chính -->
    <div class="col-12">
      <div class="main__title">
        <h2>Bình luận</h2>

      </div>
    </div>

    <!-- users -->
    <div class="col-12">
      <div class="main__table-wrap">
        <table class="main__table">
          <thead>
            <tr>
              <th> Phim </th>
              <th> Người bình luận </th>
              <th> Nội dung</th>
              <th> Tình trạng </th>
              <th> Ngày tạo </th>
              <th> Hành động </th>
            </tr>
          </thead>

          <tbody>
            @if ($comments->count() > 0)
              @foreach ($comments as $comment)
                <tr class="tr__remove" id_remove="{{$comment->id}}">
                  <td>
                    <div class="main__table-text"><a target="_blank" class="limit__text" href="{{route('movie',$comment->id_movie)}}">{{$comment->movie->title}}</a></div>
                  </td>
                  <td>
                    <div class="main__table-text">{{$comment->user->name}}</div>
                  </td>
                  <td>
                    <div class="main__table-text limit__text">{{$comment->content}}</div>
                  </td>
                  <td>
                    @if ($comment->status == 1)
                      <div title="Hiển thị" class="status__item__update main__table-text main__table-text--green">Hiển thị</div>
                    @else
                      <div title="Ẩn" class="status__item__update main__table-text main__table-text--red">Ẩn</div>    
                    @endif
                  </td>
                  <td>
                    <div class="main__table-text limit__text">{{$comment->created_at}}</div>
                  </td>
                  <td>
                    <div class="main__table-btns">
                      @if ($comment->reply_comments->count() > 0)
                        <a class="main__table-btn main__table-btn--view" data-toggle="collapse" href="#collapseReplyComment{{$comment->id}}" role="button" aria-expanded="true" aria-controls="collapseComment">
                          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M320-280 80-520l240-240 57 56-184 184 184 184-57 56Zm480 80v-160q0-50-35-85t-85-35H433l144 144-57 56-240-240 240-240 57 56-144 144h247q83 0 141.5 58.5T880-360v160h-80Z"/></svg>
                        </a>
                      @endif
                      <button class="main__table-btn main__table-btn--banned status__update__btn" id_status="{{$comment->id}}" type_status="comment">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                      </button>
                      <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$comment->id}}" type_remove="comment">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
                      </a>
                    </div>
                  </td>
                </tr>
                @foreach ($comment->reply_comments as $reply_comment)
                  <tr class="tr__remove collapse show" id="collapseReplyComment{{$comment->id}}" id_remove="{{$reply_comment->id}}">
                    <td>
                      <div class="main__table-text--secondary">Bình luận trả lời:</div>
                    </td>
                    <td>
                      <div class="main__table-text--secondary">{{$reply_comment->user->name}}</div>
                    </td>
                    <td>
                      <div class="main__table-text--secondary limit__text">{{$reply_comment->content}}</div>
                    </td>
                    <td>
                      @if ($reply_comment->status == 1)
                        <div title="Hiển thị" class="status__item__update main__table-text--secondary main__table-text--green">Hiển thị</div>
                      @else
                        <div title="Ẩn" class="status__item__update main__table-text--secondary main__table-text--red">Ẩn</div>    
                      @endif
                    </td>
                    <td>
                      <div class="main__table-text--secondary limit__text">{{$reply_comment->created_at}}</div>
                    </td>
                    <td>
                      <div class="main__table-btns--secondary">
                        <button class="main__table-btn main__table-btn--banned status__update__btn" id_status="{{$reply_comment->id}}" type_status="reply_comment">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                        </button>
                        <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$reply_comment->id}}" type_remove="reply_comment">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
                        </a>
                      </div>
                    </td>
                  </tr>
                @endforeach
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
          @if ($comments->count() > 0)
          <!-- paginator -->
          <div class="col-12">
            <div class="paginator paginator__container">
              <span class="paginator__pages"></span>

              <ul class="paginator__paginator" type_paginator="comment" page="{{request()->input("page",1)}}">
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
    
