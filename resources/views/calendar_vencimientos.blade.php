@extends ('master.app')

@section('content')

	<div class="calendar--filter container">
		<p class="calendar--filter__text">Eligí el vencimiento que necesitas para filtrar</p>
		<select id="selector">
			<option value="all">Todos los vencimientos</option>
			@foreach ($types as $type)
				<option value="{{$type}}">{{$type}}</option>
			@endforeach
		</select>
	</div>
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

		var events;
		var base_month_url = '{{ route('api.calendar_vencimientos.month', ['month' => 'MM', 'year' => 'YYYY']) }}';
		$(document).ready(function() {

			var calendar = $('#calendar');

			calendar.fullCalendar({
				header: {
					left: 'prev',
					center: 'title',
					right: 'next'
				},
				eventStartEditable: false,
				defaultDate: moment(),
				navLinks: false, // can click day/week names to navigate views
				editable: true,
				eventLimit: 1, // allow "more" link when too many events
				eventLimitText: function(moreEvents) {
					return "Ver todos " + "(" + (moreEvents - 1) + ")"
				},
				weekends: false,
				fixedWeekCount: false,
				height: 'auto',
				showNonCurrentDates: true,
				events: function(start, end, timezone, callback) {
					var mid_date = end.subtract(end.diff(start, 'days') / 2, 'd');
					$.ajax({
						url: base_month_url.replace('MM', mid_date.format('MM')).replace('YYYY', mid_date.format('YYYY')),
						success: function(data) {
							events = data.map(function(item) {
								return {
									start: item.event_date,
									end: item.event_date,
									title: item.title,
									description: item.description || ""
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

					return ['all', event.title].indexOf($('#selector').val()) >= 0
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
				displayEventTime: false,
				timeFormat: 'H:mm',
				eventAfterRender: function (view) {					
					$(".fc-popover").find(".fc-content").each(function(){
						$(this).attr("title",$(this).text());

						if ($(this).find('.fc-desc').text() === ' undefined') {
							$(this).css('display', 'none');
						}
					})
				},
				eventAfterAllRender: function (view) {
					$(".fc-content").each(function(){
						$(this).attr("title",$(this).text());

						if ($(this).find('.fc-desc').text() === ' undefined') {
							$(this).css('display', 'none');
						}
					})
				}
			});
			
			$('#selector').on('change',function(){
				$('#calendar').fullCalendar('rerenderEvents');
				$('.fc-day').removeClass('fc-has-events');
				var filtered_events = events.filter(function(event){
					return event.title == $('#selector').val();
				});

				if($('#selector').val() == 'all') {
					filtered_events = events;
				}

				// for(var i =0; i < filtered_events.length; i++) {
				// 	var event = filtered_events[i];
				// 	var event_date = event.start.substr(0,10);
				// 	$('.fc-day[data-date="' +  event_date + '"]').addClass('fc-has-events');
				// }
			});
	
	
			//Selector
			$('#selector').selectric();
		});

	</script>

@endsection