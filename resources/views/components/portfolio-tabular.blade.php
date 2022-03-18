<div id="about-logo" class="col-12 float-left p-3 mt-4">
    <div class="w-100 title-section">
        <div class="title-container">
            <h2 class="title-text">فلسفه فکری لوگو</h2>
        </div>
    </div>
    <div class="tab-element mt-2">
        <ul class="tabs-container col-12 float-left p-0">
            @foreach ($tabular->keys() as $tab)
            <li class="tab badge badge-pill eggplant {{ $loop->first ? 'active' : '' }}">{{ $tab }}</li>
            @endforeach
        </ul>
        <div class="tab-contents col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 float-left mt-3">
            @foreach ($tabular->values() as $val)
            <article class="tab-content {{ $loop->first ? 'active' : '' }}">
                <p>{{ $val }}</p>
            </article>
            @endforeach
        </div>
    </div>
</div>