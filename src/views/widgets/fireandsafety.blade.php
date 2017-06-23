<?php  $firesafety_workstream_id = 8; ?>
<script type="text/javascript">
window.onload = function () {
	$.ajax({
	  method: "get",
	  url: "workstream/api/incidents/{{$firesafety_workstream_id}}",
	})
	.done(function( data ) {
		var openedIncidents = [];
		for( var i=0; i<data.length ; i++)
		{
			openedIncidents.push({
				y:data[i].open_incidents,
				label:data[i].incident_type,
			})
		}
		var chart = new CanvasJS.Chart("fire-and-safety",
		{
			title:{
				text: "Fire And Safety",
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
				dataPoints: openedIncidents
			}
			]
		});
		chart.render();
	});
}
</script>
<div id="fire-and-safety" style="height: 300px; width: 100%;"></div>
