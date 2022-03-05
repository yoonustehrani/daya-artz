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