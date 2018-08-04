BEGIN:VCALENDAR\r\n
VERSION:2.0\r\n
PRODID:-//ZContent.net//Zap Calendar 1.0//EN\r\n
CALSCALE:GREGORIAN\r\n
METHOD:PUBLISH\r\n
@foreach($cals as $cal)
@include('iCal.vevent')
@endforeach
END:VCALENDAR\r\n