@extends('layouts.app')
@section('content')
    <main class="flex-1 container mx-auto my-8 min-h-screen">
        <h2 class="text-2xl font-semibold mb-4">Daftar Kursus</h2>

        @include('home.list-kursus')
    </main>
@endsection
