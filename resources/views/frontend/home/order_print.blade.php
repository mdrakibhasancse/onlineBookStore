<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Invoice</title>
    <style>
       .t-style tr,td{
         padding: 10px;
       }
    </style>
</head>
<body>
     <center>
        <table class="t-style" width="900px" border="1">
            <tr style="text-align: center">
                <td colspan="2">
                    <strong>{{ $setting->name }}</strong> <br>
                    <strong>{{ $setting->email }}</strong><br>
                    <strong>{{ $setting->address }}</strong><br>
                    <strong>{{ $setting->mobile }}</strong>
                </td>
                <td><strong>Order No : </strong>#{{ $order->order_no }}</td>
            </tr>
            <tr style="text-align: center">
               <td style="width: 30%">Billing Information</td>
               <td style="width: 70%; padding: 5px;" colspan="2">
                   <strong>Name :</strong>{{ $order->shipping->name }} &nbsp;&nbsp;&nbsp;&nbsp;
                   <strong>Mobile Number :</strong>{{ $order->shipping->mobile }}<br>
                   <strong>Email :</strong>{{ $order->shipping->email }}&nbsp;&nbsp;&nbsp;&nbsp;
                   <strong>Address :</strong>{{ $order->shipping->address }}<br>
                   <strong>Payment : </strong>{{ $order->payment->payment_method }}
                       @if($order->payment->payment_method == 'BKash')
                           (Transaction_no : {{$order->payment->transaction_no}})
                       @endif&nbsp;&nbsp;&nbsp;&nbsp;
               </td>
            </tr style="text-align: center">
            <tr style="text-align: center">
              <td colspan="3" style="font-size: 25px"> <strong>Order Details</strong></td>
            </tr>

            <tr style="text-align: center">
               <td>Book Name</td>
               <td>Image</td>
               <td>Quantity & Price</td>
            </tr>

            @foreach ($order->order_details as $details)
              <tr style="text-align: center">
               <td>{{ $details->book->name}}</td>
               <td style="padding: 5px"> <img style="width:80px; height:80px" src="{{asset("/storage/".$details->book->image)}}"></td>
               <td>
                   @php
                   $subTotal =  $details->quantity * $details->book->price_discount;
                   @endphp
                   {{ $details->quantity}} x {{ $details->book->price_discount}} =
                   {{ $subTotal }} Tk
               </td>
              </tr>
            @endforeach
            <tr style="text-align: center">
               <td colspan="2">
                    <strong style="font-size: 25px">Grand Total :</strong>
               </td>
               <td>
                 <strong>  {{$order->total_tk}} Tk</strong>
              </td>
            </tr>
        </table>
     </center>
</body>
</html>
