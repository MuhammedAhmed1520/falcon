<style>
    a, a:visited {
        color: #1e4d8d;
        text-decoration: none;
    }
    #remove_username{
        cursor: pointer;
        position: relative;
        float: right;
        top: -40px;
        right: 10px;
        color: #bbb;
    }
</style>

{{Form::open([
    'method'=>'post',
    'route'=>'login',
    'style'=>'position:relative',
    'id'=>'form'
])}}
<div id="signin">
    <div class="form-title">
        <img src="{{asset('assets/images/logo.png')}}" style="width: 150px;margin: auto" alt="">
        <h4>System Admin Login</h4>
        <br><br><br>
        {{--<button href="{{route('getLoginLocal')}}" class="active-dir">Login Without Active Directory</button>--}}
    </div>
    <div class="input-field">
        <input type="hidden" name="username" id="username"  value="{{old('username')}}" autocomplete="off" />
        <input type="text" name="username2" id="email" class="{{old('username2') ? 'not-empty': '' }}"
               value="{{old('username2')}}" autocomplete="off"/>
        <i class="material-icons">face</i>
        <label for="email">User</label>
    </div>
    <i class="material-icons delete_btn"  id="remove_username">delete</i>
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
<div style="text-align: left;text-decoration: none;font: 500 16px/1 Roboto, sans-serif;padding: 11px;display: block;color: #FFF;border: none;outline: 0;cursor: pointer;bottom: 0;position: absolute;bottom: -15px;left: 10px;">
    <a href="{{route('getLocalLoginView')}}">Login as Guest</a>
</div>
{{Form::close()}}