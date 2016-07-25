//user logout

	$('#logout').click(function(){
				//alert("out");
					logout();
				});

	function logout(){
	
	
				$.ajax({
                    url: 'include/functions.php',
                    type: 'get',
                    data: {action: 'logout'},
                    success: function(response) {
						//alert(response);
						if(response=="loggedout"){
							//document.getElementById("message").style.display="block";
							//document.cookie = 'PHPSESSID=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
							
							window.location.replace("../");
						}
						
                    }
                });
	} 
//item savePreferences
	$('#additembutton').click(function(){
		$('#update').prop("disabled", true);    
		$('#saveitem').prop("disabled", false);
		//clear fields
		//alert("clear");
		document.getElementById("itemno").value = "";
		document.getElementById("idescription").value = "";
		document.getElementById("unit").value = "";
		document.getElementById("cost").value = "";
		//alert("test");
		var sel = document.getElementById("supplier");
			sel.remove(0);
			var opt = document.createElement("option");
			opt.value = "0";
			opt.text = "";
			opt.selected = "selected";

			sel.add(opt,  sel.options[0]);


	});
	$('#addsupplierbutton').click(function(){
		//clear fields
		//alert("clear");
		document.getElementById("suppliername").value = "";
		document.getElementById("address").value = "";
		document.getElementById("contactno").value = "";
		document.getElementById("supplierid").value = "";

	});
	
	$('#addprbutton').click(function(){
		//clear fields
		//alert("clear");
		/*document.getElementById("suppliername").value = "";
		document.getElementById("address").value = "";
		document.getElementById("contactno").value = "";
		document.getElementById("supplierid").value = "";
		*/
		//get last pr number
		getLastprnumber();	

	});
	
	//add inventory button
	$('#addinventorybutton').click(function(){
		$('#update').prop("disabled", true);    
		$('#saveitem').prop("disabled", false);
		//clear fields
		//alert("clear");
		document.getElementById("unit").value = "";
		document.getElementById("qty").value = "";

	});
	
	//add inventory button
	$('#addemployeebutton').click(function(){
		$('#update').prop("disabled", true);    
		$('#saveitem').prop("disabled", false);
		//clear fields
		//alert("clear");
		document.getElementById("employeeno").value = "";
		document.getElementById("lname").value = "";
		document.getElementById("fname").value = "";
		document.getElementById("mname").value = "";
		document.getElementById("ename").value = "";
		document.getElementById("designation").value = "";

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
				var pcperunit = document.getElementById("pc_per_unit").value;
					var unit = document.getElementById("unit").value;
					var cost = document.getElementById("cost").value;
					var category = document.getElementById("category").value;
					var supplierid = document.getElementById("supplier").value;
					//alert(description);
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "saveitem", description: description, unit: unit, pc_per_unit: pcperunit, unitcost: cost, category: category,supplier:supplierid},
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
					//alert('save');
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "savesupplier", suppliername: suppliername, address: address, contactno: contactno},
                    success: function(response) {
						console.log(response);
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
	//save employee
	$('#saveemployee').click(function(){

				$('#updateemployee').prop("disabled", true);    
				$('#saveemployee').prop("disabled", false);  
				
					var employeeno = document.getElementById("employeeno").value;
					var lname = document.getElementById("lname").value;
					var fname = document.getElementById("fname").value;
					var mname = document.getElementById("mname").value;
					var ename = document.getElementById("ename").value;
					var designation = document.getElementById("designation").value;
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "saveemployee", employeeno: employeeno, lname: lname, fname: fname, mname: mname,ename: ename, designation: designation},
                    success: function(response) {
						console.log(response);
						document.getElementById("employeeno").value = "";
						document.getElementById("lname").value = "";
						document.getElementById("fname").value = "";
						document.getElementById("mname").value = "";
						document.getElementById("ename").value = "";
						document.getElementById("designation").value = "";

						$('#success-alert').show("slow");
						$('#success-alert').removeClass("hide");
						setTimeout(function(){$('#success-alert').hide("slow");},1500);
						$( ".simplemodal-close" ).trigger( "click" );
						 setTimeout(function(){location.reload();},1500);

						return "valid";
                    }
                });

				});

		//save user
		$('#saveuser').click(function(){

				$('#updateuser').prop("disabled", true);    
				$('#saveuser').prop("disabled", false);  
				
					var username = document.getElementById("userusername").value;
					var password = document.getElementById("userpassword").value;
					var usertype = "admin";
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "saveuser", username: username, password: password},
                    success: function(response) {
						console.log(response);
						document.getElementById("userusername").value = "";
						document.getElementById("userpassword").value = "";
						

						$('#success-alert').show("slow");
						$('#success-alert').removeClass("hide");
						setTimeout(function(){$('#success-alert').hide("slow");},1500);
						$( ".simplemodal-close" ).trigger( "click" );
						 setTimeout(function(){location.reload();},1500);

						return "valid";
                    }
                });

				});	

		//save user
		$('#saveuser').click(function(){

				$('#updateuser').prop("disabled", true);    
				$('#saveuser').prop("disabled", false);  
				
					var username = document.getElementById("userusername").value;
					var password = document.getElementById("userpassword").value;
					var usertype = "admin";
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "saveuser", username: username, password: password},
                    success: function(response) {
						console.log(response);
						document.getElementById("userusername").value = "";
						document.getElementById("userpassword").value = "";
						

						$('#success-alert').show("slow");
						$('#success-alert').removeClass("hide");
						setTimeout(function(){$('#success-alert').hide("slow");},1500);
						$( ".simplemodal-close" ).trigger( "click" );
						 setTimeout(function(){location.reload();},1500);

						return "valid";
                    }
                });

				});	

