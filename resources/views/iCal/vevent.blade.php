BEGIN:VEVENT\r\n
SUMMARY:{{ $cal->type }}\r\n
UID:www.sds.com\r\n
STATUS:CONFIRMED\r\n
TRANSP:TRANSPARENT\r\n
DTSTART:{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cal->start)->format('Ymd'.'T'.'His'.'Z') }}\r\n
DTEND:{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cal->end)->format('Ymd'.'T'.'His'.'Z') }}\r\n
LOCATION:{{ $cal->location->name }}\r\n
END:VEVENT\r\n
