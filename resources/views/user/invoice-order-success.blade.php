<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wingers It services - Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="big-deal">
    <meta name="keywords" content="big-deal">
    <meta name="author" content="big-deal">
    <link rel="icon" href="../assets/img/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/img/favicon/favicon.png" type="image/x-icon">

    <style type="text/css">
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Open Sans', sans-serif;
            background-color: #e2e2e2;
            display: block;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        p {
            margin: 15px 0;
        }

        h5 {
            color: #444;
            text-align: left;
            font-weight: 400;
        }

        .text-center {
            text-align: center
        }

        .main-b-g-light {
            background-color: #fafafa;
        }

        .title {
            color: #444444;
            font-size: 22px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        table {
            margin-top: 30px;
        }

        table.top-0 {
            margin-top: 0;
        }

        table.order-detail,
        .order-detail th,
        .order-detail td {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        .order-detail th {
            font-size: 16px;
            padding: 15px;
            text-align: center;
        }

        .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>

<body style="margin: 20px auto;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0 30px;background-color: #f8f9fa; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <img src="../assets/img/email-temp/delivery.png" alt="" style="margin-bottom: 30px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="../assets/img/email-temp/success.png" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2 class="title">thank you</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Payment Is Successfully Processsed And Your Project is Downloaded</p>
                                <p>Provider Reference ID: {{ $providerReferenceId }},Order ID: {{ $order->orderId  }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="border-top:1px solid #777;height:1px;margin-top: 30px;">
                            </td>
                        </tr>
                    </table>
                    <div>
                        <table border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <h2 class="title">YOUR ORDER DETAILS</h2>
                                </td>
                            </tr>
                        </table>
                        <table class="order-detail" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr align="left">
                                <th>PROJECT</th>
                                <th style="padding-left: 15px;">TITLE</th>
                                <th>CATEGORY</th>
                                <th>PRICE </th>
                            </tr>
                            <tr>
                                <td>
                                    <img src="../" alt="" width="70">
                                </td>
                                <td valign="top" style="padding-left: 15px;">
                                    <h5 style="margin-top: 15px;"> </h5>
                                </td>
                                <td valign="top" style="padding-left: 15px;">
                                    <h5 style="font-size: 14px; color:#444;margin-top:15px;    margin-bottom: 0px;"> </h5>
                                </td>
                                <td valign="top" style="padding-left: 15px;">
                                    <h5 style="font-size: 14px; color:#444;margin-top:15px"><b> &#8377; </b></h5>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Project:</td>
                                <td colspan="3" class="price" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b></b></td>
                            </tr> -->
                            <tr>
                                <td  style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Discount :</td>
                                <td  class="price" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>{{ $order->discount  }}</b></td>
                          
                                <td  style="line-height: 49px;font-size: 13px;color: #000000; padding-left: 20px;text-align:left;border-right: unset;">GST :</td>
                                <td  class="price" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>{{ $order->gstAmount }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;
                                    padding-left: 20px;text-align:left;border-right: unset;">TOTAL PAID :</td>
                                <td colspan="3" class="price" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>{{ $order->amount }}</b></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="main-b-g-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 30px;">
                <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;">
                    <tr>
                        <td>
                            <p style="font-size:13px; margin:0;">2020 - 2023 Copy Right by Wingers It Services Pvt Ltd</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Address: ATC (Asian Trade Center), plot no -320/3, near ASIAN PAINT, CHOKDI GIDC, Ankleshwar, Gujarat 393002</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>