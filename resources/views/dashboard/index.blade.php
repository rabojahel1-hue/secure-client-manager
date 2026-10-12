@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="page-header">

        <div>
            <span class="eyebrow">SECURE WORKSPACE</span>

            <h1>Good morning, Reem.</h1>

            <p>
                Manage your client requests and keep your work organized.
            </p>
        </div>

        <a href="{{ route('requests.create') }}" class="primary-btn">
            + New Request
        </a>

    </div>


    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-icon">▣</div>

            <div>
                <span class="stat-label">Total Requests</span>
                <strong>{{ $totalRequests }}</strong>
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">◷</div>

            <div>
                <span class="stat-label">In Progress</span>
                <strong>{{ $inProgress }}</strong>
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">✓</div>

            <div>
                <span class="stat-label">Completed</span>
                <strong>{{ $completed }}</strong>
            </div>
        </div>


        <div class="stat-card accent-card">
            <div class="stat-icon">◇</div>

            <div>
                <span class="stat-label">Security Focus</span>
                <strong>Active</strong>
            </div>
        </div>

    </div>


    <div class="dashboard-grid">

        <section class="welcome-card">

            <div class="welcome-icon">
                ◈
            </div>

            <div>
                <span class="eyebrow">SECURE CLIENT MANAGER</span>

                <h2>Stay organized. Work securely.</h2>

                <p>
                    Keep track of client requests, services, priorities,
                    and deadlines from one simple workspace.
                </p>

                <a href="{{ route('requests.index') }}" class="secondary-btn">
                    View Client Requests →
                </a>
            </div>

        </section>


        <section class="quick-card">

            <span class="eyebrow">QUICK ACTION</span>

            <h2>Need to add a client?</h2>

            <p>
                Create a new request and start tracking the work.
            </p>

            <a href="{{ route('requests.create') }}" class="outline-btn">
                Add Client Request
            </a>

        </section>

    </div>

@endsection
