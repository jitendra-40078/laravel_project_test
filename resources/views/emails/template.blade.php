<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DareeSoft</title>
  </head>

  <body>
    <div style="margin:0 auto; max-width:700px; width:700px; position:relative; line-height:18px;">
      <table  
        cellpadding="0" 
        cellspacing="0" 
        style="font-family:Arial, Helvetica, sans-serif; color:#292b29; width:100%; border:1px solid #ad191f; border-bottom:4px solid #ad191f; font-size:14px; border-collapse:collapse;">

        <tr>
          <td colspan="2" style="background:#ad191f; height:20px;"></td>
        </tr>

        <tr style="">
          <td>
            <img src="{{ asset('web/images/logo.svg') }}" alt="DareeSoft" style="margin-top: 20px;"> 
          </td>
        </tr>

        @yield("mailcontent")
      
        <tr style="background:#ad191f;"></tr>
      </table>
    </div>

  </body>
</html>