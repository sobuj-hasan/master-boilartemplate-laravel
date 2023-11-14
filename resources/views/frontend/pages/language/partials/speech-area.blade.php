<section class="speech-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10 col-md-12">
                <div class="speech-item">
                    <form action="#" class="engine-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="lang-ordering">
                                    <select id="id_select2_example" style="width: 100%">
                                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag01.png">
                                            English (American)
                                        </option>
                                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag02.png">
                                            English (British)
                                        </option>
                                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag03.png">
                                            Bengali (Bangladesh)
                                        </option>
                                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag04.png">
                                            English (Canada)
                                        </option>
                                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag05.png">
                                            Zulu (South Africa)
                                        </option>
                                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag06.png">
                                            Hindi (India)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="voice-ordering">
                                    <select id="id_select2_example_three" style="width: 100%">
                                        <option
                                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img01.png">
                                            Amber (HD)
                                        </option>
                                        <option
                                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img02.png">
                                            Brandon (HD)
                                        </option>
                                        <option
                                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img03.png">
                                            Tony (HD)
                                        </option>
                                        <option
                                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img04.png">
                                            Michael (HD)
                                        </option>
                                        <option
                                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img05.png">
                                            Sara (HD)
                                        </option>
                                        <option
                                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img06.png">
                                            Prabhat (HD)
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-grp">
                            <textarea name="dirtyContent" id="dirtyContent" placeholder="Enter Text here.."></textarea>
                            <div class="form-content">
                                <span>Free use of Voicer Studio is limited to 50 characters.
                                    For more <br />
                                    usage and premium voices, you can purchase
                                    packages.</span>
                                <span id="maxLenghtCounter" class="badge-default">0 characters</span>
                            </div>
                        </div>
                        <button type="submit" class="speech-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                            text to speech
                        </button>
                        <div class="hidden-btn-wrap">
                            <div class="hidden-btn-inner">
                                <button type="submit">
                                    <i class="fas fa-play"></i>listen
                                </button>
                                <button type="submit" class="download">
                                    <i class="fas fa-download"></i>Download
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="speech-shape-wrap">
        <div class="shape-one" data-background="{{ asset('frontend/assets/img/images/speech_shape01.png') }}"></div>
        <div class="shape-two" data-background="{{ asset('frontend/assets/img/images/speech_shape02.png') }}"></div>
    </div>
</section>

@push('script')
    <script>
        function custom_template(obj) {
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if (data && data["img_src"]) {
                img_src = data["img_src"];
                template = $(
                    '<div><img src="' +
                    img_src +
                    '" style="width:15px;height:15px;"/><p style="font-weight: 400;font-size:16px;margin-bottom:0;">' +
                    text +
                    "</p></div>"
                );
                return template;
            }
        }
        var options = {
            templateSelection: custom_template,
            templateResult: custom_template,
        };
        $(
            "#id_select2_example, #id_select2_example_two, #id_select2_example_three"
        ).select2(options);
        $(".select2-container--default .select2-selection--single").css({
            height: "50px",
        });
    </script>
    <script>
        $("#dirtyContent").keyup(function() {
            var count = $("#dirtyContent").val().length;
            $("#maxLenghtCounter").html(count + " characters");
            if (count > 40) {
                $("#maxLenghtBadge")
                    .removeClass("badge-default")
                    .addClass("badge-warning");
            } else {
                $("#maxLenghtBadge")
                    .removeClass("badge-warning")
                    .addClass("badge-default");
            }
        });
    </script>
    <script>
        $(document).ready(function() {
                $("#punctuation-select2").select2();
            }),
            $(document).ready(function() {
                $("#profanity-select2").select2();
            });
    </script>
@endpush
