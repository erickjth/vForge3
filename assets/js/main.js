$(document).ready(
    function(){
        
        $(".datepicker").datepicker();
        
        $("a.remote").click(function(){
            var a = $(this);
            var content = a.attr("rel");
            var url = a.attr("href");
            load_remote_content_html(url,content);  
            return false;
        });

    }
);
    
function load_remote_content_html(url,content){
    $.ajax({
        url: url,
        cache: false,
        success: function(html){
            $("#"+content+"").html(html).slideDown();
        }
    });
}
function clean_remote_content(i){
    var content = $(i).parents(".remote-content");
    content.slideUp().empty()
}

