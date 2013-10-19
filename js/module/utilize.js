define([], function(){
	
	

	var Utilize = {

		Template: function(mixedHtml){

			var Template = {};
			var tpl = $('<div id="tpl"></div>');
			tpl.html(mixedHtml);
			$('script', tpl).each(function(){

				Template[this.id] = $(this).html();

			});

			tpl.remove();

			return Template;
		},

		sendData: function(options){

			var url = options.url,
				data = options.data,
				type = options.type,
				callback = options.callback
			;

			$.ajax({
				url: url,
				contentType: 'application/json',
				type: type,
				data: data,			   
				dataType: 'json',
				cache: false
			}).done( callback );

		},

		formatTime: function(unixTimestamp) {
		    var dt = new Date(unixTimestamp * 1000);

		    var hours = dt.getHours();
		    var minutes = dt.getMinutes();
		    var seconds = dt.getSeconds();

		    var date = dt.getDate();
     		var month = dt.getMonth();
     		var year = dt.getFullYear();

		    if (hours < 10) 
		     hours = '0' + hours;

		    if (minutes < 10) 
		     minutes = '0' + minutes;

		    if (seconds < 10) 
		     seconds = '0' + seconds;

		    return date + "/" + month + "/" + year + " (" + hours + ":" + minutes + ":" + seconds + ')';
		},

		elapsedTime: function(unixTimestamp) {
		    
		    var current = new Date(),
		    	date_in = new Date(unixTimestamp * 1000)
		    ;

	        var msPerMinute = 60 * 1000;
		    var msPerHour = msPerMinute * 60;
		    var msPerDay = msPerHour * 24;
		    var msPerWeek = msPerDay * 7;
		    var msPerMonth = msPerDay * 30;
		    var msPerYear = msPerDay * 365;
		    
		    var elapsed = current - date_in;
		    
		    if (elapsed < msPerMinute) {
		         return Math.round(elapsed/1000) + ' seconds ago';   
		    }
		    
		    else if (elapsed < msPerHour) {
		         return Math.round(elapsed/msPerMinute) + ' minutes ago';   
		    }
		    
		    else if (elapsed < msPerDay ) {
		         return Math.round(elapsed/msPerHour ) + ' hours ago';   
		    }

		    else if (elapsed < msPerMonth) {
		         return 'approximately ' + Math.round(elapsed/msPerDay) + ' days ago';   
		    }

		    else if (elapsed < msPerWeek ) {
		         return Math.round(elapsed/msPerHour ) + ' weeks ago';   
		    }
		    
		    else if (elapsed < msPerYear) {
		         return 'approximately ' + Math.round(elapsed/msPerMonth) + ' months ago';   
		    }
		    
		    else {
		         return 'approximately ' + Math.round(elapsed/msPerYear ) + ' years ago';   
    		}
		},

		getConfirm: function(confirmMessage, callback) {
		    confirmMessage = confirmMessage || '';

		    $('#confirmbox').modal({show:true,
		                            backdrop:false,
		                            keyboard: false,
		    });

		    //$('#confirmbox h3').html(confirmMessage);
		    $('#confirmbox').off('click', '#confirmFalse');
		    $('#confirmbox').on('click', '#confirmFalse', function(e){
		        $('#confirmbox').modal('hide');
		        
		        if (callback) callback(false);

		    });

		    $('#confirmbox').off('click', '#confirmTrue');
		    $('#confirmbox').on('click', '#confirmTrue', function(e){
		        $('#confirmbox').modal('hide');
		        if (callback) callback(true);
		    });
		},

		tooltipguide: function(data){

			$('body').append('<div id="overlaytooltipguide"><div><h3>Tutorial</h3><h5>Please spend 30secs to learn some components</h5></div></div>');

			$('body').on('click', '.tooltipguide', function(e){

				var el = $(e.currentTarget),
					current = el.data('current'),
					next = el.data('next')
				;

				triggerPopover(next, current);

			});

			function triggerPopover(next, current){
				if(current){
					$(current).popover('hide');
					$(current+'-clone').hide().remove();	
					//alert(current+'-clone');
				}
				$('.popover-target').remove();	
				$(next).popover('show');	
				var position = $(next).offset();	
				position.width = $(next).innerWidth();	
				position.height = $(next).innerHeight();	
				
				$('body').append('<div class="popover-target" id="'+next.replace('#', '')+'-clone" style="position: absolute; top: '+position.top+'px; left: '+position.left+'px; width: '+position.width+'px; height: '+position.height+'px; border: 2px solid #0088CC; background: rgba(220, 220, 220, .3);  z-index: 1001;"/>');	

				
				var window_scrollTop = $('html, body').scrollTop();
				var body_position = $(next).position();
	    		body_position.top = body_position.top - 300 > 0 ? body_position.top - 300 : 0;

	    		if( body_position.top >= window_scrollTop + 50 || body_position.top <= window_scrollTop - 50  ){
	    			console.log(body_position.top);
	    			$('html, body').animate({ 
		    			scrollTop: body_position.top+"px" 
		    		}, 500);
	    		}
	    		/*$('html, body').animate({ 
	    			scrollTop: (body_position.top - 300)+"px" 
	    		}, 500);*/
			}

			$('body').on('click', '.tooltipguide-close', function(e){

				e.preventDefault();

				var el = $(e.currentTarget),
					current = el.data('current')
				;

				$("#overlaytooltipguide").remove();
				$(current+'-clone').remove();
				_.forEach(data, function(item, key, data){
					$(item.el).popover('destroy');	
				});

			});




			var button = {};
			var content = '';
			_.forEach(data, function(item, key, data){

				
				button = {};
				content = '';
				
				if( data.length > key + 1 ) {
					button.title = 'next';
					button.next = data[key+1].el;

					content = item.content + ' <a href="#" class="tooltipguide btn btn-mini" data-next="' + button.next + '" data-current="' + item.el + '">' +  button.title + '</a>'
						+ ' <a href="#" class="tooltipguide-close btn btn-mini" data-current="' + item.el + '">Stop</a>'
					;
					//alert(item.content);
				} else {
					button.title = 'next';
					button.next = data[0].el;
					content = item.content + ' <a href="#" class="tooltipguide btn btn-mini" data-next="' + button.next + '" data-current="' + item.el + '">' +  button.title + '</a>' 
						+ ' <a href="#" class="tooltipguide-close btn btn-mini" data-current="' + item.el + '">Finish</a>';
				}

				


				$(item.el)
					.popover({
					    placement : item.placement ? item.placement : 'bottom',
					    title : '<strong>' + (item.title ? item.title : '') + '</b>', 
					    html: 'true',
					    content : content ? content : '',
					    container: 'body'
					})
					.popover('hide')
				;

				
				triggerPopover(data[0].el, 0);

			});

				
		}
	};

	return Utilize;
});