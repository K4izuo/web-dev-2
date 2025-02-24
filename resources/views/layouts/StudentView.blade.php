@extends('layouts.base')

@section('title', 'WEB-DEV ACTIVITY')

@section('content')
    <div class="container py-5">
        <!-- Success Alert -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" id="successAlert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <strong>Success!</strong>&nbsp;{{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="display-6 mb-1">Student Management</h1>
                <p class="text-muted mb-0">Manage your students' information</p>
            </div>
            <button type="button" class="btn btn-primary d-flex align-items-center gap-2 px-3 py-2" data-bs-toggle="modal"
                data-bs-target="#addStudentModal">
                <i class="bi bi-plus-circle"></i>
                Add New Student
            </button>
        </div>

        <!-- Table Card -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="custom-scrollbar">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="sticky-header">
                            <tr>
                                <th class="table-cell-align">ID</th>
                                <th class="table-cell-align">Name</th>
                                <th class="table-cell-align">Age</th>
                                <th class="table-cell-align">Gender</th>
                                <th class="table-cell-align">Address</th>
                                <th class="table-cell-align actions-cell text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td class="table-cell-align">{{ $student->id }}</td>
                                    <td class="table-cell-align">{{ $student->name }}</td>
                                    <td class="table-cell-align">{{ $student->age }}</td>
                                    <td class="table-cell-align">{{ $student->gender }}</td>
                                    <td class="table-cell-align">{{ $student->address }}</td>
                                    <td class="actions-cell">
                                        <div class="action-buttons">
                                            <button type="button" class="action-button btn btn-sm btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#editModal{{ $student->id }}"
                                                title="Edit Student">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button type="button" class="action-button btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $student->id }}"
                                                title="Delete Student">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                        No students found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Student Modal -->
        <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-header border-bottom-0 bg-light">
                        <h5 class="modal-title" id="addStudentModalLabel">
                            <i class="bi bi-person-plus me-2"></i>Add New Student
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 py-4">
                        <form method="post" action="{{ route('std.create') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" id="nameInput"
                                            placeholder="Enter name" required>
                                        <label for="nameInput">Full Name</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control @error('age') is-invalid @enderror"
                                            name="age" value="{{ old('age') }}" id="ageInput"
                                            placeholder="Enter age" required>
                                        <label for="ageInput">Age</label>
                                        @error('age')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('gender') is-invalid @enderror" name="gender"
                                            id="genderInput" required>
                                            <option value="" selected disabled>Select gender</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                        <label for="genderInput">Gender</label>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="addressInput"
                                            style="height: 100px" placeholder="Enter address" required>{{ old('address') }}</textarea>
                                        <label for="addressInput">Complete Address</label>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save me-2"></i>Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modals -->
        @foreach ($students as $student)
            <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0">
                        <div class="modal-header border-bottom-0 bg-light">
                            <h5 class="modal-title">
                                <i class="bi bi-pencil-square me-2"></i>Edit Student
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-4 py-4">
                            <form action="{{ route('std.update', $student->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name', $student->name) }}"
                                                id="editNameInput{{ $student->id }}" placeholder="Enter name" required>
                                            <label for="editNameInput{{ $student->id }}">Full Name</label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control @error('age') is-invalid @enderror"
                                                name="age" value="{{ old('age', $student->age) }}"
                                                id="editAgeInput{{ $student->id }}" placeholder="Enter age" required>
                                            <label for="editAgeInput{{ $student->id }}">Age</label>
                                            @error('age')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select @error('gender') is-invalid @enderror"
                                                name="gender" id="editGenderInput{{ $student->id }}" required>
                                                <option value="" disabled>Select gender</option>
                                                <option value="Male"
                                                    {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="Female"
                                                    {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                            <label for="editGenderInput{{ $student->id }}">Gender</label>
                                            @error('gender')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                                                id="editAddressInput{{ $student->id }}" style="height: 100px" placeholder="Enter address" required>{{ old('address', $student->address) }}</textarea>
                                            <label for="editAddressInput{{ $student->id }}">Complete Address</label>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2 mt-4">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-save me-2"></i>Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content border-0">
                        <div class="modal-header border-bottom-0 bg-danger text-white">
                            <h5 class="modal-title">
                                <i class="bi bi-exclamation-triangle me-2"></i>Delete Student
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center py-4">
                            <i class="bi bi-trash text-danger fs-1 mb-3"></i>
                            <p class="mb-0">Are you sure you want to delete this student?</p>
                            <p class="small text-muted mb-0">This action cannot be undone.</p>
                        </div>
                        <div class="modal-footer border-top-0">
                            <form action="{{ route('std.delete', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger px-4">
                                        <i class="bi bi-trash me-2"></i>Delete
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @push('scripts')
        <script>
            // Form validation
            (() => {
                'use strict'
                const forms = document.querySelectorAll('.needs-validation')
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            })()

            // Auto-dismiss alert
            document.addEventListener('DOMContentLoaded', function() {
                const alert = document.getElementById('successAlert');
                if (alert) {
                    setTimeout(() => {
                        alert.classList.add('fade-out');
                        setTimeout(() => {
                            alert.remove();
                        }, 500); // Wait for animation to complete
                    }, 5000); // 5 seconds delay
                }
            });
        </script>
    @endpush

@endsection
