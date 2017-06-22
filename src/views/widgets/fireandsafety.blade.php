<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("fire-and-safety",
	{
		title:{
			text: "Email Categories",
			verticalAlign: 'top',
			horizontalAlign: 'left'
		},
                animationEnabled: true,
		data: [
		{
			type: "doughnut",
			startAngle:20,
			toolTipContent: "{label}: {y} - <strong>#percent%</strong>",
			indexLabel: "{label} #percent%",
			dataPoints: [
				{  y: 67, label: "Inbox" },
				{  y: 28, label: "Archives" },
				{  y: 10, label: "Labels" },
				{  y: 7,  label: "Drafts"},
				{  y: 4,  label: "Trash"}
			]
		}
		]
	});
	chart.render();
}
</script>
<div id="fire-and-safety" style="height: 300px; width: 100%;"></div>
