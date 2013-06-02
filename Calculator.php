<?php

/*
__PocketMine Plugin__
name=Calculator
description=Adds a calculator to the server
version=1.0
author=Junyi00
class=Calculator
apiversion=7
*/


class Calculator implements Plugin{
	private $api, $path, $config;
	public function __construct(ServerAPI $api, $server = false){
		$this->api = $api;
	}
	
	public function init(){
		$this->api->console->register("calc", "calculates an expression", array($this, "Calculator"));
	}
	
	public function __destruct(){}
	
	public function Calculator($cmd, $arg) {
		
		switch($cmd) {
			
			case "calc":
			
			    $firstValue = $arg[0];
			    $operator = $arg[1];
			    $secondValue = $arg[2];
			    
			    if (empty($arg[0]) || empty($arg[1]) || empty($arg[2])) {
			    	if (($issuer instanceof Player)) {
			            $this->api->chat->sendTo(false, "[Calculator] Usage: /calc <firstValue> <operator> <secondValue>", $issuer->username);
                                    break;
			    	}
			    	else{
			    	    console("[Calculator] Usage: /calc <firstValue> <operator> <secondValue>");
                                    break;
			    	}
			    }
			    	
			    elseif(!is_numeric($firstValue) || !is_numeric($secondValue)) {
			        if (($issuer instanceof Player)) {
			    	    $this->api->chat->sendTo(false, "[Calculator] Usage: /calc <firstValue> <operator> <secondValue>", $issuer->username);
                        break;
			        }
			       else{
			    	   console("[Calculator] Usage: /calc <firstValue> <operator> <secondValue>");
                       break;
			       }	
			    	
			    }
			    else {
			    	
			    	switch($operator) {
			    		
			    		case "+":
			    		    $result = $firstValue + $secondValue;
			    		    console("The result is: $result");
                            break;
			    		case "-":
                            $result = $firstValue - $secondValue;
			    		    console("The result is: $result");
                            break;
			    		case "*":
                            $result = $firstValue * $secondValue;
			    		    console("The result is: $result");
                            break;
			    		case "/":
			    		    $result = $firstValue / $secondValue;
			    		    console("The result is: $result");
                            break;
			    		default:
			    		    if (($issuer instanceof Player)) {
			    	            $this->api->chat->sendTo(false, "[Calculator] Usage: /calc <firstValue> <operator> <secondValue>", $issuer->username);
                                break;
			                   }
			                   else{
			    	               console("[Calculator] Usage: /calc <firstValue> <operator> <secondValue>");
                                   break;
			                   }	
			                  
			    	}
			    	
			    }	
			    break;
			    
			default:
			    if (($issuer instanceof Player)) {
			    	 $this->api->chat->sendTo(false, "[Calculator] Usage: /calc <firstValue> <operator> <secondValue>", $issuer->username);
                                 break;
			    }
			    else{
			    	console("[Calculator] Usage: /calc <firstValue> <operator> <secondValue>");
                                break;
			    }	  
			
		}
		
	}

}

?>
