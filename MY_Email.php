class MY_Email extends CI_Email{
	
	function __construct(){
	    parent::__construct();
	}

	function template($filename,$values){		
		if(file_exists($filename)){

			$output="";
			$file = fopen($filename, "r"); 
			while(!feof($file)) { 
	  			$output = $output . fgets($file, 4096); 
			}
			fclose ($file); 
		
		    preg_match_all ( '/{{(.*?)}}/' , $output , $matches );


		    foreach($matches[1] as $m){
		    	$template_part = explode("|",$m);

		    	if(array_key_exists($template_part[0],$values)){
		    		$template_part[1] = $values[$template_part[0]];
			    }			    

			    $m = str_replace("|","\|",$m); //stupid delimeter

		    	$output = preg_replace( "/{{".$m."}}/", nl2br($template_part[1]) , $output);
		    }

		    $this->_body = $output;

		    return $output;

		}
		
		return false;
		

	}

}