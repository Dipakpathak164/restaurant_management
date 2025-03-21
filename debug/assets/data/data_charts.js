// comboBarLineChart
var ctx_combo_bar = document
  .getElementById("comboBarLineChart")
  .getContext("2d");
var comboBarLineChart = new Chart(ctx_combo_bar, {
  type: "bar",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
    datasets: [
      {
        type: "bar",
        label: "Members",
        backgroundColor: "#00b29e",
        data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
        borderColor: "white",
        borderWidth: 0,
      },
      {
        type: "bar",
        label: "Applied members",
        backgroundColor: "#00c0ef",
        data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
      },
    ],
    borderWidth: 1,
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
          },
        },
      ],
    },
  },
});

// barChart
var ctx_bar_chart = document.getElementById("barChart").getContext("2d");
var barChart = new Chart(ctx_bar_chart, {
  type: "bar",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
    datasets: [
      {
        label: "Amount received",
        data: [12, 19, 3, 5, 10, 5, 13, 17, 11, 8, 11, 9],
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
          },
        },
      ],
    },
  },
});

// line chart
var ctx_line_chart = document.getElementById("lineChart").getContext("2d");
var lineChart = new Chart(ctx_line_chart, {
  type: "bar",
  data: {
    labels: [
      "Javascript",
      "Python",
      "C",
      "C#",
      "C++",
      "React",
      "Php",
      "Angular",
      "Java",
      "Swift",
      "R",
      "Go",
    ],
    datasets: [
      {
        label: "Skills",
        backgroundColor: "#FB7E6D",
        data: [10, 14, 6, 7, 13, 9, 13, 12, 11, 8, 12, 9],
      },
    ],
  },
  options: {
    tooltips: {
      mode: "index",
      intersect: false,
    },
    responsive: true,
    scales: {
      xAxes: [
        {
          stacked: true,
        },
      ],
      yAxes: [
        {
          stacked: true,
        },
      ],
    },
  },
});

// pieChart
var ctx_pie_chart = document.getElementById("pieChart").getContext("2d");
var pieChart = new Chart(ctx_pie_chart, {
  type: "pie",
  data: {
    datasets: [
      {
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        label: "Dataset 1",
      },
    ],
    labels: ["Bangalore", "Chandigar", "Delhi", "Pune", "Vijayawada"],
  },
  options: {
    responsive: true,
  },
});

// doughnutChart
var ctx_horizontal_chart = document
  .getElementById("HorizontalChart")
  .getContext("2d");
var horizontalChart = new Chart(ctx_horizontal_chart, {
  type: "bar",
  data: {
    datasets: [
      {
        data: [12, 19, 13, 15, 17, 13, 15, 17, 13],
        backgroundColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        label: "Top 5 Employers",
      },
    ],
    labels: [
      "Infosys",
      "Cisco",
      "IBM",
      "Infosys",
      "Cisco",
      "IBM",
      "Infosys",
      "Cisco",
      "IBM",
    ],
  },
  options: {
    indexAxis: "y",
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
          },
        },
      ],
    },
  },
});

// radarChart
var ctx_radar_chart = document.getElementById("radarChart").getContext("2d");
var doughnutChart = new Chart(ctx_radar_chart, {
  type: "radar",
  data: {
    labels: [
      ["Eating", "Dinner"],
      ["Drinking", "Water"],
      "Sleeping",
      ["Designing", "Graphics"],
      "Coding",
      "Running",
    ],
    datasets: [
      {
        label: "My First dataset",
        backgroundColor: "rgba(255, 99, 132, 0.2)",
        borderColor: "rgba(255,99,132,1)",
        pointBackgroundColor: "red",
        data: [12, 19, 13, 11, 19, 17],
      },
      {
        label: "My Second dataset",
        backgroundColor: "rgba(250, 80, 112, 0.3)",
        borderColor: "rgba(54, 162, 235, 1)",
        pointBackgroundColor: "blue",
        data: [15, 12, 14, 15, 9, 11],
      },
    ],
  },
  options: {
    responsive: true,
  },
});

// polarAreaChart
var ctx_polar_area_chart = document
  .getElementById("polarAreaChart")
  .getContext("2d");
var doughnutChart = new Chart(ctx_polar_area_chart, {
  type: "polarArea",
  data: {
    labels: ["Red", "Green", "Yellow", "Grey", "Blue"],
    datasets: [
      {
        label: "My First Dataset",
        data: [11, 16, 7, 3, 14],
        backgroundColor: [
          "rgb(255, 99, 132)",
          "rgb(75, 192, 192)",
          "rgb(255, 205, 86)",
          "rgb(201, 203, 207)",
          "rgb(54, 162, 235)",
        ],
      },
    ],
  },
});

//====Line Chart double line===
var ctx = document.getElementById("line-chart").getContext("2d");
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: "line",

  // The data for our dataset
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
      {
        label: "Earnings",
        //backgroundColor: 'rgb(255, 99, 132)',
        borderColor: "#ec3b83",
        data: [0, 10, 5, 2, 20, 30, 45],
        fill: false,
      },
      {
        label: "Earnings",
        //backgroundColor: 'rgb(255, 99, 132)',
        borderColor: "#f56954",
        data: [15, 15, 10, 20, 30, 10, 25],
      },
    ],
  },
  options: {
    responsive: true,
    tooltips: {
      intersect: false,
      mode: "index",
      callbacks: {
        label: function (tooltipItem, myData) {
          var label = myData.datasets[tooltipItem.datasetIndex].label || "";
          if (label) {
            label += ": ";
          }
          label += parseFloat(tooltipItem.value).toFixed(2);
          return label;
        },
      },
    },
  },
});

// Line chart 2
function randomNumber(min, max) {
  return Math.random() * (max - min) + min;
}

function randomBar(date, lastClose) {
  var open = randomNumber(lastClose * 0.95, lastClose * 1.05).toFixed(2);
  var close = randomNumber(open * 0.95, open * 1.05).toFixed(2);
  return {
    t: date.valueOf(),
    y: close,
  };
}

var dateFormat = "MMMM DD YYYY";
var date = moment("April 01 2017", dateFormat);
var data = [randomBar(date, 30)];
while (data.length < 60) {
  date = date.clone().add(1, "d");
  if (date.isoWeekday() <= 5) {
    data.push(randomBar(date, data[data.length - 1].y));
  }
}

var ctx = document.getElementById("lineChart2").getContext("2d");

var color = Chart.helpers.color;
var cfg = {
  type: "bar",
  data: {
    datasets: [
      {
        label: "Duration",
        backgroundColor: "blue",
        borderColor: "blue",
        data: data,
        type: "line",
        pointRadius: 0,
        fill: false,
        lineTension: 0,
        borderWidth: 2,
      },
    ],
  },
  options: {
    scales: {
      xAxes: [
        {
          type: "time",
          distribution: "series",
          ticks: {
            source: "data",
            autoSkip: true,
          },
        },
      ],
      yAxes: [
        {
          scaleLabel: {
            display: true,
            labelString: "Page Views",
          },
        },
      ],
    },
    tooltips: {
      intersect: false,
      mode: "index",
      callbacks: {
        label: function (tooltipItem, myData) {
          var label = myData.datasets[tooltipItem.datasetIndex].label || "";
          if (label) {
            label += ": ";
          }
          label += parseFloat(tooltipItem.value).toFixed(2);
          return label;
        },
      },
    },
  },
};

var chart = new Chart(ctx, cfg);
