define([], 
	function(){

	/* Declaration */
	var Interface = {};

	Interface.getConfirm = function(confirmMessage, callback) {

		onfirmMessage = confirmMessage || '';

	    $('#confirmbox').modal({show:true,
	                            backdrop:false,
	                            keyboard: false,
	    });

	    $('#confirmbox h3').html(confirmMessage);
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
	};

	return Interface;
});
