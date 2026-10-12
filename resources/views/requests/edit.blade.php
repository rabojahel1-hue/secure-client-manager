@extends('layouts.app')

@section('title', 'Edit Client Request')

@section('content')

```
<div class="page-header">

    <div>
        <span class="eyebrow">CLIENT MANAGEMENT</span>

        <h1>Edit Client Request</h1>

        <p>
            Update the client request information and settings.
        </p>
    </div>

    <a href="{{ route('requests.index') }}" class="outline-btn">
        ← Back to Requests
    </a>

</div>


@if ($errors->any())

    <div class="error-message">

        <strong>Please check the following:</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

@endif


<div class="form-card">

    <form method="POST" action="{{ route('requests.update', $request) }}">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">

                <label for="client_name">
                    Client Name
                </label>

                <input
                    type="text"
                    id="client_name"
                    name="client_name"
                    value="{{ old('client_name', $request->client_name) }}"
                    required
                >

            </div>


            <div class="form-group">

                <label for="service">
                    Service
                </label>

                <input
                    type="text"
                    id="service"
                    name="service"
                    value="{{ old('service', $request->service) }}"
                    required
                >

            </div>


            <div class="form-group full-width">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    required
                >{{ old('description', $request->description) }}</textarea>

            </div>


            <div class="form-group">

                <label for="priority">
                    Priority
                </label>

                <select id="priority" name="priority" required>

                    <option value="low"
                        {{ old('priority', $request->priority) === 'low' ? 'selected' : '' }}>
                        Low
                    </option>

                    <option value="medium"
                        {{ old('priority', $request->priority) === 'medium' ? 'selected' : '' }}>
                        Medium
                    </option>

                    <option value="high"
                        {{ old('priority', $request->priority) === 'high' ? 'selected' : '' }}>
                        High
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select id="status" name="status" required>

                    <option value="new"
                        {{ old('status', $request->status) === 'new' ? 'selected' : '' }}>
                        New
                    </option>

                    <option value="in_progress"
                        {{ old('status', $request->status) === 'in_progress' ? 'selected' : '' }}>
                        In Progress
                    </option>

                    <option value="completed"
                        {{ old('status', $request->status) === 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date', $request->due_date) }}"
                >

            </div>

        </div>


        <div class="form-footer">

            <a href="{{ route('requests.index') }}" class="cancel-btn">
                Cancel
            </a>

            <button type="submit" class="primary-btn">
                Save Changes
            </button>

        </div>

    </form>

</div>
```

@endsection
