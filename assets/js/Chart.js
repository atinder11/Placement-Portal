var DEFAULT_DATASET_SIZE = 4,
	addedCount = 0,
	color = Chart.helpers.color;

var months = ["2017-2018", "2018-2019", "2019"];

var chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(231,233,237)'
};

function randomScalingFactor() {
	return Math.round(Math.random() * 14);
}

var barData = {
	labels: ["2017-2018", "2018-2019", "2019" ],
	datasets: [{
		label: 'Highest Package',
		backgroundColor: color(chartColors.red).alpha(0.5).rgbString(),
		borderColor: chartColors.red,
		borderWidth: 1,
		data: [
			9,
			10,
			12,
		]
	}, {
		label: 'Average Package',
		backgroundColor: color(chartColors.blue).alpha(0.5).rgbString(),
		borderColor: chartColors.blue,
		borderWidth: 1,
		data: [
			6,
			7,
			8,
		]
	}]

};
var index = 5;
var ctx = document.getElementById("barChart").getContext("2d");
var myNewChartB = new Chart(ctx, {
	type: 'bar',
	data: barData,
	options: {
		responsive: true,
		maintainAspectRation: true,
		legend: {
			position: 'top',
		},
		title: {
			display: true,
			text: '( Last 3 Years Trend )'
		}
	}
});