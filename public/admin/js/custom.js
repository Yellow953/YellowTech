// start auto dismiss
document.addEventListener("DOMContentLoaded", function () {
    function addAutoDismiss(alert) {
        setTimeout(function () {
            alert.style.display = "none";
        }, 5000);
    }

    var autoDismissAlerts = document.querySelectorAll(".auto-dismiss");
    autoDismissAlerts.forEach(function (alert) {
        addAutoDismiss(alert);
    });

    document.body.addEventListener("DOMNodeInserted", function (event) {
        if (
            event.target.classList &&
            event.target.classList.contains("auto-dismiss")
        ) {
            addAutoDismiss(event.target);
        }
    });
});
// end auto dismiss

// start delete confirmation
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.show_confirm').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            var url = this.getAttribute('href');
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = url;
                }
            });
        });
    });
});
// end delete confirmation

// start select2
$(document).ready(function() {
    $('.select2').select2();
});
// end select2

$(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
});

// start adjust sidenav scroll
document.addEventListener("DOMContentLoaded", function () {
    var activeElement = document.querySelector(".treeview.active");

    if (activeElement) {
        var sidebar = document.getElementById("sidenav-main");
        var sidebarRect = sidebar.getBoundingClientRect();
        var elementRect = activeElement.getBoundingClientRect();

        var offset =
            elementRect.top -
            sidebarRect.top -
            (sidebarRect.height - elementRect.height) / 2;

        sidebar.scrollTo({ top: offset, behavior: "smooth" });
    }
});
//   end adjust sidenav scroll



$(function () {
    // Ensure data is available
    if (!uniqueVisits || !topBrowsers || !topLocations) {
        console.error('Data is not available');
        return;
    }

    // Convert PHP data to format suitable for Chart.js
    var areaChartLabels = Object.keys(uniqueVisits);
    var areaChartDataValues = Object.values(uniqueVisits);

    var pieChartLabels = Object.keys(topBrowsers);
    var pieChartDataValues = Object.values(topBrowsers);

    var barChartLabels = Object.keys(topLocations);
    var barChartDataValues = Object.values(topLocations);

    console.log('Area Chart Labels:', areaChartLabels);
    console.log('Area Chart Data Values:', areaChartDataValues);
    console.log('Pie Chart Labels:', pieChartLabels);
    console.log('Pie Chart Data Values:', pieChartDataValues);
    console.log('Bar Chart Labels:', barChartLabels);
    console.log('Bar Chart Data Values:', barChartDataValues);

    // Area Chart
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    var areaChartData = {
        labels: areaChartLabels,
        datasets: [
            {
                label: "Unique Visits",
                fillColor: "rgba(60,141,188,0.9)",
                strokeColor: "rgba(60,141,188,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: areaChartDataValues
            }
        ]
    };

    var areaChartOptions = {
        showScale: true,
        scaleShowGridLines: false,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        bezierCurve: true,
        bezierCurveTension: 0.3,
        pointDot: false,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        maintainAspectRatio: false,
        responsive: true
    };

    new Chart(areaChartCanvas).Line(areaChartData, areaChartOptions);

    // Line Chart (reusing area chart data)
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChartOptions = areaChartOptions;
    lineChartOptions.datasetFill = false;
    new Chart(lineChartCanvas).Line(areaChartData, lineChartOptions);

    // Pie Chart
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieData = pieChartLabels.map(function (label, index) {
        return {
            value: pieChartDataValues[index],
            color: "#" + Math.floor(Math.random()*16777215).toString(16),
            highlight: "#" + Math.floor(Math.random()*16777215).toString(16),
            label: label
        };
    });

    var pieOptions = {
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        segmentStrokeWidth: 2,
        percentageInnerCutout: 50,
        animationSteps: 100,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: false
    };

    new Chart(pieChartCanvas).Doughnut(pieData, pieOptions);

    // Bar Chart
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChartData = {
        labels: barChartLabels,
        datasets: [
            {
                label: "Top Locations",
                fillColor: "#00a65a",
                strokeColor: "#00a65a",
                pointColor: "#00a65a",
                data: barChartDataValues
            }
        ]
    };

    var barChartOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
        maintainAspectRatio: false
    };

    new Chart(barChartCanvas).Bar(barChartData, barChartOptions);
});
