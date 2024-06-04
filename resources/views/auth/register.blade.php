<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('LoginFormResource/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<form  method="POST" action="{{ route('register') }}">

    @csrf
    <div class="inputGroup inputGroup1">
        <label for="loginEmail" id="loginEmailLabel">Name</label>
        <input type="text" id="loginName" name="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div class="inputGroup inputGroup1">
        <label for="loginEmail" id="loginEmailLabel">Email</label>
        <input type="email" id="loginEmail" name="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="inputGroup inputGroup2">
        <label for="loginPassword" id="loginPasswordLabel">Password</label>
        <input type="password" id="loginPassword" name="password"/>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <div class="inputGroup inputGroup2">
        <label for="loginPassword" id="password_confirmationLabel">Password Confirmation</label>
        <input type="password" id="password_confirmation" name="password_confirmation"/>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
    <div class="inputGroup inputGroup3">
        <button type="submit">{{ __('Log in') }}
        </button>
    </div>
    <div class="text-end">
        Already have an account? <a href="{{ route('login') }}" style="color: #217093">Login here</a>
    </div>

</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
</body>
</html>
