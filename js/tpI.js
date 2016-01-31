$(document).ready(function(){
		// Du nouveau formulaire dans la bdd
		$("#ajoutModele").click(function(){
			vdata = $('#addModele').serializeArray();
			vdata.push({name:"type",value:2});
			var input = this;
			console.log(vdata);

			$.ajax({
				type: "POST",
				url: './insert.php',
				data: vdata
			}).done(function(data){
				if (data == "1"){
					$("#ajoutModele").append('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>');
				}
			});	
		})
		$("#ajouter").click(function(){
			vdata = $('#add').serializeArray();
			vdata.push({name:"type",value:3});
			var input = this;
			console.log(vdata);

			$.ajax({
				type: "POST",
				url: './insert.php',
				data: vdata
			}).done(function(data){
				if (data == "1"){
					$("#ajouter").append('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>');
				}
			});	
		})
		$("#export").click(function(){
			vdata = $('#add').serializeArray();
			vdata.push({name:"type",value:4});
			var input = this;
			console.log(vdata);

			$.ajax({
				type: "POST",
				url: './insert.php',
				data: vdata
			}).done(function(data){
				if (data == "1"){
					$("#ajouter").append('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>');
				}
			});	
		})
		$('#carousel-example-generic').carousel({
			interval: false
		})
		
							vdata = $('#addModele').serializeArray();
				vdata.push({name:"type",value:5});
			$.ajax({

				type: "POST",
				url: './insert.php',
				data: vdata
			}).done(function(data){
				var template=$('<div class="panel panel-default"><div class="panel-heading"> <i class="fa fa-clock-o fa-fw"></i> Flux rss </div> <div class="panel-body"><ul class="timeline" id="timeline"></ul></div></div>');
				var item =$('<li><div class="timeline-badge"><i class="fa fa-check"></i></div><div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title"></h4><p><small class="text-muted"><i class="fa fa-clock-o"></i></small></p></div><div class="timeline-body"></div></div></li>');
				$("#page-wrapper").append(template);
				datas = ''
				for (i = 0; i<JSON.parse(data)["channel"]["item"].length; i++){
					if(isOdd(i) == true){
						console.log("oy")
						item.attr("class","timeline-inverted");
					}else{
						item.attr("class","");
					}
					description = JSON.parse(data)["channel"]["item"][i]["description"];
					
					item.find(".timeline-title").html("<a href='"+JSON.parse(data)["channel"]["item"][i]["link"]+"'>"+JSON.parse(data)["channel"]["item"][i]["title"]+"</a>");
					item.find(".timeline-body").html(description);
					item.find(".fa-clock-o").html(JSON.parse(data)["channel"]["item"][i]["pubDate"]);
					datas+=$(item).outerHTML();
					
				}		
				$("#timeline").append(datas);	
				$(".timeline-body br").remove();
				$(".timeline-body a").remove();	
			});	
			function isOdd(num) { return num % 2;}
		
		
	});
(function($) {
	$.fn.outerHTML = function() {
		return $(this).clone().wrap('<div></div>').parent().html();
	};
})(jQuery);