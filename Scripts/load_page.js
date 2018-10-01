
function changePagination(pageId)
{
     $(".flash").show();
     $(".flash").fadeIn(400).html
                ('Loading...');
     var dataString = 'pageId='+ pageId;
     $.ajax({
           type: "POST",
           url: "loadData.php",
           data: dataString,
           cache: false,
           success: function(result){
                 $("#t01").html(result);
            }
      });
}

$(document).ready(function(){
    start();
    });

function pageCount(data)
{   
    $.ajax({
        type: "POST",
        url: "pageCount.php",
        data:data,
        async: false,
        success: function(result){
            $("#pagination").html(result);
         }
   });
}

function start()
{
    pageCount(3);
    changePagination(0);
}
