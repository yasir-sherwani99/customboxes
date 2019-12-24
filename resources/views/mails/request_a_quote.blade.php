<!DOCTYPE html>
<html>
<head>
  <title>Custom Boxes Expert</title>
</head>

<body>

	Dear <b>Admin</b>, <br/>
	<p>
		You have received a custom quotation request from <a href="http://customboxesexpert.com" target="_blank">www.customboxesexpert.com</a> website, the details are given below:
	</p>
	<hr/>
	<p>
		<table style="width: 100%">
			<tr>
				<td style="width: 25%;"><b>Customer Name: </b></td>
				<td style="width: 75%;">{{ isset($quote->full_name) ? $quote->full_name : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Email: </b></td>
				<td>{{ isset($quote->email) ? $quote->email : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Phone: </b></td>
				<td>{{ isset($quote->phone) ? $quote->phone : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Box Type: </b></td>
				<td>{{ isset($quote->box_type) ? $quote->box_type : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Stock: </b></td>
				<td>{{ isset($quote->stock) ? $quote->stock : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Width: </b></td>
				<td>{{ isset($quote->width) ? $quote->width : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Height: </b></td>
				<td>{{ isset($quote->height) ? $quote->height : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Length: </b></td>
				<td>{{ isset($quote->length) ? $quote->length : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Unit: </b></td>
				<td>{{ isset($quote->units) ? $quote->units : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Colors: </b></td>
				<td>{{ isset($quote->colors) ? $quote->colors : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Quantity: </b></td>
				<td>{{ isset($quote->quantity) ? $quote->quantity : 'Not available' }}</td>
			</tr>
			<tr>
				<td><b>Comments: </b></td>
				<td>{{ isset($quote->comments) ? $quote->comments : 'Not available' }}</td>
			</tr>
		</table>
	</p>
	<hr/>	
	<br/>
	Best regards,
	<br/>
	<i>Custom Boxes Expert Team</i>

</body>
</html>