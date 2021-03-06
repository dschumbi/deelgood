@extends('layouts.page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h6>Produktkategorie: {{ $auction->category->name }}</h6>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>{{ $auction->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span class="label label-default">
                Start der Anfrage:
                </span>
                <p>
                    {{ $auction->auction_start->formatLocalized('%d. %B %Y') }}
                </p>
            </div>
            <div class="col">
                <span class="label label-default">
                Ende der Anfrage:
                </span>
                <p>
                    {{ $auction->auction_end->formatLocalized('%d. %B %Y') }}
                </p>
            </div>
            <div class="col">
                <span class="label label-default">
                Kaufdatum:
                </span>
                <p>
                    {{ $auction->deliveryDate }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span class="label label-default">
                Maximaler Preis:
                </span>
                <p>
                    {{ $auction->maxPrice }} &euro;
                </p>
            </div>
            <div class="col">
                <span class="label label-default">
                Link zu einem Online-Shop:
                </span>
                <p>
                    <a href="{{ $auction->link }}" target="_blank">
                        {{ $auction->link }}
                    </a>
                </p>
            </div>
            <div class="col">
                <span class="label label-default">
                Abholung oder Lieferung:
                </span>
                <p>
                    @if($auction->pickUpInStore)
                        Abholung
                    @else
                        Lieferung nach Hause
                    @endif
                </p>
            </div>
        </div>
        <hr>
        <h2>Angebot für diese Anfrage erstellen</h2>
        <div class="row">
        <div class="col-3">
        <form method="POST" action="/auctions/{{ $auction->id }}/offers">
            {{ csrf_field()}}

            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-base-tab" data-toggle="pill" href="#v-pills-base" role="tab" aria-controls="v-pills-base" aria-selected="true">Artikelstamm</a>
              @if ( sizeof($auction->properties) > 0 )
                <a class="nav-link" id="v-pills-properties-tab" data-toggle="pill" href="#v-pills-properties" role="tab" aria-controls="v-pills-properties" aria-selected="false">Produkteigenschaften</a>
              @endif
              <a class="nav-link" id="v-pills-info-tab" data-toggle="pill" href="#v-pills-info" role="tab" aria-controls="v-pills-info" aria-selected="false">Weitere Informationen</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                @include('auctions.offers.base')
                @include('auctions.offers.properties')
                @include('auctions.offers.additionalInfo')
            </div>
            <hr>
            <button type="submit" class="btn btn-success col-12">Angebot abgeben</button>
        </div>
        </form>
    </div>
@endsection
