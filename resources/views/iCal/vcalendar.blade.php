BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//ZContent.net//Zap Calendar 1.0//EN
CALSCALE:GREGORIAN
METHOD:PUBLISH
@foreach($cals as $cal)
@include('iCal.vevent')
@endforeach
END:VCALENDAR