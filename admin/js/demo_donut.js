$(function() {

    /* Donut dashboard chart */
    
    $.ajax({
        url: "http://localhost/DynamicTraffic/admin/chart_data.php",
        type: "post",
        data: {loteria: 'data', limit: 20},
        dataType: "json",
        timeout:3000,
        success : function (resp){
            

            Morris.Donut({
                element: 'dashboard-donut-1',
                data: resp ,
                colors: ['#33414E', '#1caf9a', '#FEA223', '#000'],
                resize: true
            });
        },
        error: function(jqXHR, textStatus, ex) {
          console.log(textStatus + "," + ex + "," + jqXHR.responseText);
        }
    });

    $(".x-navigation-minimize").on("click",function(){
        setTimeout(function(){
            rdc_resize();
        },200);    
    });
});