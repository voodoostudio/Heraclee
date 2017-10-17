<h3>{{ trans('lang.email_title') }}</h3>



<div>
    {{ trans('lang.message') }} : {{ $bodyMessage }}
</div>

<p>{{ trans('lang.name') }} : {{ $name }}</p>

<p>{{ trans('lang.telephone') }} : {{ $phone }}</p>

<p>{{ trans('lang.sent_via') }} {{ $email }}</p>