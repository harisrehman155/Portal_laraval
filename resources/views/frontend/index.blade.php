@extends('frontend/layout/main')

@section('content')
<section>
    <div class="gap no-gap owl-yellow">
        <div class="featured-area-wrap text-center">
            <div class="featured-area owl-carousel">
                <div class="featured-item" style="background-image: url({{ asset('frontend/images/resources/slide1.jpg') }}') }});">
                    <div class="featured-cap">
                        <img src="{{ asset('frontend/images/resources/bsml-txt.png') }}" alt="bsml-txt.png">
                        <h1><img src="{{ asset('frontend/images/resources/ayat-txt.png') }}" alt="ayat-txt-color.png"></h1>
                        <h3>He raised the sky and set up the balance</h3>
                        <span>"Surah Al-Rahmaan Vesre 7"</span>
                        <a class="thm-btn brd-rd40" href="#" title="">Read More</a>
                    </div>
                </div>
                <div class="featured-item" style="background-image: url({{ asset('frontend/images/resources/slide1.jpg') }});">
                    <div class="featured-cap">
                        <img src="{{ asset('frontend/images/resources/bsml-txt2.png') }}" alt="bsml-txt2.png">
                        <h1><img src="{{ asset('frontend/images/resources/ayat-txt2.png') }}" alt="ayat-txt2.png"></h1>
                        <h3>He raised the sky and set up the balance</h3>
                        <span>"Surah Al-Rahmaan Vesre 7"</span>
                        <a class="thm-btn brd-rd40" href="#" title="">Read More</a>
                    </div>
                </div>
            </div>
        </div><!-- Featured Area Wrap -->
    </div>
</section>
<section>
    <div class="gap">
        <div class="lft-shp shp-lyr"></div>
        <div class="container">
            <div class="plrs-wrap text-center remove-ext5">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-lg-3">
                        <div class="plr-box">
                            <i class="flaticon-islamic-pray"></i>
                            <div class="pilr-info">
                                <h4>Salah</h4>
                                <p>Salat ipsum dolor sit amet, consectetur adipiscing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-lg-3">
                        <div class="plr-box">
                            <i class="flaticon-islamic-ramadan"></i>
                            <div class="pilr-info">
                                <h4>Fasting</h4>
                                <p>Fasting ipsum dolor sit amet, consectetur adipiscing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-lg-3">
                        <div class="plr-box">
                            <i class="flaticon-charity"></i>
                            <div class="pilr-info">
                                <h4>Zakah</h4>
                                <p>Zakat ipsum dolor sit amet, consectetur adipiscing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-lg-3">
                        <div class="plr-box">
                            <i class="flaticon-kaaba-building"></i>
                            <div class="pilr-info">
                                <h4>Hajj</h4>
                                <p>Hajj ipsum dolor sit amet, consectetur adipiscing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Pillers Wrap -->
        </div>
    </div>
</section>
<section>
    <div class="gap white-grad-layer">
        <div class="fixed-bg" style="background-image: url({{ asset('frontend/images/parallax1.jpg') }});"></div>
        <div class="container">
            <div class="abot-wrap">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-lg-6">
                        <div class="abot-sec">
                            <div class="sec-title">
                                <div class="sec-title-inner">
                                    <span>About</span>
                                    <h3>Our Center</h3>
                                </div>
                            </div>
                            <p>Established in 1987 to serve people who are in need of funds or education. We are developing dolor sit amet. Click edit button to change this text. I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,Consectetur adipiscing elit. </p>
                            <a class="secndry-btn brd-rd40" href="#" title="">Learn More</a>
                        </div>
                    </div>
                </div>
            </div><!-- About Wrap -->
        </div>
    </div>
