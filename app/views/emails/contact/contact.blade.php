<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Enquiry Form Data</h2>

		<div>
                    Name : {{$name}}<br/>
                    Email : {{$email}}<br/>
                    Phone : {{$phone}}<br/>
                    Contact Method : {{$contact_method}}<br/>
                    Enquiry : {{e($enquiry)}}<br/>
                    Invoice Number : {{$invoice_number}}<br/>
		</div>
	</body>
</html>
