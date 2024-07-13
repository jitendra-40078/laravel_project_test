@extends('emails.template')

@section('mailcontent')
<tr>
  <td style="padding: 20px 20px;">
    <p style=""><strong>Hello</strong>,</p>

    <p>We have received following inquiry</p>
    <p>새로운 지원자가 있습니다.</p>

    <table width="100%"  cellspacing="0" cellpadding="10" border="1" style="border:1px solid #e3e3e3; border-collapse:collapse;">
    
      <tr>
        <td width="30%">Position / 직무:</td>
        <td width="70%">{{ $position }}</td>
      </tr>

      <tr>
        <td width="30%">Name / 이름:</td>
        <td width="70%">{{ $fname }} {{ $lname }}</td>
      </tr>

      <tr>
        <td width="30%">Email / 이메일:</td>
        <td width="70%">{{ $email }}</td>
      </tr>

      <tr>
        <td width="30%">Mobile / 핸드폰 번호:</td>
        <td width="70%">{{ $mobile }}</td>
      </tr>

    </table>

    <br />

    <p>Thank You <br />감사합니다. </p>

  </td>
</tr>
@endsection