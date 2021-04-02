<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>@yield('title',config('app.name'))</title>
@include('frontend.head')
@include('frontend.admin-navbar')
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="card-body" style="left: auto;margin: auto">
                @yield('content')
            </div>
        </div>
    </div>
    @include('frontend.footer')
</section>

</html>

