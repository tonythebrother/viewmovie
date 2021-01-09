@extends('layouts.app')

@section('content')
    <div class="cont">
        @if(auth()->user()->admin_flag == '1')

        <main-component></main-component>

        @else

        <users-component></users-component>

        @endif
    </div>
@endsection
