$(document).ready(function()
{
    
    $("body").on('click','.methodDelete',function(e)
    {
        deleteDati
    });
    
    
    function deleteDati(id) 
    {
        $.ajax({
          url: index + '/' + id,
          type: "delete",
          success: function (data) { getDati(index + "?page=" + dati['page']['number'] + "&size=20"); }
        })
      };
});