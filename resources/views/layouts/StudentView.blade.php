@extends('layouts.base')

@section('title', 'WEB-DEV ACTIVITY')


<div class="container">

  @if ('success')
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('std.create') }}">
                      @csrf
                      <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="exampleFormControlInput1" placeholder="Enter your name">
                        @error('name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" name="age" value="{{ old('age') }}" id="exampleFormControlInput1" placeholder="Enter your age">
                        @error('age')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input type="text" class="form-control" name="gender" value="{{ old('gender') }}" id="exampleFormControlInput1" placeholder="Enter your gender">
                        @error('gender')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="exampleFormControlInput1" placeholder="Enter your address">
                        @error('address')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
