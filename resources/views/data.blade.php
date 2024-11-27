@extends('layout')
@section('title', 'Данные')
@section('content')
    <div class="data-container">
        <h2>Полученные данные</h2>

        @if(count($data) === 0)
            <p>Нет данных для отображения</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
