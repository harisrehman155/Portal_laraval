@component('mail::message')

# ORDER ID 0{{ $order->id }}

---------------------------------

**Email:** {{ $user->email }}<br>
**Cell:** {{ $user->cell_number }}<br>
**Phone:** {{ $user->phone_number }}<br>

**Date:** {{ date('y-d-m', strtotime($order->created_at)) }}

-----------------------------------------------------------------------

# Order Detail

**Instructions:** {{ $order->instructions }} <br>

**Design Name:**  {{ $order->design_name }} <br>
**PO#:**  {{ $order->po_no }} <br>
**Number Of Colors:**  {{ $order->number_of_colors }} <br>
**Color Type:**  {{ $order->color_type }} <br>
**Required Format:**  {{ $order->required_format }} <br>
**Super Urgent:**  {{ $order->is_urgent ? 'Yes' : 'No' }} <br>

@component('mail::button', ['url' => $filesUrl])
    Download Files
@endcomponent

-----------------------------------------------------------------------


Thanks,<br>
{{ str_replace('-' , ' ', config('app.name')) }}
@endcomponent
