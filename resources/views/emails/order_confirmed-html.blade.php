@php
    $orderItems = $order->items;
@endphp
    <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Order Confirmation</title>
</head>
<body style="margin:0;padding:0;background:#f5f7fb;font-family:Arial,Helvetica,sans-serif;color:#111;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f5f7fb;padding:24px 12px;">
    <tr>
        <td align="center">
            <table role="presentation" width="600" cellspacing="0" cellpadding="0"
                   style="max-width:600px;background:#ffffff;border:1px solid #e6eaf2;border-radius:10px;overflow:hidden;">
                <tr>
                    <td style="padding:18px 22px;background:#eef2ff;border-bottom:1px solid #e6eaf2;">
                        <div style="font-weight:700;letter-spacing:0.06em;">Azorean Art</div>
                    </td>
                </tr>

                <tr>
                    <td style="padding:22px;">
                        <h1 style="margin:0 0 10px 0;font-size:22px;line-height:1.3;">Order confirmed for :</h1>
                        <p style="margin:0 0 16px 0;color:#374151;">{{ $order->customer_name }}
                            - {{ $order->customer_email }}</p>

                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
                               style="border-collapse:collapse;margin:14px 0 8px 0;">
                            <tr>
                                <td style="padding:10px 0;color:#6b7280;width:160px;">Order number</td>
                                <td style="padding:10px 0;font-weight:700;font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;">{{ $order->order_number }}
                            </tr>
                            @foreach($orderItems as $item)
                                <tr>
                                    <td style="padding:10px 0;color:#6b7280;">{{ $item->title_snapshot }}
                                        (x{{ $item->quantity }})
                                    </td>
                                    <td style="padding:10px 5px;font-weight:700;">
                                        €{{ number_format($item->unit_price_cents / 100, 2) }}</td>
                                </tr>
                            @endforeach

                            <tr style="border-top:1px solid #e6eaf2;">
                                <td style="padding:10px 0;color:#6b7280;width:160px;">Subtotal</td>
                                <td style="padding:10px 0;font-weight:700;">
                                    €{{ number_format($order->subtotal_cents / 100, 2) }}</td>
                            </tr>
                            <tr>
                                <td style="padding:10px 0;color:#6b7280;width:160px;">Shipping costs</td>
                                <td style="padding:10px 0;font-weight:700;">
                                    €{{ number_format($order->shipping_cents / 100, 2) }}</td>
                            </tr>
                            <tr style="border-top:1px solid #e6eaf2;">
                                <td style="padding:10px 0;color:#6b7280;">Total paid</td>
                                <td style="padding:10px 0;font-weight:700;">
                                    €{{ number_format($order->total_cents / 100, 2) }}</td>
                            </tr>

                        </table>

                        <hr style="border:none;border-top:1px solid #e6eaf2;margin:18px 0;">
                    </td>
                </tr>
                <tr>
                    <td style="padding:0 22px 18px 22px;color:#374151;font-size:14px;line-height:1.5;">
                        Thank you for your purchase! Your order has been confirmed. We will notify you once your items
                        are shipped. You can check the status of your order here:
                        <br>
                        <a href="{{ route('shop.order-status', $order->order_number)  }}">
                            {{ route('shop.order-status', $order->order_number)  }}
                        </a>
                    </td>
                </tr>
                s

                <tr>
                    <td style="padding:14px 22px;border-top:1px solid #e6eaf2;color:#6b7280;font-size:12px;background:#fafbff;">
                        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
