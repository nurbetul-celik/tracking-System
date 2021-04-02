@extends('frontend.user-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    <form action="{{route('post-new-message')}}" method="post" name="messageForm">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="inputName" style="margin-left: 20px">{{__('Gönderilecek Kişi E-posta')}}</label>
                <input type="email" id="inputName" class="form-control" style="width: 30%;margin-left: 20px" required
                       name="email"
                       value="">
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputName">{{__('Mesaj')}}</label>
                    <textarea type="text" id="inputName" class="form-control" style="width: 30%" required
                              name="message"></textarea>
                    <input type="submit" name="submitMessage" class="btn btn-primary"
                           style="margin-top: 10px;margin-bottom: 5%">
                </div>
            </div>
        </div>
    </form>
    </body>
@endsection
