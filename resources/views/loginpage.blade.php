<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Majoo Teknologi</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
    <div class="form-structor">
        <div class="signup">
            <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
            <form action="{{ route('registerUser') }}" method="post">
                @csrf
                @if(session()->has('success'))
                <p style="text-align: center; color: black; background: rgba(0, 255, 0, .8); padding: 15px 15px; border-radius: 10px">{{ session('success') }}</p>
                @elseif(session()->has('error'))
                <p style="text-align: center; color: black; background: rgba(255, 0, 0, .8); padding: 15px 15px; border-radius: 10px">{{ session('error') }}</p>
                @endif
                <div class="form-holder">
                    <input type="text" class="input" placeholder="Name" name="name" />
                    <input type="email" class="input" placeholder="Email" name="email" />
                    <input type="password" class="input" placeholder="Password" name="password" />
                </div>
                <button class="submit-btn">Sign up</button>
            </form>
        </div>
        <form action="{{ route('loginHandler') }}" method="post">
        @csrf
        <div class="login slide-up">
                <div class="center">
                    <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                    <div class="form-holder">
                        <input type="email" class="input" placeholder="Email" name="email" />
                        <input type="password" class="input" placeholder="Password" name="password" />
                    </div>
                    <button class="submit-btn">Log in</button>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/switchForm.js') }}"></script>
</body>
</html>