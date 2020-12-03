<form action="" method="post">

<!-- set the value of all three seperated by a space for example "9 2 3"-->
Enter the no. of breads, no. of vadas, no. of samosas: <input type="text" name="ingredients"><br><br>  

<!-- set the price of vadapav and samosapav seperated by a space for example "10 15"-->
Prices of vadapav and samosapav:<input type="text" name="prices"><br> <br>
<input type="submit">
</form>

<?php

//to prevent the warning running an if else to check first that both the values has given or not
if(!empty($_POST['ingredients']) and !empty($_POST['prices'])){
	
	//breaking the string of ingredients into an array
	$ingredients=explode(" ",$_POST['ingredients']);
	
	//setting the value of each ingredient
	$no_of_breads = $ingredients[0];
	$no_of_vadas = $ingredients[1];
	$no_of_samosa = $ingredients[2];
 
	//breaking the string of prices into an array 
	$prices= explode(" ",$_POST['prices']);

	//setting the prices of both the items
	$price_of_vadapav=$prices[0];
	$price_of_samosapav=$prices[1];

	$max_price=0;
	
//checking if the no of breads can fulfill the demand of no of vadas + no of samosas or not
if($no_of_breads < ($no_of_vadas + $no_of_samosa)*2){
		
	//if the price of vadapav is more so the vada will get more priority
	if($price_of_vadapav > $price_of_samosapav){
			
		$max_price = $max_price +($no_of_vadas*$price_of_vadapav) + (floor(($no_of_breads -2*$no_of_vadas)/2))*$price_of_samosapav;
	
	// if the price of samosapav is more samosa will get more priority
	}else if($price_of_samosapav > $price_of_vadapav){

		$max_price = $max_price +($no_of_samosa*$price_of_samosapav) + (floor(($no_of_breads -2*$no_of_samosa)/2))*$price_of_vadapav;
	
	//if the price is same we can take any of vada or samosa(I have used vada here)
	}else{

		$max_price = $max_price +($no_of_vadas*$price_of_vadapav) + (floor(($no_of_breads -2*$no_of_vadas)/2))*$price_of_samosapav;

	}

// If the demand is fulfilled vadapav and samosapav both can be sell
}else{
        $max_price =$max_price+ ($no_of_vadas*$price_of_vadapav + $no_of_samosa*$price_of_samosapav);
}
	
	 
    echo "maximum profit possible: ".$max_price;
}
