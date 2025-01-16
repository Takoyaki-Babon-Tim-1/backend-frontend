<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f8f8f8; color: #333;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
        style="background-color: #f8f8f8; padding: 20px;">
        <tr>
            <td align="center">

                <table role="presentation" width="600" cellspacing="0" cellpadding="0"
                    style="background-color: #ffffff; border-radius: 8px; overflow: hidden;">
                    <tr>
                        <td style="padding: 20px; text-align: center;">
                            <h2 style="color: #1f2937; font-size: 24px; font-weight: bold;">John, Thank You for Your
                                Order!</h2>
                            <p style="color: #6b7280; font-size: 16px;">Order ID: {{ $order->order_id }} / Order Date:
                                {{ $order->created_at }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                            <h3 style="color: #1f2937; font-size: 20px; font-weight: bold; text-align: center;">
                                Order
                                Details</h3>
                        </td>
                    </tr>
                    <tr>
                       
                            <td style="padding: 20px;">
                                <!-- Order Item 1 -->
                                @foreach ($products as $product)
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
                                    style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 10px; margin-bottom: 20px;">
                                    <tr>
                                        {{-- <td width="80" style="padding-right: 10px;">
                                            <img src=""
                                                alt="Story Book image" style="width: 100%; border-radius: 4px;">
                                        </td> --}}
                                        <td style="padding-right: 10px;">
                                            <p style="color: #1f2937; font-size: 16px; font-weight: bold; margin: 0;">
                                                {{ $product->name }}</p>
                                        </td>
                                        <td align="center" style="color: #6b7280; font-size: 16px; padding: 0 10px;">
                                            Rp {{ number_format($product->total, 2) }}
                                        </td>
                                        <td align="center" style="color: #6b7280; font-size: 16px; padding: 0 10px;">
                                            {{ $product->pivot->quantity }}
                                        </td>
                                        <td align="center" style="color: #1f2937; font-size: 16px; font-weight: bold;">
                                            Rp
                                            {{ number_format($product->total * $product->pivot->quantity, 2) }}
                                        </td>
                                    </tr>
                                </table>
                                @endforeach

                            </td>
                            <p>Catatan : {{$order->message}}</p>
                        
                    </tr>
                </table>

        <tr>
            <td style="padding: 20px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="left" style="color: #4f46e5; font-size: 18px; font-weight: bold;">
                            Total
                        </td>
                        <td align="right" style="color: #4f46e5; font-size: 18px; font-weight: bold;">
                            Rp {{ number_format($order->total_price, 2) }}</td>
                    </tr>
                </table>
            </td>
        </tr>

        </td>
        </tr>
    </table>

</body>

</html>
