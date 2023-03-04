<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body{
            font-family: 'Roboto Condensed', sans-serif;
        }
        .m-0{
            margin: 0px;
        }
        .p-0{
            padding: 0px;
        }
        .pt-5{
            padding-top:5px;
        }
        .mt-10{
            margin-top:10px;
        }
        .text-center{
            text-align:center !important;
        }
        .w-100{
            width: 100%;
        }
        .w-50{
            width:50%;
        }
        .w-85{
            width:85%;
        }
        .w-15{
            width:15%;
        }
        .logo img{
            width:200px;
            height:60px;
        }
        .gray-color{
            color:#5D5D5D;
        }
        .text-bold{
            font-weight: bold;
        }
        .border{
            border:1px solid black;
        }
        table tr,th,td{
            border: 1px solid #d2d2d2;
            border-collapse:collapse;
            padding:7px 8px;
        }
        table tr th{
            background: #F4F4F4;
            font-size:15px;
        }
        table tr td{
            font-size:13px;
        }
        table{
            border-collapse:collapse;
        }
        .box-text p{
            line-height:10px;
        }
        .float-left{
            float:left;
        }
        .total-part{
            font-size:16px;
            line-height:12px;
        }
        .total-right p{
            padding-right:20px;
        }
    </style>
</head>


<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Booking Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">{{$booking->booking_no}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Booking Id - <span class="gray-color">{{$booking->booking_no}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">status - <span class="gray-color">{{$booking->bookingStatus}}</span></p>
        @if($tailor)
        <p class="m-0 pt-5 text-bold w-100">Tailor ID - <span class="gray-color">{{$tailor->user->name}}</span></p>
        @else
        <p class="m-0 pt-5 text-bold w-100">Tailor ID - <span class="gray-color">Not Assigned</span></p>
        @endif

        
        <p class="m-0 pt-5 text-bold w-100">Booking Date - <span class="gray-color"> {{ date('Y-m-d', strtotime($booking->created_at)) }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Pickup Date - <span class="gray-color"> {{ date('Y-m-d', strtotime($booking->pickupDate)) }}</span></p>
    </div>
    <div class="w-50 float-left logo mt-10">
        <p class="m-0 pt-5 text-bold w-100">FullName - <span class="gray-color">{{$booking->fullName}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Email - <span class="gray-color">{{$booking->email}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Gender - <span class="gray-color">{{$booking->gender}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Address - <span class="gray-color">{{$booking->address}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Phone Number - <span class="gray-color">{{$booking->phoneNumber}}</span></p>
    
    </div>
    <div style="clear: both;"></div>
</div>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
            <td>Cash On Delivery</td>
            <td>Free Shipping - Free Shipping</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Fibric</th>
            <th class="w-50">Price</th>
            <th class="w-50">Qty</th>
            <th class="w-50">Subtotal</th>
        </tr>
        
        <tr align="center">
            <td>{{$booking->fabric->name}}</td>
            <td>NGN{{$booking->fabric->selling_price}}</td>
            <td>{{$booking->qty}} PCS</td>
            <td>NGN{{$booking->fabric->selling_price * $booking->qty}}</td>
            
        </tr>
        
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        
                        <p>Total Payable</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        
                        <p>NGN{{$booking->fabric->selling_price * $booking->qty}}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>

</html>
