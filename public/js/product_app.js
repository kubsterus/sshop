window.onload = function(){
    $(document).ready(function(){
        $("a#openManual").click(function(e){

            $("#p_manual").show("fast");
            e.preventDefault();
        });
    });
    var current_page = 2;
    $("#readMore").click(function(e){
        e.preventDefault();
        $.get("/?page="+current_page, {}, function(data){
          if(data != ''){
              $(".products").append(data);
              current_page++;
              $.get("/?page="+current_page, {}, function(d){
                if(d == ""){
                    $("#readMore").hide();
                }
              });
          }
            else{
              $("#readMore").hide();
          }
        })
    });
}