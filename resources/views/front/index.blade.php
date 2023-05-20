@extends('front.layouts.master')

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


                    <div>
                        <a href="{{route('front.category-product-get')}}">
                            <picture>
                                <source media="(min-width:768px)"
                                        srcset="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanh1.png?v=139">
                                <source media="(max-width:767px)"
                                        srcset="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanhmobile1.png?v=139">
                                <img src="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanh1.png?v=139"
                                     alt="">
                            </picture>

                            <span class="boxtionmaybe">
						<span class="boxtionmaybe_1"></span>
						<span class="boxtionmaybe_2"></span>

					</span>
                        </a>
                    </div>


                    <div>
                        <a href="{{route('front.category-product-get')}}">
                            <picture>
                                <source media="(min-width:768px)"
                                        srcset="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanh2.png?v=139">
                                <source media="(max-width:767px)"
                                        srcset="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanhmobile2.png?v=139">
                                <img src="//theme.hstatic.net/200000342937/1001030312/14/haidanhmuchinhanh2.png?v=139"
                                     alt="">
                            </picture>

                            <span class="boxtionmaybe">
						<span class="boxtionmaybe_1"></span>
						<span class="boxtionmaybe_2"></span>

					</span>
                        </a>
                    </div>


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
                            <img src="/site/image/home/a25.jpg">
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
                                <img src="//theme.hstatic.net/200000342937/1001030312/14/uudiemshowicoimagebig1.png?v=139">
                            </div>
                            <div class="poselative">
                                <img src="//theme.hstatic.net/200000342937/1001030312/14/uudiemshowicoimagebig2.png?v=139">
                                <a href="https://www.youtube.com/watch?v=dg5-5djrOUo"
                                   class="finvideomore cover-trigger fcy-video">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.24" height="16.583"
                                         viewBox="0 0 12.24 16.583">
                                        <path d="M17.57,7.966,6.119.07A.395.395,0,0,0,5.5.394V16.188a.395.395,0,0,0,.619.325l11.451-7.9a.395.395,0,0,0,0-.65Z"
                                              transform="translate(-5.5 0)"></path>
                                    </svg>
                                </a>
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


                    <div>
                        <div class="itembg">
                            <div>
                                <a href="	/blogs/suc-khoe-dinh-duong/rau-chan-vit-giam-huyet-ap-tu-nhien-an-toan">
                                    <img src="//file.hstatic.net/200000342937/article/rau-chan-vit-giam-huyet-ap-tu-nhien-an-toan-thumnail_f342182d2597428f89c581edd999040b_large.png"/>
                                </a>
                            </div>
                            <div class="wrapwhite">
                                <div class="blogtitle">
                                    <div href="javascript:void(0)"><b>Sức khỏe dinh dưỡng</b></div>
                                    <div class="datepost">12/04/2023</div>
                                </div>
                                <div>
                                    <a class="tztitle"
                                       href="	/blogs/suc-khoe-dinh-duong/rau-chan-vit-giam-huyet-ap-tu-nhien-an-toan">
                                        Rau Chân Vịt Giảm Huyết Áp Tự Nhiên, An Toàn
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="itembg">
                            <div>
                                <a href="	/blogs/suc-khoe-dinh-duong/an-rau-chan-vit-co-tot-cho-ba-bau-khong">
                                    <img src="//file.hstatic.net/200000342937/article/an-rau-chan-vit-co-tot-cho-ba-bau-khong_f836ddfc812a4915af74b3f32f64ce3a_large.jpg"/>
                                </a>
                            </div>
                            <div class="wrapwhite">
                                <div class="blogtitle">
                                    <div href="javascript:void(0)"><b>Sức khỏe dinh dưỡng</b></div>
                                    <div class="datepost">07/04/2023</div>
                                </div>
                                <div>
                                    <a class="tztitle"
                                       href="	/blogs/suc-khoe-dinh-duong/an-rau-chan-vit-co-tot-cho-ba-bau-khong">
                                        Ăn Rau Chân Vịt Có Tốt Cho Bà Bầu Không?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="itembg">
                            <div>
                                <a href="	/blogs/suc-khoe-dinh-duong/chom-chom-xuat-khau-mon-qua-viet-nam-day-tiem-nang">
                                    <img src="//file.hstatic.net/200000342937/article/chom-chom-xuat-khau-mon-qua-viet-nam-day-tiem-nang-thumnail_c11f05327fca4157ad5da9626621b595_large.png"/>
                                </a>
                            </div>
                            <div class="wrapwhite">
                                <div class="blogtitle">
                                    <div href="javascript:void(0)"><b>Sức khỏe dinh dưỡng</b></div>
                                    <div class="datepost">03/04/2023</div>
                                </div>
                                <div>
                                    <a class="tztitle"
                                       href="	/blogs/suc-khoe-dinh-duong/chom-chom-xuat-khau-mon-qua-viet-nam-day-tiem-nang">
                                        Chôm Chôm Xuất Khẩu – “Món Quà” Việt Nam Đầy Tiềm Năng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="itembg">
                            <div>
                                <a href="	/blogs/suc-khoe-dinh-duong/chom-chom-thang-may-vao-mua-dinh-duong-tu-chom-chom">
                                    <img src="//file.hstatic.net/200000342937/article/chom-chom-thang-may-vao-mua-dinh-duong-tu-chom-chom_891856732517463fb79ff54269d0e337_large.jpg"/>
                                </a>
                            </div>
                            <div class="wrapwhite">
                                <div class="blogtitle">
                                    <div href="javascript:void(0)"><b>Sức khỏe dinh dưỡng</b></div>
                                    <div class="datepost">21/03/2023</div>
                                </div>
                                <div>
                                    <a class="tztitle"
                                       href="	/blogs/suc-khoe-dinh-duong/chom-chom-thang-may-vao-mua-dinh-duong-tu-chom-chom">
                                        Chôm Chôm Tháng Mấy Vào Mùa? Dinh Dưỡng Từ Chôm Chôm
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="itembg">
                            <div>
                                <a href="	/blogs/suc-khoe-dinh-duong/cach-phan-biet-chom-chom-thai-va-chom-chom-thuong">
                                    <img src="//file.hstatic.net/200000342937/article/cach-phan-biet-chom-chom-thai-va-chom-chom-thuong-thumnail_3dd76d439a0048229adf68fddeb836a0_large.png"/>
                                </a>
                            </div>
                            <div class="wrapwhite">
                                <div class="blogtitle">
                                    <div href="javascript:void(0)"><b>Sức khỏe dinh dưỡng</b></div>
                                    <div class="datepost">17/03/2023</div>
                                </div>
                                <div>
                                    <a class="tztitle"
                                       href="	/blogs/suc-khoe-dinh-duong/cach-phan-biet-chom-chom-thai-va-chom-chom-thuong">
                                        Cách Phân Biệt Chôm Chôm Thái Và Chôm Chôm Thường
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="itembg">
                            <div>
                                <a href="	/blogs/suc-khoe-dinh-duong/phan-biet-rau-diep-xoan-radicchio-va-bap-cai-do">
                                    <img src="//file.hstatic.net/200000342937/article/phan-biet-rau-diep-xoan-radicchio-va-bap-cai-do-thumnail_4fe60d9a4e1540c1b72fc2fe50ee7052_large.png"/>
                                </a>
                            </div>
                            <div class="wrapwhite">
                                <div class="blogtitle">
                                    <div href="javascript:void(0)"><b>Sức khỏe dinh dưỡng</b></div>
                                    <div class="datepost">09/03/2023</div>
                                </div>
                                <div>
                                    <a class="tztitle"
                                       href="	/blogs/suc-khoe-dinh-duong/phan-biet-rau-diep-xoan-radicchio-va-bap-cai-do">
                                        PHÂN BIỆT RAU DIẾP XOĂN RADICCHIO VÀ BẮP CẢI ĐỎ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="itembg">
                            <div>
                                <a href="	/blogs/suc-khoe-dinh-duong/rau-diep-xoan-radicchio-la-gi-dinh-duong-cua-radicchio">
                                    <img src="//file.hstatic.net/200000342937/article/rau-diep-xoan-radicchio-la-gi-dinh-duong-cua-radicchio_0fb7e09138ce448eab79aece73784509_large.png"/>
                                </a>
                            </div>
                            <div class="wrapwhite">
                                <div class="blogtitle">
                                    <div href="javascript:void(0)"><b>Sức khỏe dinh dưỡng</b></div>
                                    <div class="datepost">08/03/2023</div>
                                </div>
                                <div>
                                    <a class="tztitle"
                                       href="	/blogs/suc-khoe-dinh-duong/rau-diep-xoan-radicchio-la-gi-dinh-duong-cua-radicchio">
                                        RAU DIẾP XOĂN (RADICCHIO) LÀ GÌ? DINH DƯỠNG CỦA RADICCHIO
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="itembg">
                            <div>
                                <a href="	/blogs/suc-khoe-dinh-duong/sau-rieng-dong-lanh-xuat-khau-mo-ra-co-hoi-tang-truong-kinh-te">
                                    <img src="//file.hstatic.net/200000342937/article/au-rieng-dong-lanh-xuat-khau-mo-ra-co-hoi-tang-truong-kinh-te-thumnail_79f3ebf7cff24b48b26efc989e9251b2_large.jpg"/>
                                </a>
                            </div>
                            <div class="wrapwhite">
                                <div class="blogtitle">
                                    <div href="javascript:void(0)"><b>Sức khỏe dinh dưỡng</b></div>
                                    <div class="datepost">02/02/2023</div>
                                </div>
                                <div>
                                    <a class="tztitle"
                                       href="	/blogs/suc-khoe-dinh-duong/sau-rieng-dong-lanh-xuat-khau-mo-ra-co-hoi-tang-truong-kinh-te">
                                        SẦU RIÊNG ĐÔNG LẠNH XUẤT KHẨU – MỞ RA CƠ HỘI TĂNG TRƯỞNG KINH TẾ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tintucviewmore">
                    <a href="/blogs/suc-khoe-dinh-duong">Xem thêm</a>
                </div>

            </div>

        </div>

    </section>


    <section class="awe-section-9" id="awe-section-9">

        <script src='/site/js/fancybox.umd.js' type='text/javascript'></script>
        <link href='/site/css/fancybox.css' rel='stylesheet' type='text/css' media='all'/>
        <link href='/site/css/a.scss.css?v=139' rel='stylesheet' type='text/css' media='all'/>
        <div id="section__video">
            <section class="section videos-gallery">
                <div class="container">
                    <div class="section-title a-center">

                        <h2 title="Chia sẻ những điều tuyệt vời của chúng tôi"><a href="">Chia sẻ những điều tuyệt vời của
                                chúng tôi</a></h2>


                    </div>
                    <div class="heading">
                        <a rel="noopener noreferrer nofollow" target="_blank"
                           href="https://www.youtube.com/watch?v=U2fv7vsJyyQ&t=32s" class="youtube-subcribe _blank">Xem thêm
                            trên <img loading="lazy"
                                      src="https://file.hstatic.net/200000112577/file/youtube_18028140f4254380abf40920001b9508.svg"
                                      alt></a>
                    </div>
                    <div class="video-wrap">
                        <div class="item-first item mianimage">
                            <div class="cover">
                            <span class="res ratio-16v9 full-widths"><img loading="lazy"
                                                                          src="https://file.hstatic.net/200000342937/file/packing_house_0e49cd022073462e891e8b01e6756215.jpg"
                                                                          alt=""></span>
                                <span class="cover-icon movie"><i class="fa fa-play"></i></span>
                                <a rel="nofollow" class="cover-trigger fcy-video"
                                   href="https://www.youtube.com/watch?v=CV-_v1VUhOE&t=94s" aria-label="" data-url="#"></a>
                            </div>
                            <div class="cover-content">
                                <h5><a rel="nofollow" class="fcy-video"
                                       href="https://www.youtube.com/watch?v=CV-_v1VUhOE&t=94s" title=""></a></h5>
                                <a href="https://www.youtube.com/watch?v=CV-_v1VUhOE&t=94s" class="view-more _blank"
                                   title="Chi tiết"><span>Chi tiết</span></a>
                            </div>
                        </div>
                        <div class="item-list checkheight">
                            <ul>
                                <li class="item">
                                    <div class="cover">
                                    <span class="res ratio-16v9"><img loading="lazy"
                                                                      src="https://file.hstatic.net/200000342937/file/sweet_potatoes_06239f701e834a3cad422821b2413f34.jpg"
                                                                      alt="SWEET POTATOES"></span>
                                        <span class="cover-icon movie"><i class="fa fa-play"></i></span>
                                        <a rel="nofollow" class="cover-trigger fcy-video"
                                           href="https://www.youtube.com/watch?v=qs58RsnzzlQ" aria-label="SWEET POTATOES"
                                           data-url="#"></a>
                                    </div>
                                    <div class="cover-content">
                                        <h6><a rel="nofollow" class="fcy-video"
                                               href="https://www.youtube.com/watch?v=qs58RsnzzlQ" title="SWEET POTATOES">SWEET
                                                POTATOES</a></h6>
                                        <a href="https://www.youtube.com/watch?v=qs58RsnzzlQ" class="view-more _blank"
                                           title="Chi tiết"><span>Chi tiết</span></a>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="cover">
                                    <span class="res ratio-16v9"><img loading="lazy"
                                                                      src="https://file.hstatic.net/200000342937/file/untitled-1_a7039ed2bd0c45e182ed8cfb22d86c9c.jpg"
                                                                      alt="DRAGON FRUIT"></span>
                                        <span class="cover-icon movie"><i class="fa fa-play"></i></span>
                                        <a rel="nofollow" class="cover-trigger fcy-video"
                                           href="https://www.youtube.com/watch?v=U2fv7vsJyyQ" aria-label="DRAGON FRUIT"
                                           data-url="#"></a>
                                    </div>
                                    <div class="cover-content">
                                        <h6><a rel="nofollow" class="fcy-video"
                                               href="https://www.youtube.com/watch?v=U2fv7vsJyyQ" title="DRAGON FRUIT">DRAGON
                                                FRUIT</a></h6>
                                        <a href="https://www.youtube.com/watch?v=U2fv7vsJyyQ" class="view-more _blank"
                                           title="Chi tiết"><span>Chi tiết</span></a>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="cover">
                                    <span class="res ratio-16v9"><img loading="lazy"
                                                                      src="https://file.hstatic.net/200000342937/file/guava_d7d72a293c894856b87749f8a1df2dfb.jpg"
                                                                      alt="GUAVA FARM"></span>
                                        <span class="cover-icon movie"><i class="fa fa-play"></i></span>
                                        <a rel="nofollow" class="cover-trigger fcy-video"
                                           href="https://www.youtube.com/watch?v=rfJx2CnBgTw" aria-label="GUAVA FARM"
                                           data-url="#"></a>
                                    </div>
                                    <div class="cover-content">
                                        <h6><a rel="nofollow" class="fcy-video"
                                               href="https://www.youtube.com/watch?v=rfJx2CnBgTw" title="GUAVA FARM">GUAVA
                                                FARM</a></h6>
                                        <a href="https://www.youtube.com/watch?v=rfJx2CnBgTw" class="view-more _blank"
                                           title="Chi tiết"><span>Chi tiết</span></a>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="cover">
                                    <span class="res ratio-16v9"><img loading="lazy"
                                                                      src="https://file.hstatic.net/200000342937/file/young_coconut_4910b2f463a24fb29fb9ffabccaa4088.jpg"
                                                                      alt="YOUNG COCONUT"></span>
                                        <span class="cover-icon movie"><i class="fa fa-play"></i></span>
                                        <a rel="nofollow" class="cover-trigger fcy-video"
                                           href="https://www.youtube.com/watch?v=8ROVsOd1VvQ&t=7s"
                                           aria-label="YOUNG COCONUT" data-url="#"></a>
                                    </div>
                                    <div class="cover-content">
                                        <h6><a rel="nofollow" class="fcy-video"
                                               href="https://www.youtube.com/watch?v=8ROVsOd1VvQ&t=7s"
                                               title="YOUNG COCONUT">YOUNG COCONUT</a></h6>
                                        <a href="https://www.youtube.com/watch?v=8ROVsOd1VvQ&t=7s" class="view-more _blank"
                                           title="Chi tiết"><span>Chi tiết</span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    </section>


    <section class="awe-section-10" id="awe-section-10">
        <div class="ganbannner">
            <div>
                <picture>
                    <source media="(min-width:768px)"
                            srcset="//theme.hstatic.net/200000342937/1001030312/14/bannerinfodes.png?v=139">
                    <source media="(max-width:767px)"
                            srcset="//theme.hstatic.net/200000342937/1001030312/14/bannerinfodesmobile.png?v=139">
                    <img src="//theme.hstatic.net/200000342937/1001030312/14/bannerinfodes.png?v=139" alt="">
                </picture>
                <div class="positionladipos">
                    <div class="title1"></div>
                    <div class="title2">Sản phẩm Ant Farm đã có mặt <br>tại hệ thống siêu thị lớn trên toàn quốc</div>
                    <div class="titlecontact">
                        <a class="titlecontactone" href="https://antfarm.com.vn/pages/ant-farm-supermarket-list">
                            Xem ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="awe-section-11" id="awe-section-11">

        <div class="sliderbrandning">
            <div class="container">
                <div class="mirunflex">


                    <div>
                        <img src="//theme.hstatic.net/200000342937/1001030312/14/home_brand_logo_1.png?v=139">
                    </div>


                    <div>
                        <img src="//theme.hstatic.net/200000342937/1001030312/14/home_brand_logo_2.png?v=139">
                    </div>


                    <div>
                        <img src="//theme.hstatic.net/200000342937/1001030312/14/home_brand_logo_3.png?v=139">
                    </div>


                    <div>
                        <img src="//theme.hstatic.net/200000342937/1001030312/14/home_brand_logo_4.png?v=139">
                    </div>


                    <div>
                        <img src="//theme.hstatic.net/200000342937/1001030312/14/home_brand_logo_5.png?v=139">
                    </div>


                    <div>
                        <img src="//theme.hstatic.net/200000342937/1001030312/14/home_brand_logo_6.png?v=139">
                    </div>


                </div>
            </div>
        </div>
    </section>


    <section class="awe-section-12" id="awe-section-12">


        <div class="questionhigland">

            <div class="container">
                <div class="title1">

                </div>
                <div class="title2">
                    Hãy để Ant Farm phục vụ bạn tốt hơn!!
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
