<nav class="navbar navbar-expand-lg navbar-dark bg-danger py-1 mb-3 mt-3 rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link p-2" href="{{ route('frontend.index') }}">All Today <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Raffles</a>
                <div class="dropdown-menu" aria-labelledby="dropdown10">
                    @foreach ($menu_raffles as $raffle)
                        <a class="dropdown-item" href="{{ route('frontend.showLotteryResults', $raffle->slug ) }}">{{ Str::title($raffle->name) }}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Lucky Number</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown11" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lotteries</a>
                <div class="dropdown-menu" aria-labelledby="dropdown11">
                    @foreach ($menu_lotteries as $lottery)
                        <a class="dropdown-item" href="{{ route('frontend.showLotteryResults', $lottery->slug ) }}">{{ Str::title($lottery->name) }}</a>
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
</nav>