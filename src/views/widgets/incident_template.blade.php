
<script type="text/javascript">
window.onload = function () {
	$.ajax({
	  method: "get",
	  url: "workstream/api/incidents/{{$workstream->id}}",
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
		var chart = new CanvasJS.Chart("{{str_slug($workstream->name)}}",
		{

			height:180,

			title:{
				text: "{{$workstream->name}}",
				verticalAlign: 'top',
				horizontalAlign: 'left'
			},
			animationEnabled: true,
			data: [
			{
				type: "doughnut",
				startAngle:30,
				toolTipContent: "{label}: {y} - <strong>#percent%</strong>",
				indexLabel: "{label}  #percent%",
				dataPoints: openedIncidents
			}
			]
		});
		chart.render();
	});
}
</script>
<div id="{{str_slug($workstream->name)}}" style="height: 300px; width: 100%;"></div>
