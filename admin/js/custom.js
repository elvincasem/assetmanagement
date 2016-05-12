
//item savePreferences
	$('#additembutton').click(function(){
		//clear fields
		//alert("clear");
		document.getElementById("itemno").value = "";
		document.getElementById("idescription").value = "";
		document.getElementById("unit").value = "";
		document.getElementById("cost").value = "";

	});
	$('#saveitem').click(function(){
				//alert("save");
					//logout();
				//$('#addItem').close();	
				//$("#addItem").modal('close')
				//saveItem();
				$('#update').prop("disabled", true);    
				$('#saveitem').prop("disabled", false);  
				
				var description = document.getElementById("idescription").value;
					var unit = document.getElementById("unit").value;
					var cost = document.getElementById("cost").value;
					//alert(description);
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "saveitem", description: description, unit: unit, unitcost: cost},
                    success: function(response) {
						//console.log();
						document.getElementById("idescription").value = "";
						document.getElementById("unit").value = "";
						document.getElementById("cost").value = "";

						//$('#itemtable').load(document.URL +  ' #itemtable');
						//$('#success-alert').show();
						//document.getElementById("success-alert").show;
						$('#success-alert').show("slow");
						$('#success-alert').removeClass("hide");
						setTimeout(function(){$('#success-alert').hide("slow");},1500);
						$( ".simplemodal-close" ).trigger( "click" );
						 setTimeout(function(){location.reload();},1500);
						
                        //$('table#resultTable tbody').html(response);
						//alert(response);
						//$('#itemtable').load(document.URL +  ' #itemtable');
						//$('#deletesuccess').show("fast");
						//setTimeout(function(){$('#deletesuccess').hide("slow");},1500);
						//$( ".simplemodal-close" ).trigger( "click" );
						return "valid";
                    }
                });
				
				
				
				
				
				//$( ".simplemodal-close" ).trigger( "click" );
				});
//item update

$('#update').click(function(){
	
		var itemno = document.getElementById("itemno").value;
		var description = document.getElementById("idescription").value;
		var unit = document.getElementById("unit").value;
		var cost = document.getElementById("cost").value;
		var category = document.getElementById("category").value;
		
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "updateitem",itemno: itemno, description: description, unit: unit, unitcost: cost, category: category},
                    success: function(response) {
						console.log(response);
						//alert(response);
						document.getElementById("itemno").value = "";
						document.getElementById("idescription").value = "";
						document.getElementById("unit").value = "";
						document.getElementById("cost").value = "";

						$( ".simplemodal-close" ).trigger( "click" );
						setTimeout(function(){location.reload();},1000);
						
						return "valid";
                    }
                });
		
	});
/*
	
	$('#success').click(function(){
				$('#success-alert').show("slow");
				$('#success-alert').removeClass("hide");
				setTimeout(function(){$('#success-alert').hide("slow");},1500);
				//setTimeout(function(){$('#success-alert').addClass("hide");},1500);
				});
*/
	
	
	
//user logout

	$('#logout').click(function(){
				//alert("out");
					logout();
				});

				
				
				
				
				
				
				
				
//functions		
				

function logout(){
	
	
				$.ajax({
                    url: 'include/functions.php',
                    type: 'get',
                    data: {action: 'logout'},
                    success: function(response) {
						alert(response);
						if(response=="loggedout"){
							//document.getElementById("message").style.display="block";
							window.location.replace("../");
						}
						
                    }
                });
} 
//delete item

function deleteitem(id){
	
	var r = confirm("Are your sure you want to delete this Item?");
    if (r == true) {
        //alert ("You pressed OK!");
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "deleteitem", itemno: id},
                    success: function(response) {
						location.reload();
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

function edititem(id){
	
	//$('#update').removeAttr("disabled");
	$('#update').prop("disabled", false);    
	$('#saveitem').prop("disabled", true);    

	//alert(id);
	
	$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "getitem", itemno : id},
		success: function(response) {
			console.log();
			 var data = JSON.parse(response);
			//var itemdescription = $.parseJSON(response);
			//var description = item.description;
			
			//alert(response);
			
			//alert(response.description);
			
			//fill the input box
			document.getElementById("itemno").value = id;
			document.getElementById("idescription").value = data.description;
			document.getElementById("unit").value = data.unit;
			document.getElementById("cost").value = data.unitCost;
			
			if(data.category == "Equipment"){
				document.getElementById("category").selectedIndex = 0;
			}else{
				document.getElementById("category").selectedIndex = 1;
			}
			
			//$("#category :selected").text() = data.category;
			
			
			
			
			
			return "valid";
		}
	});
		

	
	
}




