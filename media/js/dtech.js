// JavaScript Document
var dtech = {
    getmultiplechecboxValue: function(elem_id) {
        var sel_ar = new Array();
        $("." + elem_id).each(function() {
            if ($(this).is(':checked')) {
                sel_ar.push($(this).val());
            }
        })
        return sel_ar.join(",");

    },
    updateProductListing: function(ajax_url, id) {
        $("#loading").show();
        $.ajax({
            type: "POST",
            url: ajax_url,
            data:
                    {
                        cat_id: id,
                        ajax: 1,
                        author: $("#author_id").val(),
                        langs: dtech.getmultiplechecboxValue("filter_checkbox"),
                    }
        }).done(function(msg) {
            $("#right_main_content").html(msg);
            $("#loading").hide();
        });
        return false;
    },
    /**
     *  detail image change on runtime
     *  click
     * @param {type} obj
     * @returns {undefined} 
     */
    detailImagechange: function(obj) {
        jQuery("#large_image").attr("src", jQuery(obj).attr("large_image"));
        jQuery("#large_image").parent().attr("href", jQuery(obj).attr("large_image"));
    },
    showdetailLightbox: function() {
        jQuery("#dummy_link").trigger("click");
    },
    doGloblSearch: function() {
        if (jQuery.trim(jQuery("#serach_field").val()) != "") {
            jQuery("#search_form").submit();
        }
    },
    updatehashBrowerUrl: function(s) {
        window.location.hash = s;
    },
    load_languageDetail: function() {

        hash_str = window.location.hash;
        if (hash_str != "") {
            hash_str = hash_str.split("=");

            if (typeof(hash_str[1]) != "undefined") {
              
                lang_val = dtech.findLangVal(hash_str[1]);
                //console.log(lang_val);
                jQuery("#language").val(lang_val);
                window.location.hash = "";
                jQuery("#language").trigger("change");
                
            }
        }

    },
    findLangVal : function(text){
         return_lang = "";
         jQuery("#language option").each(function(){
             text = jQuery.trim(text);
             if(jQuery(this).html()==text){
                return_lang = jQuery(this).val();
                
                //return jQuery(this).val();
             }
         })
         
         return return_lang;
    }        
}