@extends('front.layouts.master')
@section('title')
    <title>{{ "TGNIMEX - " . ucfirst($_SERVER['HTTP_HOST']) }}</title>
@endsection
@section('css')
    <link href="/site/js/owl/owl.carousel.css" rel="stylesheet">
    <link href="/site/js/owl/owl.theme.css" rel="stylesheet">

@endsection
<style>
    #owl-demo .item{
        padding: 30px 0px;
        margin: 10px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
    }
</style>
@section('content')


    <div class="owl-carousel owl-theme">
        <img src="/site/image/home/c1.jpg" alt="The Last of us">
        <img src="/site/image/home/c1.jpg" alt="The Last of us">
    </div>


    <section class="awe-section-1" id="awe-section-1">



        <div class="section_category_slider">
            <div class="container">

            </div>
        </div>



    </section>


    <section class="awe-section-2" id="awe-section-2">
        <div class="flexcatgory">
            <div class="container">


                <div class="flextitle">
                    <div class="flextitle1">
                        <div class="titlesmall">
                            Đa dạng sản phẩm, đáp ứng mọi nhu cầu.
                        </div>
                        <div class="titlebig">
                            Nông sản chất lượng cao
                        </div>
                    </div>
                    <div class="flextitle2">
                        <div class="des">

                            Cung cấp các nông sản chất lượng, an toàn sức khỏe cho người tiêu dùng trong và ngoài nước. Cam
                            kết đạt tiêu chuẩn sạch – tươi ngon – bổ dưỡng với mức giá cạnh tranh. ​
                        </div>
                    </div>

                </div>

                <div class="myflexnat">


{{--                    <div>--}}
{{--                        <a href="{{route('front.category-product-get')}}">--}}
{{--                            <picture>--}}
{{--                                <source media="(min-width:768px)"--}}
{{--                                        srcset="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanh1.png?v=139">--}}
{{--                                <source media="(max-width:767px)"--}}
{{--                                        srcset="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanhmobile1.png?v=139">--}}
{{--                                <img src="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanh1.png?v=139"--}}
{{--                                     alt="">--}}
{{--                            </picture>--}}

{{--                            <span class="boxtionmaybe">--}}
{{--						<span class="boxtionmaybe_1"></span>--}}
{{--						<span class="boxtionmaybe_2"></span>--}}

