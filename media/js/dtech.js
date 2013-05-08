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
    updateProductListing: function(ajax_url,id) {
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
    detailImagechange : function(obj){
        jQuery("#large_image").attr("src",jQuery(obj).attr("large_image"));
        jQuery("#large_image").parent().attr("href",jQuery(obj).attr("large_image"));
    },
    showdetailLightbox : function (){
        jQuery("#dummy_link").trigger("click");
    },
    doGloblSearch : function (){
        if(jQuery.trim(jQuery("#serach_field").val())!=""){
            jQuery("#search_form").submit();
        }
    }        

}