<!-- resources/views/auth/register.blade.php -->
@extends('layouts.auth')

@section('title', '新規登録')

@section('heading', '新しいアカウントを作成')

@section('subheading')
    または
    <a href="{{ route('login') }}" class="font-medium text-blue-500 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
        既存のアカウントにサインイン
    </a>
@endsection

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

		<div>
            <label for="name" class="block text-sm font-medium leading-5 text-gray-700">名前</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="name" type="name" name="name" placeholder="名前を入力してください" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
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

        <div class="mt-6">
            <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">パスワード（確認）</label>
            <div class="mt-1 rounded-md shadow-sm">
                <input id="password_confirmation" type="password" name="password_confirmation" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
            </div>
        </div>

        <div class="mt-6">
            <span class="block w-full rounded-md shadow-sm">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    アカウントを作成
                </button>
            </span>
        </div>
    </form>
@endsection

@php
    $show_image = true;
@endphp