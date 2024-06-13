<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .center-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .generate-btn {
            background-color: #8cff8c;
            border: none;
            padding: 15px 30px;
            font-size: 1.5rem;
            border-radius: 15px;
            margin-top: 20px;
        }
        .code-container {
            background-color: #b3b3b3;
            border-radius: 15px;
            padding: 15px;
            width: 300px;
            text-align: center;
            font-size: 1.5rem;
        }
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #f8d7da;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            color: #721c24;
        }
    </style>
    <title>Generate Code</title>
</head>
<body>

<div class="center-container">
    <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{__('messages.log_out')}}
    </button>
    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
    </form>
    <div class="code-container">
        @if(session('code'))
            <strong>{{ session('code') }}</strong>
        @else
            *
        @endif
    </div>
    <form method="GET" action="{{ route('generate.stylist.code', ['distributorId' => auth()->user()->id]) }}">
        @csrf
        <button type="submit" class="generate-btn">Generate Code</button>
    </form>
</div>

</body>
</html>
