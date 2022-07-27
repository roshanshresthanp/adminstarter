<!DOCTYPE html>
<html>
<head>
    <title>Form Received</title>
    <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
</head>
<body>
    <p>Dear Customer,</p>
    <p>We have received your form via our official site. We will get back to you soon. The following information of your Plan booking form: 
    </p>
    <table class="table" border="1">
        <thead>
        <tr>
            <th>Full name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Product type</th>
            <th>Product title</th>
            <th>Price</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $data['name'] }}</td>
            <td>{{ $data['address'] }}</td>
            <td>{{ $data['contact_no'] }}</td>
            <td>{{ $data['product_type'] }}</td>
            <td>{{ $data['product_title'] }}</td>
            <td>{{ $data['product_price'] }}</td>
        </tr>
        </tbody>
    </table>

    <p>Thank You.</p>
    <p>Regards,</p>
    <h3>{{ env("APP_NAME") }}.</h3>
</body>
</html>
