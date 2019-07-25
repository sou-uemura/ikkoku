// userIdをurlから取得
var url = new URL(window.location.href);
var userId = url.pathname.replace('/user/', '');

// ajaxでデータを取得したあとにchatjsをよびだす
getScoreData(userId).done(function(result) {
    // chartで使うためのuserScoreをapiで取得したデータから代入
    userScore = result;

    var ctx = document.getElementById("myChart");

    var myChart = new Chart(ctx, {
        type: 'radar', 
        data: { 
            labels: ['わかりやすさ', 'スピード', 'マナー', '解決度'],
            datasets: [{
                data: userScore,
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
});

function getScoreData(userId){
    return $.ajax({
        type: 'GET',
        url: '/api/users/' + userId + '/score'
    });
}

