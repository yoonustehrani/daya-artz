<td class="header">
    <table role="presentation" class="table-clear">
        <tr>
            <td>
                <table role="presentation" class="table-clear">
                    <tr>
                        <td align="center" style="width:25px;padding:0;vertical-align:middle;">
                            <img src="{{ asset('images/email/daya-white.gif') }}" alt="" width="25" class="logo"/>
                        </td>
                        <td style="width:150px;padding:0;vertical-align:bottom;">
                            <p style="margin:0px;padding: 0 0 0 5px;">
                                <a href="/" class="text-white app-name">DAYA ARTZ</a>
                            </p>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 40px 0 0 0;">
                <table role="presentation" class="table-clear">
                    <tr>
                        <td style="width:40px;" class="nbsp">&nbsp;</td>
                        <td>
                            {{ $slot }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</td>