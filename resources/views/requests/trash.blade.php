@extends('layouts.app')

@section('content')

    <div class="container py-4">

        ```
        <div class="trash-header">
            <div>
                <h2>Trash</h2>
                <p>Deleted client requests</p>
            </div>

            <a href="{{ route('requests.index') }}" class="trash-back-btn">
                <span>←</span>
                Back
            </a>
        </div>


        <div class="trash-card">

            @if ($deletedRequests->count())
                <div class="table-responsive">

                    <table class="trash-table">

                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Service</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Deleted At</th>
                                <th class="actions-column">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($deletedRequests as $request)
                                <tr>

                                    <td>
                                        <div class="trash-client">
                                            {{ $request->client_name }}
                                        </div>

                                        <small>
                                            Request #{{ $request->original_id }}
                                        </small>
                                    </td>

                                    <td>
                                        {{ $request->service }}
                                    </td>

                                    <td>
                                        <span class="trash-priority">
                                            {{ ucfirst($request->priority) }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="trash-status">
                                            {{ ucfirst($request->status) }}
                                        </span>
                                    </td>

                                    <td class="deleted-date">
                                        {{ $request->deleted_at?->format('Y-m-d H:i') }}
                                    </td>

                                    <td class="trash-actions">
                                        <form action="{{ route('requests.restore', $request->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf

                                            <button type="submit" class="restore-btn" title="Restore">
                                                ↩
                                            </button>
                                        </form>

                                        <form action="{{ route('requests.forceDelete', $request->id) }}" method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Are you sure you want to permanently delete this request?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="permanent-delete-btn" title="Delete Permanently">
                                                🗑
                                            </button>

                                        </form>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            @else
                <div class="trash-empty">

                    <div class="trash-empty-icon">🗑</div>

                    <h4>Trash is Empty</h4>

                    <p>There are no deleted client requests.</p>

                    <a href="{{ route('requests.index') }}">
                        View Requests
                    </a>

                </div>
            @endif

        </div>
        ```

    </div>

@endsection