{{--					</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}


{{--                    <div>--}}
{{--                        <a href="{{route('front.category-product-get')}}">--}}
{{--                            <picture>--}}
{{--                                <source media="(min-width:768px)"--}}
{{--                                        srcset="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanh2.png?v=139">--}}
{{--                                <source media="(max-width:767px)"--}}
{{--                                        srcset="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanhmobile2.png?v=139">--}}
{{--                                <img src="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanh2.png?v=139"--}}
{{--                                     alt="">--}}
{{--                            </picture>--}}

{{--                            <span class="boxtionmaybe">--}}
{{--						<span class="boxtionmaybe_1"></span>--}}
{{--						<span class="boxtionmaybe_2"></span>--}}

{{--					</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}


                </div>
            </div>

        </div>
    </section>


    <section class="awe-section-3" id="awe-section-3">
        <div class="infomationthuonghieu">
            <div class="container">
                <div class="infomationthuonghieu">
                    <div class="infomationthuonghieu_header">
                        <div class="infomationthuonghieu_header1"></div>
                        <div class="infomationthuonghieu_header2">Về Chúng tôi</div>
                    </div>
                    <div class="infothuonghieuflexz">
                        <div class="infothuonghieuflex1">
                            <img src="/site/image/home/dua1.jpg">
                            <div class="helenposition">

{{--                                <div><img--}}
{{--                                        src="//theme.hstatic.net/200000342937/1001030312/14/whatwedotilesbigimage1.png?v=139">--}}
{{--                                </div>--}}


{{--                                <div><img--}}
{{--                                        src="//theme.hstatic.net/200000342937/1001030312/14/whatwedotilesbigimage2.png?v=139">--}}
{{--                                </div>--}}

                            </div>
                        </div>
                        <div class="infothuonghieuflex2">

                            TGN Natural là thương hiệu của Công ty Thương mại và Xuất nhập khẩu TGN. <br>
                            Lĩnh vực mũi nhọn là xuất khẩu nông sản với sản phẩm chủ lực là trái dừa tươi và trái cây nhiệt đới vùng ĐBSCL. <br>

                            Được thành lập vào năm 2023, Công ty Thương mại và Xuất nhập khẩu TGN sẽ là một trong những nhà xuất khẩu rau quả hàng đầu với mục tiêu mang từ Việt Nam ra thế giới những sản phẩm chất lượng cao nhất được trồng trên mảnh đất của chúng ta.
                            Chúng tôi có chuyên môn về cả trái cây tươi và đông lạnh. Trong suốt quá trình tồn tại của mình, chúng tôi luôn giữ vững cam kết với khách hàng về các sản phẩm chất lượng cao xuất khẩu sang EU, Mỹ, CHÂU Á, Trung Đông,…


                            <div>&nbsp;</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="awe-section-4" id="awe-section-4">
        <div class="oganicproduct">
            <div class="container">
                <div class="headeroga">

                    <img src="//theme.hstatic.net/200000342937/1001030312/14/uudiemshowiconimage.png?v=139">

                    <p class="headeroga_1"></p>
                    <h3 class="headeroga_2">Các sản phẩm của <br>TGN Natural</h3>
                </div>
                <div class="headerogaflex">
                    <div class="headerogaflex1">
                        <div class="headerogaflex1_1">
                            <div>
                                <img src="/site/image/home/b1.png" style="height: 450px">
                            </div>
                            <div>
                                <img src="/site/image/home/b2.png" style="height: 450px">
                            </div>
                        </div>
                    </div>
                    <div class="headerogaflex2">
                        <div class="headerogaflex2flex">
                            <h3><strong>100% Không Hóa Chất</strong></h3>
                            <div><p>Sản phẩm được trồng theo hướng hữu cơ, nói không với hóa chất độc hại.</p>
                                <p>&nbsp;</p>
                                <h3><strong>Chất Lượng Cao Cấp</strong></h3>
                                <div><p>Rau củ quả tươi ngon, đảm bảo&nbsp;an toàn cho sức khỏe người tiêu dùng.</p>
                                    <p>&nbsp;</p>
                                    <h3><b>Dinh Dưỡng Nhân Đôi</b></h3>
                                    <div>Giá trị dinh dưỡng cao, mang đến hương vị hoàn hảo cho bữa ăn.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="headerogaflex">
                    <div class="headerogaflex2">
                        <div class="headerogaflex2flex">
                            <h3><strong>Mụn dừa ép viên</strong></h3>
                            <div><p>Mụn dừa ép bánh là sản phẩm bổ biến, tốt cho trồng cây non, rau mầm, rau ăn lá hoặc trộn với giá thể – đất trồng khác. Mụn dừa có khả năng ngậm nước tốt, thân viện với môi trường, tiện dụng và kinh tế.</p>


                            </div>
                        </div>
                    </div>
                    <div class="headerogaflex1">
                        <div class="headerogaflex1_1">
                            <div>
                                <img src="/site/image/home/zz.png" style="height: 450px">
                            </div>
                            <div>
                                <img src="/site/image/home/ii.jpg" style="height: 450px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="awe-section-5" id="awe-section-5">

        <div class="wearegrow">
            <div class="container">
            </div>
        </div>
    </section>


    <section class="awe-section-8" id="awe-section-8">


{{--        <div class="weareticle">--}}

{{--            <div class="container">--}}

{{--                <div class="headerarticle">--}}
{{--                    <div class="bigtitle">CHIA SẺ KIẾN THỨC</div>--}}
{{--                    <div class="smalltitle">Hiểu hơn về giá trị trong từng sản phẩm</div>--}}
{{--                </div>--}}

{{--                <div class="slideraticle">--}}
{{--                    @foreach($posts as $post)--}}
{{--                    <div>--}}
{{--                        <div class="itembg">--}}
{{--                            <div>--}}
{{--                                <a href="{{route('front.get-post-detail', $post->slug)}}">--}}
{{--                                    <img src="{{$post->image->path ?? ''}}"/>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="wrapwhite">--}}
{{--                                <div class="blogtitle">--}}
{{--                                    <div href="javascript:void(0)"><b>{{$post->name}}</b></div>--}}
{{--                                    <div class="datepost">{{\Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y')}}</div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <a class="tztitle"--}}
{{--                                       href="{{route('front.get-post-detail', $post->slug)}}">--}}
{{--                                        {{$post->name}}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <div class="tintucviewmore">--}}
{{--                    <a href="{{route('front.get-posts')}}">Xem thêm</a>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

    </section>





        <div class="questionhigland">

            <div class="container">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="/site/image/home/n1.jpg" style="height: 260px">
                    </div>
                    <div class="item">
                        <img src="/site/image/home/n2.jpg" style="height: 260px">
                    </div>
                    <div class="item">
                        <img src="/site/image/home/n3.jpg" style="height: 260px">
                    </div>
                    <div class="item">
                        <img src="/site/image/home/n4.png" style="height: 260px">
                    </div>
                    <div class="item">
                        <img src="/site/image/home/n5.jpg" style="height: 260px">
                    </div>
                </div>

                <div class="title1">

                </div>
                <div class="title2">
                    Hãy để chúng tôi phục vụ bạn tốt hơn!!
                </div>

                <div class="homepagecontact">
                    <form>
                        <div class="raseflex">
                            <div class="form-group">
                                <input type="text" class="form-control" required id="thongtinform1" placeholder="Họ ">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required id="thongtinform2" placeholder="Tên">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" required id="thongtinform3"
                                       placeholder="Email của bạn">
                            </div>
                            <div class="form-group contactaeea">
                                <input class="form-control" required id="thongtinform4" placeholder="Các thông tin "/>
                            </div>
                        </div>

                        <button type="submit" class="btn buttonsubmit btn-default">Gửi thông tin</button>
                    </form>

                </div>


            </div>


        </div>


        <div class="box-send-contact hide hidden new-iconflas" style="display:none !important">
            <h2>Gửi thắc mắc cho chúng tôi</h2>
            <div id="leftcontactFormWrapper">
                <form accept-charset='UTF-8' action='/contact' class='contact-form' method='post'>
                    <input name='form_type' type='hidden' value='contact'>
                    <input name='utf8' type='hidden' value='✓'>


                    <div class="contact-form">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <input required type="text" id="ttname" name="contact[name]" class="form-control"
                                           placeholder="Tên của bạn" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <input required type="text" id="ttemail" name="contact[email]" class="form-control"
                                           placeholder="Email của bạn" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <input pattern="[0-9]{10,12}" id="ttphone" required type="text" name="contact[phone]"
                                           class="form-control" placeholder="Số điện thoại của bạn"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <textarea required name="contact[body]" id="ttmess" placeholder="Nội dung"></textarea>
                                    <div class="sitebox-recaptcha">
                                        This site is protected by reCAPTCHA and the Google
                                        <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy
                                            Policy</a>
                                        and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms
                                            of Service</a> apply.
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <button class="button dark">Gửi cho chúng tôi</button>
                            </div>
                        </div>
                    </div>

                    <input id='7d80ae7367954874a298deae75687f6c' name='g-recaptcha-response' type='hidden'>
                    <script src='/site/js/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script>
                    <script>grecaptcha.ready(function () {
                            grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function (token) {
                                document.getElementById('7d80ae7367954874a298deae75687f6c').value = token;
                            });
                        });</script>
                </form>
            </div>
        </div>


        <script>
            $(document).ready(function () {

                $(".homepagecontact form").submit(function (e) {
                    e.preventDefault();
                    debugger
                    var ten = 'no info';
                    var lastname = 'no info';
                    var email = $(this).find('#thongtinform3').val();
                    //var binhluan = $('#contactFormComment').val();

                    var mess = '\n';
                    mess += 'Họ : ' + $(this).find('#thongtinform1').val() + '\n';
                    mess += 'Tên: ' + $(this).find('#thongtinform2').val() + '\n';
                    mess += 'Các thông tin : ' + $(this).find('#thongtinform4').val() + '\n';
                    $("#leftcontactFormWrapper form #ttname").val(ten);
                    $("#leftcontactFormWrapper form #ttemail").val(email);
                    $("#leftcontactFormWrapper form #ttphone").val("1234567890");
                    $("#leftcontactFormWrapper form #ttmess").val(mess);
                    $("#leftcontactFormWrapper form").submit();
                })

                $("#leftcontactFormWrapper form").submit(function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: '/contact',
                        data: $('#leftcontactFormWrapper form').serialize(),
                        success: function (data) {
                            alert("gửi thông tin thành công");
                            location.reload();
                        },
                    })
                });
            })


        </script>



    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                loop: true,
                dots: false,
                autoPlay: true, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3]

            });

            $('.owl-carousel').owlCarousel({
                loop: true,
                dots: false,
                margin: 10,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })



        });
    </script>
@endpush
