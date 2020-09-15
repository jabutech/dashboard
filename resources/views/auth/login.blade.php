@extends('layouts.app')

@section('content')
<div class="container flex items-center justify-center h-screen antialiased font-sans">
    <div class="w-full max-w-xs">
        <img src="{{ asset('logo-jne.png') }}" alt="">
        <p class="text-center text-2xl items-center justify-center mb-2 font-bold text-shadow text-gray-800">Aplikasi Antrian</p>
        <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
    
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required autofocus autocomplete="username" placeholder="username">
    
                @error('email')
                    <p class="flex items-center justify-between text-red-600">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                    Password
                </label>
                <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" id="password" name="password" required placeholder="**********">

                @error('password')
                    <p class="flex items-center justify-between text-red-600">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="flex items-center justify-between">
                <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-none items-center inline-flex justify-center transition-colors duration-150" type="submit">
                    <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                      </svg>
                    Login
                </button>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2020 Rizky Darmawan build With <span class="text-blue-400">Tailwind</span>
        </p>
    </div>
</div>
@endsection