//save inventory
		$('#saveinventory').click(function(){

				$('#updateuser').prop("disabled", true);    
				$('#saveuser').prop("disabled", false);  
				
					var itemno = document.getElementById("itemdescription").value;
					var unit = document.getElementById("unit").value;
					var qty = document.getElementById("qty").value;
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "saveinventory", itemno: itemno, unit: unit, qty: qty},
                    success: function(response) {
						console.log(response);
						document.getElementById("unit").value = "";
						document.getElementById("qty").value = "";
						

						$('#success-alert').show("slow");
						$('#success-alert').removeClass("hide");
						setTimeout(function(){$('#success-alert').hide("slow");},1500);
						$( ".simplemodal-close" ).trigger( "click" );
						 setTimeout(function(){location.reload();},1500);

						return "valid";
                    }
                });

				});	
				

	//save purchase request
	$('#savepr').click(function(){

				$('#updatepr').prop("disabled", true);    
				$('#savepr').prop("disabled", false);  
				
					var prnumber = document.getElementById("prnumber").value;
					var department = document.getElementById("department").value;
					var office = document.getElementById("office").value;
					var requestdate = document.getElementById("requestdate").value;
					var purpose = document.getElementById("purpose").value;
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "savepr", prnumber: prnumber, department: department, office: office, requestdate: requestdate,purpose: purpose},
                    success: function(response) {
						console.log(response);
						document.getElementById("prnumber").value = "";
						document.getElementById("department").value = "";
						document.getElementById("office").value = "";
						document.getElementById("requestdate").value = "";
						document.getElementById("purpose").value = "";
						
						window.location.href = "prequestitem.php?prno=" + prnumber;
						//$('#success-alert').show("slow");
						//$('#success-alert').removeClass("hide");
						//setTimeout(function(){$('#success-alert').hide("slow");},1500);
						//$( ".simplemodal-close" ).trigger( "click" );
						 //setTimeout(function(){location.reload();},1500);

						return "valid";
                    }
                });

				});		
				
//item update
$('#update').click(function(){
	
		var itemno = document.getElementById("itemno").value;
		var description = document.getElementById("idescription").value;
		var unit = document.getElementById("unit").value;
		var pcperunit = document.getElementById("pc_per_unit").value;
		var cost = document.getElementById("cost").value;
		var category = document.getElementById("category").value;
		var supplierid = document.getElementById("supplier").value;
		
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "updateitem",itemno: itemno, description: description, unit: unit, pc_per_unit: pcperunit, unitcost: cost, category: category, supplier: supplierid},
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
			console.log(response);
			 var data = JSON.parse(response);
			//var itemdescription = $.parseJSON(response);
			//var description = item.description;
			
			//alert(data.descript);
			
			//alert(response.description);
			
			//fill the input box
			document.getElementById("itemno").value = id;
			document.getElementById("idescription").value = data.description;
			document.getElementById("unit").value = data.unit;
			document.getElementById("pc_per_unit").value = data.pc_per_unit;
			document.getElementById("cost").value = data.unitCost;
			
			
			if(data.category == "Equipment"){
				document.getElementById("category").selectedIndex = 0;
			}else{
				document.getElementById("category").selectedIndex = 1;
			}
			

			//document.getElementById("cost").value = data.unitCost;
			var sel = document.getElementById("supplier");
			sel.remove(0);
			var opt = document.createElement("option");
			opt.value = data.supplierID;
			opt.text = data.supName;
			opt.selected = "selected";

			sel.add(opt,  sel.options[0]);

			
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


//delete user
function deleteuser(id){
	var r = confirm("Are your sure you want to delete this user?");
    if (r == true) {
        
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "deleteuser", userid: id},
                    success: function(response) {
						console.log(response);
						location.reload();
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

//edit employee
function editemployee(id){
	$('#updateemployee').prop("disabled", false);    
	$('#saveemployee').prop("disabled", true);    
	$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "getemployee", eid : id},
		success: function(response) {
			//console.log(response);
			var data = JSON.parse(response);
			document.getElementById("eid").value = id;
			document.getElementById("employeeno").value = data.empNo;
			document.getElementById("lname").value = data.lname;
			document.getElementById("fname").value = data.fname;
			document.getElementById("mname").value = data.mname;
			document.getElementById("ename").value = data.ename;
			document.getElementById("designation").value = data.designation;
			return "valid";
		}
	});
	
}

