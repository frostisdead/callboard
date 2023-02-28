<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-white-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
    <table class="table table-responsive table-light table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Role</th>
        <th>Username</th>
        <th>Email</th>
        <th>Change data</th>
        <th>Ban/Unban</th>
        <th>Banned Till</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><a href="{{ route('profile.change', $user->id) }}">Change</a></td>
            @if ($user->banned_till == null)
            <td><a href="{{ route('custom.ban', $user->id) }}">Ban</a></td>
            @else
            <td><a href="{{ route('custom.unban', $user->id) }}">Unban</a></td>
            @endif
            <td>{{ $user->banned_till }}</td>
        </tr>
    @endforeach
    <tbody>
    </table>                
    </div>
    </div>

    <div class="py-12 sm:p-8 text-center bg-white dark:bg-grey-800 shadow sm:rounded-lg">
    <button onclick="location.href='{{ route('home') }}'" type="button">Home Page</button>
    </div>
</x-app-layout>

