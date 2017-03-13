$(function(){
	$("#form").submit(function(e){
   	 	e.preventDefault();	
		getData(1);   	 	   	 	
	});

	var getData = function(start){
		//alert(base_url+"logs/get_logs/"+start);
		$.post("index.php/logs/get_logs",
	    {
	        file: $("#file").val(),
	        start: base_url+"logs/get_logs/"+start,
	    },
	    function(data, status){
	        $("#data-container").html(data);
	    });
	}

	$(document).on('click', '.pagination a', function(e) {
	   e.preventDefault();
	   var start = $(this).attr('href');
	   //start = start.replace('/', '');
       getData(start);
    });
});