//update employee
$('#updateemployee').click(function(){
	
		var eid = document.getElementById("eid").value;
		var employeeno = document.getElementById("employeeno").value;
		var lname = document.getElementById("lname").value;
		var fname = document.getElementById("fname").value;
		var mname = document.getElementById("mname").value;
		var ename = document.getElementById("ename").value;
		var designation = document.getElementById("designation").value;
		
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "updateemployee", eid: eid, employeeno: employeeno, lname: lname, fname: fname, mname: mname, ename: ename, designation: designation},
                    success: function(response) {
						console.log(response);
						//alert(response);
						document.getElementById("eid").value = "";
						document.getElementById("employeeno").value = "";
						document.getElementById("lname").value = "";
						document.getElementById("fname").value = "";
						document.getElementById("lname").value = "";
						document.getElementById("ename").value = "";
						document.getElementById("designation").value = "";
location.reload();
						$( ".simplemodal-close" ).trigger( "click" );
						//setTimeout(function(){location.reload();},1000);
						
						return "valid";
                    }
                });
		
	});
//delete employee
function deleteemployee(id){
	var r = confirm("Are your sure you want to delete this Employee?");
    if (r == true) {
        
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "deleteemployee", eid: id},
                    success: function(response) {
						location.reload();
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}
	//date picker for PR Request page
	$(function() {
		$('.datepicker').datepicker({format: 'yyyy-mm-dd'});
	});

	
	
	/* ********* purchase request module *** */
	
function getLastprnumber(){
	
	$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "getlastpr"},
                    success: function(response) {
						console.log(response);
						
                        var d = new Date();
						var month = d.getMonth();
						//increate month by 1 since it is 0 indexed
						month = month + 1;
						var day = d.getDate();
						var year = d.getFullYear();
						var yy = year.toString().substring(2);
						
						var lastdigit = response.substring(5);
						
						//alert(lastdigit);
						
						/*var lastmonth = response.substring(3,5);
						var lastyear = response.substring(1,2);
						
						
							lastmonth = parseInt(lastmonth);
							if(lastmonth < month){
								
								lastdigit = 1;
							}else{
								lastdigit = parseInt(lastdigit) +1;
							}

						//converts month to a string
						month = month + "";
						//if month is 1-9 pad right with a 0 for two digits
						if (month.length == 1)
						{
							month = "0" + month;
						}
		
						var autopr = yy + '-' + month + '-' + lastdigit;
						
						*/
						lastdigit++;
						var autopr = year + '-' + lastdigit;
						document.getElementById("prnumber").value = autopr; 
						//alert (autopr);
						
                    }
                });
	
}
//auto input Unit in additem select
function selectunit(){
	
	var itemNo = document.getElementById("itemdescription").value;
	
	$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "getunitinventory", itemno: itemNo},
                    success: function(response) {
						console.log(response);
						var data = JSON.parse(response);
						document.getElementById("unit").value = data.unit; 
                        
						
                    }
                });
	
	
	
}



function addpritem(id){
	var table=document.getElementById("pr_items");
	$(table).append( "<tr><td>aaaa</td></tr>" );
	
}

//delete inventory
function deleteinventory(id){
	
	var r = confirm("Are your sure you want to delete this Item?");
    if (r == true) {
        //alert ("You pressed OK!");
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "deleteinventory", inventoryid: id},
                    success: function(response) {
						location.reload();
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!"; 
		
    }
	
}

$(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
		
		//items sort by name
		$('#dataTables-items').DataTable({
                responsive: true,
				 "order": [[ 0, "asc" ]]
        });
		//base unit of measure
		//items sort by name
		$('#dataTables-baseunit').DataTable({
                responsive: true,
				 "order": [[ 0, "asc" ]]
        });
    });
