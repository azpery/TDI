$(document).ready(function(){
	var cpt = 0;
	var lesRSS = ["https://news.google.com/?output=rss&hl=en&gl=en&tbm=nws&authuser=0","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0001&NOMBRE=10&DESCRIPTION=Transport%20et%20d%E9placements&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0004&NOMBRE=10&DESCRIPTION=Tourisme&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0007&NOMBRE=10&DESCRIPTION=Risques%20et%20pollution&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0010&NOMBRE=10&DESCRIPTION=Logement%20et%20habitat&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0012&NOMBRE=10&DESCRIPTION=International&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0002&NOMBRE=10&DESCRIPTION=Enseignement%20et%20recherche&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0005&NOMBRE=10&DESCRIPTION=Emploi&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0003&NOMBRE=10&DESCRIPTION=Economie&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0008&NOMBRE=10&DESCRIPTION=Eau%20/%20assainissement&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0014&NOMBRE=10&DESCRIPTION=Conseil%20communautaire&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0006&NOMBRE=10&DESCRIPTION=D%E9chets&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0015&NOMBRE=10&DESCRIPTION=D%E9veloppement%20Durable&FLUX_RSS=1","http://www.nantesmetropole.fr/adminsite/webservices/export_rss.jsp?OBJET=ARTICLENM&TYPE_ARTICLE=0002&THEMATIQUE=0008&NOMBRE=10&DESCRIPTION=Eau%20/%20assainissement&FLUX_RSS=1"]
	for(var i = 0; i<lesRSS.length; i++){
		vdata = $('#addModele').serializeArray();
		vdata.push({name:"type",value:5});
		vdata.push({name:"path",value:lesRSS[i]});
		$.ajax({

			type: "POST",
			url: './insert.php',
			data: vdata
		}).done(function(data){
			var template=$('<div class="col-md-12"><div class="panel panel-default"><div class="panel-heading" id="heading'+cpt+'"> <i class="fa fa-clock-o fa-fw"></i> '+JSON.parse(data)["channel"]["description"]+' </div> <div class="panel-body"><ul class="timeline" id="timeline'+cpt+'"></ul></div></div></div>');
			var item =$('<li><div class="timeline-badge"><i class="fa fa-hand-spock-o"></i></div><div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title"></h4><p><small class="text-muted"><i class="fa fa-clock-o"></i></small></p></div><div class="timeline-body"></div></div></li>');
			$("#body").append(template);
			datas = ''
			if(JSON.parse(data)["channel"]["item"]!= undefined){
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
				$("#timeline"+cpt).append(datas);	
				$(".timeline-body br").remove();
				$(".timeline-body a").remove();	
				$("#timeline"+cpt).parent().hide();
				kikou = "#timeline"+cpt
				console.log(kikou)
				$("#heading"+cpt).click(function(){
					
					console.log($(this).find(".timeline").html())
					$(this).parent().find(".timeline").parent().slideToggle(99);
				})
				cpt++;


			}

		});	
}
function isOdd(num) { return num % 2;}
(function($) {
	$.fn.outerHTML = function() {
		return $(this).clone().wrap('<div></div>').parent().html();
	};
})(jQuery);
})
