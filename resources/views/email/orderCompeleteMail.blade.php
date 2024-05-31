@component('mail::message')

# ORDER ID 0{{ $order->order_id }}

----------------------------------------------------------------------------------------------

# Hello!
Your order is ready you can download files. Please click below to download your files.

@component('mail::button', ['url' => $filesUrl])
    Download Files
@endcomponent

-----------------------------------------------------------------------------------------------


Thanks,<br>
{{ str_replace('-' , ' ', config('app.name')) }}
@endcomponent
