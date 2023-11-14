<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/plugins.min.js')}}"></script>

<!-- Footer Scripts
============================================= -->
<script src="{{asset('js/functions.js')}}"></script>

<script>
    $(document).ready(changeHeaderColor);
    $(window).on('resize', changeHeaderColor);

    function changeHeaderColor() {
        if (jQuery(window).width() > 991.98) {
            jQuery("#header").hover(
                function () {
                    if (!$(this).hasClass("sticky-header")) {
                        $(this).addClass("hover-light").removeClass("dark");
                        SEMICOLON.header.logo();
                    }
                    $("#wrapper").addClass("header-overlay");
                }, function () {
                    if (!$(this).hasClass("sticky-header")) {
                        $(this).removeClass("hover-light").addClass("dark");
                        SEMICOLON.header.logo();
                    }
                    $("#wrapper").removeClass("header-overlay");
                }
            );
        }
    };

    $(window).scroll(function () {
        if ($(document).scrollTop() > 2000 && $("#modal-subscribe").attr("displayed") === "false") {
            $('#modal-subscribe').modal('show');
            $("#modal-subscribe").attr("displayed", "true");
        }
    });

    jQuery('#modal-subscribe-form').on('formSubmitSuccess', function () {
        $("#modal-subscribe").addClass("fadeOutDown");
        setTimeout(function () {
            $('#modal-subscribe').modal('hide');
        }, 400);
        $("#modal-subscribe").attr("displayed", "false");
    });
    function bindEvents(){
        $("#top-cart-trigger").off( 'click' ).on( 'click', function(e){
            $topCart = $('#top-cart');
            $pagemenu = $('#page-menu');
            $pagemenu.toggleClass('page-menu-open', false);
            $topCart.toggleClass('top-cart-open');
            e.stopPropagation();
            e.preventDefault();
        });

        $(document).on('click', function(event) {
            $topCart = $('#top-cart');
            if (!$(event.target).closest('#top-cart').length) {
                $topCart.toggleClass('top-cart-open', false);
            }
        });
    }
</script>
