<?php require_once 'common.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		img{
			width:100%; 
			height:85%;
			/*margin-top: 3px;
			margin-bottom: 3px;*/
		}
		.modal-dialog{padding-top: 5%;}
	</style>
</head>
<body>
	<?php require_once 'menu.php'; ?>
	<br /><br /><br /><br /><br />

	<?php
		$countryByUser = $_SESSION['countryByUser'];

		require_once 'sqlRepository.php';
		$sqlRepository = new SQL;
		$officeInfoRow = $sqlRepository->showOfficeByCountryCode($countryByUser);

		if(isset($_SESSION['unableOfficeArray'])){
			$unableOfficeArray = $_SESSION['unableOfficeArray'];

			$checkIn = $unableOfficeArray[0];
			$checkOut = $unableOfficeArray[1];
			$duration = floor($unableOfficeArray[2]);
		}

		
		$today = date("Y-m-d");
	?>


	<div class='container'>
		<?php
			if(isset($_SESSION['bookSuccessFlag'])){
				echo "
					<div class='row'>
						<div class='col-md-12' style='margin-bottom: 20px; background-color: #DDDDDD; color:#59B359;'>
							<h2 style='margin:20px; text-align:center; font-weight:bold;'>Your booking has been successfuly made:) Thank you!!</h2>
						</div>
					</div>
				";
				unset($_SESSION['bookSuccessFlag']);
			}
		?>
		

		<div class="row">
			<div class="col-md-3 bg-dark" style="color:white; margin-bottom: 15px;">
				<form method="post" action="userAction.php"  class="form-group">
					<table class="table table-borderless" style="margin: 20px 0;">
						<tr>
							<th>
								Check-in<br /><input class="form-control" type="date" name="checkIn" style="width: 100%;"
									<?php
										if (isset($checkIn)) {
											echo "
												value='". $checkIn ."';
											";
										}
									?>
								min="<?php echo $today; ?>">
								Check-out<br /><input  class="form-control" type="date" name="checkOut" style="width: 100%;"
								<?php
									if (isset($checkOut)) {
										echo "
											value='". $checkOut ."';
										";
									}
								?>
								min="<?php echo $today ; ?>">
								<?php
									if (isset($_SESSION['dateErrorMsgFlag'])) {
										echo "
											<span style='color:red;'><br />Caution :<br /></span>
											Check-In date should be earlier than Check-Out date.
										";
										$_SESSION['dateErrorMsgFlag'] = null;
									}
								?>
							</th>
						</tr>
						<tr>
							<th style="text-align: right;">
								<button class="btn btn-success btn-lg" name="sortByDate">
									Search
								</button>
							</th>
						</tr>
					</table>
				</form>
			</div>
			<br />


			


			<div class="col-md-9">
				<?php
					if ($officeInfoRow) {
							if(isset($unableOfficeArray)){
									$len = count($unableOfficeArray);
									$sql = "SELECT * FROM office WHERE countryCode = '$countryByUser'";
									$result = $sqlRepository->conn->query($sql);
									if ($result->num_rows >= 1) {
											$officeIdentifyCounter = 1;
											while ($row = $result->fetch_assoc()) {
													$a = $row['officeID'];
													$count = 0;
													for($i=3; $i<$len; $i++){
															if($a != $unableOfficeArray[$i]){
																$count = 0;
															}else{
																$count = 1;
																break;
															}
													}
													if($count == 0){
															$officeID = $row['officeID'];
															$pic = $row['officePic'];
															$name = $row['officeName'];
															$description = $row['officeDescription'];
															$address = $row['officeAddress'];
															$capacity = $row['maxCapacity'];
															$fee = $row['rentalFee'];
															echo "
																<div class='row'>
																	<div class='col-md-12' style='margin-left: auto;'>
																		<div class='row'>
																			<div class='col-md-5'>
																				<img src='" .$pic ."' alt='' class='img-responsive'>
																			</div>
																			<div class='col-md-7 align-self-center'>
																				<table class='table'>
																					<tr><th>Office Name</th><td><input type='text' name='". $name ."' value='" .$name ."' readonly style='border:none;'></td></tr>
																					<tr><th>Description</th><td><input type='text' name='". $description ."' value='" .$description ."' readonly style='border:none;'></td></tr>
																					<tr><th>Address</th><td><input type='text' name='". $address ."' value='" .$address ."' readonly style='border:none;'></td></tr>
																					<tr><th>Max Capacity</th><td><input type='text' name='". $capacity ."' value='" .$capacity ."' readonly style='border:none;'></td></tr>
																					<tr><th>Fee per day</th><td><input type='text' name='". $fee ."' value='" .$fee ."' readonly style='border:none;'></td></tr>
																					<tr style='text-align:right;'>
																						<td colspan='2'>
																							<button class='btn btn-lg btn-outline-success' data-toggle='modal' data-target='#mySearchModal-".$officeIdentifyCounter."' name='firstBookButton'>
																								BOOK
																							</button>
																						</td>
																					</tr>
																					<tr>
																				</table>
																			</div>
																		</div>
																	</div>
																</div>
																";
																?>
																<!-- Modal -->
																  <div class='modal fade' id='mySearchModal-<?php echo $officeIdentifyCounter; ?>' role='dialog'>
																    <div class='modal-dialog'>
																      <div class='modal-content'>
																        <div class='modal-body'>
																          <form method='post' action="userAction.php">
																            <div class='form-group col-md-12 float-left' style='margin-bottom: 0;'>
																              	<?php
																              		echo "
																              			<form method='post' action='userAction.php'>
																              				<table class='table table-borderless'>
																              					<input type='text' name='officeID' value='".$officeID."' hidden>
																              					<tr><th style='width:55%;'>Office</th><th><input type='text' value='".$name."' style='border:none;' name='officeName' readonly></th></tr>
																              					<tr><th>Capacity</th><td><input type='text' value='".$capacity."' style='border:none;' name='officeCapacity' readonly></td></tr>
																              					<tr><th>Check-In</th><td><input type='text' value='".$checkIn."' style='border:none;' name='checkIn' readonly></td></tr>
																              					<tr><th>Check-Out</th><td><input type='text' value='".$checkOut."' style='border:none;' name='checkOut' readonly></td></tr>
																              					<tr><th>Duration</th><td><input type='text' value='".$duration."' style='border:none;' name='duration' readonly></td></tr>
																              					<tr><th>Fee/day *JPY</th><td><input type='text' value='".number_format($fee)." ' style='border:none;' readonly></td></tr>
																              					<tr><th>Total Fee *JPY</th><td><input type='text' value='".number_format($fee*$duration)."' style='border:none;' readonly></td></tr>
																              				</table>
																              				<div class='float-right'>
																				              <input type='submit' class='btn btn-outline-primary form-group' name='confirmBook' value='Confirm & Book' style='width: 100%; font-weight: bold;'>
																				            </div>
																              			</form>
																              		";
																              	?>
																            </div>
																          </form>
																        </div>
																      </div>
																    </div>
																  </div>																   
																<br />
															<?php
													}
												$officeIdentifyCounter++;
											}
									}
							}else{
									// displaying number of office found.
									$counter = 0;
									foreach($officeInfoRow as $key => $value){
										$counter++;
									}
									echo "
										<div class='col-md-12' style='background-color: #F7F7F7;'>
											<h3 class='p-3 mb-2' style='font-weight:bold;'>
												We found <span class='text-success'>". $counter ."</span> offices for you :)
											</h3>
										</div>
										<br/>
									";
									// displaying offices.
									foreach ($officeInfoRow as $key => $value) {
											$officeID = $value['officeID'];
											$name = $value['officeName'];
											$pic = $value['officePic'];
											$description = $value['officeDescription'];
											$address = $value['officeAddress'];
											$capacity = $value['maxCapacity'];
											$fee = $value['rentalFee'];
											echo "
												<div class='row'>
													<div class='col-md-12' style='margin-left: auto;'>
														<div class='row'>
															<div class='col-md-5'>
																<img src='" .$pic ."' alt='' class='img-responsive'>
															</div>
															<div class='col-md-7 align-self-center'>
																<table class='table'>
																	<tr><th>Office Name</th><td>" .$name ."</td></tr>
																	<tr><th>Description</th><td>" .$description ."</td></tr>
																	<tr><th>Address</th><td>" .$address ."</td></tr>
																	<tr><th>Max Capacity</th><td>" .$capacity ."</td></tr>
																	<tr><th>Fee per day</th><td>" .number_format($fee) ."</td></tr>
																	<tr style='text-align:right;'>
																		<td colspan='2'>
																			<a href='#' class='btn btn-outline-success'>
																				See more
																			</a>
																		</td>
																	</tr>
																	<tr>
																</table>
															</div>
														</div>
													</div>
												</div>

												<br />
											";
									} // end of foreach.
							}
					}else{
							echo "
								<div class='col-md-12' style='background-color: #F7F7F7;'>
									<h3 class='p-3 mb-2' style='font-weight:bold; margin-bottom:0;'>
										Sorry:(&nbsp;&nbsp;&nbsp;No office availabel at the moment...
									</h3>
								</div>
							";
					}
				




				?><!--  end of PHP  -->






			</div>
		</div> <!-- end of row -->
		

	</div> <!-- end of container class -->




<br />


	<?php require_once 'footer.php'; ?>
</body>
</html>