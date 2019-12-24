<?php
function fibonacci ($endpoint) {
	$processingArray = array(1,1); 
	$last = null;
	while(count($processingArray)<=$endpoint){
        $last = $processingArray[count($processingArray)-2]+end($processingArray);
        array_push($processingArray, $last);
	}
	print_r($processingArray);
}

fibonacci(64)
?>
