@extends('email.frame')

@section('body')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
        <tr>
            @include('email.common.header')
        </tr>
        <tr>
           @yield('content')
        </tr>
        <tr>
            @include('email.common.footer')
        </tr>
    </table>
@endsection