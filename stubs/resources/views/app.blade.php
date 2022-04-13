<!DOCTYPE html>
<html>
<head>

    <title>{{ config('app.name') }}</title>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ Request::url() }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

</head>

<body>

    <div id="vue-app">

        <app-layout
            :user="{{ json_encode($user) }}">
            <template #logo>
                @include('saas::logo', ['align' => 'left'])
            </template>
        </app-layout>
        
    </div>

    <script type="text/javascript">
        window.stripeKey = "{{ env('STRIPE_KEY') }}"
    </script>
    
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ mix('js/app.js') }}"></script>

</body>
