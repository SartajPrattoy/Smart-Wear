<!DOCTYPE html>
<html>
<head>
    <title>Order PDF</title>
</head>
<body>
    <h1>Order Details</h1>

    Customer Name :<h3>{{$order->name}}</h3>
    Customer Email :<h3>{{$order->email}}</h3>
    Customer Phone :<h3>{{$order->phone}}</h3>
    Customer Address :<h3>{{$order->address}}</h3>
    @php
    $daysToAdd = $order->day; // Change this to the number of days you want to add
    $newDate = $order->created_at->addDays($daysToAdd);
@endphp

    Product Name :<h3>{{$order->product_title}}</h3>
    Product Price :<h3>{{$order->price}}</h3>
    Product Quantity :<h3>{{$order->quantity}}</h3>
    Payment Status :<h3>{{$order->payment_status}}</h3>
    Return date : <h3>{{ $newDate->format('Y-m-d') }}</h3>
 
    




</body>
</html>