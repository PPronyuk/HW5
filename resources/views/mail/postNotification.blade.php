@component('mail::message')
# Произошли изменения на сайте

{{ $message }}

@if ($post->exists)
@component('mail::button', ['url' => '/posts/' . $post->slug . '/'])
Перейти
@endcomponent
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
