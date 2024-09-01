@extends('templates.basic.master')
@section('content')


<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <!-- SVG Logo Here -->
              </span>
              <span class="app-brand-text demo text-body fw-bold">Welcome to</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">{{ $general->site_name }}! </h4>

          <form method="POST" class="mb-3">
            @csrf
            <div class="mb-3">
              <label>Select Access</label>
              <select name="access" id="access" class="form-select" required>
                <option value="" selected disabled>Select One</option>
                <option value="{{ route('doctor.login') }}">Doctor</option>
                <option value="{{ route('assistant.login') }}">Assistant</option>
                <option value="{{ route('staff.login') }}">Staff</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" value="{{ old('username') }}" required placeholder="Enter your username" autofocus />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="" class="forget">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection

@push('style')
<style>
  .form-select {
    line-height: 2.2 !important;
    box-shadow: unset !important;
  }

  .login-wrapper__top {
    padding: 34px 12px 34px 12px !important;
  }
</style>
@endpush

@push('script')
<script>
  'use strict';
  $(document).ready(function() {

    $("select[name='access']").on('change', function() {
      let url = $(this).val();

      let form = $(this).parents('form');
      // console.log(form);

      // $('.route').attr('action', targetRoute);
      $("form").attr("action", url);
    });
  });
</script>
@endpush