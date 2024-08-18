<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
</head>

<body>
    <div dir="ltr" class="es-wrapper-color">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#f7f7f7"></v:fill>
			</v:background>
		<![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table cellpadding="0" cellspacing="0" class="esd-header-popover es-header" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-header-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20" align="left" style="border-radius: 10px 10px 0px 0px; background-color: #4c8aa7;" bgcolor="#4c8aa7">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="es-m-p0r esd-container-frame" valign="top" align="center">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 1px; border-collapse: separate;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank" href="https://viewstripo.email"><img src="https://demo.stripocdn.email/content/guids/0bb8eeff-bbb5-4a34-9d0f-89d21cb6c651/images/logo.png" alt="Logo" style="display: block;" width="120" title="Logo"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-content-body" style="border-left:1px solid #4c8aa7;border-right:1px solid #4c8aa7;background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p30t es-p20r es-p20l" align="left" bgcolor="#ffffff" style="background-color: #ffffff;">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="558" align="left" class="esd-container-frame">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-m-txt-c es-p30t es-p20b">
                                                                                        <h1><b>DSUGAR</b></h1>
                                                                                        <h1>Thông báo trạng thái bài viết: "{{ $title }}"!</h1>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image es-p15r" style="font-size: 0px;"><a target="_blank" href="https://viewstripo.email"><img class="adapt-img" src="https://tlr.stripocdn.email/content/guids/CABINET_a258b781aab0bd98d6f802cac9b1796c/images/group_128.png" alt style="display: block;" width="370"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="es-m-p0r esd-container-frame" width="558" valign="top">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p30t es-p5b es-m-txt-c">
                                                                                        <h1>Kính gửi: {{ $name }}</h1>
                                                                                        @php
                                                                                            $statusPost = [
                                                                                                'draft' => 'Bản nháp',
                                                                                                'published' => 'Đã xuất bản',
                                                                                                'archived' => 'Lưu trữ',
                                                                                                'pending' => 'Chờ kiểm duyệt',
                                                                                                'rejected' => 'Đã từ chối',
                                                                                            ];
                                                                                        @endphp
                                                                                        <p>
                                                                                            Chúng tôi xin thông báo rằng bài viết của bạn với tiêu đề "{{ $title }}" đã được trạng thái {{ $statusPost[$status] }} bởi đội ngũ biên tập viên của chúng tôi.
                                                                                            <ul>
                                                                                                <li>Trạng thái: {{ $statusPost[$status] }}</li>
                                                                                                <li>Ngày đăng bài: {{ $created_at }}</li>
                                                                                                <li>Ngày kiểm duyệt: {{ $reviewed_at }}</li>
                                                                                            </ul>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10t es-p20b es-p40r es-p40l">
                                                                                        <h5>Thông tin chi tiết</h5>
                                                                                        @if ($status == 'published')
                                                                                        <p>Bài viết của bạn hiện đã sẵn sàng để xuất bản và sẽ được đăng tải trên trang web của chúng tôi vào thời gian sớm nhất. Cảm ơn bạn đã đóng góp và mong rằng bạn sẽ tiếp tục gửi các bài viết chất lượng trong tương lai.</p>
                                                                                        @else
                                                                                        <p>Chúng tôi đã nhận thấy một số điểm cần cải thiện trong bài viết của bạn. Vui lòng xem xét và chỉnh sửa theo các ghi chú sau trước khi gửi lại:</p>
                                                                                        <p>Note: {{ $note }}</p>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-footer esd-footer-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p25t es-p25b es-p20r es-p20l" align="left" style="border-radius: 0px 0px 10px 10px; background-color: #4c8aa7;" bgcolor="#4c8aa7">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="left">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-social" style="font-size:0">
                                                                                        <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social">
                                                                                            <tbody>
                                                                                                <tr style="padding: 10px 0">
                                                                                                    <td align="center" valign="top" class="es-p20r"><a target="_blank" href="https://viewstripo.email"><img title="Facebook" src="https://tlr.stripocdn.email/content/assets/img/social-icons/circle-white/facebook-circle-white.png" alt="Fb" width="32"></a></td>
                                                                                                    <td align="center" valign="top" class="es-p20r"><a target="_blank" href="https://viewstripo.email"><img title="Twitter" src="https://tlr.stripocdn.email/content/assets/img/social-icons/circle-white/twitter-circle-white.png" alt="Tw" width="32"></a></td>
                                                                                                    <td align="center" valign="top" class="es-p20r"><a target="_blank" href="https://viewstripo.email"><img title="Instagram" src="https://tlr.stripocdn.email/content/assets/img/social-icons/circle-white/instagram-circle-white.png" alt="Inst" width="32"></a></td>
                                                                                                    <td align="center" valign="top"><a target="_blank" href="https://viewstripo.email"><img title="Youtube" src="https://tlr.stripocdn.email/content/assets/img/social-icons/circle-white/youtube-circle-white.png" alt="Yt" width="32"></a></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>