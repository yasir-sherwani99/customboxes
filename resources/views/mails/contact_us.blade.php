<!DOCTYPE html>
<html>
<head>
  <title>Custom Boxes Expert</title>
</head>

<body>

	Dear <b>Admin</b>, <br/>
	<p>
		You have received a message from CustomBoxesExpert website contact us page, the details are given below:
	</p>
	<hr/>
	<p>
		<b>Customer Name:</b> {{ $contact->full_name }}<br/>
		<b>Email:</b> {{ $contact->email }}<br/>
		<b>Subject:</b> {{ $contact->subject }}
		<br/><br/>
		<b>Message:</b> {{ $contact->message }}
	</p>	
	<br/>
	Thank You,
	<br/>
	<i>Custom Boxes Expert Team</i>

</body>
</html>