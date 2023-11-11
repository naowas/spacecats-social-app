{{--<x-mail::message>--}}
{{--    Your account has been created!--}}
{{--    <x-mail::button :url="$url">--}}
{{--        Verify Now--}}
{{--    </x-mail::button>--}}
{{--    Thanks,<br>--}}
{{--    {{ config('app.name') }}--}}
{{--</x-mail::message>--}}
<x-mail::message>
    Account Registration Confirmation
    Thank you for creating an account with {{ config('app.name') }}!
    We are excited to have you on board. To ensure the security of your account and start exploring our services, please follow the verification link below:
    <x-mail::button :url="$url">
        Verify Now
    </x-mail::button>
    If the button above doesn't work, you can copy and paste the following URL into your browser:
    {{ $url }}
    **Note:** This verification link is valid for a limited time.
    After verifying your email, you'll have full access to your account and all its features.
    If you did not create an account with us, or if you have any concerns, please disregard this email.
    Thanks again for choosing {{ config('app.name') }}!
    Best Regards,
    The {{ config('app.name') }} Team
</x-mail::message>
