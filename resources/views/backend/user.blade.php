@extends('frontend.user-template')
@section('title','Kullanıcı')
@section('content')
    <section class="content">
        @foreach($data['taskUser'] as $taskUsers)
            <?php $data['day_difference'] = \Carbon\Carbon::now()->diffInDays($taskUsers->deadline_date, false) ?>
            <div class="container-fluid">
                @if(  $data['day_difference']  == 0 ||  $data['day_difference']  < 0)
                    <div class="row">
                        <div class="card-body bg-red col-6 col-lg-3 " style="margin-top: 10px">
                            <h3>{{ $taskUsers->name }}</h3>
                            <p>Zorluk Seviye: {{ $taskUsers->difficulty }}</p>
                            <div>Durum: {{ $taskUsers->description }}</div>
                            <div> Başlangıç Tarihi:{{ $taskUsers->start_date }}</div>
                            <div>Bitiş tarihi: {{ $taskUsers->deadline_date }}</div>
                            @if( $data['day_difference'] == 0)
                                <div>{{ 'Bugün son gün'}}</div>
                                <button class="btn btn-primary btn-sm"><a
                                        href="{{route('get-description-change',[$taskUsers->id,$taskUsers->description])}}"
                                        style="color:white"> Göreve
                                        Başla</a></button>
                                <button class="btn btn-primary btn-sm"><a
                                        href="{{route('get-description-change',[$taskUsers->id,$taskUsers->description])}}"
                                        style="color:white"> Görev
                                        Onayda</a></button>
                            @else
                                <div>{{ (-1)* $data['day_difference'] .'gün geçmiş'}}</div>
                            @endif
                        </div>
                    </div>
                @elseif( $data['day_difference'] <= 5)
                    <div class="row">
                        <div class="card-body bg-yellow col-6 col-lg-3 " style="margin-top: 10px">
                            <h3>{{ $taskUsers->name }}</h3>
                            <p>Zorluk Seviye: {{ $taskUsers->difficulty }}</p>
                            <div>Durum: {{ $taskUsers->description }}</div>
                            <div> Başlangıç Tarihi:{{ $taskUsers->start_date }}</div>
                            <div>Bitiş tarihi: {{ $taskUsers->deadline_date }}</div>
                            <div>{{ $data['day_difference'] .'gün kaldı'}}</div>
                            <button class="btn btn-primary btn-sm"><a
                                    href="{{route('get-description-change',[$taskUsers->id,$taskUsers->description])}}"
                                    style="color:white"> Göreve Başla</a></button>
                            <button class="btn btn-primary btn-sm"><a
                                    href="{{route('get-description-change',[$taskUsers->id,$taskUsers->description])}}"
                                    style="color:white"> Görev
                                    Onayda</a></button>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="card-body bg-white col-6 col-lg-3 " style="margin-top: 10px">

                            <h3>{{ $taskUsers->name }}</h3>
                            <p>Zorluk Seviye: {{ $taskUsers->difficulty }}</p>
                            <div>Durum: {{ $taskUsers->description }}</div>
                            <div> Başlangıç Tarihi:{{ $taskUsers->start_date }}</div>
                            <div>Bitiş tarihi: {{ $taskUsers->deadline_date }}</div>
                            <div>{{ $data['day_difference'] .'gün kaldı'}}</div>
                            <button class="btn btn-primary btn-sm"><a
                                    href="{{route('get-description-change',[$taskUsers->id,$taskUsers->description])}}"
                                    style="color:white"> Göreve Başla</a></button>
                            <button class="btn btn-primary btn-sm"><a
                                    href=" {{  route('get-description-change',[$taskUsers->id,$taskUsers->description])}}"
                                    style="color:white"> Görev
                                    Onayda</a></button>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </section>
@endsection
