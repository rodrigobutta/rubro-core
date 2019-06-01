@extends ('master.app')

@section('content')

	<div id='calendar'></div>

	<script>
		moment.locale('es', {
			weekdaysShort : 'Do_Lu_Ma_Mie_Ju_Vi_Sa'.split('_'),
		});

		var placeholderEvent = {
			title:"",
			start: '00:00',
			end: '01:00',
			dow: [ 0, 1, 2, 3, 4, 5, 6 ]
		};

		var base_month_url = '{{ route('api.calendar.month', ['month' => 'MM', 'year' => 'YYYY']) }}';
		$(document).ready(function() {

			var calendar = $('#calendar');

			calendar.fullCalendar({
				header: {
					left: 'prev',
					center: 'title',
					right: 'next'
				},
				defaultDate: moment(),
				navLinks: false, // can click day/week names to navigate views
				editable: true,
                eventLimit: 1, // allow "more" link when too many events
                eventLimitText: function(moreEvents) {
					return "Ver todos " + "(" + (moreEvents - 1) + ")"
				},
				weekends: true,
				fixedWeekCount: false,
				height: 'auto',
				showNonCurrentDates: true,
				eventStartEditable: false,
				events: function(start, end, timezone, callback) {
					var mid_date = end.subtract(end.diff(start, 'days') / 2, 'd');
					$.ajax({
						url: base_month_url.replace('MM', mid_date.format('MM')).replace('YYYY', mid_date.format('YYYY')),
						success: function(data) {
							var events = data.map(function(item) {
								return {
									start: item.event_date,
									end: item.event_date,
									title: item.title,
									description: item.description || "",
									url: item.url || "",
									window: item.window || ""
								};
							});

							events.push(placeholderEvent);

							callback(events);
							// for(var i =0; i < events.length; i++) {
							// 	var event = events[i];
							// 	var event_date = event.start.substr(0,10);
							// 	$('.fc-day[data-date="' +  event_date + '"]').addClass('fc-has-events');
							// }
						}
					});
				},
				eventRender: function (event, element, view) {
					element.find('.fc-title').append('<span class="fc-desc"> '+event.description+'</span>');
				},
				//Para abrir link en una ventana nueva:
				eventClick: function(event) {
					if (event.url) {
						if(event.window === '_blank') {
							window.open(event.url);
							return false;
						}
					}
				},
				displayEventTime: true,
				timeFormat: 'H:mm',
				//windowResize: function(view) {
				//	if ($(window).width() < 768) {
				//		view.options.eventLimit = 0;
				//	} else {
				//		view.options.eventLimit = true;
				//	}
				//}
				eventAfterRender: function (view) {					
					$(".fc-popover").find(".fc-content").each(function(){
						$(this).attr("title",$(this).text());

						if ($(this).find('.fc-time').text() === '0:00' && $(this).find('.fc-desc').text() === ' undefined') {
							$(this).css('display', 'none');
						}
					})
				},
				eventAfterAllRender: function (view) {
					$(".fc-content").each(function(){
						$(this).attr("title",$(this).text());

						if ($(this).find('.fc-time').text() === '0:00' && $(this).find('.fc-desc').text() === ' undefined') {
							$(this).css('display', 'none');
						}
					})
				}
			});
		});
	</script>

@endsection
