<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>

    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }
        .container {
            padding: 20px;
            width: 100%;
            max-width: 700px;
            margin: auto;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #f2f2f2;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #4CAF50;
        }
        .header p {
            margin: 0;
            color: #777;
        }
        .order-details {
            margin-bottom: 20px;
        }
        .order-details h2 {
            font-size: 18px;
            border-bottom: 1px solid #f2f2f2;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .details-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .details-table th, .details-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .details-table th {
            background-color: #f9f9f9;
            color: #555;
        }
        .total-section {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            text-align: right;
        }
        .total-section h3 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #f2f2f2;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>Order Confirmation</h1>
            <p>Order ID: #{{ $data->id }}</p>
        </div>

        <!-- Customer Information -->
        <div class="order-details">
            <h2>Customer Details</h2>
            <table class="details-table">
                <tr>
                    <th>Customer Name</th>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $data->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $data->phone }}</td>
                </tr>
                <tr>
                    <th>Shipping Address</th>
                    <td>{{ $data->address }}</td>
                </tr>
            </table>
        </div>

        <!-- Order Details -->
        <div class="order-details">
            <h2>Order Details</h2>
            <table class="details-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data->product_title }}</td>
                        <td>{{ $data->quantity }}
                        <td>{{ $data->price  }}
                        <td>{{ $data->price * $data->quantity }}
                </tbody>
            </table>
        </div>
        <?php $shipping_cost = 10;  $company_email = "Alaalalalalalalala@gmail.com";

        $subtotal = $data->price * $data->quantity; $total = $subtotal + $shipping_cost; ?>
        
        <!-- Total Section -->
        <div class="total-section">
            <h3>Subtotal: ${{ number_format($subtotal, 2) }}</h3>
            <h3>Shipping: ${{ number_format($shipping_cost, 2) }}</h3>
            <h3><strong>Total: ${{ number_format($total, 2) }}</strong></h3>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>Thank you for your order!</p>
            <p>If you have any questions, feel free to contact us at {{ $company_email }}.</p>
        </div>
    </div>

</body>
</html>
