<script>
    $(document).ready(function () {

        setTimeout(function () {
            $(".weareticle .wrapwhite").matchHeight();

            var checkheight = $(".checkheight").height() - 17;
            $(".mianimage img").height(checkheight);


        }, 1000)


        $('.slideraticle').slick({
            dots: true,
            infinite: false,
            arrows: false,
            speed: 300,
            slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        $('.sliderbrandning .mirun').slick({
            dots: false,
            infinite: false,
            arrows: false,
            speed: 300,
            slidesToShow: 6,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 6,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    })

</script>


<style>
    .home-slider {

    }

    .home-slider img {
        height: calc(100vh - 91px);
        object-fit: cover;
    }

    body, html {
        overflow-x: hidden;
    }
</style>


<footer class="footer">
    <div class="content">

        <div class="site-footer">

            <div class="footer-inner padding-top-35 pb-lg-5">
                <div class="container">
                    <div class="row">


                        <div class="col-xs-12 col-sm-6 col-lg-3 colfooter1">
                            <div class="footer-widget">
                                <h3 class="hastog"><span>GIỚI THIỆU</span></h3>

                                <div class="footercontetnt">
                                   {!! $config->web_des !!}
                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-6 col-lg-3 colfooter2">
                            <div class="footer-widget">
                                <h3 class="hastog"><span>LIÊN HỆ</span></h3>

                                <div class="footercontent2">
                                    <div class="footercontent21">
                                        {{$config->address_company}}

                                    </div>
                                    <div class="footercontent22">
                                        ĐT: {{$config->zalo}}<br>

                                    <div class="footercontent23">

                                        {{$config->email}}
                                    </div>


                                </div>


                            </div>
                        </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-lg-3 colfooter3">
                            <div class="footer-widget">
                                <h3 class="hastog"><span>SẢN PHẨM</span></h3>
                                <ul class="list-menu list-blogs">

                                    <li><a href="{{route('front.category-product-get')}}">Danh mục sản phẩm</a></li>


                                </ul>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-6 col-lg-3 colfooter4">
                            <div class="footer-widget">
                                <h3 class="margin-bottom-20 hastog"><span>Liên kết</span></h3>
                                <div class="list-menusocail">


                                    <div class="flexcoialitem">
                                        <div>
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </div>
                                        <div><a href="{{$config->facebook}}">Facebook</a></div>
                                    </div>


                                    <div class="flexcoialitem">
                                        <div>
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </div>
                                        <div><a href="{{$config->twitter}}">Twiter</a></div>
                                    </div>

                                    <div class="flexcoialitem">
                                        <div>
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </div>
                                        <div><a href="{{$config->instagram}}">Instagram</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright clearfix">
            <div class="container">
                <div class="inner clearfix">
                    <div class="row">
                        <div class="col-md-6 text-center text-lg-left">
                            <span>© Bản quyền thuộc về <b>TGNIMEX</b></span>

                        </div>

                    </div>
                </div>

                <div class="back-to-top">
                    <i class="fa  fa-angle-up"></i>
                </div>


            </div>
        </div>
    </div>


</footer>

<!-- Add to cart -->
<div id="popupCartModal" class="modal fade" role="dialog">
</div>

<div class="ajax-load">
	<span class="loading-icon">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;"
             xml:space="preserve">
			<rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
				<animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
			</rect>
			<rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
				<animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
			</rect>
			<rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
				<animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
			</rect>
		</svg>
	</span>
</div>

<div class="loading awe-popup">
    <div class="overlay"></div>
    <div class="loader" title="2">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;"
             xml:space="preserve">
			<rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
            </rect>
            <rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
            </rect>
            <rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
            </rect>
		</svg>
    </div>

</div>


<div class="error-popup awe-popup">
    <div class="overlay no-background"></div>
    <div class="popup-inner content">
        <div class="error-message"></div>
    </div>
</div>
<div id="popup-cart" class="hidden" role="dialog">
    <div id="popup-cart-desktop" class="clearfix">
        <div class="title-popup-cart">
            <i class="fa fa-check" aria-hidden="true"></i> Bạn đã thêm <span class="cart-popup-name"
                                                                             style="color: red;"></span> vào giỏ hàng
        </div>

        <div class="content-popup-cart">
            <div class="thead-popup">
                <div style="width: 54%;" class="text-left">Sản phẩm</div>
                <div style="width: 15%;" class="text-center">Đơn giá</div>
                <div style="width: 15%;" class="text-center">Số lượng</div>
                <div style="width: 15%;" class="text-center">Thành tiền</div>
            </div>
            <div class="tbody-popup">
            </div>
            <div class="tfoot-popup">
                <div class="tfoot-popup-1 clearfix">
                    <div class="pull-left popup-ship">
                        <div class="title-quantity-popup">
                            <a href="/cart">
                                Giỏ hàng của bạn <i>(<b class="cart-popup-count"></b> sản phẩm)</i>
                            </a>
                        </div>
                    </div>
                    <div class="pull-right popup-total">
                        <p>Thành tiền: <span class="total-price"></span></p>
                    </div>
                </div>
                <div class="tfoot-popup-2 clearfix">
                    <a class="button btn-proceed-checkout" title="Tiến hành đặt hàng" href="/checkout"><span>Tiến hành đặt hàng</span></a>
                    <a class="button btn btn-gray btn-continue" title="Tới giỏ hàng" href="/cart"><span><span>Tới giỏ hàng</span></span></a>
                </div>
            </div>
        </div>
        <a title="Close" class="quickview-close close-window" href="javascript:;"
           onclick="$('#popup-cart').modal('hide');"><i class="fa  fa-times-circle"></i></a>
    </div>

</div>
<div id="myModal" class="modal fade" role="dialog">
</div>
<!-- Modal Đăng nhập -->
<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog wrap-modal-login" role="document">
        <div class="text-xs-center">
            <div id="loginx">
                <div class="row row-noGutter">


                    <div class="col-sm-12">
                        <div class="content a-left">
                            <h5 class="title-modal a-center">ĐĂNG NHẬP TÀI KHOẢN </h5>

                            <form accept-charset='UTF-8' action='/account/login' id='customer_login' method='post'>
                                <input name='form_type' type='hidden' value='customer_login'>
                                <input name='utf8' type='hidden' value='✓'>

                                <div class="form-signup">

                                </div>
                                <div class="form-signup clearfix">
                                    <fieldset class="form-group">
                                        <label>Email: </label>
                                        <input type="email" class="form-control form-control-lg" value=""
                                               name="customer[email]" required>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Mật khẩu: </label>
                                        <input type="password" class="form-control form-control-lg" value=""
                                               name="customer[password]" required>
                                    </fieldset>
                                    <div class="a-left">
                                        <p class="margin-bottom-15">Bạn quyên mật khẩu? Hãy bấm <a href="#"
                                                                                                   class="btn-link-style btn-link-style-active"
                                                                                                   onclick="showRecoverPasswordForm();return false;">tại
                                                đây</a></p>
                                        <!-- <a href="/account/register" class="btn-link-style">Đăng ký tài khoản mới</a> -->
                                    </div>
                                    <fieldset class="form-group">
                                        <input class="btn btn-primary btn-full" type="submit" value="Đăng nhập"/>
                                    </fieldset>


                                </div>


                                <input id='f3f44e03f1d043018b8275717abc12d2' name='g-recaptcha-response' type='hidden'>
                                <script src='/site/js/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script>
                                <script>grecaptcha.ready(function () {
                                        grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function (token) {
                                            document.getElementById('f3f44e03f1d043018b8275717abc12d2').value = token;
                                        });
                                    });</script>
                            </form>
                            <div class="link-popup"><p>
                                    Đăng nhập tài khoản Mạng xã hội hoặc đăng ký
                                    <a href="#" class="margin-top-20" data-dismiss="modal" data-toggle="modal"
                                       data-target="#dangky">tại đây</a>
                                </p>
                            </div>

                            <div style="text-align:center" id="wrap-social-login-plus"></div>
                        </div>

                    </div>
                </div>
            </div>

            <div id="recover-password" class="form-signup" style="display: none">
                <div class="row row-noGutter">

                    <div class="col-sm-12">
                        <div class="content a-center">
                            <h5 class="title-modal">Lấy lại mật khẩu</h5>
                            <p>Chúng tôi sẽ gửi thông tin lấy lại mật khẩu vào email đăng ký tài khoản của bạn</p>

                            <form accept-charset='UTF-8' action='/account/recover' method='post'>
                                <input name='form_type' type='hidden' value='recover_customer_password'>
                                <input name='utf8' type='hidden' value='✓'>

                                <div class="form-signup">

                                </div>
                                <div class="form-signup clearfix">
                                    <fieldset class="form-group">
                                        <input type="email" class="form-control form-control-lg" value="" name="email"
                                               required>
                                    </fieldset>
                                </div>
                                <div class="action_bottom">
                                    <input class="btn btn-primary btn-full" type="submit" value="Gửi"/>
                                    <a href="#"
                                       class="margin-top-10 btn  btn-full btn-dark btn-style-active btn-recover-cancel"
                                       onclick="hideRecoverPasswordForm();return false;">Hủy</a>
                                </div>

                                <input id='db4082a11d9e438cbdabd000fac43e32' name='g-recaptcha-response' type='hidden'>
                                <script src='/site/js/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script>
                                <script>grecaptcha.ready(function () {
                                        grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function (token) {
                                            document.getElementById('db4082a11d9e438cbdabd000fac43e32').value = token;
                                        });
                                    });</script>
                            </form>
                            <div class="margin-top-10"><p>Chào mừng bạn đến với <a href="/">Ant Farm - Trái cây - Rau
                                        nhập khẩu - Nông sản Việt</a></p></div>
                        </div>
                    </div>

                </div>

            </div>

            <script type="text/javascript">
                function showRecoverPasswordForm() {
                    document.getElementById('recover-password').style.display = 'block';
                    document.getElementById('loginx').style.display = 'none';
                }

                function hideRecoverPasswordForm() {
                    document.getElementById('recover-password').style.display = 'none';
                    document.getElementById('loginx').style.display = 'block';
                }

                if (window.location.hash == '#recover') {
                    showRecoverPasswordForm()
                }
            </script>

        </div>
        <button type="button" class="btn btn-close btn-default" data-dismiss="modal"><i class="fa fa-close"></i>
        </button>
    </div>
</div>
<!-- Modal Đăng ký-->
<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog wrap-modal-login" role="document">
        <div class="text-xs-center">
            <div id="login">
                <div class="row row-noGutter">


                    <div class="col-sm-12">
                        <div class="content a-left">
                            <h5 class="title-modal a-center">ĐĂNG KÝ TÀI KHOẢN</h5>

                            <form accept-charset='UTF-8' action='/account' id='create_customer' method='post'>
                                <input name='form_type' type='hidden' value='create_customer'>
                                <input name='utf8' type='hidden' value='✓'>

                                <div class="form-signup">

                                </div>
                                <div class="form-signup clearfix">
                                    <fieldset class="form-group">
                                        <label>Họ</label>
                                        <input type="text" class="form-control form-control-lg" value=""
                                               name="customer[last_name]" required>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Tên</label>
                                        <input type="text" class="form-control form-control-lg" value=""
                                               name="customer[first_name]" required>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control form-control-lg" value=""
                                               name="customer[email]" required="">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" class="form-control form-control-lg" value=""
                                               name="customer[password]" required>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <button value="Đăng ký" class="btn btn-primary btn-full">Đăng ký</button>
                                    </fieldset>

                                </div>

                                <input id='1896d75266de4c4ab84f5da901b7e986' name='g-recaptcha-response' type='hidden'>
                                <script src='/site/js/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script>
                                <script>grecaptcha.ready(function () {
                                        grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function (token) {
                                            document.getElementById('1896d75266de4c4ab84f5da901b7e986').value = token;
                                        });
                                    });</script>
                            </form>

                            <div class="link-popup"><p>
                                    Đã có tài khoản đăng nhập
                                    <a href="#" class="margin-top-20" data-dismiss="modal" data-toggle="modal"
                                       data-target="#dangnhap">tại đây</a>
                                </p></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <button type="button" class="btn btn-close btn-default" data-dismiss="modal"><i class="fa fa-close"></i>
        </button>
    </div>
</div>


<div class="addThis_listSharing hidden-xs ">
    <ul class="addThis_listing">
        <li class="addThis_item">
            <a class="addThis_item--icon" href="tel:{{$config->hotline}}" rel="nofollow" aria-label="phone">

                <img src="https://file.hstatic.net/200000342937/file/hotline-tk_3797f4f9227b476e9ed195c6ee344e25.gif"/>

                <span class="tooltip-text">Hotline</span>
            </a>
        </li>
        <li class="addThis_item">
            <a class="addThis_item--icon" href="https://zalo.me/{{$config->zalo}}" target="_blank" rel="nofollow noreferrer"
               aria-label="zalo">

                <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="22" cy="22" r="22" fill="url(#paint4_linear)"/>
                    <g clip-path="url(#clip0)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M15.274 34.0907C15.7773 34.0856 16.2805 34.0804 16.783 34.0804C16.7806 34.0636 16.7769 34.0479 16.7722 34.0333C16.777 34.0477 16.7808 34.0632 16.7832 34.0798C16.8978 34.0798 17.0124 34.0854 17.127 34.0965H25.4058C26.0934 34.0965 26.7809 34.0977 27.4684 34.0989C28.8434 34.1014 30.2185 34.1039 31.5935 34.0965H31.6222C33.5357 34.0798 35.0712 32.5722 35.0597 30.7209V27.4784C35.0597 27.4582 35.0612 27.4333 35.0628 27.4071C35.0676 27.3257 35.0731 27.2325 35.0368 27.2345C34.9337 27.2401 34.7711 27.2757 34.7138 27.3311C34.2744 27.6145 33.8483 27.924 33.4222 28.2335C32.57 28.8525 31.7179 29.4715 30.7592 29.8817C27.0284 31.0993 23.7287 31.157 20.2265 30.3385C20.0349 30.271 19.9436 30.2786 19.7816 30.292C19.6773 30.3007 19.5436 30.3118 19.3347 30.3068C19.3093 30.3077 19.2829 30.3085 19.2554 30.3093C18.9099 30.3197 18.4083 30.3348 17.8088 30.6877C16.4051 31.1034 14.5013 31.157 13.5175 31.0147C13.522 31.0245 13.5247 31.0329 13.5269 31.0407C13.5236 31.0341 13.5204 31.0275 13.5173 31.0208C13.5036 31.0059 13.4864 30.9927 13.4696 30.98C13.4163 30.9393 13.3684 30.9028 13.46 30.8268C13.4867 30.8102 13.5135 30.7929 13.5402 30.7757C13.5937 30.7412 13.6472 30.7067 13.7006 30.6771C14.4512 30.206 15.1559 29.6905 15.6199 28.9311C16.2508 28.1911 15.9584 27.9025 15.4009 27.3524L15.3799 27.3317C12.6639 24.6504 11.8647 21.8054 12.148 17.9785C12.486 15.8778 13.4829 14.0708 14.921 12.4967C15.7918 11.5433 16.8288 10.7729 17.9632 10.1299C17.9796 10.1198 17.9987 10.1116 18.0182 10.1032C18.0736 10.0793 18.1324 10.0541 18.1408 9.98023C18.1475 9.92191 18.0507 9.90264 18.0163 9.90264C17.3698 9.90264 16.7316 9.89705 16.0964 9.89148C14.8346 9.88043 13.5845 9.86947 12.3041 9.90265C10.465 9.95254 8.78889 11.1779 8.81925 13.3614C8.82689 17.2194 8.82435 21.0749 8.8218 24.9296C8.82053 26.8567 8.81925 28.7835 8.81925 30.7104C8.81925 32.5007 10.2344 34.0028 12.085 34.0749C13.1465 34.1125 14.2107 34.1016 15.274 34.0907ZM13.5888 31.1403C13.5935 31.1467 13.5983 31.153 13.6032 31.1594C13.7036 31.2455 13.8031 31.3325 13.9021 31.4202C13.8063 31.3312 13.7072 31.2423 13.6035 31.1533C13.5982 31.1487 13.5933 31.1444 13.5888 31.1403ZM16.5336 33.8108C16.4979 33.7885 16.4634 33.7649 16.4337 33.7362C16.4311 33.7358 16.4283 33.7352 16.4254 33.7345C16.4281 33.7371 16.4308 33.7397 16.4335 33.7423C16.4632 33.7683 16.4978 33.79 16.5336 33.8108Z"
                              fill="white"/>
                        <path d="M17.6768 21.6754C18.5419 21.6754 19.3555 21.6698 20.1633 21.6754C20.6159 21.6809 20.8623 21.8638 20.9081 22.213C20.9597 22.6509 20.6961 22.9447 20.2034 22.9502C19.2753 22.9613 18.3528 22.9558 17.4247 22.9558C17.1554 22.9558 16.8919 22.9669 16.6226 22.9502C16.2903 22.9336 15.9637 22.8671 15.8033 22.5345C15.6429 22.2019 15.7575 21.9026 15.9752 21.631C16.8575 20.5447 17.7455 19.4527 18.6336 18.3663C18.6851 18.2998 18.7367 18.2333 18.7883 18.1723C18.731 18.0781 18.6508 18.1224 18.582 18.1169C17.9633 18.1114 17.3388 18.1169 16.72 18.1114C16.5768 18.1114 16.4335 18.0947 16.296 18.067C15.9695 17.995 15.7689 17.679 15.8434 17.3686C15.895 17.158 16.0669 16.9862 16.2846 16.9363C16.4221 16.903 16.5653 16.8864 16.7085 16.8864C17.7284 16.8809 18.7539 16.8809 19.7737 16.8864C19.9571 16.8809 20.1347 16.903 20.3123 16.9474C20.7019 17.0749 20.868 17.4241 20.7133 17.7899C20.5758 18.1058 20.3581 18.3774 20.1404 18.649C19.3899 19.5747 18.6393 20.4948 17.8888 21.4093C17.8258 21.4814 17.7685 21.5534 17.6768 21.6754Z"
                              fill="white"/>
                        <path d="M24.3229 18.7604C24.4604 18.5886 24.6036 18.4279 24.8385 18.3835C25.2911 18.2948 25.7151 18.5775 25.7208 19.021C25.738 20.1295 25.7323 21.2381 25.7208 22.3467C25.7208 22.6349 25.526 22.8899 25.2453 22.973C24.9588 23.0783 24.6322 22.9952 24.4432 22.7568C24.3458 22.6404 24.3057 22.6183 24.1682 22.7236C23.6468 23.1338 23.0567 23.2058 22.4207 23.0063C21.4009 22.6848 20.9827 21.9143 20.8681 20.9776C20.7478 19.9632 21.0973 19.0986 22.0369 18.5664C22.816 18.1175 23.6067 18.1563 24.3229 18.7604ZM22.2947 20.7836C22.3061 21.0275 22.3863 21.2603 22.5353 21.4543C22.8447 21.8534 23.4348 21.9365 23.8531 21.6372C23.9218 21.5873 23.9848 21.5263 24.0421 21.4543C24.363 21.033 24.363 20.3402 24.0421 19.9189C23.8817 19.7027 23.6296 19.5752 23.3603 19.5697C22.7301 19.5309 22.289 20.002 22.2947 20.7836ZM28.2933 20.8168C28.2474 19.3923 29.2157 18.3281 30.5907 18.2893C32.0517 18.245 33.1174 19.1928 33.1632 20.5785C33.209 21.9808 32.321 22.973 30.9517 23.106C29.4563 23.2502 28.2704 22.2026 28.2933 20.8168ZM29.7313 20.6838C29.7199 20.961 29.8058 21.2326 29.9777 21.4598C30.2928 21.8589 30.8829 21.9365 31.2955 21.6261C31.3585 21.5818 31.41 21.5263 31.4616 21.4709C31.7939 21.0496 31.7939 20.3402 31.4673 19.9189C31.3069 19.7083 31.0548 19.5752 30.7855 19.5697C30.1668 19.5364 29.7313 19.991 29.7313 20.6838ZM27.7891 19.7138C27.7891 20.573 27.7948 21.4321 27.7891 22.2912C27.7948 22.6848 27.474 23.0118 27.0672 23.0229C26.9985 23.0229 26.924 23.0174 26.8552 23.0007C26.5688 22.9287 26.351 22.6349 26.351 22.2857V17.8791C26.351 17.6186 26.3453 17.3636 26.351 17.1031C26.3568 16.6763 26.6375 16.3992 27.0615 16.3992C27.4969 16.3936 27.7891 16.6708 27.7891 17.1142C27.7948 17.9789 27.7891 18.8491 27.7891 19.7138Z"
                              fill="white"/>
                        <path d="M22.2947 20.7828C22.289 20.0013 22.7302 19.5302 23.3547 19.5634C23.6239 19.5745 23.876 19.702 24.0364 19.9181C24.3573 20.3339 24.3573 21.0322 24.0364 21.4535C23.7271 21.8526 23.1369 21.9357 22.7187 21.6364C22.65 21.5865 22.5869 21.5255 22.5296 21.4535C22.3864 21.2595 22.3062 21.0267 22.2947 20.7828ZM29.7314 20.683C29.7314 19.9957 30.1668 19.5357 30.7856 19.569C31.0549 19.5745 31.307 19.7075 31.4674 19.9181C31.794 20.3394 31.794 21.0544 31.4617 21.4701C31.1408 21.8636 30.545 21.9302 30.1382 21.6198C30.0752 21.5754 30.0236 21.52 29.9778 21.459C29.8059 21.2318 29.7257 20.9602 29.7314 20.683Z"
                              fill="#0068FF"/>
                    </g>
                    <defs>
                        <linearGradient id="paint4_linear" x1="22" y1="0" x2="22" y2="44"
                                        gradientUnits="userSpaceOnUse">
                            <stop offset="50%" stop-color="#4a90e2"/>
                            <stop offset="100%" stop-color="#4a90e2"/>
                        </linearGradient>
                        <clipPath id="clip0">
                            <rect width="26.3641" height="24.2" fill="white" transform="translate(8.78906 9.90234)"/>
                        </clipPath>
                    </defs>
                </svg>

                <span class="tooltip-text">Tư vấn Zalo</span>
            </a>
        </li>


        <li class="addThis_item">
            <a class="addThis_item--icon" rel="nofollow noreferrer" target="_blank" href="#"
               aria-label="email">

                <img src="https://file.hstatic.net/200000342937/file/ts-fb-icon_95793a59510e4389b65a6e7d660fa17c.png"/>

                <span class="tooltip-text">Tư vấn Messenger</span>
            </a>
        </li>


    </ul>
</div>
<div class="actionToolbar_mobile visible-xs  ">
    <ul class="actionToolbar_listing">
        <li>
            <a href="tel:0977338686" rel="nofollow" aria-label="phone">

                <img class="toolbar_icon"
                     src="https://file.hstatic.net/200000342937/file/hotline-tk_3797f4f9227b476e9ed195c6ee344e25.gif"/>

            </a>
        </li>
        <li>
            <a href="https://zalo.me/0977338686" target="_blank" rel="nofollow noreferrer" aria-label="zalo">

                <svg viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M15.274 34.0907C15.7773 34.0856 16.2805 34.0804 16.783 34.0804C16.7806 34.0636 16.7769 34.0479 16.7722 34.0333C16.777 34.0477 16.7808 34.0632 16.7832 34.0798C16.8978 34.0798 17.0124 34.0854 17.127 34.0965H25.4058C26.0934 34.0965 26.7809 34.0977 27.4684 34.0989C28.8434 34.1014 30.2185 34.1039 31.5935 34.0965H31.6222C33.5357 34.0798 35.0712 32.5722 35.0597 30.7209V27.4784C35.0597 27.4582 35.0612 27.4333 35.0628 27.4071C35.0676 27.3257 35.0731 27.2325 35.0368 27.2345C34.9337 27.2401 34.7711 27.2757 34.7138 27.3311C34.2744 27.6145 33.8483 27.924 33.4222 28.2335C32.57 28.8525 31.7179 29.4715 30.7592 29.8817C27.0284 31.0993 23.7287 31.157 20.2265 30.3385C20.0349 30.271 19.9436 30.2786 19.7816 30.292C19.6773 30.3007 19.5436 30.3118 19.3347 30.3068C19.3093 30.3077 19.2829 30.3085 19.2554 30.3093C18.9099 30.3197 18.4083 30.3348 17.8088 30.6877C16.4051 31.1034 14.5013 31.157 13.5175 31.0147C13.522 31.0245 13.5247 31.0329 13.5269 31.0407C13.5236 31.0341 13.5204 31.0275 13.5173 31.0208C13.5036 31.0059 13.4864 30.9927 13.4696 30.98C13.4163 30.9393 13.3684 30.9028 13.46 30.8268C13.4867 30.8102 13.5135 30.7929 13.5402 30.7757C13.5937 30.7412 13.6472 30.7067 13.7006 30.6771C14.4512 30.206 15.1559 29.6905 15.6199 28.9311C16.2508 28.1911 15.9584 27.9025 15.4009 27.3524L15.3799 27.3317C12.6639 24.6504 11.8647 21.8054 12.148 17.9785C12.486 15.8778 13.4829 14.0708 14.921 12.4967C15.7918 11.5433 16.8288 10.7729 17.9632 10.1299C17.9796 10.1198 17.9987 10.1116 18.0182 10.1032C18.0736 10.0793 18.1324 10.0541 18.1408 9.98023C18.1475 9.92191 18.0507 9.90264 18.0163 9.90264C17.3698 9.90264 16.7316 9.89705 16.0964 9.89148C14.8346 9.88043 13.5845 9.86947 12.3041 9.90265C10.465 9.95254 8.78889 11.1779 8.81925 13.3614C8.82689 17.2194 8.82435 21.0749 8.8218 24.9296C8.82053 26.8567 8.81925 28.7835 8.81925 30.7104C8.81925 32.5007 10.2344 34.0028 12.085 34.0749C13.1465 34.1125 14.2107 34.1016 15.274 34.0907ZM13.5888 31.1403C13.5935 31.1467 13.5983 31.153 13.6032 31.1594C13.7036 31.2455 13.8031 31.3325 13.9021 31.4202C13.8063 31.3312 13.7072 31.2423 13.6035 31.1533C13.5982 31.1487 13.5933 31.1444 13.5888 31.1403ZM16.5336 33.8108C16.4979 33.7885 16.4634 33.7649 16.4337 33.7362C16.4311 33.7358 16.4283 33.7352 16.4254 33.7345C16.4281 33.7371 16.4308 33.7397 16.4335 33.7423C16.4632 33.7683 16.4978 33.79 16.5336 33.8108Z"></path>
                        <path d="M17.6768 21.6754C18.5419 21.6754 19.3555 21.6698 20.1633 21.6754C20.6159 21.6809 20.8623 21.8638 20.9081 22.213C20.9597 22.6509 20.6961 22.9447 20.2034 22.9502C19.2753 22.9613 18.3528 22.9558 17.4247 22.9558C17.1554 22.9558 16.8919 22.9669 16.6226 22.9502C16.2903 22.9336 15.9637 22.8671 15.8033 22.5345C15.6429 22.2019 15.7575 21.9026 15.9752 21.631C16.8575 20.5447 17.7455 19.4527 18.6336 18.3663C18.6851 18.2998 18.7367 18.2333 18.7883 18.1723C18.731 18.0781 18.6508 18.1224 18.582 18.1169C17.9633 18.1114 17.3388 18.1169 16.72 18.1114C16.5768 18.1114 16.4335 18.0947 16.296 18.067C15.9695 17.995 15.7689 17.679 15.8434 17.3686C15.895 17.158 16.0669 16.9862 16.2846 16.9363C16.4221 16.903 16.5653 16.8864 16.7085 16.8864C17.7284 16.8809 18.7539 16.8809 19.7737 16.8864C19.9571 16.8809 20.1347 16.903 20.3123 16.9474C20.7019 17.0749 20.868 17.4241 20.7133 17.7899C20.5758 18.1058 20.3581 18.3774 20.1404 18.649C19.3899 19.5747 18.6393 20.4948 17.8888 21.4093C17.8258 21.4814 17.7685 21.5534 17.6768 21.6754Z"></path>
                        <path d="M24.3229 18.7604C24.4604 18.5886 24.6036 18.4279 24.8385 18.3835C25.2911 18.2948 25.7151 18.5775 25.7208 19.021C25.738 20.1295 25.7323 21.2381 25.7208 22.3467C25.7208 22.6349 25.526 22.8899 25.2453 22.973C24.9588 23.0783 24.6322 22.9952 24.4432 22.7568C24.3458 22.6404 24.3057 22.6183 24.1682 22.7236C23.6468 23.1338 23.0567 23.2058 22.4207 23.0063C21.4009 22.6848 20.9827 21.9143 20.8681 20.9776C20.7478 19.9632 21.0973 19.0986 22.0369 18.5664C22.816 18.1175 23.6067 18.1563 24.3229 18.7604ZM22.2947 20.7836C22.3061 21.0275 22.3863 21.2603 22.5353 21.4543C22.8447 21.8534 23.4348 21.9365 23.8531 21.6372C23.9218 21.5873 23.9848 21.5263 24.0421 21.4543C24.363 21.033 24.363 20.3402 24.0421 19.9189C23.8817 19.7027 23.6296 19.5752 23.3603 19.5697C22.7301 19.5309 22.289 20.002 22.2947 20.7836ZM28.2933 20.8168C28.2474 19.3923 29.2157 18.3281 30.5907 18.2893C32.0517 18.245 33.1174 19.1928 33.1632 20.5785C33.209 21.9808 32.321 22.973 30.9517 23.106C29.4563 23.2502 28.2704 22.2026 28.2933 20.8168ZM29.7313 20.6838C29.7199 20.961 29.8058 21.2326 29.9777 21.4598C30.2928 21.8589 30.8829 21.9365 31.2955 21.6261C31.3585 21.5818 31.41 21.5263 31.4616 21.4709C31.7939 21.0496 31.7939 20.3402 31.4673 19.9189C31.3069 19.7083 31.0548 19.5752 30.7855 19.5697C30.1668 19.5364 29.7313 19.991 29.7313 20.6838ZM27.7891 19.7138C27.7891 20.573 27.7948 21.4321 27.7891 22.2912C27.7948 22.6848 27.474 23.0118 27.0672 23.0229C26.9985 23.0229 26.924 23.0174 26.8552 23.0007C26.5688 22.9287 26.351 22.6349 26.351 22.2857V17.8791C26.351 17.6186 26.3453 17.3636 26.351 17.1031C26.3568 16.6763 26.6375 16.3992 27.0615 16.3992C27.4969 16.3936 27.7891 16.6708 27.7891 17.1142C27.7948 17.9789 27.7891 18.8491 27.7891 19.7138Z"></path>
                        <path d="M22.2947 20.7828C22.289 20.0013 22.7302 19.5302 23.3547 19.5634C23.6239 19.5745 23.876 19.702 24.0364 19.9181C24.3573 20.3339 24.3573 21.0322 24.0364 21.4535C23.7271 21.8526 23.1369 21.9357 22.7187 21.6364C22.65 21.5865 22.5869 21.5255 22.5296 21.4535C22.3864 21.2595 22.3062 21.0267 22.2947 20.7828ZM29.7314 20.683C29.7314 19.9957 30.1668 19.5357 30.7856 19.569C31.0549 19.5745 31.307 19.7075 31.4674 19.9181C31.794 20.3394 31.794 21.0544 31.4617 21.4701C31.1408 21.8636 30.545 21.9302 30.1382 21.6198C30.0752 21.5754 30.0236 21.52 29.9778 21.459C29.8059 21.2318 29.7257 20.9602 29.7314 20.683Z"
                              fill="#fff"></path>
                    </g>
                </svg>

            </a>
        </li>

        <!-- chatbot harafunnel -->
        <li class="actionToolbar_chatbot">
            <a href="https://fb.com/antfarm.com.vn" target="_blank" rel="nofollow noreferrer" aria-label="messenger">
				<span class="messenger_absolute ">

				<img class="toolbar_icon"
                     src="https://file.hstatic.net/200000342937/file/ts-fb-icon_95793a59510e4389b65a6e7d660fa17c.png"/>
								</span>
            </a>
        </li>
    </ul>
</div>

<!-- Haravan javascript customer -->

<!-- Haravan javascript -->
<script src='/site/js/option-selectors.js?v=139' type='text/javascript'></script>
<script src='/site/js/api.jquery.js' type='text/javascript'></script>

<!-- Plugin JS -->

<script src='/site/js/appear.js?v=139' type='text/javascript'></script>
{{--<script src='/site/js/owl.carousel.min.js?v=139' type='text/javascript'></script>--}}
<script src="/site/js/bootstrap.min.js"></script>

<script src='/site/js/dl_function.js?v=139' type='text/javascript'></script>
<script src='/site/js/dl_api.js?v=139' type='text/javascript'></script>
<script src='/site/js/rx-all-min.js?v=139' type='text/javascript'></script>

<!-- Quick view -->

<script src='/site/js/quickview.js?v=139' type='text/javascript'></script>

<!-- Main JS -->
<script src='/site/js/dl_main.js?v=139' type='text/javascript'></script>

<script src="/site/js/jquery-ui.min.js"></script>

<!-- Product detail JS,CSS -->


<script>

    <!-- ================= Fonts ================== -->


    var resource = document.createElement('link');
    resource.setAttribute("rel", "stylesheet");
    resource.setAttribute("href", "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    resource.setAttribute("type", "text/css");
    var head = document.getElementsByTagName('head')[0];
    head.appendChild(resource);


</script>

<div id="fb-root">

</div>


<!-- Cờ -->
<div class="theme__template hide d-none">index.vi</div>

<script>
    $(function () {
        var url = window.location.href;
        sessionStorage.setItem('template', 'vi');

        $('.lang__en').on('click', function () {
            sessionStorage.setItem('template', 'en');
            if ($('.theme__template').text().indexOf('article') > -1 || $('.theme__template').text().indexOf('blog') > -1) {
                window.location = window.location.origin;
            } else {
                if (url.indexOf('?') > -1) {
                    if (url.indexOf('?view=') > -1) {
                        if (url.indexOf('&page') > -1) {
                            window.location = url.replace('?view=vi', '').replace('&page', '?page')
                        } else {
                            window.location = url.split('?view=')[0];
                        }
                    } else if (url.indexOf('&view=') > -1) {
                        window.location = url.split('&view=')[0];
                    }
                } else {
                    if ($('.theme__template').text().trim().indexOf('page.') > -1 && $('.theme__template').text().trim().indexOf('blog-page.') == -1) {
                        window.location = $('.page__handle').text().trim();
                    } else {
                        window.location = url.split('?view=')[0];
                    }
                }
            }
        })

        $('.lang__vi').on('click', function () {
            window.location = url;
        })
    })
</script>
<!-- Cờ - end -->


<script>
    $(".memoryse").click(function (e) {
        e.preventDefault();
        $(this).parent().toggleClass("activei")
    })
</script>
