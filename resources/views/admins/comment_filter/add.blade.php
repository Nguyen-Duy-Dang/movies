@extends('layouts.layout-admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="main__title">
                    <h2>Thêm Lọc bình luận</h2>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                    <div class="col-12">
                        <div class="sign__wrap">
                            <!-- Form Start -->
                            <form action="{{ route('comment_filter.store') }}" method="POST" enctype="multipart/form-data" class="sign__form sign__form--profile sign__form--first">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="sign__title">Chi tiết</h4>
                                    </div>

                                    <!-- ID Field (Disabled) -->
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label">ID</label>
                                            <input disabled type="text" class="sign__input" placeholder="Auto">
                                        </div>
                                    </div>

                                    <!-- Content Field -->
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label">Nội dung</label>
                                            <input type="text" name="content" class="sign__input" placeholder="Nhập nội dung" value="{{ old('content') }}">
                                            @error('content')
                                                <span style="color: #df4a32">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <button class="sign__btn" type="submit">Lưu</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Form End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
