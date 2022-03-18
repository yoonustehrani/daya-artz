<div id="time-line" class="w-100 float-left p-4 process-timeline dotted-background">
    <div class="icons-container">
        @foreach ($timeline->pluck('icon') as $timeline_icon)
        <span><i class="{{ $timeline_icon }}"></i></span>
        @endforeach
    </div>
    <div class="dates-line">
        @foreach ($timeline->pluck('date') as $timeline_date)
        <span>{{ $timeline_date }}</span>
        @endforeach
    </div>
    <div class="levels-container">
        @foreach ($timeline->pluck('title') as $timeline_title)
        <span><i class="fas fa-circle"></i> {{ $timeline_title }}</span>
        @endforeach
    </div>
</div>