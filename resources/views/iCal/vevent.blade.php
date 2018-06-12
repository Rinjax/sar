BEGIN:VEVENT
SUMMARY:{{ $cal->type }}
UID:www.sds.com
STATUS:CONFIRMED
TRANSP:TRANSPARENT
DTSTART:{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cal->start)->format('Ymd'.'T'.'His'.'Z') }}
DTEND:{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cal->end)->format('Ymd'.'T'.'His'.'Z') }}
LOCATION:{{ $cal->location->name }}
END:VEVENT
