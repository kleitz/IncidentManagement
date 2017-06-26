
<script type="text/javascript">
{{str_slug($workstream->name,'_')}} = function () {	
	$.ajax({
	  method: "get",
	  url: "workstream/api/incidents/{{$workstream->id}}",
	})
	.done(function( data ) {
		console.log(data);
		var openedIncidents = [];
		for( var i=0; i<data.length ; i++)
		{
			openedIncidents.push({
				y:data[i].open_incidents,
				label:data[i].incident_type,
			})
		}
		var {{str_slug($workstream->name,'_')}} = new CanvasJS.Chart("{{str_slug($workstream->name,'_')}}",
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
		{{str_slug($workstream->name,'_')}}.render();
	});
}
</script>
<div id="{{str_slug($workstream->name,'_')}}" style="height: 300px; width: 100%;"></div>
