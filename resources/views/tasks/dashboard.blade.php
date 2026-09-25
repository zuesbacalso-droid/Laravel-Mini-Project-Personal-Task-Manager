@extends('layouts.app')

@section('title', 'Dashboard | TaskFlow')

@section('content')

<div class="page-title">
    <h1>Dashboard</h1>
    <p>Overview of your personal tasks and productivity.</p>
</div>

<div class="dashboard-grid">

    <div class="stat-card">
        <div class="stat-icon">◈</div>
        <div>
            <p>Total Tasks</p>
            <h2>{{ $totalTasks }}</h2>
        </div>
    </div>

    <div class="stat-card pending">
        <div class="stat-icon">◷</div>
        <div>
            <p>Pending Tasks</p>
            <h2>{{ $pendingTasks }}</h2>
        </div>
    </div>

    <div class="stat-card completed">
        <div class="stat-icon">✓</div>
        <div>
            <p>Completed Tasks</p>
            <h2>{{ $completedTasks }}</h2>
        </div>
    </div>

</div>

<div class="dashboard-panel">

    <div>
        <span class="panel-label">TASKFLOW SYSTEM</span>

        <h2>Stay organized.<br>
            <span>Stay productive.</span>
        </h2>

        <p>
            Manage your daily tasks, track progress,
            and keep everything organized in one place.
        </p>
    </div>

    <a href="{{ route('tasks.create', [], false) }}" class="dashboard-btn">
        + Create New Task
    </a>

</div>

<style>

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;

        display: flex;
        align-items: center;
        gap: 18px;

        padding: 25px;

        background: linear-gradient(
            145deg,
            rgba(15, 23, 35, 0.95),
            rgba(7, 11, 17, 0.95)
        );

        border: 1px solid rgba(0, 140, 255, 0.25);
        border-radius: 14px;

        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.35),
            0 0 25px rgba(0, 120, 255, 0.04);

        transition: 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-4px);

        border-color: rgba(0, 140, 255, 0.6);

        box-shadow:
            0 15px 35px rgba(0, 0, 0, 0.4),
            0 0 30px rgba(0, 120, 255, 0.12);
    }

    .stat-icon {
        width: 55px;
        height: 55px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: rgba(0, 120, 255, 0.12);
        border: 1px solid rgba(0, 140, 255, 0.25);

        color: #008cff;
        font-size: 25px;

        box-shadow: 0 0 20px rgba(0, 120, 255, 0.12);
    }

    .stat-card p {
        color: #7f8b9b;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .stat-card h2 {
        font-size: 32px;
        color: #ffffff;
    }

    .stat-card.pending {
        border-color: rgba(255, 180, 50, 0.2);
    }

    .stat-card.pending .stat-icon {
        color: #ffb632;
        background: rgba(255, 180, 50, 0.08);
        border-color: rgba(255, 180, 50, 0.2);
        box-shadow: 0 0 20px rgba(255, 180, 50, 0.08);
    }

    .stat-card.completed {
        border-color: rgba(0, 220, 140, 0.2);
    }

    .stat-card.completed .stat-icon {
        color: #00dc8c;
        background: rgba(0, 220, 140, 0.08);
        border-color: rgba(0, 220, 140, 0.2);
        box-shadow: 0 0 20px rgba(0, 220, 140, 0.08);
    }

    .dashboard-panel {
        min-height: 260px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;

        padding: 40px;

        background:
            radial-gradient(
                circle at 80% 50%,
                rgba(0, 120, 255, 0.14),
                transparent 40%
            ),
            linear-gradient(
                135deg,
                rgba(12, 19, 30, 0.95),
                rgba(5, 8, 13, 0.98)
            );

        border: 1px solid rgba(0, 140, 255, 0.2);
        border-radius: 16px;

        box-shadow:
            0 15px 40px rgba(0, 0, 0, 0.4),
            inset 0 0 40px rgba(0, 120, 255, 0.03);
    }

    .panel-label {
        display: inline-block;

        margin-bottom: 15px;

        color: #008cff;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 3px;
    }

    .dashboard-panel h2 {
        font-size: 32px;
        line-height: 1.25;
        margin-bottom: 15px;
    }

    .dashboard-panel h2 span {
        color: #008cff;
        text-shadow: 0 0 18px rgba(0, 140, 255, 0.35);
    }

    .dashboard-panel p {
        max-width: 560px;
        color: #7f8b9b;
        line-height: 1.7;
    }

    .dashboard-btn {
        flex-shrink: 0;

        padding: 14px 22px;

        background: #0078ff;
        color: white;

        text-decoration: none;
        font-weight: bold;

        border-radius: 9px;

        box-shadow:
            0 0 20px rgba(0, 120, 255, 0.3);

        transition: 0.25s ease;
    }

    .dashboard-btn:hover {
        background: #008cff;

        transform: translateY(-2px);

        box-shadow:
            0 0 30px rgba(0, 140, 255, 0.55);
    }

    @media (max-width: 800px) {

        .dashboard-grid {
            grid-template-columns: 1fr;
        }

        .dashboard-panel {
            flex-direction: column;
            align-items: flex-start;
        }

    }

</style>

@endsection