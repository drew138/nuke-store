@extends('layouts.app')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
          {{ __('auth.verify_email') }}
        </h1>
        @if (session('resent'))
          <div lass="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-600 dark:text-green-400" role="alert">
              {{ __('auth.a_fresh_verification_link_has_been_sent_to_your_email_address') }}
          </div>
        @endif
        {{ __('auth.before_proceeding_please_check_your_email_for_a_verification_link') }}
        {{ __('auth.if_you_did_not_receive_the_email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('auth.click_here_to_request_another') }}</button>.
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
