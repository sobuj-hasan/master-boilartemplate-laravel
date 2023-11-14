<!-- JS here -->
<script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.odometer.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.appear.js') }}"></script>
<script src="{{ asset('frontend/assets/js/gsap.js') }}"></script>
<script src="{{ asset('frontend/assets/js/ScrollTrigger.js') }}"></script>
<script src="{{ asset('frontend/assets/js/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/SplitText.js') }}"></script>
<script src="{{ asset('frontend/assets/js/gsap-animation.js') }}"></script>
<script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/animatedheadline.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
<script src="{{ asset('frontend/assets/js/ajax-form.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

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
        theme: 'default speech-item-two',
    };
    $("#id_select2_example, #id_select3_example, #id_select2_example_two, #id_select2_example_three").select2(options);
    $(".select2-container--default .select2-selection--single").css({
        height: "50px",
    });
    // $("#id_select2_example_two").css({
    //     'background-color: black !important',
    //     'color: white !important',
    // });
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
@stack('script')
