$(function() {

    /* Line dashboard chart */
    
    $.ajax({
        url: "http://localhost/DynamicTraffic/admin/chart_data2.php",
        type: "post",
        data: {loteria: 'data', limit: 20},
        dataType: "json",
        timeout:3000,
        success : function (resp){
            Morris.Line({
                  element: 'dashboard-line-1',
                  data: resp,
                  xkey: 'date',
                  ykeys: ['density1', 'density2' , 'density3', 'density4'],
                  labels: ['density1', 'density2' , 'density3', 'density4'],
                  resize: true,
                  hideHover: true,
                  xLabels: 'day',
                  gridTextSize: '10px',
                  lineColors: ['#1caf9a','#33414E'],
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