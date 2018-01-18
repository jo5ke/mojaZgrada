@extends('admin.layout.auth')

@section('content')

<div class="container">

        <ul>
        @foreach($building->user as $user)
            <li><a href="{{ route('getEditUserAccount',['eid' => $user->id]) }}">{{ $user->username }} :{{ $user->first_name }} {{ $user->last_name }}</a></li>
        @endforeach
        </ul>

</div>

@endsection