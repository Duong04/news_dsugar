import axios_ins from "./axios.js";

const isAuthenticated = window.auth.isAuthenticated;
const currentUser = window.auth.user;
const topLimit = document.querySelector('#top-limit');

const emptyData = () => {
    return (`
        <img width="200px" src="https://res.cloudinary.com/dsdyprt1q/image/upload/v1723955263/news_dsugar/vi44ibm1q8wuwbhvi7l5.png" alt="">
        <p>Không có dữ liệu!</p>
    `);
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

    getTop10(limit);
}
 
const getTop10 = async (limit = null) => {
    const barChart = document.getElementById("barChart");
    document.querySelector('#count-limit').innerText = limit ?? 10; 
    try {
        const response = await axios_ins.get(`/stats/posts/top-views?limit=${limit ?? 10}&author_id=${currentUser.id}`);
        const data = response.data.data;

        if (data.length === 0) {
            barChart.style.display = "none";
            document.getElementById("noDataMessage").innerHTML = emptyData();
            return;
        }else {
            let labels = [];
            let values = [];
    
            data.forEach((item) => {
                let shortTitle =
                    item.title.length > 10
                        ? item.title.substring(0, 10) + "..."
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

const topCategoriesByPostView = async () => {
    const doughnutChart = document.getElementById("doughnutChart");
    try {
        const response = await axios_ins.get(
            `/stats/categories/top-views?limit=3&author_id=${currentUser.id}`
        );
        const data = response.data.data;

        if (data.length === 0) {
            doughnutChart.style.display = "none";
            document.getElementById("noDataMessage-2").innerHTML = emptyData();
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

const topSubcategoriesByPostView = async () => {
    const pieChart = document.getElementById("pieChart");
    try {
        const response = await axios_ins.get(
            `/stats/subcategories/top-views?limit=5&author_id=${currentUser.id}`
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

let chartInstance = null;

const myBarChart = (labels, values, data) => {
    if (chartInstance) {
        chartInstance.destroy();
    }

    chartInstance = new Chart(barChart, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Lượt xem",
                    backgroundColor: [
                        "#1d7af3",
                        "#f3545d",
                        "#fdaf4b",
                        "#399918",
                        "#77E4C8",
                        "#F9E400",
                        "#36BA98",
                        "#FF7F3E",
                        "#06D001",
                        "#C8A1E0",
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

const myDoughnutChart = (labels, values) => {
    new Chart(doughnutChart, {
        type: "doughnut",
        data: {
            datasets: [
                {
                    data: values,
                    backgroundColor: ["#f3545d", "#fdaf4b", "#1d7af3"],
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

const myPieChart = (labels, values) => {
    new Chart(pieChart, {
        type: "pie",
        data: {
            datasets: [
                {
                    data: values,
                    backgroundColor: ["#1d7af3", "#f3545d", "#fdaf4b", "#77E4C8", "#F9E400",],
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

getTop10();
topCategoriesByPostView();
topSubcategoriesByPostView();
