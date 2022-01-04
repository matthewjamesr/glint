@extends('index')

@section('title', 'Covered countries')

@section('content')
    <div class="container countries">
        <div class="row justify-content-md-center gy-4">
            <div class="col s12 hero">
                <h1 class="text-center">We have intel on the biggest threats</h1>
                <p>It's the <b>baddies</b>. Daily updates on the biggest threats to global security.</p>
                <div class="request">
                    <p>Don't see a country but want to?</p>
                    <a class="btn btn-dark" href="/countries/request">Request</a>
                </div>
            </div>
        </div>
        <div class="row list justify-content-md-center gy-4">
            <div class="col-xs-12" id="glintChina">
                <div class="country">
                    <h3>People's <small>Winnie's</small> Republic of China</h3>
                    <div class="outro">
                        <p>Communism and hedgemony</p>
                        <span class="leader">Xi Jinping</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-6" id="glintDPRK">
                <div class="country">
                    <h3>Democratic People's Republic of <small>North</small> Korea</h3>
                    <div class="outro">
                        <p>Juche or bust</p>
                        <span class="leader">Kim Jong Un</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-6" id="glintRussia">
                <div class="country">
                    <h3>Russian Federation</h3>
                    <div class="outro">
                        <p>Bears on unicyles... everyone of them</p>
                        <span class="leader">Vladimir Putin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection