
	$(function() {
        // initialize sol
        //$('#guest-list').searchableOptionList({
			//maxHeight: '250px'
			
		//});
		
    });
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
	
	//additem to requisition
	
	$('#additemtolist').click(function(){
		var reqid =document.getElementById("reqid").value;
		var requisition_no =document.getElementById("requisition_no").value;
		var itemno = document.getElementById("item-list").value;
		var iunit = document.getElementById("iunit").value;
		var qty = document.getElementById("qty").value;
		
		
		$.ajax({
			url: 'include/functions.php',
			type: 'post',
			data: {action: "additemtolist", reqid: reqid, itemno: itemno, iunit: iunit,qty:qty,requisition_no:requisition_no},
			success: function(response) {
				console.log(response);
				var itemdescription = $('#item-list option:selected').text();
				
				$('#itemlist tr:last').after("<tr><td>"+itemdescription+"</td><td>"+iunit+"</td><td>"+qty+"</td><td><button class='btn btn-danger notification' id='notification'><i class='fa fa-times'></i></button></td></tr>");

				//$("#iunit").append("<option value='0'>Select Item</option>");
				
				
				/*
				$('#success-alert').show("slow");
				$('#success-alert').removeClass("hide");
				setTimeout(function(){$('#success-alert').hide("slow");},1500);*/
				$( ".simplemodal-close" ).trigger( "click" );
				window.location.reload();
				//setTimeout(function(){location.reload();},500);
				//var rid = parseInt(response);
				
				//window.location.href = "requisitiondetails.php?id=" + rid;
			}
		});
		
		


	});
	
	
	
	
	
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
		//document.getElementById("unit").value = "";
		//document.getElementById("qty").value = "";

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

	
//save requisition	
$('#savereqitem').click(function(){
	var rdate = document.getElementById("rdate").value;
	var rno = document.getElementById("rno").value;
	var requesterid = document.getElementById("requester_id").value;
	//var duplicate=0;
	
	//check duplicate rno
	$.ajax({
			url: 'include/functions.php',
			type: 'post',
			data: {action: "checkduplicaterno", rno: rno},
			success: function(response) {
				console.log(response);
				var duplicate =parseInt(response);
				
				if(duplicate>=1){
					alert("Duplicate Requisition No.");
				}else{
					
					$.ajax({
						url: 'include/functions.php',
						type: 'post',
						data: {action: "saverequisition", rdate: rdate, rno: rno, requesterid: requesterid},
						success: function(response) {
							//console.log(response);
							document.getElementById("rdate").value = "";
							document.getElementById("rno").value = "";
							document.getElementById("requester_id").value = "";

							$('#success-alert').show("slow");
							$('#success-alert').removeClass("hide");
							setTimeout(function(){$('#success-alert').hide("slow");},1500);
							$( ".simplemodal-close" ).trigger( "click" );
							var rid = parseInt(response);
							//console.log(rid);
							window.location.href = "requisitiondetails.php?id=" + rid;
							
							//return "valid";
						}
					});
					
				}
				
				
			}
		});
	
	
	
	
	
});

//delete requisition
function deleterequisition(id){
	
	var r = confirm("Are your sure you want to delete this requisition?");
    if (r == true) {
        //alert ("You pressed OK!");
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "deleterequisition", reqid: id},
                    success: function(response) {
						location.reload();
						//console.log(response);
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}


function displayitemunit(itemid){
	
	var unitselect = document.getElementById("iunit");
	
	for (var i = 0; i <= unitselect.length; i++) { 
		unitselect.remove(unitselect.length-1);
	}
	
	
	
	if(parseInt(itemid)==0){
		$("#iunit").append("<option value='0'>Select Item</option>");
	}else{
		$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "getitemunit", itemid: itemid},
		success: function(response) { 
				var uom = JSON.parse(response);
				console.log(JSON.parse(response));
				//var unitselect = document.getElementById('iunit');
				//var ctr=0;
				//do{
					
				//	ctr++;
				//}while(testing!=undefined)
				document.getElementById("inventoryqty").innerHTML = uom.inventory_qty;
				$("#iunit").append("<option value='"+uom.unit+"'>"+uom.unit+"</option>");
			
				var max = 20;
				for (var ctr = 0; ctr <= max; ctr++) { 
					try{
						var testing = uom[ctr].equiv_unit;
						var base_qty = uom[ctr].base_qty;
						var base_unit = uom[ctr].base_unit;
						$("#iunit").append("<option value='"+testing+"'>"+testing+ " (" +base_qty+" "+base_unit+")</option>");
						//console.log(testing);
					}catch(e){
						max = 21;
						return 0;	
					}
				}
				
				
				
				//document.getElementById('iunit').value=response;

			}
		});
	}
	document.getElementById("qty").focus();
	
}




	
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
				//var pcperunit = document.getElementById("pc_per_unit").value;
					var unit = document.getElementById("unit").value;
					var cost = document.getElementById("cost").value;
					var category = document.getElementById("category").value;
					var supplierid = document.getElementById("supplier").value;
					var brand = document.getElementById("brand").value;
					//alert(description);
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "saveitem", description: description, unit: unit, unitcost: cost, category: category,supplier:supplierid, brand:brand},
                    success: function(response) {
						console.log(response);
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
						window.location.reload();;

						return "valid";
                    }
                });

				});	

		

