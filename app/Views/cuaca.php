<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Start Features Area -->
<section class="Features section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-12 d-flex justify-content-center align-items-center">
                <!-- weather widget start -->
                <div class="wow fadeInLeft" id="m-booked-vertical-one-prime-31041" data-wow-delay="0.3s">
                    <div class="weather-customize weather-booked-vertical-one-prime" style="width:300px;">
                        <div class="booked-vertical-prime-in">
                            <div class="booked-vertical-prime">
                                <div class="bwop-city">Cirebon</div>
                                <div class="bwop-icon wm03 "></div>
                                <div class="booked-bwop-today">
                                    <div class="booked-bwop-today-temperature">
                                        <div class="booked-wzs-bwop-val">
                                            <div class="booked-bwop-number"><span class="plus">+</span>31</div>
                                            <div class="booked-bwop-dergee">
                                                <div class="booked-wzs-bwop-dergee-val">&deg;</div>
                                                <div class="booked-wzs-bwop-dergee-name">C</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="booked-bwop-today-extreme">
                                        <div class="booked-bwop booked-pd-h"><span>Tinggi:</span><span class="plus">+</span>32</div>
                                        <div class="booked-bwop booked-pd-l"><span>Rendah:</span><span class="plus">+</span>24</div>
                                    </div>
                                </div>
                                <div class="bwop-state"> Sebagian Cerah </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    var css_file = document.createElement("link");
                    var widgetUrl = location.href;
                    css_file.setAttribute("rel", "stylesheet");
                    css_file.setAttribute("type", "text/css");
                    css_file.setAttribute("href", 'https://s.bookcdn.com/css/w/booked-wzs-prime-vertical-one.css?v=0.0.1');
                    document.getElementsByTagName("head")[0].appendChild(css_file);

                    function setWidgetData_31041(data) {
                        if (typeof(data) != 'undefined' && data.results.length > 0) {
                            for (var i = 0; i < data.results.length; ++i) {
                                var objMainBlock = document.getElementById('m-booked-vertical-one-prime-31041');
                                if (objMainBlock !== null) {
                                    var copyBlock = document.getElementById('m-bookew-weather-copy-' + data.results[i].widget_type);
                                    objMainBlock.innerHTML = data.results[i].html_code;
                                    if (copyBlock !== null) objMainBlock.appendChild(copyBlock);
                                }
                            }
                        } else {
                            alert('data=undefined||data.results is empty');
                        }
                    }
                    var widgetSrc = "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=40949;type=7;scode=54035;ltid=3457;domid=;anc_id=32346;countday=undefined;cmetric=1;wlangID=27;color=137AE9;wwidth=300;header_color=ffffff;text_color=333333;link_color=08488D;border_form=1;footer_color=ffffff;footer_text_color=333333;transparent=0;v=0.0.1";
                    widgetSrc += ';ref=' + widgetUrl;
                    widgetSrc += ';rand_id=31041';
                    var weatherBookedScript = document.createElement("script");
                    weatherBookedScript.setAttribute("type", "text/javascript");
                    weatherBookedScript.src = widgetSrc;
                    document.body.appendChild(weatherBookedScript)
                </script>
                <!-- weather widget end -->
            </div>
            <div class="col-lg-7 col-md-7 col-12">
                <div class="feature-content">
                    <!-- <div class="title">
                    </div> -->
                    <div class="feature-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="feature-thumb">
                            <i class="lni lni-cloudy-sun"></i>
                        </div>
                        <div class="banner-content">
                            <!-- <h2 class="title">Pemantauan Cuaca</h2> -->
                            <h3 class="wow fadeInRight" data-wow-delay=".4s">Informasi Cuaca</h3>
                            <p>Halaman ini memberikan informasi cuaca terkini untuk wilayah Cirebon. Kami menyediakan data yang akurat dan diperbarui secara berkala untuk membantu Anda memahami kondisi cuaca yang dapat mempengaruhi risiko banjir di sekitar Anda.</p>
                            <p>Dengan informasi cuaca yang akurat dan terkini, kami berharap Anda dapat mengambil langkah-langkah pencegahan yang tepat dan mempersiapkan diri dengan baik menghadapi risiko banjir di wilayah Cirebon.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Features Area -->
<?= $this->endSection() ?>