<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.tab_wrap{width:100%; }
		input[type="radio"]{display:none;}
		.tab_area{font-size:0;}
		.tab_area label{margin-bottom: -2px; display:inline-block;
						padding:12px; color:black; background:#cccccc; text-align:center; 
						font-size:13px; cursor:pointer; transition:ease 0.2s opacity;}
		.panel_area{background:#fff;}
		.tab_panel{padding:80px 0; display:none; text-align:center;}
		.tab_panel p{font-size:14px; letter-spacing:1px; text-align:center;}

		#tab1:checked ~ .tab_area .tab1_label{color:#16D26E; font-weight: bold; width: 30%; background-color:white; font-size: 18px;}
		#tab1:checked ~ .panel_area #panel1{display:block;}
		#tab2:checked ~ .tab_area .tab2_label{color:#16D26E; font-weight: bold; width: 30%; background-color:white; font-size: 18px;}
		#tab2:checked ~ .panel_area #panel2{display:block;}
		
		.tdReturn {
		   table-layout: fixed;
		   word-break: break-all;
		   word-wrap: break-all;
		}
		th{
			color:white;
		    background:black;
		}
		tr,th,td{
			vertical-align: middle;
		    text-align: center;
		}
		/*tr:hover{
		    color:white;
		    background:grey;
		}*/
		/*tr{
		    cursor:pointer;
		}*/
	</style>
</head>



<body style="background-color: #343A40;">
	<?php include 'menu.php'; ?>
	<br /><br /><br /><br /><br />

	<div class="container">
		<div class="tab_wrap">

			<input id="tab1" type="radio" name="tab_btn" checked>
			<input id="tab2" type="radio" name="tab_btn">

			<div class="tab_area">
				<label class="tab1_label" for="tab1">User</label>
				<label class="tab2_label" for="tab2">Office</label>
			</div>

			<div class="panel_area">

				<!-- User Tab -->
				<div class="row">
					<div class="col-md-11 mx-auto d-block">
						<div id="panel1" class="tab_panel">
							<!-- <h3>Click a row to edit the <span style="color:#16D26E; font-weight: bold;">User</span> .</h3> -->
							<table class="table table-hover">
								<tbody>
									<tr>
										<th style='vertical-align:middle;'>ID /<br />Name</th>
										<th style='vertical-align:middle;'>Email Address</th>
										<th></th>
									</tr>
									<?php
										require_once 'sqlRepository.php';
										$sqlRep = new SQL;

										$sql = "SELECT * FROM User";
										$result = $sqlRep->conn->query($sql);
										while ($row = $result->fetch_assoc()) {
											$loginID = $row['loginID'];
											echo "
												<form method='post' action='userAction.php'>
													<tr>
														<td class='tdReturn' style='vertical-align:middle;'>
															".$row['loginID']."<br />".$row['userName']."
															<input type='text' value='".$row['loginID']."' name='loginID' style='display:none'>
														</td>
														<td class='tdReturn' style='vertical-align:middle;'>
															". $row['email'] ."
														</td>
														<td>
															<a href='userPageForAdmin.php?loginID=$loginID' class='btn btn-outline-success' name='userEdit' style='width:73px;'>
																edit
															</a>
															<button class='btn btn-outline-danger' name='userDelete'>
																delete
															</button>
														</td>
													</tr>
												</form>
											";
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- Office Tab -->
				<div class="row">
					<div class="col-md-11 mx-auto d-block">
						<div id="panel2" class="tab_panel">
							<!-- <h3>Click a row to edit the <span style="color:#16D26E; font-weight: bold;">Office</span> .</h3> -->
							<table class="table table-hover">
								<tbody>
									<tr>
										<th style="vertical-align:middle;">ID /<br />Name</th>
										<th style='vertical-align:middle;'>Email Address</th>
										<th style='vertical-align:middle;'></th>
									</tr>
									<?php
										require_once 'sqlRepository.php';
										$sqlRep = new SQL;

										$sql = "SELECT * FROM office";
										$result = $sqlRep->conn->query($sql);
										while ($row = $result->fetch_assoc()) {
											$officeID = $row['officeID'];
											echo "
												<form method='post' action='userAction.php'>
													<tr>
														<td class='tdReturn'>
															".$row['officeID']."<br />".$row['officeName']."(".$row['countryCode'].")" ."
															<input type='text' value='".$row['officeID']."' name='officeID' style='display:none'>
														</td>
														<td class='tdReturn' style='vertical-align:middle;'>
															".$row['officeEmail']."
														</td>
														<td>
															<a href='officePageForAdmin.php?officeID=$officeID' class='btn btn-outline-success' name='officeEdit' style='width:73px;'>
																edit
															</a>
															<button class='btn btn-outline-danger' name='officeDelete'>
																delete
															</button>
														</td>
													</tr>
												</form>
											";
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div> <!-- end of panel_area -->

		</div> <!-- end of tab_wrap -->
	</div><!--  end of contaicer -->


	
					

	<br />
	<?php include 'footer.php'; ?>








<!-- this is to jump to userPage.php by clicking the table rows. -->
<!-- <script src="./jquery.min.js"></script>
	<script>
	jQuery( function($) {
		$('tbody tr[data-href]').addClass('clickable').click( function() {
			window.location = $(this).attr('data-href');
		}).find('a').hover( function() {
			$(this).parents('tr').unbind('click');
		}, function() {
			$(this).parents('tr').click( function() {
				window.location = $(this).attr('data-href');
			});
		});
	});
</script> -->
</body>
</html>