</section>
<section>
    <div class="gap">
        <div class="fixed-bg" style="background-image: url({{ asset('frontend/images/parallax2.jpg') }});"></div>
        <div class="container">
            <div class="sec-title text-center">
                <div class="sec-title-inner">
                    <span>Serving Humanity</span>
                    <h3>Our Services</h3>
                </div>
            </div>
            <div class="serv-wrap">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-lg-4">
                        <div class="srv-tl">
                            <h2>We're on a <span>Mission</span> to</h2>
                            <h5>solve the problems and gain resources for a new generation.</h5>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-lg-8">
                        <div class="remove-ext9">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="serv-box">
                                        <i class="flaticon-quran-rehal"></i>
                                        <div class="serv-info">
                                            <h4>Quran Learning</h4>
                                            <p>Quran Teaching dolor sit amet, coteudtur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="serv-box">
                                        <i class="flaticon-heart-1"></i>
                                        <div class="serv-info">
                                            <h4>Chartiy Service</h4>
                                            <p>Charity Events dolor sit amet, coteudtur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="serv-box">
                                        <i class="flaticon-mosque"></i>
                                        <div class="serv-info">
                                            <h4>Mosque Development</h4>
                                            <p>Mosque Renovation dolor sit amet, coteudtur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="serv-box">
                                        <i class="flaticon-social-care"></i>
                                        <div class="serv-info">
                                            <h4>Help Poor's</h4>
                                            <p>Help Your fellows dolor sit amet, coteudtur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Serv Wrap -->
        </div>
    </div>
</section>

<section>
    <div class="gap black-layer2 opc8 style-4-donate">
        <div class="fixed-bg" style="background-image: url({{ asset('frontend/images/parallax3.jpg') }});"></div>
        <div class="container">
            <div class="sec-title2 text-center">
                <div class="sec-title-inner">
                    <span>Support us,</span>
                    <h3>We need your help.</h3>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore. Duis aute irure dolor in reprehenit in voluptate.</p>
            </div>
            <div class="suprt-prgrs style2 text-center">
                <div class="suprt-prg" id="suprt-prg1"></div>
                <div class="suprt-prg" id="suprt-prg2"></div>
                <div class="suprt-prg" id="suprt-prg3"></div>
            </div>
            <div class="view-all text-center">
                <a class="thm-btn brd-rd40" href="#" title="">Donate Now</a>
            </div><!-- View All -->
        </div>
    </div>
</section>

<section>
    <div class="gap white-layer opc9">
        <div class="fixed-bg ptrn-bg" style="background-image: url({{ asset('frontend/images/pattern-bg.jpg') }});"></div>
        <div class="container">
            <div class="sec-title text-center">
                <div class="sec-title-inner">
                    <span>Our Expert</span>
                    <h3>Islamic Scholars</h3>
                </div>
                <p>Experts in the field amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="team-wrap text-center remove-ext5">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-lg-4">
                        <div class="team-box">
                            <img src="{{ asset('frontend/images/resources/team-img1-1.jpg') }}" alt="team-img1-1.jpg">
                            <div class="team-info">
                                <h4>Al Zahra</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                <div class="team-scl">
                                    <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                    <a href="#" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-4">
                        <div class="team-box">
                            <img src="{{ asset('frontend/images/resources/team-img1-2.jpg') }}" alt="team-img1-2.jpg">
                            <div class="team-info">
                                <h4>Umair</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                <div class="team-scl">
                                    <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                    <a href="#" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-4">
                        <div class="team-box">
                            <img src="{{ asset('frontend/images/resources/team-img1-3.jpg') }}" alt="team-img1-3.jpg">
                            <div class="team-info">
                                <h4>Fatima</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                <div class="team-scl">
                                    <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                    <a href="#" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Team Wrap -->
        </div>
    </div>
