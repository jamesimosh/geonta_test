@extends('layouts.auth')

@section('pageMeta')
  @parent
  @vite(['resources/js/pages/auth/signup.js'])
@endsection

<!-- #####
  COLUMN B
###### -->
@section('contentColumnA')
<div class="column-wrapper relative w-full h-full bg-ph-blue-900 text-ph-blue-50">
  <a 
    href="{{ url('/') }}"
    class="logo-container block absolute top-5 left-5"
  >
    @php
      $logo_classes='fill-ph-blue-50 hover:fill-ph-blue-100 w-36 transition-colors';
      $svg_logo_context = [ 'classes' => $logo_classes ];
    @endphp
    @include('partials.svg-logo', $svg_logo_context)
  </a>

  <div class="visuals w-full h-full pt-16 flex flex-col justify-center
  items-center">
    <div class="top-side h-1/2 w-full relative flex flex-col justify-end">
      <div class="row row-1">
        <img
          src="{{ Vite::asset('resources/images/pages/auth/signup_image_01_top.png') }}"
          alt="signup image 01, top half"
          srcset=""
          class="block w-48 mx-auto"
        >
      </div>
      <div class="row row-2 border-t-0 relative">
      <svg 
        viewBox="0 0 100 100"
        preserveAspectRatio="none"
        class="light-source absolute block top- left-0 w-full h-full
        fill-ph-white-50"
      >
        <path d="M0 100H100L50 0L0 100Z"/>
      </svg>
        <img
          src="{{ Vite::asset('resources/images/pages/auth/signup_image_01_bottom.png') }}"
          alt="signup image 01, bottom half"
          srcset=""
          class="block w-48 mx-auto relative"
        >
      </div>
    </div>
    <div class="bottom-side h-1/2 w-full pt-2 pb-5 flex flex-col gap-3 bg-ph-white-50
    text-ph-blue-900">
      <img
        src="{{ Vite::asset('resources/images/pages/auth/signup_image_02.png') }}"
        alt="signup image 02"
        srcset=""
        class="block w-48 mx-auto"
      >
      <p class="welcome-text flex flex-col text-center">
        <span>Brighten Up Someone’s Day,</span>
        <span>By Appreciating Them.</span>
      </p>
    </div>
  </div>

</div>
@endsection

<!-- #####
  COLUMN B
