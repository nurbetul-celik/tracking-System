@extends('frontend.supervisor-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    @include('errors.alert')
    <form method="post" action="{{ route('post-performance' , [$data['performance']->id]) }}">
        @csrf
        <div class="form-group">
            <label for="inputName">{{__('Görev ID')}}</label>
            <input type="text" id="inputName" class="form-control" style="width: 30%"
                   value="{{ $data['performance']->id }}" name="task_id">
        </div>
        <div class="form-group">
            <label for="inputName">{{__('Kullanıcı ID')}}</label>
            <input type="text" id="inputName" class="form-control" style="width: 30%"
                   value="{{ $data['performance']->user_id }}" name="user_id">
        </div>
        <div class="rating" id="ratingRadio">
            <label>
                <input type="radio" name="starst" value="1"/>
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="starst" value="2"/>
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="starst" value="3"/>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="starst" value="4"/>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="starst" value="5"/>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
        </div>
        <button type="submit" class="btn btn-success">Puan Ver</button>
    </form>
    </body>
    <script>
        $(document).ready(function () {
            $(':radio').change(function () {
                var rating = $("#ratingRadio input[type='radio']:checked").val();
                var user_id = $("input[name = user_id]").val();
                var task_id = $("input[name = task_id]").val();

                $.ajax({
                    url: "{{ url('post-performance') }}",
                    type: "POST",
                    data: {
                        'starst': rating,
                        'user_id': user_id,
                        'task_id': task_id
                    },
                    success: function (result) {
                        $("#ratingRadio input[type='radio']:checked").val();
                        $("input[name = user_id]").val();
                        $("input[name = task_id]").val();
                        $(".results").html(result);
                    }
                });
            });
            $(function () {

                var xhr = null;
                if (window.XMLHttpRequest) {
                    xhr = window.XMLHttpRequest;
                } else if (window.ActiveXObject('Microsoft.XMLHTTP')) {
                    // I do not know if this works
                    xhr = window.ActiveXObject('Microsoft.XMLHTTP');
                }
                var send = xhr.prototype.send;
                xhr.prototype.send = function (data) {
                    try {
                        //TODO: comment the next line
                        console.log(data);
                        //TODO: comment the next line
                    } catch (e) {
                        //TODO: comment the next line
                        console.log('err send', e);
                    }
                };
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
@endsection