//save inventory
		$('#saveinventory').click(function(){

				$('#updateuser').prop("disabled", true);    
				$('#saveuser').prop("disabled", false);  
				
					var itemno = document.getElementById("item-list").value;
					var unit = document.getElementById("iunit").value;
					var qty = document.getElementById("qty").value;
					var datereceived = document.getElementById("datereceived").value;
					var drno = document.getElementById("drno").value;
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "saveinventory", itemno: itemno, unit: unit, qty: qty,datereceived:datereceived,drno:drno},
                    success: function(response) {
						console.log(response);
						//document.getElementById("unit").value = "";
						//document.getElementById("qty").value = "";
						

						$('#success-alert').show("slow");
						$('#success-alert').removeClass("hide");
						setTimeout(function(){$('#success-alert').hide("slow");},1500);
						$( ".simplemodal-close" ).trigger( "click" );
						 window.location.reload();

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
		//var pcperunit = document.getElementById("pc_per_unit").value;
		var cost = document.getElementById("cost").value;
		var category = document.getElementById("category").value;
		var supplierid = document.getElementById("supplier").value;
		var brand = document.getElementById("brand").value;
		
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "updateitem",itemno: itemno, description: description, unit: unit, unitcost: cost, category: category, supplier: supplierid,brand:brand},
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
			
			document.getElementById("cost").value = data.unitCost;
			
			
			//alert(data.brand);
			
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
			
			document.getElementById("brand").value = data.brand;
			
			
			
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
	
	var r = confirm("Are your sure you want to delete this inventory item?");
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
	
function editreq(){
	
	$('#requisition_no').removeAttr("disabled");
	$('#reqdate').removeAttr("disabled");
	$('#requester_id').removeAttr("disabled");
	$('#req_status').removeAttr("disabled");
}

function updatereq(){
	var reqid = document.getElementById("reqid").value;
	var reqno = document.getElementById("requisition_no").value;
	var old_reqno = document.getElementById("old_requisition_no").value;
	var reqdate = document.getElementById("reqdate").value;
	var requester_id = document.getElementById("requester_id").value;
	var req_status = document.getElementById("req_status").value;
	$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "updatereq",reqid:reqid,old_reqno: old_reqno, reqno: reqno, reqdate: reqdate, requester_id: requester_id,req_status:req_status},
		success: function(response) {
			//console.log(response);
			$('#success-alert').show("slow");
			//$( ".simplemodal-close" ).trigger( "click" );
			location.reload();
			//setTimeout(function(){location.reload();},1000);
			//return "valid";
		}
	});
}

	
function updateinventory(reqno){
	
	var requisition_no = reqno;
	console.log(requisition_no);
	$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "updateinventory",requisition_no: requisition_no},
		success: function(response) {
			
			$('#success-alert').show("slow");
			
			
		
			alert("Inventory Updated");
			console.log(response);
			window.location.reload();
			//setTimeout(function(){location.reload();},1000);
		}
	});
	
	
}

	
function deleteitemreq(reqitemno){
	
	var reqitem = reqitemno;
	console.log(requisition_no);
	$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "deleteitemreq",reqitem: reqitem},
		success: function(response) {
			
			$('#success-alert').show("slow");
			
			
		
			//alert("Item Deleted");
			window.location.reload();
			console.log(response);
		}
	});
	
	
}



