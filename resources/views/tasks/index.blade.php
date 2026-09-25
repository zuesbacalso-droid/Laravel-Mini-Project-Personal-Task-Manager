@extends('layouts.app')

@section('title', 'My Tasks | TaskFlow')

@section('content')

<div class="page-header">

    <div>
        <span class="section-label">TASK MANAGEMENT</span>
        <h1>My Tasks</h1>
        <p>Manage and track your personal tasks.</p>
    </div>

    <a href="{{ route('tasks.create', [], false) }}" class="new-task-btn">
        + New Task
    </a>

</div>

@if(session('success'))
    <div class="success-message">
        <span>✓</span>
        {{ session('success') }}
    </div>
@endif


@if($tasks->count())

    <div class="task-list">

        @foreach($tasks as $task)

            <div class="task-card">

                <div class="task-main">

                    <div class="task-status
                        {{ $task->status === 'Completed' ? 'completed' : 'pending' }}">
                    </div>

                    <div class="task-info">

                        <h3>{{ $task->task_name }}</h3>

                        @if($task->description)
                            <p>{{ $task->description }}</p>
                        @else
                            <p class="no-description">
                                No description provided.
                            </p>
                        @endif

                        <div class="task-meta">

                            <span>
                                ◷
                                {{ $task->due_date ?? 'No due date' }}
                            </span>

                            <span class="status-badge
                                {{ $task->status === 'Completed' ? 'badge-completed' : 'badge-pending' }}">
                                {{ $task->status }}
                            </span>

                        </div>

                    </div>

                </div>


                <div class="task-actions">

                    <a
                        href="{{ route('tasks.edit', $task, false) }}"
                        class="action edit">
                        Edit
                    </a>


                    <form
                        action="{{ route('tasks.status', $task, false) }}"
                        method="POST">

                        @csrf
                        @method('PATCH')

                        <button type="submit" class="action status">

                            {{ $task->status === 'Pending'
                                ? 'Complete'
                                : 'Set Pending' }}

                        </button>

                    </form>


                    <form
                        action="{{ route('tasks.destroy', $task, false) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this task?');">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="action delete">
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        @endforeach

    </div>

@else

    <div class="empty-state">

        <div class="empty-icon">
            +
        </div>

        <h2>No Tasks Yet</h2>

        <p>
            Your task list is empty. Create your first task
            to get started.
        </p>

        <a
            href="{{ route('tasks.create', [], false) }}"
            class="new-task-btn">

            + Create Your First Task

        </a>

    </div>

@endif


