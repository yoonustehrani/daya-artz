<div id="time-line" class="w-100 float-left p-4 process-timeline dotted-background">
    @php
        $details = $timeline->values()->map(fn($t) => explode(',', $t));
        $icons = $details->map(fn($t) => trim($t[0]))->toArray();
        $dates = $details->map(fn($t) => trim($t[1]))->toArray();
    @endphp
    <div class="icons-container">
        @foreach ($icons as $icon)
        <span><i class="{{ $icon }}"></i></span>
        @endforeach
    </div>
    <div class="dates-line">
        @foreach ($dates as $timeline_date)
        <span>{{ $timeline_date }}</span>
        @endforeach
    </div>
    <div class="levels-container">
        @foreach ($timeline->keys()->toArray() as $timeline_title)
        <span><i class="fad fa-ellipsis-v"></i> {{ $timeline_title }}</span>
        @endforeach
    </div>
</div>