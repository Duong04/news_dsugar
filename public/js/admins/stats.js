import axios_ins from '/js/axios.js';

const isAuthenticated = window.auth.isAuthenticated;
const currentUser = window.auth.user;
const filteYears = document.querySelector('.filter-years');
const topLimit = document.querySelector('#top-limit');
const topLimit_2 = document.querySelector('#top-limit-2');
const topLimit_3 = document.querySelector('#top-limit-3');

const emptyData = () => {
    return (`
        <img width="200px" src="https://res.cloudinary.com/dsdyprt1q/image/upload/v1723955263/news_dsugar/vi44ibm1q8wuwbhvi7l5.png" alt="">
        <p>Không có dữ liệu!</p>
    `);
}

filteYears.oninput = (e) => {
    const years = e.target.value.trim().replace(/\s+/g, '');
    if (years.length == 4) {
        countUserByMonths(years);
    }
}

topLimit.oninput = (e) => {
    let limit = e.target.value;
    if (limit.length == 0) {
        limit = 10;
    }

    if (limit <= 0) {
        limit = 1;
    } else if (limit > 30) {
        limit = 30;
    }

    getTopPostView(limit);
}

topLimit_2.oninput = (e) => {
    let limit = e.target.value;
    if (limit.length == 0) {
        limit = 10;
    }

    if (limit <= 0) {
        limit = 1;
    } else if (limit > 30) {
        limit = 30;
    }

    topCategoriesByPostView(limit);
}

topLimit_3.oninput = (e) => {
    let limit = e.target.value;
    if (limit.length == 0) {
        limit = 10;
    }

    if (limit <= 0) {
        limit = 1;
    } else if (limit > 30) {
        limit = 30;
    }

    topSubcategoriesByPostView(limit);
}

let chartInstance = null;
let chartInstance_2 = null;
let chartInstance_3 = null;
let chartInstance_4 = null;

const countUserByMonths = async (year = null) => {
    try {
        const response = await axios_ins.get(`stats/users/count-user-by-months${year ? `?year=${year}` : ''}`);
        if (response.status === 200) {
            const data = response.data.data;

            const labels = [];
            const activeData = [];
            const inactiveData = [];
            const pendingData = [];
            if (data.length !== 0) {
                for (const [key, value] of Object.entries(data)) {
                    labels.push(`Tháng ${value.month}`);
                    activeData.push(value.active);
                    inactiveData.push(value.inactive);
                    pendingData.push(value.pending);
                }
    
                createOrUpdateChart(activeData, inactiveData, pendingData);
            }else {
                document.querySelector('#statisticsChart').style.display = "none";
                document.querySelector("#noDataMessage").innerHTML = emptyData();
                return;
            }

        }
    } catch (error) {
        console.error(error);
    }
}

const getTopPostView = async (limit = null) => {
    const barChart = document.getElementById("barChart");
    document.querySelector('#count-limit').innerText = limit ?? 10; 
    try {
        const response = await axios_ins.get(`/stats/posts/top-views?limit=${limit ?? 10}`);
        const data = response.data.data;

        if (data.length === 0) {
            barChart.style.display = "none";
            document.getElementById("noDataMessage-2").innerHTML = emptyData();
            return;
        }else {
            let labels = [];
            let values = [];
    
            data.forEach((item) => {
                let shortTitle =
                    item.title.length > 10
                        ? item.title.substring(0, 5) + "..."
                        : item.title;
                labels.push(shortTitle);
                values.push(item.view);
            });

            myBarChart(labels, values, data);
    
            barChart.getContext("2d");
        }

    } catch (error) {
        console.error("An error occurred:", error);
    }
};

const topCategoriesByPostView = async (limit = null) => {
    const pieChart = document.getElementById("pieChart");
    document.querySelector('#count-limit-2').innerText = limit ?? 3; 
    try {
        const response = await axios_ins.get(
            `/stats/categories/top-views?limit=${limit ?? 3}`
        );
        const data = response.data.data;

        if (data.length === 0) {
            pieChart.style.display = "none";
            document.getElementById("noDataMessage-3").innerHTML = emptyData();
            return;
        }else {
            let labels = [];
            let values = [];
    
            data.forEach((item) => {
                labels.push(item.name);
                values.push(item.total_views);
            });
    
            myPieChart(labels, values);

            pieChart.getContext("2d");
        }

    } catch (error) {
        console.error("An error occurred:", error);
    }
};

const topSubcategoriesByPostView = async (limit = null) => {
    const doughnutChart = document.getElementById("doughnutChart");
    document.querySelector('#count-limit-3').innerText = limit ?? 3; 
    try {
        const response = await axios_ins.get(
            `/stats/subcategories/top-views?limit=${limit ?? 5}`
        );
        const data = response.data.data;

        if (data.length === 0) {
            doughnutChart.style.display = "none";
            document.getElementById("noDataMessage-3").innerHTML = emptyData();
            return;
        }else {
            let labels = [];
            let values = [];
    
            data.forEach((item) => {
                labels.push(item.name);
                values.push(item.total_views);
            });
    
            myDoughnutChart(labels, values);
    
            doughnutChart.getContext("2d");
        }

    } catch (error) {
        console.error("An error occurred:", error);
    }
};

