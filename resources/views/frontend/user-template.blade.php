<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>@yield('title',config('app.name'))</title>
@include('frontend.head')
@include('frontend.user-navbar')
@yield('content')
@include('errors.alert')
@include('frontend.footer')
@yield('css')
@yield('js')
</html>

