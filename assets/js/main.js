$(function(){

	/**
	 * Form submit
	 * @return Call getData function
	 */
	$("#form").submit(function(e){
   	 	e.preventDefault();	
		getData(0);   	 	   	 	
	});


	/**
	 * Call server side get contents using AJAX
	 * @param  offset Page offset
	 * @return html   Populate page with contents HTML
	 */
	var getData = function(offset){
		$.post(base_url+"index.php/logs/get_logs/"+offset,
	    {
	        file: $("#file").val(),
	        page: offset
	    },
	    function(data, status){
	        $("#data-container").html(data);
	    });
	}

	/**
	 * Click to call pagination	 
	 * @return Call getData function
	 */
	$(document).on('click', '.pagination a', function(e) {
	   e.preventDefault();
	   var offset = $(this).attr('attr-pageno');
	   //start = start.replace('/', '');
       getData(offset);
    });
    
});