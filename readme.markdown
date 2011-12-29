# Email Templator

## Plugin for Codeignitor

The main purpose of this plugin is to extend CodeIgnitors Email Library to allow for reading template files. For example:


    Dear {{name|sir,}} 
    You have successfully signed up for our {{signup|E Letter}}! 

	Keep a lookout for our bi-monthly updates to stay informed on the happenings in the {{network|photo technique Network}}. 

	We appreciate any feedback, whether through our Facebook page or by contacting our staff, whose information can be found on our Contact page.

	{{salutation|sincerely}}

	{{signature|News Team}}
To use in your controller do something like this:

	$this->load->library('email');

	$this->email->from('from@website.com', 'Jonathan Stanton');
	$this->email->to('to@othersite.com'); 
	$this->email->subject('Email Test');

	$this->email->template("assets/email.html",array(
	"name" => $name,
	"signup" => "Monthly Letter #B"
	));


	$this->email->send();


The values to the right of the vertical bar are the default and the value to the left of the bar is the name of the variable you wish to replace. If nothing is selected the default variable will take over. 

## Installation: 

1) Download MY\_Email.php and place it in your application/libraries/MY\_Email.php 

2) Enjoy