@extends('layouts.layout-admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="main__title">
                <h2>Cập nhật tập phim</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="profile__content">
                <div class="profile__user">
                    <div class="profile__meta profile__meta--green">
                        <h3>ID tập phim: {{$movie}}</h3>
                    </div>
                </div>
            </div>
        </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
        <div class="col-12">
            <div class="sign__wrap">
                    <!-- biểu mẫu chi tiết -->
                        <form action="{{route('admin.episode.update',[$movie,$episode->id])}}" enctype="multipart/form-data" class="sign__form sign__form--profile sign__form--first" method="post">
                            @csrf 
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="sign__title">Chi tiết</h4>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">Tập</label>
                                        <input type="text" name="episode" class="sign__input input__data" placeholder="Tập" min="2" value="{{$episode->episode}}">
                                        <span class="input__error" style="color: #df4a32">Tập phim là bắt buộc!</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">ID phim</label>
                                        <input type="text" class="sign__input" disabled value="{{$movie}}">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="sign__group">
                                        <label class="sign__label">Ngày tạo</label>
                                        <input type="text" class="sign__input" disabled value="{{$episode->created_at}}">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex" style="padding-right: 0">
                                    <h2 class="sign__title" style="width: fit-content;margin-right:auto">Đường dẫn</h2>
                                    <button class="btn add__button" style="height: fit-content" id="add__url" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                                    </button>
                                </div>
                                <div id="url__items" style="width:100%">
                                    @foreach ($urls as $index => $url)
                                    <div class="row item__url" id__url="{{$url->id}}" type__url="movie">
                                        <div class="col-12 d-flex">
                                            <h4 class="sign__title-small">Đường dẫn {{$index + 1}}</h4>
                                            @if ($index + 1 != 1)
                                                <a class="btn remove__url__item open-modal" href="#modal-delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                                        <path d="M200-440v-80h560v80H200Z"/>
                                                    </svg>
                                                </a>
                                            @endif
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
                                                <p style="text-transform: capitalize;color:#ffffff;overflow:hidden;font-size:13px">
                                                    @if ($url->premium)
                                                        <svg class="svg__premium" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffe600"><path d="m387-412 35-114-92-74h114l36-112 36 112h114l-93 74 35 114-92-71-93 71ZM240-40v-309q-38-42-59-96t-21-115q0-134 93-227t227-93q134 0 227 93t93 227q0 61-21 115t-59 96v309l-240-80-240 80Zm240-280q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70ZM320-159l160-41 160 41v-124q-35 20-75.5 31.5T480-240q-44 0-84.5-11.5T320-283v124Zm160-62Z"/></svg>
                                                    @endif
                                                    {{$url->source}} - {{$url->resolution}}p: 
                                                    <a class="limit__text old__video" href="{{$url->url}}" target="_blank">{{$url->url}}</a>
                                                </p>
                                                <input type="file" name="url[]" class="sign__input video__input">
                                                <span style="color: #df4a32" class="video__input__error"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" class="video__uploaded" value="{{$url->url}}">
                                        <input type="hidden" class="url_id" value="{{$url->id}}">
                                        <input type="hidden" class="server__selected" value="{{$url->source}}">
                                        <input type="hidden" class="resolution__selected" value="{{$url->resolution}}">
                                        <input type="hidden" class="premium__selected" value="{{$url->premium}}">
                                        <div class="col-12 col-md-4 col-lg-12 col-xl-4">
                                            <div class="sign__group">
                                                <label class="sign__label">Server</label>
                                                <select class="sign__select server__select" name="server[]" isUpdate="true">
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
                                            <button class="sign__btn sign__btn--upload sign__btn--old" uploaded="true" type="button">Tải lên</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="sign__btn submit__btn" type="button" type__update="episode" is__add="false" id__upload="{{$episode->id}}">Lưu</button>
                            </div>
                        </form>
                    </div>
                    <!-- kết thúc biểu mẫu chi tiết -->
            </div>
                <!-- end content tabs -->
        </div>
    </div>
</div>

<!-- modal delete -->
<div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Xóa mục</h6>

    <p class="modal__text">Bạn có chắc chắn muốn xóa mục này không?</p>

    <div class="modal__btns">
       <button class="modal__btn modal__btn--apply" id="modal__remove__url__btn" type="button">Xóa</button>
       <button class="modal__btn modal__btn--dismiss" type="button">Bỏ qua</button>
    </div>
</div>
<!-- end modal delete -->
@endsection
