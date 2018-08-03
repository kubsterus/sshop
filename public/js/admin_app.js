/**
 * Created by NewAgeLab on 03.08.2018.
 */
window.onload = function(){
    $(document).ready(function(){
        $("#domainFinder").keyup(function(){
           if($(this).val() != ""){
               $.post("/home/shops/json", {like: $(this).val(), _token:$('[name="_token"]').val()}, function(data){

                   if(data.length > 0){
                       var data = data[0];
                       $("#domainFinderResult").text(data.domain);
                       $('[name="shop"]').val(data.id);
                   }
                   else{ 
                       $("#domainFinderResult").text('');
                       $('[name="shop"]').val('');
                   }
               });
           }
           else{
               $("#domainFinderResult").text('');
               $('[name="shop"]').val('');
           }
        });
    });
}