
$(document).ready(function(){
	//Create
	$("#CreateButton").click(function(event){
		event.preventDefault();
		$.ajax({
		 	type:"POST",
		 	url: "../service/api.php/RestAPITable",
		 	data: $('#formCreate').serialize(),
		 	dataType: "text",
	      	success: function(result){IDupdate
	        	$("#create_results").html(result);
			},
			error: function(result){
				$("#create_results").html(result);
			}
		});

    });

//Retrieve
		$("#RetrieveButton").click(function(event){
			event.preventDefault();
	    	$.ajax({
			 	type:"GET",
				url: "../service/api.php/RestAPITable",
			 	data: $('#Retrieve').serialize(),
			 	dataType: "text",
		      	success: function(result){
		      		//JSONObject myObject = new JSONObject(result);
		        	$("#retrieve_results").html(result);
				},
				error: function(result){
					$("#retrieve_results").html(result);
				}
			});
		});

//update
    $("#UpdateButton").click(function(event){
		event.preventDefault();
		$.ajax({
		 	type:"PUT",
			url: "../service/api.php/RestAPITable",
		 	data: $('#Update').serialize(),
		 	dataType: "text",
	      	success: function(result){
	        	$("#update_results").html(result);
			},
			error: function(result){
				$("#update_results").html(result);
			}
		});

    });

		//Delete
    $("#DeleteButton").click(function(event){
		event.preventDefault();
		$.ajax({
		 	type:"DELETE",
			url: "../service/api.php/RestAPITable",
		 	data: $('#Delete').serialize(),
		 	dataType: "text",
	      	success: function(result){
	        	$("#delete_results").html(result);
			},
			error: function(result){
				$("#delete_results").html(result);
			}
		});

    });
});
