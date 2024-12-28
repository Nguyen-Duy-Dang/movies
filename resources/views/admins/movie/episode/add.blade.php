@extends('layouts.layout-admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="main__title">
                <h2>Thêm tập phim</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="profile__content">
                <!-- người dùng hồ sơ -->
                <div class="profile__user">
                    <!-- hoặc đỏ -->
                    <div class="profile__meta profile__meta--green">
                        <h3>ID phim: {{$movie}}</h3>
                    </div>
                </div>
                <!-- kết thúc người dùng hồ sơ -->
            </div>
        </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
        <div class="col-12">
            <div class="sign__wrap">
                    <!-- biểu mẫu chi tiết -->
                        <form action="{{route('admin.episode.add',$movie)}}" enctype="multipart/form-data" class="sign__form sign__form--profile sign__form--first" method="post">
                            @csrf 
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="sign__title">Chi tiết</h4>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">Tập</label>
                                        <input type="text" name="episode" class="sign__input input__data" placeholder="Tập" min="2" value="{{old('episode')}}">
                                        <span class="input__error" style="color: #df4a32">Tập phim là bắt buộc!</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">ID phim</label>
                                        <input type="text" class="sign__input" disabled value="{{$movie}}">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex" style="padding-right: 0">
                                    <h2 class="sign__title" style="width: fit-content;margin-right:auto">Đường dẫn</h2>
                                    <button class="btn add__button" style="height: fit-content" id="add__url" type="button" disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                                    </button>
                                </div>
                                <div id="url__items" style="width:100%" >
                                    <div class="row item__url" type__url="episode">
                                        <div class="col-12 d-flex">
                                            <h4 class="sign__title-small">Đường dẫn 1</h4>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                                            <div class="sign__group">
                                                <div class="d-flex justify-content-between">
                                                    <label class="sign__label label__video__input">Video</label>
                                                    <div class="d-flex">
                                                        <div class="d-flex mr-2">
                                                            <label class="sign__text" style="margin: 0 10px 0 0">Tải lên file</label>
                                                            <input type="radio" class="sign__input--radio change__video__input sign__input--radio-checked" value="file">
                                                        </div>
                                                        <div class="d-flex">
                                                            <label class="sign__text" style="margin: 0 10px 0 0">Tự điền</label>
                                                            <input type="radio" class="sign__input--radio change__video__input" value="url">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="file" name="url[]" class="sign__input video__input">
                                                <span style="color: #df4a32" class="video__input__error"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" class="video__uploaded">
                                        <div class="col-12 col-md-4 col-lg-12 col-xl-4">
                                            <div class="sign__group">
                                                <label class="sign__label">Server</label>
                                                <select class="sign__select server__select" name="server[]">
                                                    <option value="">Chưa chọn</option>
                                                    <option value="server 1">Server 1</option>
                                                    <option value="server 2">Server 2</option>
                                                    <option value="server 3">Server 3</option>
                                                </select>
                                                <span style="color: #df4a32;text-transform: capitalize" class="server__select__error"></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-12 col-xl-4">
                                            <div class="sign__group">
                                                <label class="sign__label">Độ phân giải</label>
                                                <select class="sign__select resolution__select" name="resolution[]" disabled>
                                                    <option value="">Chọn server trước</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-12 col-xl-4">
                                            <div class="sign__group">
                                                <label class="sign__label">Premium</label>
                                                <select class="sign__select premium__select" name="premium[]">
                                                    <option value="0">Không</option>
                                                    <option value="1">Có</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="upload__progress__container">
                                                <div class="upload__progress__bar">0%</div>
                                            </div>
                                            <button class="sign__btn sign__btn--upload" uploaded="true" type="button">Tải lên</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="sign__btn submit__btn" id_movie="{{$movie}}" type="button" type__add="episode" is__add="true" disabled>Lưu</button>
                            </div>
                        </form>
                    </div>
                    <!-- kết thúc biểu mẫu chi tiết -->
            </div>
                <!-- end content tabs -->
        </div>
    </div>
</div>
<div class="col-12">
    <div class="main__table-wrap">
        <table class="main__table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tập phim</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if ($episodes->count() > 0)
                    @foreach ($episodes as $episode)   
                        <tr class="tr__remove" id_remove="{{$episode->id}}">
                            <td>
                                <div class="main__table-text">{{$episode->id}}</div>
                            </td>
                            <td>
                                <div class="main__table-text episode__td">{{$episode->episode}}</div>
                            </td>
                            <td>
                                <div class="main__table-text">{{$episode->created_at}}</div>
                            </td>
                            <td>
                                <div class="main__table-btns">
                                <a href="{{route('admin.episode.update',$episode->id)}}" class="main__table-btn main__table-btn--edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
                                </a>
                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn__ajax" id_remove="{{$episode->id}}" type_remove="episode">
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
                            <td class="main__table-text">Không có dữ liệu</td>
                        </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>
<!-- modal delete -->
    <div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
        <h6 class="modal__title">Xóa mục</h6>

        <p class="modal__text">Bạn có chắc chắn muốn xóa mục này vĩnh viễn không?</p>

        <div class="modal__btns">
        <button class="modal__btn modal__btn--apply" id="modal__remove__btn" type="button">Xóa</button>
        <button class="modal__btn modal__btn--dismiss" type="button">Bỏ qua</button>
        </div>
    </div>
<!-- end modal delete -->
@endsection
