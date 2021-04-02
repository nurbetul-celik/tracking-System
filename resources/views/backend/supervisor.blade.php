@extends('frontend.supervisor-template')
@section('title','Proje Yöneticisi')
@section('content')
    <section class="content">
        @foreach($Supervisor as $Supervisors)
            <?php
            $day_difference = \Carbon\Carbon::now()->diffInDays($Supervisors->deadline_date, false)
            ?>
            <div class="container-fluid">
                @if($day_difference == 0 ||  $day_difference < 0)
                    <div class="row">
                        <div class="card-body bg-red col-6 col-lg-3 " style="margin-top: 10px">
                            <h3>{{ $Supervisors->name }}</h3>
                            <p>Zorluk Seviye: {{ $Supervisors->difficulty }}</p>
                            <div>Durum: {{ $Supervisors->description }}</div>
                            <div> Başlangıç Tarihi:{{ $Supervisors->start_date }}</div>
                            <div>Bitiş tarihi: {{ $Supervisors->deadline_date }}</div>
                            @if($day_difference == 0)
                                <div>{{ 'Bugün son gün'}}</div>
                            @else
                                <div>{{ (-1)*$day_difference.'gün geçmiş'}}</div>
                            @endif
                        </div>
                    </div>
                @elseif($day_difference <= 5)
                    <div class="row">
                        <div class="card-body bg-yellow col-6 col-lg-3 " style="margin-top: 10px">
                            <h3>{{ $Supervisors->name }}</h3>
                            <p>Zorluk Seviye: {{ $Supervisors->difficulty }}</p>
                            <div>Durum: {{ $Supervisors->description }}</div>
                            <div> Başlangıç Tarihi:{{ $Supervisors->start_date }}</div>
                            <div>Bitiş tarihi: {{ $Supervisors->deadline_date }}</div>
                            <div>{{ $day_difference.'gün kaldı' }}</div>
                        </div>
                        @else
                            <div class="row">
                                <div class="card-body bg-white col-6 col-lg-3 " style="margin-top: 10px">
                                    <h3>{{ $Supervisors->name }}</h3>
                                    <p>Zorluk Seviye: {{ $Supervisors->difficulty }}</p>
                                    <div>Durum: {{ $Supervisors->description }}</div>
                                    <div> Başlangıç Tarihi:{{ $Supervisors->start_date }}</div>
                                    <div>Bitiş tarihi: {{ $Supervisors->deadline_date }}</div>
                                    <div>{{ $day_difference.'gün kaldı' }}</div>
                                </div>
                            </div>
                    </div>
            </div>
            @endif
        @endforeach
    </section>
@endsection

