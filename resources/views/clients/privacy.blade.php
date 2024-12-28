@extends('layouts.layout')
@section('content')
    <!-- head -->
    <section class="section section--head section--head-fixed">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <h1 class="section__title section__title--head">
                        Chính sách bảo mật
                    </h1>
                </div>

                <div class="col-12 col-xl-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item">
                            <a href="{{route("index")}}">Trang chủ</a>
                        </li>
                        <li
                            class="breadcrumb__item breadcrumb__item--active"
                        >
                            Chính sách bảo mật
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end head -->

    <section class="section section--pb0 section--gradient">
        <div class="container">
            <div class="row">
                <!-- section text -->
                <div class="col-12">
                    <p class="section__text section__text--small">
                        Chào mừng bạn đến với trang web của chúng tôi. Chúng
                        tôi coi trọng quyền riêng tư và sự an toàn của thông
                        tin cá nhân của bạn. Chính sách bảo mật này được
                        thiết kế để giải thích cách chúng tôi thu thập, sử
                        dụng, bảo vệ và chia sẻ thông tin cá nhân của bạn
                        khi bạn sử dụng trang web. Việc bạn tin tưởng sử
                        dụng dịch vụ của chúng tôi là động lực để chúng tôi
                        không ngừng cải thiện chất lượng dịch vụ và đảm bảo
                        rằng dữ liệu của bạn luôn được xử lý một cách an
                        toàn và minh bạch.
                    </p>

                    <p class="section__text section__text--small">
                        Chúng tôi khuyến khích bạn dành thời gian để đọc và
                        hiểu kỹ chính sách bảo mật này, nhằm đảm bảo bạn
                        hoàn toàn nắm rõ về cách chúng tôi bảo vệ quyền
                        riêng tư của bạn. Nếu có bất kỳ thắc mắc nào, hãy
                        liên hệ với chúng tôi qua thông tin liên hệ được
                        cung cấp ở cuối tài liệu này.
                    </p>
                </div>
                <!-- end section text -->

                <!-- section list -->
                <div class="col-12">
                    <div class="section__list">
                        <ol>
                            <li>
                                <h4>Thông Tin Chúng Tôi Thu Thập:</h4>
                                <ol>
                                    <li>
                                        Thông tin cá nhân: bao gồm tên, địa
                                        chỉ email, số điện thoại, và thông
                                        tin thanh toán khi bạn đăng ký tài
                                        khoản hoặc mua dịch vụ.
                                    </li>
                                    <li>
                                        Thông tin sử dụng: bao gồm lịch sử
                                        xem phim, sở thích của bạn, và thông
                                        tin về các tương tác của bạn với
                                        trang web.
                                    </li>

                                    <li>
                                        Dữ liệu thiết bị: bao gồm địa chỉ
                                        IP, loại trình duyệt, và hệ điều
                                        hành mà bạn sử dụng để truy cập
                                        trang web.
                                    </li>
                                </ol>
                            </li>

                            <li>
                                <h4>Mục Đích Sử Dụng Thông Tin:</h4>
                                <ol>
                                    <li>
                                        Phân tích hành vi người dùng để cá
                                        nhân hóa trải nghiệm của bạn trên
                                        trang web.
                                    </li>
                                    <li>
                                        Gửi thông báo về các bản cập nhật,
                                        khuyến mãi, và dịch vụ mới.
                                    </li>

                                    <li>
                                        Cung cấp hỗ trợ khách hàng và giải
                                        quyết các vấn đề liên quan.
                                    </li>
                                    <li>
                                        Xử lý thanh toán và quản lý tài
                                        khoản của bạn.
                                    </li>
                                    <li>
                                        Cung cấp, duy trì và nâng cấp chất
                                        lượng dịch vụ của chúng tôi.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <h4>Chia Sẻ Thông Tin:</h4>
                                <ol>
                                    <li>
                                        Chia sẻ với các đối tác và nhà cung
                                        cấp dịch vụ để thực hiện các hoạt
                                        động như xử lý thanh toán hoặc cung
                                        cấp dịch vụ khách hàng.
                                    </li>
                                    <li>
                                        Chia sẻ theo yêu cầu của pháp luật
                                        hoặc theo lệnh của tòa án.
                                    </li>

                                    <li>
                                        Chia sẻ trong các tình huống cần
                                        thiết để bảo vệ quyền lợi và tài sản
                                        của chúng tôi hoặc để bảo vệ an ninh
                                        của người dùng.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <h4>Bảo Mật Thông Tin :</h4>
                                <ol>
                                    Chúng tôi áp dụng các biện pháp kỹ thuật
                                    và tổ chức thích hợp để bảo vệ thông tin
                                    cá nhân của bạn khỏi mất mát, truy cập
                                    trái phép, thay đổi hoặc tiết lộ. Tuy
                                    nhiên, không có hệ thống bảo mật nào là
                                    hoàn hảo và chúng tôi không thể đảm bảo
                                    an toàn tuyệt đối.
                                </ol>
                            </li>
                            <li>
                                <h4>Quyền Của Bạn :</h4>
                                <ol>
                                    Bạn có quyền truy cập, chỉnh sửa hoặc
                                    xóa thông tin cá nhân của mình bằng cách
                                    truy cập vào tài khoản của bạn trên
                                    trang web hoặc liên hệ với chúng tôi.
                                    Bạn cũng có quyền yêu cầu chúng tôi
                                    ngừng sử dụng thông tin cá nhân của bạn
                                    cho mục đích tiếp thị trực tiếp.
                                </ol>
                            </li>
                            <li>
                                <h4>Cookies và Công Nghệ Theo Dõi :</h4>
                                <ol>
                                    Chúng tôi sử dụng cookies và các công
                                    nghệ tương tự để thu thập thông tin về
                                    hành vi người dùng và cải thiện trải
                                    nghiệm của bạn trên trang web. Bạn có
                                    thể tùy chỉnh cài đặt trình duyệt của
                                    mình để chặn hoặc xóa cookies, nhưng
                                    điều này có thể ảnh hưởng đến một số
                                    chức năng của trang web.
                                </ol>
                            </li>
                            <li>
                                <h4>Thay Đổi Chính Sách :</h4>
                                <ol>
                                    Chúng tôi có thể cập nhật chính sách bảo
                                    mật này theo thời gian để phản ánh các
                                    thay đổi trong quy trình thu thập và sử
                                    dụng thông tin. Mọi thay đổi sẽ được
                                    công bố trên trang web và bạn nên kiểm
                                    tra định kỳ để cập nhật.
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- end section list -->

                <!-- section text -->
                <div class="col-12">
                    <p class="section__text section__text--small">
                        Chúng tôi cam kết bảo vệ quyền riêng tư và thông tin
                        cá nhân của bạn. Việc bạn sử dụng trang web của
                        chúng tôi đồng nghĩa với việc bạn đồng ý với các
                        điều khoản trong chính sách bảo mật này. Chúng tôi
                        khuyến khích bạn đọc kỹ chính sách và nếu có bất kỳ
                        câu hỏi nào, đừng ngần ngại liên hệ với chúng tôi.
                        Bảo vệ quyền riêng tư của bạn là ưu tiên hàng đầu
                        của chúng tôi, và chúng tôi sẽ không ngừng nỗ lực để
                        đảm bảo rằng thông tin cá nhân của bạn luôn được an
                        toàn và bảo mật.
                    </p>
                </div>
                <!-- end section text -->
            </div>
        </div>
    </section>
@endsection