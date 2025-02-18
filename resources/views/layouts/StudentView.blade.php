@extends('layouts.base')

@section('title', 'WEB-DEV ACTIVITY')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>WEB-DEV ACTIVITY</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                      <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <th>{{ $student->name }}</th>
                        <th>{{ $student->age }}</th>
                        <th>{{ $student->gender }}</th>
                        <th>{{ $student->address }}</th>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
