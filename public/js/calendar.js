$(document).ready(function() {
var options = {
header: {
            left: 'prev,next',
            center: 'title',
            right: 'month'
        },
        
        eventSources: [
            {
                url: 'http://dev.searchdogs.com/calEvents',
                color: 'orange',
                textColor: 'black'
            },
            {
                url: 'http://dev.searchdogs.com/calMocks',
                color: 'purple',
                textColor: 'black'
            }
        ],
        firstDay: 1,
        displayEventTime: false,
        //eventColor: 'red',
        views: {
            list3Month: {
                type: 'list',
                duration: { months: 3 },
                buttonText: 'Agenda'
            }
        },
        
        eventRender: function(event, element) {
            
            if (event.title.includes("Team Training")){
                element.find('.fc-content').append("<br/>" + event.location.name);
            }

            if (event.title.includes("Mock")){
                element.find('.fc-content').append("<br/>" + event.get_assessment_details.get_assessor.name);
                if (typeof event.get_assessment_details.get_handler !== 'undefined'){
                    element.find('.fc-title').append("<br/>" + event.get_assessment_details.get_handler.name);
                    element.css('background-color', 'green');
                }
                else{
                    element.find('.fc-title').append("<br/>Available");
                }
            }
        },
        
        selectable: true,
        
        eventClick: function(event, element, view) {

            if(event.type === "training"){
                $('#cal_id').val(event.id);
                $("#myModalLabel").text(event.title);
                $("#locationName").text(event.location.name);
                $("#locationGrid").text(event.location.gridRef);
                $("#locationPost").text(event.location.postcode);
                $("#notes").text(event.notes);
                $.each(event.attendance, function(index, element){
                    $('#attendanceTable tbody').append('<tr><td>' + element.name + '</td></tr>');
                });
                if(event.attending === true){
                    $('#calAttendButton').text('UnAttend');
                    $('#calAttendButton').val('unattend');
                }
                $('#modalEvent').modal('show');
            }
            
            
            
            if(event.type === "mock"){
                $('#mock_id').val(event.id);
                $("#mockModalLabel").text(event.title);
                $("#mockLocationName").text(event.location.name);
                $("#mockLocationGrid").text(event.location.gridRef);
                $("#mockLocationPost").text(event.location.postcode);
                $("#mockNotes").text(event.notes);
                $.each(event.attendance, function(index, element){
                    $('#mockAttendanceTable tbody').append('<tr><td>' + element.name + '</td></tr>');
                });
                if(event.handler !== null){
                    $('#bookButton').addClass('hidden');
                    var handlerModal = event.handler;
                }
                else{
                    var handlerModal = "";
                }
                $('#assessorTable tbody').append('<tr><td>' + event.assessor + '</td><td>' + handlerModal + '</td></tr>');
                if(event.handler !== null){
                    $('#bookButton').addClass('hidden');
                }
                
                if(event.attending === true){
                    $('#mockAttendButton').text('UnAttend');
                    $('#mockAttendButton').val('unattend');
                }
                $('#modalMock').modal('show');
            }
        }
   
};

var $fc = $("#calendar").fullCalendar(options);

function recreateFC(screenWidth) {
    if (screenWidth < 700) {
        options.header = {
            left: 'prev,next today',
            center: 'title',
            right: ''
        };
        options.defaultView = 'list3Month';
    } else {
        options.header = {
            left: 'prev,next today',
            center: 'title',
            right: 'list3Month,month'
        };
        options.defaultView = 'month';
    }
    $fc.fullCalendar('destroy');
    $fc.fullCalendar(options);
}

$(window).resize(function () {
    recreateFC($(window).width());
});

recreateFC($(window).width());

});

$(function () {
    $('#datetimepicker1').datetimepicker({
        inline: true,
        sideBySide: true,
        stepping: 15,
        format: ('YYYY-MM-DD HH:mm')
    });
});

$(function () {
    $('#datetimepicker2').datetimepicker({
        inline: true,
        sideBySide: true,
        stepping: 15,
        format: ('YYYY-MM-DD HH:mm')
    });
});

// function on modal close to clear out the data from the last displayed
$(document).on('hide.bs.modal','#modalEvent', function () {
  $("#attendanceTable tbody").empty();
 
});

$(document).on('hide.bs.modal','#modalMock', function () {
  $("#mockAttendanceTable tbody").empty();
  $("#assessorTable tbody").empty();
  
});