<style>

    .page-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 30px;
    }

    .section-label {
        color: #008cff;
        font-size: 11px;
        font-weight: bold;
        letter-spacing: 3px;
    }

    .page-header h1 {
        margin-top: 8px;
        margin-bottom: 6px;
        font-size: 36px;
    }

    .page-header p {
        color: #7f8b9b;
    }


    .new-task-btn {
        display: inline-block;

        padding: 12px 19px;

        color: white;
        background: #0078ff;

        border-radius: 8px;

        text-decoration: none;
        font-weight: bold;

        box-shadow:
            0 0 18px rgba(0, 120, 255, 0.25);

        transition: 0.25s ease;
    }

    .new-task-btn:hover {
        background: #008cff;

        transform: translateY(-2px);

        box-shadow:
            0 0 28px rgba(0, 140, 255, 0.5);
    }


    .success-message {
        display: flex;
        align-items: center;
        gap: 10px;

        margin-bottom: 20px;
        padding: 14px 18px;

        color: #8fffc1;

        background: rgba(0, 220, 140, 0.07);

        border: 1px solid rgba(0, 220, 140, 0.25);

        border-radius: 9px;
    }

    .success-message span {
        font-size: 18px;
    }


    .task-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }


    .task-card {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 25px;

        padding: 22px 24px;

        background:
            linear-gradient(
                145deg,
                rgba(14, 21, 31, 0.95),
                rgba(7, 11, 17, 0.98)
            );

        border: 1px solid rgba(0, 140, 255, 0.16);

        border-radius: 12px;

        transition: 0.3s ease;
    }

    .task-card:hover {
        border-color: rgba(0, 140, 255, 0.45);

        transform: translateX(3px);

        box-shadow:
            0 8px 30px rgba(0, 0, 0, 0.35),
            0 0 25px rgba(0, 120, 255, 0.07);
    }


    .task-main {
        display: flex;
        align-items: flex-start;
        gap: 16px;

        min-width: 0;
    }


    .task-status {
        width: 10px;
        height: 10px;

        margin-top: 7px;

        border-radius: 50%;

        flex-shrink: 0;
    }

    .task-status.pending {
        background: #ffb632;

        box-shadow:
            0 0 10px rgba(255, 182, 50, 0.8);
    }

    .task-status.completed {
        background: #00dc8c;

        box-shadow:
            0 0 10px rgba(0, 220, 140, 0.8);
    }


    .task-info h3 {
        font-size: 18px;
        margin-bottom: 6px;
    }

    .task-info p {
        color: #8793a3;
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 12px;
    }

    .task-info .no-description {
        color: #555f6d;
        font-style: italic;
    }


    .task-meta {
        display: flex;
        align-items: center;
        gap: 12px;

        color: #6f7b8b;
        font-size: 12px;
    }


    .status-badge {
        padding: 4px 9px;

        border-radius: 5px;

        font-size: 11px;
        font-weight: bold;
    }

    .badge-pending {
        color: #ffca62;

        background: rgba(255, 182, 50, 0.09);

        border: 1px solid rgba(255, 182, 50, 0.2);
    }

    .badge-completed {
        color: #66edb4;

        background: rgba(0, 220, 140, 0.08);

        border: 1px solid rgba(0, 220, 140, 0.2);
    }


    .task-actions {
        display: flex;
        align-items: center;
        gap: 7px;

        flex-shrink: 0;
    }

    .task-actions form {
        margin: 0;
    }

    .action {
        display: inline-block;

        padding: 8px 11px;

        border-radius: 6px;

        background: transparent;

        font-size: 12px;
        font-weight: 600;

        cursor: pointer;

        text-decoration: none;

        transition: 0.2s ease;
    }


    .action.edit {
        color: #7ebdff;

        border: 1px solid rgba(0, 140, 255, 0.25);
    }

    .action.edit:hover {
        color: white;
        background: rgba(0, 140, 255, 0.12);
        border-color: #008cff;
    }


    .action.status {
        color: #75e8b4;

        border: 1px solid rgba(0, 220, 140, 0.2);
    }

    .action.status:hover {
        background: rgba(0, 220, 140, 0.1);
        border-color: #00dc8c;
    }


    .action.delete {
        color: #ff8585;

        border: 1px solid rgba(255, 70, 70, 0.2);
    }

    .action.delete:hover {
        background: rgba(255, 70, 70, 0.1);
        border-color: #ff5555;
    }


    .empty-state {
        text-align: center;

        padding: 80px 30px;

        background: rgba(10, 15, 22, 0.7);

        border: 1px dashed rgba(0, 140, 255, 0.25);

        border-radius: 14px;
    }

    .empty-icon {
        width: 60px;
        height: 60px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto 20px;

        border-radius: 50%;

        color: #008cff;
        font-size: 30px;

        background: rgba(0, 120, 255, 0.08);

        box-shadow:
            0 0 25px rgba(0, 120, 255, 0.12);
    }

    .empty-state h2 {
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #7f8b9b;
        margin-bottom: 25px;
    }


    @media (max-width: 800px) {

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .task-card {
            align-items: flex-start;
            flex-direction: column;
        }

        .task-actions {
            width: 100%;
            flex-wrap: wrap;
        }

    }

</style>

@endsection