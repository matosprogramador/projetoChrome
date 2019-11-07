
$(document).ready(function(){
    $.ajax({
        dataType:'json',
        method: "POST",
        url: "graficos.php",
        data:{data:'media'},
        success: function(data){
          console.log(data[0][0]);  
          $('.media').append("<h3>"+Math.round(data[0][0])+" Chromebook's</h3>");
        }
    })
    
})

//requisições ao servidor

$(document).ready(function(){
    console.log('ae');
    $.ajax({
        dataType:'json',
        method: "POST",
        url: "graficos.php",
        data:{data:'graficoUM'},
        success: function(data){
           graficoUM(data);  
        }
    })
    
})

$(document).ready(function(){
    console.log('ae');
    $.ajax({
        dataType:'json',
        method: "POST",
        url: "graficos.php",
        data:{data:'graficoDois'},
        success: function(data){
            graficoDois(data);

        }
    })
})

//graficos 
function graficoUM(data){
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Agendamentos'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [
             {
                name: '6º Ano',
                y: data[0]
            }, {
                name: '7º Ano',
                y: data[1]
            }, {
                name: '8º Ano',
                y: data[2]
            }, {
                name: '9º Ano',
                y: data[3]
            },{
                name: 'Ensino M.',
                y: data[4],
                sliced: true,
                selected: true}
        ]
        }]
    });
}



function graficoDois(data){
    Highcharts.chart('container2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Rank'
        },
        xAxis: {
            categories: [
                'Jan',
                'Fev',
                'Mar',
                'Abr',
                'Mai',
                'Jun',
                'Jul',
                'Ago',
                'Set',
                'Out',
                'Nov',
                'Dez'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} C</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: '6º ano',
            data: [data[0][0],data[0][1],data[0][2],data[0][3],data[0][4],data[0][5],data[0][6], data[0][7], data[0][8], data[0][9], data[0][10], data[0][11]]
    
        }, {
            name: '7º Ano',
            data: [data[1][0],data[1][1],data[1][2],data[1][3],data[1][4],data[1][5],data[1][6], data[1][7], data[1][8], data[1][9], data[1][10], data[1][11]]
    
        }, {
            name: '8º Ano',
            data: [data[2][0],data[2][1],data[2][2],data[2][3],data[2][4],data[2][5],data[2][6], data[2][7], data[2][8], data[2][9], data[2][10], data[2][11]]
    
        }, {
            name: '9º Ano',
            data: [data[3][0],data[3][1],data[3][2],data[3][3],data[3][4],data[3][5],data[3][6], data[3][7], data[3][8], data[3][9], data[3][10], data[3][11]]
    
        },{
            name: 'Ensino M.',
            data: [data[4][0],data[4][1],data[4][2],data[4][3],data[4][4],data[4][5],data[4][6], data[4][7], data[4][8], data[4][9], data[4][10], data[4][11]]
    
        }]
    });

}













