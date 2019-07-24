// var ctx = document.getElementById('myChart');
//         var myChart = new Chart(ctx, {
//             type: 'radar',
//             data: {
//                 labels: ['わかりやすさ', 'スピード', 'マナー', '解決度',],
//                 datasets: [{
//                     label: '# of Votes',
//                     data: [12, 19, 3, 5],
//                     backgroundColor: [
//                         'rgba(255, 99, 132, 0.2)',
//                         'rgba(54, 162, 235, 0.2)',
//                         'rgba(255, 206, 86, 0.2)',
//                         'rgba(75, 192, 192, 0.2)',
                       
//                     ],
//                     borderColor: [
//                         'rgba(255, 99, 132, 1)',
//                         'rgba(54, 162, 235, 1)',
//                         'rgba(255, 206, 86, 1)',
//                         'rgba(75, 192, 192, 1)',
//                     ],
//                     borderWidth: 1

//                 }]
//             },
//             options: {
//                 scales: {
//                     yAxes: [{
//                         ticks: {
//                             beginAtZero: true
//                         }
//                     }]
//                 }
//             }
//         });

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