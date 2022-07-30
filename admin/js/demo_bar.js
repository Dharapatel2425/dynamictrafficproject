$(function() {

    /* Bar dashboard chart */
    
    $.ajax({
        url: "http://localhost/DynamicTraffic/admin/chart_data2.php",
        type: "post",
        data: {loteria: 'data', limit: 20},
        dataType: "json",
        timeout:3000,
        success : function (resp){
            Morris.Bar({
                element: 'dashboard-bar-1',
                data: resp,
                xkey: 'date',
                ykeys: ['density1', 'density2' , 'density3', 'density4'],
                labels: ['density1', 'density2' , 'density3', 'density4'],
                barColors: ['#33414E', '#1caf9a', '#33414E', '#1caf9a'],
                gridTextSize: '10px',
                hideHover: true,
                xLabels: 'day',
                resize: true,
                gridLineColor: '#E5E5E5'
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