$('#addreq').click(function(){
		//clear fields
		//alert("clear");
		document.getElementById("rdate").value = "";
		document.getElementById("rno").value = "";
		document.getElementById("requester_id").value = ""
		
		
		var lastreq = document.getElementById("lastreq").value;
		var year = new Date().getFullYear();
		var prefix = "RIS";
	
		var splits = lastreq.split("-");
		var lastyear = splits[0].substring(3, 8);
		
		if(lastyear!=year){
			//start to 1
			
			var lastreqno = 1;
		}else{
			var lastreqno = parseInt(splits[1]);
		}
		
		var increment1 = lastreqno+1;
		var strinc = increment1.toString();
		
		if(strinc.length==1){
			var zero ="0000";
		}
		if(strinc.length==2){
			var zero ="000";
		}
		if(strinc.length==3){
			var zero ="00";
		}
		if(strinc.length==4){
			var zero ="0";
		}
		if(strinc.length==5){
			var zero ="0";
		}
		if(strinc.length==6){
			var zero ="";
		}
		
		//if(increment1.length )
		
		
		var displayreqno = prefix+year+"-"+zero+increment1;
	
		document.getElementById("rno").value = displayreqno;
		//console.log(lastyear);

	});

$('#saveuom').click(function(){
	var itemno = document.getElementById("itemno").value;
	var uomqty = document.getElementById("uomqty").value;
	var uomunit = document.getElementById("uomunit").value;
	var uombaseqty = document.getElementById("uombaseqty").value;
	var uombaseunit = document.getElementById("uombaseunit").value;
	
	$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "saveuom",itemno: itemno,uomqty:uomqty,uomunit:uomunit,uombaseqty:uombaseqty,uombaseunit:uombaseunit},
		success: function(response) {
			
			$('#success-alert').show("slow");

			window.location.reload();
			console.log(response);
		}
	});
});


function deleteuom(uomid){
	
	var r = confirm("Are your sure you want to delete this Unit of Measure Conversion?");
    if (r == true) {
		var uom_id = uomid;
		
		$.ajax({
			url: 'include/functions.php',
			type: 'post',
			data: {action: "deleteuom",uom_id: uom_id},
			success: function(response) {
				
				$('#success-alert').show("slow");
				
				
			
				//alert("Item Deleted");
				window.location.reload();
				console.log(response);
			}
		});
	}if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

function updateinventory_inv(ino){
	
	var inventoryno = ino;
	
	$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "updateinventory_inv",inventoryno: inventoryno},
		success: function(response) {
			
			$('#success-alert').show("slow");

			alert("Inventory Updated");
			console.log(response);
			window.location.reload();
		}
	});
	
	
}


