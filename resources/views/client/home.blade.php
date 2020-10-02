@extends('client.layout')

@section('header-content')
{{--    <link rel="stylesheet" href="/client-assets/global/vendor/footable/footable.core.css">--}}
{{--    <link rel="stylesheet" href="/client-assets/assets/examples/css/dashboard/analytics.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">--}}


@show

@section('main-content')

    <main>
        <!-- Slider -->
        <div id="full-slider-wrapper">
            <div id="layerslider" style="width:100%;height:600px;">
                <!-- first slide -->
                <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
                    <img src="/client/img/slides/4.jpg" class="ls-bg" alt="Slide background">
                    <h3 class="ls-l slide_typo" style="top: 45%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">AN TOÀN - BẢO MẬT</h3>
                    <p class="ls-l slide_typo_2" style="top:52%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">Bạn hoàn toàn ẩn danh khi đóng góp</p>
                </div>

                <!-- second slide -->
                <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:85;">
                    <img src="/client/img/slides/3.jpg" class="ls-bg" alt="Slide background">
                    <h3 class="ls-l slide_typo" style="top: 45%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">NHANH CHÓNG - KỊP THỜI</h3>
                    <p class="ls-l slide_typo_2" style="top:52%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">Dữ liệu góp ý của bạn sẽ được ghi nhận và trả lời nhanh nhất</p>
                </div>

            </div>
        </div>
        <!-- End layerslider -->

        <div class="container margin_60">

            <div class="main_title">
                <h2>An sinh - Xã hội</h2>
                <p>Các vấn đề liên quan đên quyền và lợi ích, chính sách an sinh xã hội của thành phố</p>
            </div>

            <div class="row">

                <div class="owl-carousel owl-theme list_carousel add_bottom_30">
                    @foreach($top_polls as $poll)
                    <div class="item">
                        <div class="tour_container">
                            <div class="ribbon_3 popular"><span>Phổ biến</span></div>
                            <div class="img_container">
                                <a href="/chi-tiet/{{$poll->slug}}">
                                    <img src="https://colorlib.com/preview/theme/buson/assets/img/recent/rcent_1.png" width="800" height="533" class="img-fluid lazy" alt="image">
                                    <div class="short_info">
                                        19/01/2019 - 21/02/2020<span class="price"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="tour_title">
                                <h3><strong> <a  href="/chi-tiet/{{$poll->slug}}"></a>{{$poll->title}}</strong></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <!-- End row -->
                <div class="row">

                    <p class="text-center add_bottom_30">
                        <a href="/danh-sach-tour" class="btn_1">Tất cả cuộc thăm dò ý kiến</a>
                    </p>
                </div>

                <hr class="mt-5 mb-5">

                <hr>

            </div>

        </div>


        <section class="promo_full">
            <div class="promo_full_wp magnific">
                <div>
                    <h3>BẠN HÃY YÊN TÂM, DỮ LIỆU CỦA BẠN LÀ BẢO MẬT</h3>
                    <p>
                        Xem video về quy trình hoạt động của hệ thống, cũng như cách chúng tôi bảo vệ bạn an toàn
                    </p>
                    <a href="https://www.youtube.com/watch?v=Zz5cu72Gv5Y" class="video"><i class="icon-play-circled2-1"></i></a>
                </div>
            </div>
        </section>
        <!-- End section -->

        <div class="container margin_60">

            <div class="main_title">
                <h2>LÝ DO BẠN NÊN SỬ DỤNG HỆ THỐNG CỦA CHÚNG TÔI</h2>
                <p>
                    Hãy lựa chọn và tin tưởng vào hệ thống mà chúng tôi đang triển khai
                </p>
            </div>

            <div class="row">

                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-41"></i>
                        <h3>Công khai</h3>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                        </p>
                        <a href="about.html" class="btn_1 outline">Read more</a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-57"></i>
                        <h3>Riêng tư</h3>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                        </p>
                        <a href="about.html" class="btn_1 outline">Read more</a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-30"></i>
                        <h3>Minh bạch</h3>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                        </p>
                        <a href="about.html" class="btn_1 outline">Read more</a>
                    </div>
                </div>



            </div>
            <!--End row -->

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <img src="/client/img/laptop.png" alt="Laptop" class="img-fluid laptop">
                </div>
                <div class="col-md-6">
                    <h3><span>Hướng dẫn sử dụng</span> cho lần đầu</h3>
                    <p>
                        Nếu đây là lần đầu tiên sử dụng hệ thống, bạn vui lòng làm theo hướng dẫn
                    </p>
                    <ul class="list_order">
                        <li><span>1</span>Tải ứng dụng StreetCred cho điện thoại</li>
                        <li><span>2</span>Tiến hành nhận định danh tương ứng</li>
                        <li><span>3</span>Truy cập hệ thống và sử dụng theo hướng dẫn</li>
                    </ul>
                </div>
            </div>
            <!-- End row -->

        </div>
        <!-- End container -->
    </main>
    <!-- End main -->
@endsection
@section('js-content')

@endsection