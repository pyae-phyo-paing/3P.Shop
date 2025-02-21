<x-mail::message>
{{-- No Laravel logo, clean layout --}}
# {{ __('3P.Shop - Reset Your Password') }}

{{ __('You are receiving this email because we received a password reset request for your account.') }}

{{-- Add a stylish button with light green color --}}
<x-mail::button :url="$actionUrl" :color="'success'" style="background-color: #28a745; border-color: #28a745; color: white; font-size: 16px; padding: 15px 30px; border-radius: 5px;">
    {{ __('Reset Password') }}
</x-mail::button>

{{-- Elegant outro message --}}
{{ __('If you did not request a password reset, no further action is required.') }}

{{-- Clean salutation --}}
{{ config('app.name') }}

{{-- Optionally, you can add subcopy with clean and readable format --}}
<x-slot:subcopy>
    @lang('If you’re having trouble clicking the ":actionText" button, copy and paste the following URL into your browser:')  
    <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
</x-mail::message>