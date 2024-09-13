<!-- resources/views/auth/login.blade.php -->
@extends('layouts.auth')

@section('title', 'ログイン')

@section('heading', 'アカウントにログイン')

@section('subheading')
    または
    <a href="{{ route('register') }}" class="font-medium text-blue-500 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
        新しいアカウントを作成
    </a>
@endsection

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">メールアドレス</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="email" type="email" name="email" placeholder="user@example.com" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label for="password" class="block text-sm font-medium leading-5 text-gray-700">パスワード</label>
            <div class="mt-1 rounded-md shadow-sm">
                <input id="password" type="password" name="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900">ログイン情報を記憶</label>
            </div>
            <div class="text-sm leading-5">
                <a href="{{ route('password.request') }}" class="font-medium text-blue-500 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    パスワードを忘れた場合
                </a>
            </div>
        </div>

        <div class="mt-6">
            <span class="block w-full rounded-md shadow-sm">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    サインイン
                </button>
            </span>
        </div>
    </form>
@endsection

@php
    $show_image = true;
@endphp