//save equipment new
	$('#saveequipment').click(function(){
			
				$('#update').prop("disabled", true);    
				$('#saveequipment').prop("disabled", false);  
				
				var propertyno = document.getElementById("propertyno").value;
				var article = document.getElementById("article").value;
				var particulars = document.getElementById("particulars").value;
				var dateacquired = document.getElementById("dateacquired").value;
				var cost = document.getElementById("cost").value;
				var eid = document.getElementById("eid").value;
				var classification = document.getElementById("classification").value;
				var accountcode = document.getElementById("accountcode").value;
				
				var service = document.getElementById("service").value;
				var whereabout = document.getElementById("whereabout").value;
				var remarks = document.getElementById("remarks").value;
				var tagno = document.getElementById("tagno").value;
				var supplierid = document.getElementById("supplier").value;
				
				//peripheral details
				var processor = document.getElementById("processor").value;
				var ram = document.getElementById("ram").value;
				var hd = document.getElementById("hd").value;
				var os = document.getElementById("os").value;
				var equipsn = document.getElementById("equipsn").value;
				var processorsn = document.getElementById("processorsn").value;
				var monitorsn = document.getElementById("monitorsn").value;
				var keyboardsn = document.getElementById("keyboardsn").value;
				var mousesn = document.getElementById("mousesn").value;
				
				//var duplicatepropertyno = 0;

				
			//alert(globalpropno);
				
					
if(propertyno != '' && particulars !=''){
				
	//check duplicate property no
	$.ajax({
			url: 'include/functions.php',
			type: 'post',
			data: {action: "checkduplicatepropertyno", propertyno: propertyno},
			success: function(response) {
				console.log(response);
				var duplicatepropertyno =parseInt(response);
				//duplicateproperty(response);
				//alert(duplicatepropertyno);
				if(duplicatepropertyno == 0){
				
					$.ajax({
						url: 'include/functions.php',
						type: 'post',
						data: {action: "saveequipment", propertyno: propertyno,article:article, particulars:particulars,dateacquired:dateacquired,cost:cost,eid: eid, classification: classification,accountcode:accountcode,tagno:tagno,service:service,whereabout:whereabout,remarks:remarks,supplierid:supplierid, processor:processor,ram:ram,hd:hd,os:os,equipsn:equipsn,processorsn:processorsn,monitorsn:monitorsn,keyboardsn:keyboardsn,mousesn:mousesn},
						success: function(response) {
							console.log(response);

							$( ".simplemodal-close" ).trigger( "click" );
							 //setTimeout(function(){location.reload();},1500);
							//window.location.href = "equipmentsdetails.php?id=" + response;
						   //window.location.reload();
							return "valid";
						}
					});	
					

				}else{
					alert("Duplicate Property No.");
				}
			
			}
		});	

			}else{
				
				alert("Property No. & Particulars must not be blank.")
				
			}
			

				//$( ".simplemodal-close" ).trigger( "click" );
});
//update equipment
	$('#updateequipment').click(function(){
			
				$('#update').prop("disabled", true);    
				$('#saveequipment').prop("disabled", false);  
				var equipno = document.getElementById("equipno").value;
				var propertyno = document.getElementById("propertyno").value;
				var article = document.getElementById("article").value;
				var particulars = document.getElementById("particulars").value;
				var dateacquired = document.getElementById("dateacquired").value;
				var cost = document.getElementById("cost").value;
				var eid = document.getElementById("eid").value;
				var classification = document.getElementById("classification").value;
				var accountcode = document.getElementById("accountcode").value;
				
				var service = document.getElementById("service").value;
				var whereabout = document.getElementById("whereabout").value;
				var remarks = document.getElementById("remarks").value;
				var tagno = document.getElementById("tagno").value;
				var supplierid = document.getElementById("supplier").value;
				
				
				//peripheral details
				var processor = document.getElementById("processor").value;
				var ram = document.getElementById("ram").value;
				var hd = document.getElementById("hd").value;
				var os = document.getElementById("os").value;
				var equipsn = document.getElementById("equipsn").value;
				var processorsn = document.getElementById("processorsn").value;
				var monitorsn = document.getElementById("monitorsn").value;
				var keyboardsn = document.getElementById("keyboardsn").value;
				var mousesn = document.getElementById("mousesn").value;
					
				$.ajax({
				url: 'include/functions.php',
				type: 'post',
				data: {action: "updateequipment",equipno:equipno, propertyno: propertyno,article:article, particulars:particulars,dateacquired:dateacquired,cost:cost,eid: eid, classification: classification,accountcode:accountcode,tagno:tagno,service:service,whereabout:whereabout,remarks:remarks,supplierid:supplierid,processor,processor:processor,ram:ram,hd:hd,os:os,equipsn:equipsn,processorsn:processorsn,monitorsn:monitorsn,keyboardsn:keyboardsn,mousesn:mousesn},
				success: function(response) {
					console.log(response);

					//$( ".simplemodal-close" ).trigger( "click" );
					 //setTimeout(function(){location.reload();},1500);
					//window.location.href = "equipmentsdetails.php?id=" + response;
				    window.location.reload();
					return "valid";
                    }
                });

				//$( ".simplemodal-close" ).trigger( "click" );
				});
				
			

//edit equipment
	$('#editequipdetails').click(function(){
			
				$('#eid').prop("disabled", false);    
				$('#processor').prop("disabled", false);
				$('#ram').prop("disabled", false);
				$('#hd').prop("disabled", false);
				$('#os').prop("disabled", false);
				$('#brand').prop("disabled", false);
				$('#color').prop("disabled", false);
				$('#others').prop("disabled", false);
				$('#editequipdetails').prop("disabled", true);
				$('#saveequipdetails').prop("disabled", false);
				
				
				/*
				$('#saveequipment').prop("disabled", false);  
				
				var equipname = document.getElementById("equipname").value;
					var tagno = document.getElementById("tagno").value;
					var propertyno = document.getElementById("propertyno").value;
					var serial = document.getElementById("serial").value;
					var dateacquired = document.getElementById("dateacquired").value;
					var cost = document.getElementById("cost").value;
					var category = document.getElementById("category").value;
					var supplierid = document.getElementById("supplier").value;
					//var brand = document.getElementById("brand").value;
					//alert(description);
					
					$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "saveequipment", equipname: equipname,tagno:tagno, propertyno:propertyno,serial:serial,dateacquired:dateacquired,cost: cost, category: category,supplier:supplierid},
                    success: function(response) {
						console.log(response);
						document.getElementById("equipname").value = "";
						document.getElementById("tagno").value = "";
						document.getElementById("propertyno").value = "";
						document.getElementById("serial").value = "";
						document.getElementById("tagno").value = "";
						document.getElementById("dateacquired").value = "";
						document.getElementById("cost").value = "";

						//$('#success-alert').show("slow");
						//$('#success-alert').removeClass("hide");
						//setTimeout(function(){$('#success-alert').hide("slow");},1500);
						$( ".simplemodal-close" ).trigger( "click" );
						 //setTimeout(function(){location.reload();},1500);
						window.location.href = "equipmentsdetails.php?id=" + response;
                       
						return "valid";
                    }
                });
*/
				//$( ".simplemodal-close" ).trigger( "click" );
});


