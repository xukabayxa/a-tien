@extends('front.layouts.master')
@section('title')
    <title>{{ "TGNIMEX - " . ucfirst($_SERVER['HTTP_HOST']) }}</title>
@endsection
@section('content')
    <section class="awe-section-1" id="awe-section-1">

        <div class="section_category_slider">
            <div class="container">
                <h2 class="hidden">Slider and Category</h2>
                <div class="row">
                    <div class="col-xs-12 px-0 mt-md-5 mb-5">


                        <div class="video-background">
                            <div class="trnvideo" id="W4ljOFyKEzA"></div>
                        </div>

                        <script>
                            var tag = document.createElement('script');
                            tag.src = "https://www.youtube.com/iframe_api";
                            var firstScriptTag = document.getElementsByTagName('script')[0];
                            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                            var autoplay = 1;
                            var playerInfoList = [
                                {
                                    id: 'W4ljOFyKEzA',
                                    height: '600',
                                    width: '100%',
                                    videoId: 'W4ljOFyKEzA'
                                },

                            ];


                            function onYouTubeIframeAPIReady() {
                                if (typeof playerInfoList === 'undefined') return;

                                for (var i = 0; i < playerInfoList.length; i++) {
                                    var curplayer = createPlayer(playerInfoList[i]);
                                    players[i] = curplayer;
                                }
                            }

                            var players = new Array();

                            function createPlayer(playerInfo) {
                                return new YT.Player(playerInfo.id, {
                                    height: playerInfo.height,
                                    width: playerInfo.width,
                                    videoId: playerInfo.videoId,
                                    events: {
                                        'onReady': onPlayerReady,
                                    },
                                    playerVars: {
                                        'autoplay': autoplay,
                                        'controls': 1,
                                        'modestbranding': 0,
                                        'rel': 0,
                                        'loop': 1,
                                        'playlist': playerInfo.id,
                                        'playsinline': 1
                                    }
                                });

                                function onPlayerReady(event) {
                                    if (autoplay == 1) {
                                        // this state is ready to go; so play, mute and fade in if set to autoplay
                                        // safari does not allow the div to be display: none, so set opacity to 0 and fade in
                                        $(players).each(function (i) {
                                            console.log(this);
                                            this.mute();
                                            this.playVideo();

                                        });
                                    }
                                    jQuery('.play-button').click(function (event) {
                                        jQuery(this).addClass('clicked');
                                        event.preventDefault();
                                        $(players).each(function (i) {
                                            console.log(this);
                                            this.playVideo();


                                        });


                                    });
                                }

                            }


                        </script>

                    </div>

                </div>
            </div>
        </div>


        <style>
            .video-background {
                position: relative;
                overflow: hidden;
                line-height: 0;
            }

            .video-background iframe {
                aspect-ratio: 16.05/9;
                width: 100%;
                transform: scale(1.005);
                height: 100%;
            }
        </style>
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

                                <div><img
                                        src="//theme.hstatic.net/200000342937/1001030312/14/whatwedotilesbigimage1.png?v=139">
                                </div>


                                <div><img
                                        src="//theme.hstatic.net/200000342937/1001030312/14/whatwedotilesbigimage2.png?v=139">
                                </div>

                            </div>
                        </div>
                        <div class="infothuonghieuflex2">
                            Thành lập tháng 3/2010, Ant Farm là một trong những&nbsp;<em>cô</em>ng ty uy tín hàng đầu trong
                            lĩnh vực xuất nhập khẩu nông sản. Sản phẩm của Ant Farm đã có mặt nhiều thị trường quốc tế như:&nbsp;Đông
                            Nam Á, Trung Đông, Châu Âu, thậm chí cả những thị trường khó tính như&nbsp;<em>Mỹ</em>, Canada,
                            Úc…
                            <div>&nbsp;</div>
                            <div><a target="_blank"
                                    href="https://antfarm.com.vn/pages/about-en?view=aboutus_new.vi"><strong>Đọc thêm
                                        more</strong></a></div>
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
                    <h3 class="headeroga_2">Sản phẩm Ant Farm đáp ứng <br>các tiêu chuẩn quốc tế </h3>
                </div>
                <div class="headerogaflex">
                    <div class="headerogaflex1">
                        <div class="headerogaflex1_1">
                            <div>
                                <img src="/site/image/home/chom-chom-hoa.jpg" style="height: 450px">
                            </div>
                            <div>
                                <img src="/site/image/home/xoai.jpg" style="height: 450px">
                            </div>
{{--                            <div class="poselative">--}}
{{--                                <img src="//theme.hstatic.net/200000342937/1001030312/14/uudiemshowicoimagebig2.png?v=139">--}}
{{--                                <a href="https://www.youtube.com/watch?v=dg5-5djrOUo"--}}
{{--                                   class="finvideomore cover-trigger fcy-video">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.24" height="16.583"--}}
{{--                                         viewBox="0 0 12.24 16.583">--}}
{{--                                        <path d="M17.57,7.966,6.119.07A.395.395,0,0,0,5.5.394V16.188a.395.395,0,0,0,.619.325l11.451-7.9a.395.395,0,0,0,0-.65Z"--}}
{{--                                              transform="translate(-5.5 0)"></path>--}}
{{--                                    </svg>--}}
{{--                                </a>--}}
{{--                            </div>--}}
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
            </div>
        </div>

    </section>


    <section class="awe-section-5" id="awe-section-5">

        <div class="wearegrow">
            <div class="container">
                <div class="wearegrowflex">
                    <div class="wearegrowflex1">
                        <div class="headsmall"></div>
                        <div class="headbig">
                            Tại sao bạn chọn <br>Ant Farm?
                        </div>
                    </div>
                    <div class="wearegrowflex2">
                        <div class="wearegrowflex2des">
                            Ant Farm góp phần thay đổi xu hướng người tiêu dùng, khuyến khích sử dụng các thực phẩm hữu cơ -
                            tự nhiên, đạt tiêu chuẩn Global GAP, ISO 22000, HACCP, FSSSC, VietGAP,....
                        </div>
                        <div class="wearegrowflex2desflex">
                            <div class="flexnumbergan">


                                <div class="flexnumberganitem">
                                    <div class="flexnumberganitem1">280</div>
                                    <div class="flexnumberganitem2">Sản lượng mỗi ngày (tấn)</div>
                                </div>


                                <div class="flexnumberganitem">
                                    <div class="flexnumberganitem1">17</div>
                                    <div class="flexnumberganitem2">Quốc gia xuất khẩu</div>
                                </div>


                                <div class="flexnumberganitem">
                                    <div class="flexnumberganitem1">2000</div>
                                    <div class="flexnumberganitem2">Xuất khẩu mỗi năm (cont)</div>
                                </div>


                                <div class="flexnumberganitem">
                                    <div class="flexnumberganitem1">09</div>
                                    <div class="flexnumberganitem2">Nhà máy, kho và chi nhánh</div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="awe-section-6" id="awe-section-6">

        <div class="iframemapmain">
            <div class="container">
                <div class="zitamap">
                    <img src="//theme.hstatic.net/200000342937/1001030312/14/mymapconisona.png?v=139"/>

                    <div class="handlesuplation pos1">

                        <div class="relative">
                            <span class="hoveron">Canada</span>
                            <img src="//theme.hstatic.net/200000342937/1001030312/14/pin-image.png?v=139"/>
                        </div>
                    </div>

                    <div class="handlesuplation pos2">

                        <div class="relative">
                            <span class="hoveron">USA</span>
                            <img src="//theme.hstatic.net/200000342937/1001030312/14/pin-image.png?v=139"/>
                        </div>
                    </div>

                    <div class="handlesuplation pos3">

                        <div class="relative">
                            <span class="hoveron">EU</span>
                            <img src="//theme.hstatic.net/200000342937/1001030312/14/pin-image.png?v=139"/>
                        </div>
                    </div>

                    <div class="handlesuplation pos4">

                        <div class="relative">
                            <span class="hoveron">China</span>
                            <img src="//theme.hstatic.net/200000342937/1001030312/14/pin-image.png?v=139"/>
                        </div>
                    </div>

                    <div class="handlesuplation pos5">

                        <div class="relative">
                            <span class="hoveron">Bangladesh</span>
                            <img src="//theme.hstatic.net/200000342937/1001030312/14/pin-image.png?v=139"/>
                        </div>
                    </div>

                    <div class="handlesuplation pos6">

                        <div class="relative">
                            <span class="hoveron">India</span>
                            <img src="//theme.hstatic.net/200000342937/1001030312/14/pin-image.png?v=139"/>
                        </div>
                    </div>

                    <div class="handlesuplation pos7">

                        <div class="relative">
					<span class="hoveron">Bahrain
Oman
Qatar
UAE
Arab Saudi</span>
                            <img src="//theme.hstatic.net/200000342937/1001030312/14/pin-image.png?v=139"/>
                        </div>
                    </div>

                    <div class="handlesuplation pos8">

                        <div class="relative">
					<span class="hoveron">Taiwan
HongKong</span>
                            <img src="//theme.hstatic.net/200000342937/1001030312/14/pin-image.png?v=139"/>
                        </div>
                    </div>

                    <div class="handlesuplation pos9">

                        <div class="relative">
					<span class="hoveron">Thailand
Malaysia
Singapore</span>
                            <img src="//theme.hstatic.net/200000342937/1001030312/14/pin-image.png?v=139"/>
                        </div>
                    </div>

                    <div class="handlesuplation pos10">

                        <div class="relative">
                            <span class="hoveron">Australia</span>
                            <img src="//theme.hstatic.net/200000342937/1001030312/14/pin-image.png?v=139"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="awe-section-8" id="awe-section-8">


        <div class="weareticle">

            <div class="container">

                <div class="headerarticle">
                    <div class="bigtitle">CHIA SẺ KIẾN THỨC</div>
                    <div class="smalltitle">Hiểu hơn về giá trị trong từng sản phẩm</div>
                </div>

                <div class="slideraticle">
                    @foreach($posts as $post)
                    <div>
                        <div class="itembg">
                            <div>
                                <a href="{{route('front.get-post-detail', $post->slug)}}">
                                    <img src="{{$post->image->path ?? ''}}"/>
                                </a>
                            </div>
                            <div class="wrapwhite">
                                <div class="blogtitle">
                                    <div href="javascript:void(0)"><b>{{$post->name}}</b></div>
                                    <div class="datepost">{{\Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y')}}</div>
                                </div>
                                <div>
                                    <a class="tztitle"
                                       href="{{route('front.get-post-detail', $post->slug)}}">
                                        {{$post->name}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="tintucviewmore">
                    <a href="{{route('front.get-posts')}}">Xem thêm</a>
                </div>

            </div>

        </div>

    </section>





        <div class="questionhigland">

            <div class="container">
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
