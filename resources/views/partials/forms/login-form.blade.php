{!! Form::open(['method' => 'POST', 'route' => 'login' ]) !!}
    @csrf
    <div class="form-group">
        <label for="email">Emailadres</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required autofocus placeholder="student@domein.nl">
    </div>
    <div class="form-group">
        <label for="password">Wachtwoord</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="****">
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="main-button">Ga verder</button>
    </div>
{!! Form::close() !!}