const createOrUpdateChart = (activeData, inactiveData, pendingData) => {
    const ctx = document.querySelector('#statisticsChart').getContext('2d');

    if (chartInstance) {
        chartInstance.destroy();
    }

    chartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Kích hoạt",
                    borderColor: '#31ce36',
                    pointBackgroundColor: 'rgba(18, 236, 145, 0.8)',
                    pointRadius: 0,
                    backgroundColor: 'rgba(18, 236, 145, 0.8)',
                    legendColor: '#f3545d',
                    fill: true,
                    borderWidth: 2,
                    data: activeData
                },
                {
                    label: "Vô hiệu hóa",
                    borderColor: '#fdaf4b',
                    pointBackgroundColor: 'rgba(253, 175, 75, 0.6)',
                    pointRadius: 0,
                    backgroundColor: 'rgba(243, 84, 93, 0.4)',
                    legendColor: '#fdaf4b',
                    fill: true,
                    borderWidth: 2,
                    data: inactiveData
                },
                {
                    label: "Chưa kích hoạt",
                    borderColor: '#ffad46',
                    pointBackgroundColor: 'rgba(252, 225, 88, 0.8)',
                    pointRadius: 0,
                    backgroundColor: 'rgba(252, 225, 88, 0.8)',
                    legendColor: '#177dff',
                    fill: true,
                    borderWidth: 2,
                    data: pendingData
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true
            },
            tooltips: {
                bodySpacing: 4,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            layout: {
                padding: { left: 5, right: 5, top: 15, bottom: 15 }
            },
            scales: {
                y: {
                    ticks: {
                        fontStyle: "500",
                        beginAtZero: false,
                        maxTicksLimit: 5,
                        padding: 10
                    },
                    gridLines: {
                        drawTicks: false,
                        display: false
                    }
                },
                x: {
                    gridLines: {
                        zeroLineColor: "transparent"
                    },
                    ticks: {
                        padding: 10,
                        fontStyle: "500"
                    }
                }
            },
            legendCallback: function(chart) {
                var text = [];
                text.push('<ul class="' + chart.id + '-legend html-legend">');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                    text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>');
                    if (chart.data.datasets[i].label) {
                        text.push(chart.data.datasets[i].label);
                    }
                    text.push('</li>');
                }
                text.push('</ul>');
                return text.join('');
            }
        }
    });
}

const myBarChart = (labels, values, data) => {
    if (chartInstance_2) {
        chartInstance_2.destroy();
    }
    chartInstance_2 = new Chart(barChart, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Lượt xem",
                    backgroundColor: [
                        "#1d7af3", "#f3545d", "#fdaf4b", "#399918", "#77E4C8",
                        "#F9E400", "#36BA98", "#FF7F3E", "#06D001", "#C8A1E0",
                        "#FF8C00", "#A52A2A", "#5F9EA0", "#D2691E", "#FF4500",
                        "#DAA520", "#9ACD32", "#FF6347", "#40E0D0", "#6A5ACD",
                        "#7B68EE", "#D8BFD8", "#FF1493", "#FFD700", "#CD5C5C",
                        "#FF69B4", "#8B0000", "#FFB6C1", "#00CED1", "#ADFF2F"
                    ],
                    borderColor: "rgb(23, 125, 255)",
                    data: values,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            const index = context.dataIndex;
                            const fullTitle = data[index].title;
                            const viewCount = context.raw;
                            return `${viewCount} lượt xem: ${fullTitle}`;
                        },
                    },
                },
            },
        },
    });
};

const myPieChart = (labels, values) => {
    if (chartInstance_3) {
        chartInstance_3.destroy();
    }
    chartInstance_3 = new Chart(pieChart, {
        type: "pie",
        data: {
            datasets: [
                {
                    data: values,
                    backgroundColor: [
                        "#1d7af3", "#f3545d", "#fdaf4b", "#77E4C8", "#F9E400", 
                        "#36BA98", "#FF7F3E", "#06D001", "#C8A1E0", "#FF8C00", 
                        "#A52A2A", "#5F9EA0", "#D2691E", "#FF4500", "#DAA520", 
                        "#9ACD32", "#FF6347", "#40E0D0", "#6A5ACD", "#7B68EE", 
                        "#D8BFD8", "#FF1493", "#FFD700", "#CD5C5C", "#FF69B4", 
                        "#8B0000", "#FFB6C1", "#FF8C00", "#00CED1", "#FFD700", 
                        "#ADFF2F", "#E6E6FA", "#FF00FF", "#8A2BE2", "#FF4500"  
                    ],
                    borderWidth: 0,
                },
            ],
            labels: labels,
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: "bottom",
                labels: {
                    fontColor: "rgb(154, 154, 154)",
                    fontSize: 11,
                    usePointStyle: true,
                    padding: 20,
                },
            },
            pieceLabel: {
                render: "percentage",
                fontColor: "white",
                fontSize: 14,
            },
            tooltips: false,
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20,
                },
            },
        },
    });
};

const myDoughnutChart = (labels, values) => {
    if (chartInstance_4) {
        chartInstance_4.destroy();
    }

    chartInstance_4 = new Chart(doughnutChart, {
        type: "doughnut",
        data: {
            datasets: [
                {
                    data: values,
                    backgroundColor: [
                        "#f3545d", "#fdaf4b", "#1d7af3", "#FF4500",
                        "#77E4C8", "#F9E400", "#36BA98", "#FF7F3E", "#06D001", "#C8A1E0", 
                        "#FF8C00", "#A52A2A", "#5F9EA0", "#D2691E", "#FF4500", "#DAA520", 
                        "#9ACD32", "#FF6347", "#40E0D0", "#6A5ACD", "#7B68EE", "#D8BFD8", 
                        "#FF1493", "#FFD700", "#CD5C5C", "#FF69B4", "#8B0000", "#FFB6C1", 
                        "#FF8C00", "#00CED1", "#ADFF2F", "#E6E6FA", "#FF00FF", "#8A2BE2", 
                    ],
                },
            ],

            labels: labels,
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: "bottom",
            },
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20,
                },
            },
        },
    });
};

topSubcategoriesByPostView();
topCategoriesByPostView();
countUserByMonths();
getTopPostView();