###### -->
@section('contentColumnB')
<div class="column-wrapper relative w-full h-full p-10 flex justify-center
ltm:justify-start items-center">
  <div class="login-content-wrapper container bg-ph-blue-50 flex flex-col
  gap-5">

    <!-- logo for smaller displays -->
    <a 
      href="{{ url('/') }}"
      class="logo-container block w-fit ltm:hidden mx-auto"
    >
      @php
        $logo_classes='fill-ph-blue-900 hover:fill-ph-blue-700 transition-colors w-36';
        $svg_logo_context = [ 'classes' => $logo_classes ];
      @endphp
      @include('partials.svg-logo', $svg_logo_context)
    </a>

    <!-- title for registration page -->
    <div class="block title-block">
      <h2 class="page-title text-center text-2xl md:text-3xl font-medium">
        Create An Account.
      </h2>
    </div>

    <!-- login form -->
    <form action="{{ route('signupPost') }}" method="POST" id="registration-form"
    class="registration-form grid grid-cols-1 md:grid-cols-2 gap-5 w-fit mx-auto
    ">

      <!-- Cross-Site Request Forgery Token -->
      @csrf

      <!-- form errors list -->
      <ul
        id="registration-error-list"
        data-errors="false"
        class="form-field errors-list w-full bg-red-500 text-ph-white-50
        font-medium md:col-span-2 rounded py-2 px-3 hidden data-[errors=true]:block"
      >
      </ul>

      <!-- first name -->
      <div class="form-field fname-form-field w-full max-w-md">
        <label for="registration-fname" class="capitalize">first name</label>
        <div class="input-wrapper bg-ph-white-50 shadow-ph-input rounded-md mt-2
        relative">
          <input
            type="text" name="register_fname" id="registration-fname" required
            class="w-full bg-transparent outline-none border-2 border-transparent
            focus:border-ph-blue-500 rounded-md py-1 px-2"
          />
        </div>
      </div>

      <!-- last name -->
      <div class="form-field lname-form-field w-full max-w-md">
        <label for="registration-lname" class="capitalize">last name</label>
        <div class="input-wrapper bg-ph-white-50 shadow-ph-input rounded-md mt-2
        relative">
          <input
            type="text" name="register_lname" id="registration-lname" required
            class="w-full bg-transparent outline-none border-2 border-transparent
            focus:border-ph-blue-500 rounded-md py-1 px-2"
          />
        </div>
      </div>

      <!-- email -->
      <div class="form-field email-form-field w-full max-w-md">
        <label for="registration-email" class="capitalize">email</label>
        <div class="input-wrapper bg-ph-white-50 shadow-ph-input rounded-md mt-2
        relative">
          <input
            type="email" name="register_email" id="registration-email" required
            class="w-full bg-transparent outline-none border-2 border-transparent
            focus:border-ph-blue-500 rounded-md py-1 px-2"
          />
        </div>
      </div>

      <!-- phone number -->
      <div class="form-field phone-form-field w-full max-w-md">
        <label for="registration-phone" class="capitalize">phone number</label>
        <div class="input-wrapper bg-ph-white-50 shadow-ph-input rounded-md mt-2
        relative">
          <input
            type="text" name="register_phone" id="registration-phone" required
            class="w-full bg-transparent outline-none border-2 border-transparent
            focus:border-ph-blue-500 rounded-md py-1 px-2"
          />
        </div>
      </div>

      <!-- Password -->
      <div class="form-field pass1-form-field w-full max-w-md">
        <label for="registration-pass1" class="capitalize">Password</label>
        <div class="input-wrapper bg-ph-white-50 shadow-ph-input rounded-md mt-2
        relative">
          <input
            type="password" name="register_pass1" id="registration-pass1" required
            class="w-full max-w-full bg-transparent outline-none border-2 border-transparent
            focus:border-ph-blue-500 rounded-md py-1 px-2 pr-10 box-border"
          />
          <div
            data-state="hidden"
            data-targetField="registration-pass1"
            class="visibility-toggle absolute top-0 right-0 w-10 h-full flex
            justify-center items-center hover:text-ph-blue-700" 
          >
            <span class="state visible-state"><i class="fa-solid fa-eye"></i></span>
            <span class="state hidden-state"><i class="fa-solid fa-eye-slash"></i></span>
          </div>
        </div>
      </div>

      <!-- Password Confirmation -->
      <div class="form-field lname-form-field w-full max-w-md">
        <label for="registration-pass2" class="capitalize">Confirm Password</label>
        <div class="input-wrapper bg-ph-white-50 shadow-ph-input rounded-md mt-2
        relative">
          <input
            type="password" name="register_pass2" id="registration-pass2" required
            class="w-full max-w-full bg-transparent outline-none border-2 border-transparent
            focus:border-ph-blue-500 rounded-md py-1 px-2 pr-10 box-border"
          />
          <div
            data-state="hidden"
            data-targetField="registration-pass2"
            class="visibility-toggle absolute top-0 right-0 w-10 h-full flex
            justify-center items-center hover:text-ph-blue-700" 
          >
            <span class="state visible-state"><i class="fa-solid fa-eye"></i></span>
            <span class="state hidden-state"><i class="fa-solid fa-eye-slash"></i></span>
          </div>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="form-field submit-form-field w-full max-w-md mx-auto md:col-span-2">
        <button
          type="submit"
          class="block w-full py-2 px-4 rounded-3xl mx-auto bg-ph-blue-800 
          text-ph-blue-50 hover:bg-ph-blue-700 border-2 border-transparent
          focus:border-ph-blue-100 outline-none shadow-ph-input"
        >
          Sign Up
        </button>
      </div>

      <!-- misc information -->
      <div class="form-field misc-form-field w-full max-w-md mx-auto md:col-span-2">
        <p class="text-center">
          <span>Already have an account? </span>
          <a href="{{ route('login') }}" class="text-ph-blue-700 underline font-semibold">
            Sign In
          </a>
        </p>
      </div>

    </form>

  </div>
</div>
@endsection
