@extends('emails.template')

@section('mailcontent')
<tr>
  <td style="padding: 20px 20px;">
    <p style=""><strong>Hello / 안녕하세요</strong>,</p>

    <p>We have received following inquiry</p>
    <p>새로운 문의가 있습니다.</p>

    <table width="100%"  cellspacing="0" cellpadding="10" border="1" style="border:1px solid #e3e3e3; border-collapse:collapse;">
    
      <tr>
        <td width="30%">Country / 국가:</td>
        <td width="70%">{{ $country }}</td>
      </tr>

      <tr>
        <td width="30%">Organisation / 회사/단체명:</td>
        <td width="70%">{{ $organisation }}</td>
      </tr>

      <tr>
        <td width="30%">Name / 이름:</td>
        <td width="70%">{{ $name }}</td>
      </tr>

      <tr>
        <td width="30%">Email / 이메일:</td>
        <td width="70%">{{ $email }}</td>
      </tr>

      <tr>
        <td width="30%">Subject / 제목:</td>
        <td width="70%">{{ $subjectInp }}</td>
      </tr>

      <tr>
        <td width="30%">Message / 내용:</td>
        <td width="70%">{{ $messageText }}</td>
      </tr>

    </table>

    <br />

    <p>Thank You <br />감사합니다.</p>

  </td>
</tr>
@endsection