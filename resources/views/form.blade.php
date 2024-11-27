@extends('layout')
@section('title', 'Форма')
@section('content')
    <div class="form-container">
        <h2>Введите ваши данные</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('form.submit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="alert alert-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="alert alert-error">{{ $message }}</div>
                @enderror</div>
            <button type="submit" class="btn-submit">Отправить</button>
        </form>
    </div>
@endsection
