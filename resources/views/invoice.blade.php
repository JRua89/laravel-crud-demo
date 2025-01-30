<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>

	<link rel="stylesheet" href="{{ public_path('invoice.css') }}" type="text/css"> 

</head>

<body>

  

<table class="table-no-border">

    <tr>

        <td class="width-70">
        @if (strpos(url()->previous(), 'products') === false)
            <img src="{{ public_path('Screenshot 2024-12-21 112440.png') }}" alt="" width="200" />
            @else
            <img src="{{ public_path('3cae48eb-533c-4fea-978d-5e92f420505d.jpg') }}" alt="" width="200" />
            @endif
        </td>

        <td class="width-30">

            
            @if (strpos(url()->previous(), 'products') === false)
            <h2>Invoice ID: {{ $geninvoiceid }}</h2>
             @else
            <h2>Current Products</h2>
             @endif

        </td>

    </tr>

</table>

  
 <!-- Optionally, add more navigation items here -->
 @if (strpos(url()->previous(), 'products') === false)
         
          
<div class="margin-top">

    <table class="table-no-border">

        <tr>

            <td class="width-50">

                <div><strong>To:</strong></div>

                <div>Mark Gadala</div>

                <div>1401 NW 17th Ave, Florida - 33125</div>

                <div><strong>Phone:</strong> (305) 981-1561</div>

                <div><strong>Email:</strong> mark@gmail.com</div>

            </td>

            <td class="width-50">

                <div><strong>From:</strong></div>

                <div>Hardik Savani</div>

                <div>201, Styam Hills, Rajkot - 360001</div>

                <div><strong>Phone:</strong> 84695585225</div>

                <div><strong>Email:</strong> hardik@gmail.com</div>

            </td>

        </tr>

    </table>

</div>

@endif

  

<div>

    <table class="product-table">

        <thead>

            <tr>

                <th class="width-25">

                    <strong>Name</strong>

                </th>

                <th class="width-50">

                    <strong>Detail</strong>

                </th>

                <th class="width-25">

                    <strong>Image</strong>

                </th>

                <th class="width-25">

                    <strong>Price</strong>

                </th>

                <th class="width-25">

                    <strong>Quantity</strong>

                    </th>

                    <th class="width-25">

                    <strong>Sub Total</strong>

                    </th>

            </tr>

        </thead>

        <tbody>
            @php $subtotal = 0; @endphp
            @foreach($data as $value)
           
            @php 
            $subtotal += $value['price']; 
            $itemSubtotal = $value['price'] * $value['quantity'];
            @endphp
            <tr>

                <td class="width-25">

                {{ $value['name'] }}

                </td>

                <td class="width-50">

                {{ $value['detail'] }}

                </td>

                <td class="width-25">
                <img src="{{ public_path($value['image']) }}" alt="{{ $value['name'] }}" width="50" height="50">
            </td>

                <td class="width-25">

                ${{ number_format($value['price'], 2) }}

                </td>

                <td class="width-25">

                {{ $value['quantity'] }}

                </td>

                <td class="width-25">

                ${{number_format($itemSubtotal, 2)}}

                </td>

            </tr>

            @endforeach

        </tbody>

        <tfoot>
                @php 
                $tax = $subtotal * 0.10; 
                $total = $subtotal + $tax; 
                @endphp

<tr>
    <td class="width-70" colspan="3">
    @if (strpos(url()->previous(), 'products') === false)
    <strong>Sub Total:</strong>
    @else
    <strong>Total:</strong>
    @endif
    </td>
    <td class="width-25" style="text-align: right;">
        <strong>${{ number_format($subtotal, 2) }}</strong>
    </td>
</tr>


 <!-- Optionally, add more navigation items here -->
 @if (strpos(url()->previous(), 'products') === false)
         
          
<tr>
    <td class="width-70" colspan="3">
        <strong>Tax (10%):</strong>
    </td>
    <td class="width-25" style="text-align: right;">
        <strong>${{ number_format($tax, 2) }}</strong>
    </td>
</tr>

<tr>
    <td class="width-70" colspan="3">
        <strong>Total Amount:</strong>
    </td>
    <td class="width-5" style="text-align: right;">
        <strong>${{ number_format($total, 2) }}</strong>
    </td>
</tr>

@endif
        </tfoot>

    </table>

</div>

  

<div class="footer-div">

    <p>Thank you, <br/>@ItSolutionStuff.com</p>

</div>

  

</body>

</html>