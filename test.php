<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php
		// //just change values of s1, s2, s3, s4 from database/form
	 //    $s1 = '2019-04-17';
	 //    $e1 = '2019-04-18';

	 //    $s2 = '2019-04-18';
	 //    $e2 = '2019-04-20';

	 //    function getDatesFromRange($s2, $e2){
	 //        $dates = array($s2);
	 //        while(end($dates) < $e2){
	 //            $dates[] = date('Y-m-d', strtotime(end($dates).' +1 day'));
	 //        }
	 //        return $dates;
	 //    }//function getting the dates in between the range


	 //    $count = 0;
	 //    $period = getDatesFromRange($s2, $e2);

	 //    //checks if s1 and e1 is in conflict with the period dates
	 //    for($i=0; $i<count($period); $i++){
	 //        if($s1 == $period[$i] || $e1 == $period[$i] ){
	 //            $count++;
	 //        }
	 //    }
	 //    if($count > 0){
	 //        echo "Conflict Schedules";
	 //    }else{
	 //        echo "Go Ahead!";
	 //    }
	?>



	<?php

    //just change values of s1, s2, s3, s4 from database/form
    $s1 = '2019-03-02';
    $e1 = '2019-05-29';

    $s2 = '2019-04-01';
    $e2 = '2019-04-30';

    function getDatesFromRange($s1, $e1){
        $dates = array($s1);
        while(end($dates) < $e1){
            $dates[] = date('Y-m-d', strtotime(end($dates).' +1 day'));
        }
        return $dates;
    }
    
   	$count = 0;
	$period = getDatesFromRange($s2, $e2);
	$period2 = getDatesFromRange($s1, $e1);

	echo "s1: $s1 <br>";
	echo "e1: $e1 <br>";
	 echo "s2: $s2 <br>";
	  echo "e2: $e2 <br>";

	//checks if s1 and e1 is in conflict with the period dates
	for($i=0; $i<count($period); $i++){

	   for($j=0; $j<count($period2); $j++){
	       if($period2[$j] == $period[$i]){
	           $count++;
	       }
	   }
	}
	if($count > 0){
	   echo "Conflict Schedules";
	}else{
	   echo "Go Ahead!";
	}









function dateRangeCheck($checkInByUser, $checkOutByUSer, $countryByUser, $officeByCountryCode){
			while($row = $officeByCountryCode->fetch_assoc()) {
				$officeID = $row['officeID'];
				$sql = "SELECT * FROM bookings WHERE officeID = '$officeID'";
				$result = $this->conn->query($sql);

				if($result->num_rows >= 1) {
					while($row = $result->fetch_assoc()){
						echo "officeID : " .$row['officeID'] ."<br />";
						echo "bookingID : " .$row['bookingID'] ."<br />";
						echo "Check-in : " .$row['checkIn'] ."<br />";
						echo "Check-out : " .$row['checkOut'] ."<br />";
						$alreadyBookedFrom = $row['checkIn'];
						$alreadyBookedUntil = $row['checkOut'];

						$period = $this->getDatesFromRange($alreadyBookedFrom, $alreadyBookedUntil);
						$period2 = $this->getDatesFromRange($checkInByUser, $checkOutByUSer);

						for($i=0; $i<count($period); $i++){
						   for($j=0; $j<count($period2); $j++){
						       if($period2[$j] == $period[$i]){
						           $count++;
						       }
						   }
						}
						if($count > 0){
						   echo "Conflict Schedules";
						}else{
						   echo "Go Ahead!";
						}
					}
				}
			}
			print_r($unableOffice);
			// header("Location: searchResult.php?unableOffice=".http_build_query($unableOffice));
		}
		function getDatesFromRange($s1, $e1){
	        $dates = array($s1);
	        while(end($dates) < $e1){
	            $dates[] = date('Y-m-d', strtotime(end($dates).' +1 day'));
	        }
	        return $dates;
	    }





//just change values of s1, s2, s3, s4 from database/form
  

    // function getDatesFromRange($s1, $e1){
    //     $dates = array($s1);
    //     while(end($dates) < $e1){
    //         $dates[] = date('Y-m-d', strtotime(end($dates).' +1 day'));
    //     }
    //     return $dates;
    // }
    

	// $period = getDatesFromRange($s2, $e2);
	// $period2 = getDatesFromRange($s1, $e1);

	//checks if s1 and e1 is in conflict with the period dates
	// for($i=0; $i<count($period); $i++){

	//    for($j=0; $j<count($period2); $j++){
	//        if($period2[$j] == $period[$i]){
	//            $count++;
	//        }
	//    }
	// }
	// if($count > 0){
	//    echo "Conflict Schedules";
	// }else{
	//    echo "Go Ahead!";
	// }





















?>


</body>
</html>