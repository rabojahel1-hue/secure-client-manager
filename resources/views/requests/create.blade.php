@extends('layouts.app')

@section('title', 'New Client Request')

@section('content')

```
<div class="page-header">

    <div>
        <span class="eyebrow">CLIENT MANAGEMENT</span>

        <h1>New Client Request</h1>

        <p>
            Add a new client request and define its priority and deadline.
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

    <form method="POST" action="{{ route('requests.store') }}">

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label for="client_name">
                    Client Name
                </label>

                <input
                    type="text"
                    id="client_name"
                    name="client_name"
                    value="{{ old('client_name') }}"
                    placeholder="e.g. Ahmad Ali"
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
                    value="{{ old('service') }}"
                    placeholder="e.g. Website Security"
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
                    placeholder="Describe the requested service..."
                    required
                >{{ old('description') }}</textarea>

            </div>


            <div class="form-group">

                <label for="priority">
                    Priority
                </label>

                <select id="priority" name="priority" required>

                    <option value="low"
                        {{ old('priority') === 'low' ? 'selected' : '' }}>
                        Low
                    </option>

                    <option value="medium"
                        {{ old('priority', 'medium') === 'medium' ? 'selected' : '' }}>
                        Medium
                    </option>

                    <option value="high"
                        {{ old('priority') === 'high' ? 'selected' : '' }}>
                        High
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
                    value="{{ old('due_date') }}"
                >

            </div>

        </div>


        <div class="form-footer">

            <a href="{{ route('requests.index') }}" class="cancel-btn">
                Cancel
            </a>

            <button type="submit" class="primary-btn">
                Create Request
            </button>

        </div>

    </form>

</div>
```

@endsection
