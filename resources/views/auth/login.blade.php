@extends('layouts.default')

@section('title', ' - Login')

@section('contents')

  <div class="valign-wrapper" style="width:100%;height:100%;position: relative; margin-top: 30px">
    <div class="valign" style="width:100%;">
      <div class="container">
        <div class="row">
          <div class="col s12 m6 offset-m3">
            <div class="card">
              <div class="card-content">
                <span class="card-title black-text center">Login</span>
                <form method="POST" action="{{ route('login') }}" class="card-action">
                  @csrf
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">account_circle</i>
                      <input name="username" id="username" type="text" class="validate" autofocus="">
                      <label for="username">Username</label>
                      @if ($errors->has('username'))
                        <span class="helper-text red-text">{{ $errors->first('username') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">vpn_key</i>
                      <input name="password" id="password" type="password" class="validate">
                      <label for="password">Password</label>
                      @if ($errors->has('password'))
                        <span class="helper-text red-text">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="right-align">
                    <button type="submit" class="waves-effect waves-light btn-small"> Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection