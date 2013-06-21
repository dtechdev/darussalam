var dtech_new = {
    popupStatus: 0,
    is_filter: "",
    toggleLogin: function() {
        var button = jQuery('#login_btn');
        var box = jQuery('#login_bx');
        var form = jQuery('#login_frm');
        button.removeAttr('href');
        jQuery("#upper_banner").css("position", "fixed");
        button.mouseup(function(ev) {
            box.toggle();

            if (box.is(':visible') == true) {

                dtech_new.onShowLogin();
            }
            else {
                dtech_new.onHideLogin();
            }
            button.toggleClass('active');

        });
        form.mouseup(function() {

            return false;
        });
        jQuery(this).mouseup(function(login) {
            if (!(jQuery(login.target).parent('#login_btn').length > 0)) {
                button.removeClass('active');
                //$("#upper_banner").css("position","fixed");

                box.hide();
            }
        });
    },
    onShowLogin: function() {
        jQuery("#upper_banner").removeAttr("style");
        jQuery("button#search-button").hide();
        jQuery(".add_to_cart").hide();
        jQuery("#search-box").css("z-index", "-1");
        jQuery("#below_banner").css("margin-top", "0");
    },
    onHideLogin: function() {
        jQuery("#upper_banner").css("position", "fixed");
        jQuery("button#search-button").show();
        jQuery(".add_to_cart").show();
        jQuery("#search-box").removeAttr("style");
        jQuery("#below_banner").removeAttr("style");
    },
    toggleSideBar: function() {
        var button = jQuery('#sideBarButton');
        var box = jQuery('#sideBarBox');
        var form = jQuery('#sideBarForm');
        button.removeAttr('href');
        button.mouseup(function(ev) {

            box.toggle('slow');
            button.toggleClass('active');
        });
        form.mouseup(function() {
            return false;
        });
        jQuery("#sideBarBox").click(function() {
            jQuery("#sideBarBox").show();
            //console.log("helo");
        })

        jQuery(this).mouseup(function(login) {
            if (!(jQuery(login.target).parent('#sideBarButton').length > 0)) {
                button.removeClass('active');
                box.hide();
            }
        });


    },
    footerToggle: function() {
        jQuery('.btnToggle').click(function() {
            jQuery('#dvText').slideToggle(300);
            return false;
        });
        jQuery('#div_img').click(function() {
            jQuery('#dvText').slideToggle(300);
            return false;
        });

    },
    /*********** Listing page detail PopUp *****************************/
    registerPopUp: function() {
        $("a.topopup").live('click', function() {
            dtech_new.loading(); // loading
            setTimeout(function() { // then show popup, deley in .5 second
                dtech_new.loadPopup(); // function show popup 
            }, 500); // .5 second
            return false;
        }); // end of event


        $("div.close").live('hover',
                function() {
                    $('span.ecs_tooltip').show();
                },
                function() {
                    $('span.ecs_tooltip').hide();
                }
        );

        $("div.close").live('click', function() {
            dtech_new.disablePopup();  // function close pop up
        });

        $(this).keyup(function(event) {
            if (event.which == 27) { // 27 is 'Ecs' in the keyboard
                dtech_new.disablePopup();  // function close pop up
            }
        });

        $("div#backgroundPopup").click(function() {
            dtech_new.disablePopup();  // function close pop up
        });

        $('a.livebox').click(function() {
            alert('Hello World!');
            return false;
        });
    },
    changeBookImgHover: function() {
        $(".books_content a img").hover(
                function() {
                    $(this).attr("src", $(this).attr("hover_img"));
                },
                function() {
                    $(this).attr("src", $(this).attr("unhover_img"));
                }
        );

    },
    loadPopup: function() {
        if (dtech_new.popupStatus == 0) { // if value is 0, show popup
            dtech_new.closeloading(); // fadeout loading
            $("#toPopup").fadeIn(0500); // fadein popup div
            $("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
            $("#backgroundPopup").fadeIn(0001);
            dtech_new.popupStatus = 1; // and set value to 1
        }
    },
    disablePopup: function() {
        if (dtech_new.popupStatus == 1) { // if value is 1, close popup
            $("#toPopup").fadeOut("normal");
            $("#backgroundPopup").fadeOut("normal");
            dtech_new.popupStatus = 0;  // and set value to 0
        }
    },
    loading: function() {
        $("div.loader").show();
    },
    closeloading: function() {
        $("div.loader").fadeOut('normal');
    },
    showBestSeller: function() {
        $(".under_best_seller").toggle('fast');
    },
    registerCountryDropDown: function() {
        jQuery("#countries").msDropdown();
    },
    showCategoryListing: function(obj) {
        if (dtech_new.is_filter == 0) {
            window.location.href = $(obj).attr("href");
        }
        else {
            hash_split = $(obj).attr("href").split("#");
            hash_split = hash_split[1].split("=");

            dtech.updateProductListing($(obj).attr("href"), hash_split[1]);
        }
    },
    loadCartAgain: function(ajax_url) {
        jQuery.ajax({
            type: "POST",
            url: ajax_url,
            dataType: 'json',
            data:
                    {
                    }
        }).done(function(response) {

            jQuery("#cart_control").html(response._view_cart);
        });
    },
    updateCart: function(ajax_url, obj, cart_id) {

        jQuery.ajax({
            type: "POST",
            url: ajax_url,
            dataType: 'json',
            data:
                    {
                        'quantity': jQuery(obj).val(),
                        'type': 'update_quantity',
                        'from': 'main',
                        'cart_id': cart_id
                    }
        }).done(function(response) {

            jQuery("#cart_control").html(response._view_cart);
            if (jQuery(".grand_total_bag").length > 0) {
                jQuery(".grand_total_bag").html(jQuery(".grand_total").html());
            }
        });


    }

}