@component('mail::message')
# Thanks for submitting your project info!

You can view and edit details of your project on home page.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Go back to home page
@endcomponent

Thanks,<br>
Zivojin
@endcomponent
