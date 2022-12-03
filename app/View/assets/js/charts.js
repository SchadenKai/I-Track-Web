export function displayChart(data) {
    
    const chronic = document.getElementById('chronicChart');

    new Chart(chronic, {
    type: 'doughnut',
    data: {
        labels: ['Yes', 'No'],
        datasets: [{
        label: 'No. of Chronic Diseases',
        data: [data.no_of_students-data.chronic_disease_count, data.chronic_disease_count]
        }]
    },
    options: {}
    });

    $('#chronic-count').text(data.chronic_disease_count)
    $('#nochronic-count').text(data.no_of_students-data.chronic_disease_count)

    // currently Ill chart
    const ill = document.getElementById('illChart');

    new Chart(ill, {
    type: 'doughnut',
    data: {
        labels: ['Yes', 'No'],
        datasets: [{
        label: 'No. of Currently Ill Students',
        data: [data.no_of_students-data.ill_count, data.ill_count]
        }]
    },
    options: {}
    });

    $('#ill-count').text(data.ill_count)
    $('#noill-count').text(data.no_of_students-data.ill_count)

    // currently admitted to the hospital chart 
    const admitted = document.getElementById('admittedChart');

    new Chart(admitted, {
    type: 'doughnut',
    data: {
        labels: ['Yes', 'No'],
        datasets: [{
        label: 'No. of Admitted Students in the Hospital',
        data: [data.no_of_students-data.admitted_count, data.admitted_count]
        }]
    },
    options: {}
    });

    $('#admitted-count').text(data.admitted_count)
    $('#notadmitted-count').text(data.no_of_students-data.admitted_count)

    const injured = document.getElementById('injuredChart');

    new Chart(injured, {
    type: 'doughnut',
    data: {
        labels: ['Yes', 'No'],
        datasets: [{
        label: 'No. of Injured Students',
        data: [data.no_of_students-data.injured_count, data.injured_count]
        }]
    },
    options: {}
    });

    $('#injured-count').text(data.injured_count)
    $('#notinjured-count').text(data.no_of_students-data.injured_count)
}

