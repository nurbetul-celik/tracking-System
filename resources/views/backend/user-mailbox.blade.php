@extends('frontend.user-template')
@section('title','Kullanıcı')
@section('content')
    @include('errors.alert')
    <body class="hold-transition sidebar-mini">
    <form action="{{route('get-message')}}" method="get">
        <div class="card">
            <div class="card-header">
                <a href="{{route('get-new-message')}}" class="btn btn-primary btn-sm" style="margin-left: 13px;">Yeni
                    Mesaj Oluştur</a>
            </div>
            <div class="card-body p-0">
                <table class="table" style="width: 60%;margin: 10px">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Alıcı</th>
                        <th>Mesaj</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sira = 1;  ?>
                    @foreach($mail as $mails)
                        @if(!empty($mails -> status))
                            <tr>
                                <td>{{ $sira++ }}</td>
                                <td> {{ $mails->receiver_id }}</td>
                                <!-- $mails -> message -> name ile name almaya çalıştım fakat name görmedi -->
                                <td>{{ $mails->message_text }}</td>
                                <td><a href="{{route('get-delete-message',[$mails->id])}}"
                                       class="btn btn-danger btn-sm fa fa-trash"
                                       onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</a></td>

                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
        {{ $mail->links() }}
    </form>
    </body>
@endsection
