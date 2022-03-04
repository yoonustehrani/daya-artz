<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        table, td, div, h1, p {font-family: Arial, sans-serif;}
        /* table, td {border:2px solid #000000 !important;} */
    </style>
    <style>
        body {
            margin:0;
            padding:0;
        }
        a {
            text-decoration: none;
        }
        p {
            margin: 0;
            font-family: myFont;
        }
        .rtl {
            text-align: right;
            direction: rtl;
        }
        .wrapper {
            width:100%;
            border-collapse:collapse;
            border:0;
            border-spacing:0;
            background:#ffffff;
        }
        .container {
            padding:0;
        }
        .body {
            width:440px;
            border-collapse:collapse;
            border:1px solid #cccccc;
            border-spacing:0;
            text-align:left;
        }
        .header {
            padding:40px 20px 40px 20px;
            background:#8d5feb;
        }
        .header-title {
            font-size: 36px;
            line-height: 50px;
            margin: 0px;
            font-weight: normal;
        }
        .header-name {
            font-size: 24px;
            line-height: 30px;
        }
        .logo {
            width: 25px;
            height: 25px;
            display: block;
        }
        .text-white {
            color: #ffffff;
        }
        .text-purple {
            color: #8d5feb;
        }
        .text-gray {
            color: #dfdfdf;
        }
        .bold {
            font-weight: bold;
        }
        .app-name {
            font-size: 24px;
            /* font-weight: 550; */
            line-height: 20px;
        }
        .table-clear {
            width:100%;
            border-collapse:collapse;
            border:0;
            border-spacing:0;
        }
        .nbsp {
            padding:0;
            font-size:0;
            line-height:0;
        }
        .content {
            padding: 20px 10px 20px 10px;
        }
        .main-content {
            padding: 20px 15px 20px 15px;
        }
        .content-title {
            font-size: 22px;
        }
        .footer {
            padding: 30px 30px 30px 30px;
            background:#8d5feb;
        }
        .text-small {
            font-size: 12px;
        }
        .text-medium {
            font-size: 16px;
            line-height: 20px;
        }
        .decor {
            text-decoration: underline;
        }
        .link {
            color: #ee7b7b;
        }
    </style>
</head>
<body>
    <table class="wrapper" role="presentation" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" class="container">
                <table class="body" role="presentation" cellpadding="0" cellspacing="0">
                    <tr>
                        @component('emails.header') {{ $header }} @endcomponent
                    </tr>
                    <tr>
                        <td class="content">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:10px 10px 10px 10px;">
                                        {{ $title }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="main-content">
                                        {{ $slot }}
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding:20px 0px 20px 0px;">
                                        <p class="text-purple bold">دایا آرتز |‌ گامی تا مدرنیته</p>
                                        <p class="text-purple bold">سرویس امور مشتریان دایا آرتز</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        @component('emails.footer')
                        @endcomponent
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>