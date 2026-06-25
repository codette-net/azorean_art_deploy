@php
    $orderItems = $order->items;
@endphp
    <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Confirm your e-mail address</title>
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
                        <h1 style="margin:0 0 10px 0;font-size:22px;line-height:1.3;">Confirm your e-mail address</h1>
                        <p style="margin:0 0 16px 0;color:#374151;">{{ $order->customer_name }}
                            - {{ $order->customer_email }}</p>
                                            </td>
                </tr>
                <tr>
                    <td style="padding:0 22px 18px 22px;color:#374151;font-size:14px;line-height:1.5;">
                        Thank you for your order.

                        Before we continue to payment, please confirm your email address.
                        <br>
                        <a href="{{ $verificationUrl }}">
                            confirm email and continue to payment
                        </a>
                        <br>
                        This link is valid for 60 minutes.
                        <br>
                        Thank you!
                        <br>
                        <small>
                            If you did not make this request, you can safely ignore this email.
                        </small>
                    </td>
                </tr>

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