function deleteequip(id){
	
	var r = confirm("Are your sure you want to delete this Equipment?");
    if (r == true) {
        //alert ("You pressed OK!");
		$.ajax({
                    url: 'include/functions.php',
                    type: 'post',
                    data: {action: "deleteequip", equipno: id},
                    success: function(response) {
						location.reload();
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}


//save employee
$('#saveequipdetails').click(function(){

	$('#saveequipdetails').prop("disabled", true);
		var eid = document.getElementById("eid").value;
		var processor = document.getElementById("processor").value;
		var ram = document.getElementById("ram").value;
		var hd = document.getElementById("hd").value;
		var os = document.getElementById("os").value;
		var brand = document.getElementById("brand").value;
		var color = document.getElementById("color").value;
		var others = document.getElementById("others").value;
		var equipmentid = document.getElementById("equipmentid").value;
		
		$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "saveequipdetails", equipmentid:equipmentid, eid: eid, processor: processor, ram: ram, hd: hd,os: os, brand: brand,color:color,others:others},
		success: function(response) {
			console.log(response);
			
			//$('#success-alert').show("slow");
			//$('#success-alert').removeClass("hide");
			//setTimeout(function(){$('#success-alert').hide("slow");},1500);
			//$( ".simplemodal-close" ).trigger( "click" );
			 //setTimeout(function(){location.reload();},1500);
			window.location.reload();
			return "valid";
		}
	});

});


$('#editbutton').click(function(){
	$('#propertyno').prop("disabled", false);   
	$('#article').prop("disabled", false);
	$('#particulars').prop("disabled", false);
	$('#dateacquired').prop("disabled", false);
	$('#cost').prop("disabled", false);
	$('#eid').prop("disabled", false);
	$('#classification').prop("disabled", false);
	$('#accountcode').prop("disabled", false);
	$('#service').prop("disabled", false);
	$('#whereabout').prop("disabled", false);
	$('#remarks').prop("disabled", false);
	$('#tagno').prop("disabled", false);
	$('#supplier').prop("disabled", false);
	$('#updateequipment').prop("disabled", false);
	//peripheral details
	$('#processor').prop("disabled", false);
	$('#ram').prop("disabled", false);
	$('#hd').prop("disabled", false);
	$('#os').prop("disabled", false);
	$('#equipsn').prop("disabled", false);
	$('#processorsn').prop("disabled", false);
	$('#monitorsn').prop("disabled", false);
	$('#keyboardsn').prop("disabled", false);
	$('#mousesn').prop("disabled", false);
	
});


function editequipment(id){
	
	//$('#update').removeAttr("disabled");
	$('#update').prop("disabled", false);    
	$('#saveequipment').prop("disabled", true);    
	
	
	$('#propertyno').prop("disabled", true);   
	$('#article').prop("disabled", true);
	$('#particulars').prop("disabled", true);
	$('#dateacquired').prop("disabled", true);
	$('#cost').prop("disabled", true);
	$('#eid').prop("disabled", true);
	$('#classification').prop("disabled", true);
	$('#accountcode').prop("disabled", true);
	$('#service').prop("disabled", true);
	$('#whereabout').prop("disabled", true);
	$('#remarks').prop("disabled", true);
	$('#tagno').prop("disabled", true);
	$('#supplier').prop("disabled", true);

	//peripheral details
	$('#processor').prop("disabled", true);
	$('#ram').prop("disabled", true);
	$('#hd').prop("disabled", true);
	$('#os').prop("disabled", true);
	$('#equipsn').prop("disabled", true);
	$('#processorsn').prop("disabled", true);
	$('#monitorsn').prop("disabled", true);
	$('#keyboardsn').prop("disabled", true);
	$('#mousesn').prop("disabled", true);
	//alert(id);
	
	$.ajax({
		url: 'include/functions.php',
		type: 'post',
		data: {action: "getequipment", equipno : id},
		success: function(response) {
			//console.log(response);
			 var data = JSON.parse(response);
			 
			//insert values	
			document.getElementById("equipno").value = id;
			document.getElementById("propertyno").value = data.propertyNo;
			
			var equiparticle = data.article;
			var art = document.getElementById("article");
			var opt = document.createElement("option");
			opt.value = data.article;
			if(data.supplierID==""){
				opt.text = data.article;
			}else{
				opt.text = data.article;
			}
			
			opt.selected = "selected";

			art.add(opt,  art.options[0]);
			
			document.getElementById("particulars").value = data.particulars;
			document.getElementById("dateacquired").value = data.dateacquired;
			document.getElementById("cost").value = data.totalcost;
			
			
			var employeeid = data.eid;
			//alert(employeeid);
			var employeename = data.fname +" "+data.lname;
			var emp = document.getElementById("eid");
			var opt = document.createElement("option");
			
			if(data.eid==null){
				opt.value = 0;
				opt.text = "";
			}else{
				opt.value = data.eid;
				opt.text = employeename;
			}
			
			opt.selected = "selected";

			emp.add(opt,  emp.options[0]);
			
			
			//classification
			var classification = data.classification;
			var classf = document.getElementById("classification");
			var opt = document.createElement("option");
			
			if(classification==null){
				opt.value = "";
				opt.text = "";
			}else{
				opt.value = classification;
				opt.text = classification;
			}
			
			opt.selected = "selected";

			classf.add(opt,  classf.options[0]);
			
			//account code
			document.getElementById("accountcode").value = data.accountcode;
			
			//servicable
			var servicable = data.service;
			var service = document.getElementById("service");
			var opt = document.createElement("option");
			
			if(servicable==null){
				opt.value = "";
				opt.text = "";
			}else{
				opt.value = servicable;
				opt.text = servicable;
			}
			
			opt.selected = "selected";

			service.add(opt,  service.options[0]);
			
			document.getElementById("whereabout").value = data.whereabout;
			document.getElementById("remarks").value = data.remarks;
			document.getElementById("tagno").value = data.inventorytag;
			
			//supplier
			var suppliername = data.supName;
			var supplier = document.getElementById("supplier");
			var opt = document.createElement("option");
			
			if(data.supplierID==null){
				opt.value = "";
				opt.text = "";
			}else{
				opt.value = data.supplierID;
				opt.text = suppliername;
			}
			
			opt.selected = "selected";

			supplier.add(opt,  supplier.options[0]);

			document.getElementById("processor").value = data.processor;
			document.getElementById("ram").value = data.ram;
			document.getElementById("hd").value = data.hd;
			document.getElementById("os").value = data.operatingsystem;
			document.getElementById("equipsn").value = data.equipsn;
			document.getElementById("processorsn").value = data.processorsn;
			document.getElementById("monitorsn").value = data.monitorsn;
			document.getElementById("keyboardsn").value = data.keyboardsn;
			document.getElementById("mousesn").value = data.mousesn;
			return "valid";
		} 
	});
		
$('#updateequipment').prop("disabled", true); 	
	
	
}

	$('#addequipmentbutton').click(function(){
		//console.log("test");
		   $('#saveequipment').prop("disabled", false); 
				
			
			
			document.getElementById("equipno").value ="";
			document.getElementById("propertyno").value="";
			document.getElementById("article").value="";
			document.getElementById("particulars").value="";
			document.getElementById("dateacquired").value="";
			document.getElementById("cost").value="";
			document.getElementById("eid").value="";
			document.getElementById("classification").value="";
			document.getElementById("accountcode").value="";
			
			document.getElementById("service").value="";
			document.getElementById("whereabout").value="";
			document.getElementById("remarks").value="";
			document.getElementById("tagno").value="";
			document.getElementById("supplier").value="";
			
			$('#propertyno').prop("disabled", false);   
	$('#article').prop("disabled", false);
	$('#particulars').prop("disabled", false);
	$('#dateacquired').prop("disabled", false);
	$('#cost').prop("disabled", false);
	$('#eid').prop("disabled", false);
	$('#classification').prop("disabled", false);
	$('#accountcode').prop("disabled", false);
	$('#service').prop("disabled", false);
	$('#whereabout').prop("disabled", false);
	$('#remarks').prop("disabled", false);
	$('#tagno').prop("disabled", false);
	$('#supplier').prop("disabled", false);
	$('#updateequipment').prop("disabled", true); 
			
			
		
	});