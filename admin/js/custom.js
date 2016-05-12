//user logout

	$('#logout').click(function(){
				//alert("out");
					logout();
				});

//item savePreferences
	$('#additembutton').click(function(){
		//clear fields
		//alert("clear");
		document.getElementById("itemno").value = "";
		document.getElementById("idescription").value = "";
		document.getElementById("unit").value = "";
		document.getElementById("cost").value = "";

	});
	$('#addsupplierbutton').click(function(){
		//clear fields
		//alert("clear");
		document.getElementById("suppliername").value = "";
		document.getElementById("address").value = "";
		document.getElementById("contactno").value = "";
		document.getElementById("supplierid").value = "";

	});
	//save item
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
	//save supplier
	$('#savesupplier').click(function(){

				$('#updatesupplier').prop("disabled", true);    
				$('#saveitem').prop("disabled", false);  
				
					var suppliername = document.getElementById("suppliername").value;
					var address = document.getElementById("address").value;
					var contactno = document.getElementById("contactno").value;
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "savesupplier", suppliername: suppliername, address: address, contactno: contactno},
                    success: function(response) {
						//console.log();
						document.getElementById("suppliername").value = "";
						document.getElementById("address").value = "";
						document.getElementById("contactno").value = "";

						$('#success-alert').show("slow");
						$('#success-alert').removeClass("hide");
						setTimeout(function(){$('#success-alert').hide("slow");},1500);
						$( ".simplemodal-close" ).trigger( "click" );
						 setTimeout(function(){location.reload();},1500);

						return "valid";
                    }
                });

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



//edit supplier
function editsupplier(id){
	$('#updatesupplier').prop("disabled", false);    
	$('#savesupplier').prop("disabled", true);    
	$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "getsupplier", supplierno : id},
		success: function(response) {
			console.log(response);
			var data = JSON.parse(response);
			document.getElementById("supplierid").value = id;
			document.getElementById("suppliername").value = data.supName;
			document.getElementById("address").value = data.address;
			document.getElementById("contactno").value = data.contactNo;
			return "valid";
		}
	});
	
}
//update supplier
$('#updatesupplier').click(function(){
	
		var suppliername = document.getElementById("suppliername").value;
		var address = document.getElementById("address").value;
		var contactno = document.getElementById("contactno").value;
		var supplierid = document.getElementById("supplierid").value;
		
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "updatesupplier", supplierid: supplierid, suppliername: suppliername, address: address, contactno: contactno},
                    success: function(response) {
						//console.log(response);
						//alert(response);
						document.getElementById("suppliername").value = "";
						document.getElementById("address").value = "";
						document.getElementById("contactno").value = "";
						document.getElementById("supplierid").value = "";

						$( ".simplemodal-close" ).trigger( "click" );
						setTimeout(function(){location.reload();},1000);
						
						return "valid";
                    }
                });
		
	});
//delete supplier
function deletesupplier(id){
	var r = confirm("Are your sure you want to delete this Supplier?");
    if (r == true) {
        
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "deletesupplier", supplierid: id},
                    success: function(response) {
						location.reload();
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}


