@extends('layouts.app')

@section('title', 'Client Requests')

@section('content')

```
<div class="page-header">

    <div>
        <span class="eyebrow">CLIENT MANAGEMENT</span>

        <h1>Client Requests</h1>

        <p>
            Manage your client requests, priorities, and deadlines.
        </p>
    </div>

    <a href="{{ route('requests.create') }}" class="primary-btn">
        + New Request
    </a>

</div>


@if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif


@if ($requests->isEmpty())

    <div class="empty-state">

        <div class="empty-icon">▣</div>

        <h2>No client requests yet</h2>

        <p>
            Start by adding your first client request.
        </p>

        <a href="{{ route('requests.create') }}" class="secondary-btn">
            Add Client Request
        </a>

    </div>

@else

    <div class="requests-list">

        @foreach ($requests as $request)

            <div class="request-card">

                <div class="request-header">

                    <div>
                        <span class="request-label">CLIENT</span>

                        <h3>{{ $request->client_name }}</h3>

                        <p class="request-service">
                            {{ $request->service }}
                        </p>
                    </div>

                    <span class="priority priority-{{ $request->priority }}">
                        {{ ucfirst($request->priority) }}
                    </span>

                </div>


                <div class="request-description">
                    {{ $request->description }}
                </div>


                <div class="request-meta">

                    <div>
                        <span>STATUS</span>

                        <strong>
                            {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                        </strong>
                    </div>

                    <div>
                        <span>PRIORITY</span>

                        <strong>
                            {{ ucfirst($request->priority) }}
                        </strong>
                    </div>

                    <div>
                        <span>DUE DATE</span>

                        <strong>
                            {{ $request->due_date ?? 'No deadline' }}
                        </strong>
                    </div>

                </div>


                <div class="request-actions">

                    <a href="{{ route('requests.edit', $request) }}"
                       class="btn btn-edit">
                        Edit
                    </a>


                    <form method="POST"
                          action="{{ route('requests.destroy', $request) }}"
                          class="delete-form"
                          onsubmit="return confirm('Are you sure you want to delete this request?');">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-delete">
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        @endforeach

    </div>

@endif
```

@endsection
