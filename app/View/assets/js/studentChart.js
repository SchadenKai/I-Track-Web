export function applyChartJS(data, element, chartLabel) {

    let labelArr = Object.keys(data)
    let dataArr = Object.values(data)
    console.log(data);

    new Chart(element, {
    type: 'line',
    data: {
        labels: labelArr,
        datasets: [{
            label: chartLabel,
            data: dataArr
        }]
    },
    options: {}
    });
}

