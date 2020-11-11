{{Form::open([
    'method'=>'post',
    'route'=>'handleLogin'
])}}
<div id="signin">

    <div class="form-title">
        <img src="{{asset('assets/images/logo.png')}}" style="width: 150px;margin: auto" alt="">
        <h4>Falcon System Admin Login</h4>
        <br><br><br>
        {{--<button href="{{route('getLoginLocal')}}" class="active-dir">Login Without Active Directory</button>--}}
    </div>
    <div class="input-field">
        <input type="text" name="username" id="email" class="{{old('username') ? 'not-empty': '' }}"
               value="{{old('username')}}" autocomplete="off"/>
        <i class="material-icons">face</i>
        <label for="email">User</label>
    </div>
    @if($errors->has('username'))
        <span class="text-danger">
            {{$errors->first('username')}}
        </span>
    @endif
    <div class="input-field">
        <input type="password" name="password" id="password"/>
        <i class="material-icons">lock</i>
        <label for="password">Password</label>
    </div>
    @if($errors->has('password'))
        <span class="text-danger">
            {{$errors->first('password')}}
        </span>
    @endif

    <br><br><br>
    <button class="login">Login</button>
</div>
{{Form::close()}}