</section>
<section>
    <div class="gap gray-layer opc95">
        <div class="fixed-bg" style="background-image: url({{ asset('frontend/images/parallax4.jpg') }});"></div>
        <div class="container">
            <div class="evnt-pry-wrap">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-lg-8">
                        <div class="sec-title">
                            <div class="sec-title-inner">
                                <h3><span>Upcoming</span> Events</h3>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available.</p>
                        </div>
                        <div class="evnt-wrap remove-ext5">
                            <div class="row mrg20">
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="evnt-box">
                                        <div class="evnt-thmb">
                                            <a href="#" title=""><img src="{{ asset('frontend/images/resources/evnt-img1.jpg') }}" alt="evnt-img1.jpg"></a>
                                        </div>
                                        <div class="evnt-info">
                                            <h4><a href="#" title="">Islamic Teaching Event</a></h4>
                                            <ul class="pst-mta">
                                                <li class="thm-clr">07/10/2020</li>
                                                <li>12:00 AM to 02:00 PM</li>
                                            </ul>
                                            <p>Central masque, New town, Las Vegas MuslimHub Center</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="evnt-box">
                                        <div class="evnt-thmb">
                                            <a href="#" title=""><img src="{{ asset('frontend/images/resources/evnt-img2.jpg') }}" alt="evnt-img2.jpg"></a>
                                        </div>
                                        <div class="evnt-info">
                                            <h4><a href="#" title="">Islamic Teaching Event</a></h4>
                                            <ul class="pst-mta">
                                                <li class="thm-clr">10/10/2020</li>
                                                <li>12:00 AM to 02:00 PM</li>
                                            </ul>
                                            <p>Central masque, New town, Las Vegas MuslimHub Center</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Events Wrap -->
                    </div>
                    <div class="col-md-4 col-sm-12 col-lg-4">
                        <div class="sec-title">
                            <div class="sec-title-inner">
                                <h3>Prayer <span>Times</span></h3>
                            </div>
                        </div>
                        <ul class="prayer-times">
                            <li class="pry-tim-hed"><span>Salat</span><span>Start</span><span>Iqamah</span></li>
                            <li><span class="thm-clr">Fajar</span><span>03:58 am</span><span>04:45 am</span></li>
                            <li><span class="thm-clr">Sunrise</span><span>05:31 am</span><span>05:31 am</span></li>
                            <li><span class="thm-clr">Zuhr</span><span>12:47 pm</span><span>12:47 pm</span></li>
                            <li><span class="thm-clr">Asr</span><span>05:53 pm</span><span>05:50 pm</span></li>
                            <li><span class="thm-clr">Maghrib</span><span>08:04 pm</span><span>08:04 pm</span></li>
                            <li><span class="thm-clr">Isha</span><span>09:37 pm</span><span>09:30 pm</span></li>
                            <li><span class="thm-clr">Jumu'ah 1</span><span>01:15 pm</span><span>01:15 pm</span></li>
                        </ul>
                    </div>
                </div>
            </div><!-- Events & Prayer Wrap -->
        </div>
    </div>
</section>
<section>
    <div class="gap white-layer opc9">
        <div class="fixed-bg ptrn-bg" style="background-image: url({{ asset('frontend/images/pattern-bg.jpg') }});"></div>
        <div class="container">
            <div class="sec-title text-center">
                <div class="sec-title-inner">
                    <span>What Our</span>
                    <h3>Donator Say</h3>
                </div>
            </div>
            <div class="testi-wrap text-center">
                <div class="testi-car owl-carousel">
                    <div class="testi-itm">
                        <i><img src="{{ asset('frontend/images/resources/testi-img1.jpg') }}" alt="testi-img1.jpg"></i>
                        <div class="testi-info">
                            <h4>Abu Hassam Adam</h4>
                            <p><i>"</i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<i>"</i></p>
                        </div>
                    </div>
                    <div class="testi-itm">
                        <i><img src="{{ asset('frontend/images/resources/testi-img2.jpg') }}" alt="testi-img2.jpg"></i>
                        <div class="testi-info">
                            <h4>Abu Adam Hassam</h4>
                            <p><i>"</i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<i>"</i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="gap thm-layer opc9">
        <div class="fixed-bg" style="background-image: url({{ asset('frontend/images/parallax7.jpg') }});"></div>
        <div class="container">
            <div class="nwsltr-wrp text-center">
                <div class="nwsltr-innr">
                    <div class="nwsltr-title">
                        <h3>Newsletter</h3>
                        <span>Subscribe to our mailing list</span>
                    </div>
                    <form>
                        <input type="email" placeholder="Enter your email">
                        <button type="submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection