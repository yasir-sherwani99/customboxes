<!DOCTYPE html>
<html>
<head>
  <title>Custom Boxes Expert</title>
</head>

<body>

	Dear <b>{{ $register->first_name }}&nbsp;{{ $register->last_name }}</b>, <br/>
	<p>
		Thank you for creating your account at Custom Boxes Expert. Your account details are as follows:
	</p>
	<p>
		Your Username: <b>{{ $register->username }}</b><br/>
		Your Password: <b>{{ $register->password }}</b>
	</p>
	<p>
		To sign in to your account, please visit <a href="http://customboxesexpert.com/login" target="_blank">http://customboxesexpert.com/login</a>
	</p>	
	<p>
		Remember, never share your password with others. And you are agree with our Terms and Policy.<br/><br/>
		<b>Note: </b>For any queries, don't hesitate to send a message at <a href="http://customboxesexpert.com/contact" target="_blank">http://customboxesexpert.com/contact</a>  
	</p>	
	<br/>
	Thank You,
	<br/>
	<i>Custom Boxes Expert Team</i>

</body>
</html>