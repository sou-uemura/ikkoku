var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
    type: 'radar', 
    data: { 
        labels: ['わかりやすさ', 'スピード', 'マナー', '解決度'],
        datasets: [{
            data: [9,9,9,9],
            backgroundColor: 'RGBA(225,95,150, 0.5)',
            borderColor: 'RGBA(225,95,150, 1)',
            borderWidth: 1,
            pointBackgroundColor: 'RGB(200,0,0)'
        }]
    },
    options: {
        legend: {
            display: false,
        },
        scale:{
            ticks:{
                suggestedMin: 0,
                suggestedMax: 10,
                stepSize: 1, 
                
                callback: function(value, index, values){
                    return  value +  '点'                 
                }
            }
        }
    }
});