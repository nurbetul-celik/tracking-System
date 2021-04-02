<h1>Hoşgeldiniz</h1>
<p> Merhaba {{ $user->name }} ,</p>
<p>Kaydınızı aktifleştirmek için <a
        href="{{ config('app.url')}} /aktiflestir/ {{ $user -> activation_key }}">tıklayınız</a> ya
    da aşağıdaki bağlantıyı
    tarayıcı da açınız.</p>
<p>
    {{ config('app.url') }}/aktiflestir{{ $user -> activation_key }}
</p>
