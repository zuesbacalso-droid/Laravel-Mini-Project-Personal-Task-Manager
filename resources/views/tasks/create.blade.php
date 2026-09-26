@extends('layouts.app')

@section('title', 'Add Task | TaskFlow')

@section('content')

<div class="form-header">

    <div>
        <span class="section-label">TASK MANAGEMENT</span>
        <h1>Create New Task</h1>
        <p>Add a new task to your personal workspace.</p>
    </div>

</div>


<div class="form-card">

    <div class="form-top">
        <div class="form-icon">
            +
        </div>

        <div>
            <h2>New Task</h2>
            <p>Enter the details for your task below.</p>
        </div>
    </div>


    @if($errors->any())

        <div class="error-box">

            <strong>Please fix the following:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <form action="{{ route('tasks.store', [], false) }}" method="POST">

        @csrf

        <div class="form-group">

            <label for="task_name">
                Task Name
            </label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                value="{{ old('task_name') }}"
                placeholder="e.g. Finish Laravel project"
                required>

        </div>


        <div class="form-group">

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                rows="5"
                placeholder="Describe what needs to be done...">{{ old('description') }}</textarea>

        </div>


        <div class="form-row">

            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select id="status" name="status" required>

                    <option value="Pending"
                        {{ old('status', 'Pending') === 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ old('status') === 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>

            </div>


            <div class="form-group date-group">
    <label for="due_date">
        Due Date
    </label>

    <input
        type="date"
        id="due_date"
        name="due_date"
        value="{{ old('due_date') }}">

    <span class="date-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <rect x="3" y="4" width="18" height="17" rx="2"
                  stroke="white" stroke-width="2"/>
            <line x1="16" y1="2" x2="16" y2="6"
                  stroke="white" stroke-width="2"/>
            <line x1="8" y1="2" x2="8" y2="6"
                  stroke="white" stroke-width="2"/>
            <line x1="3" y1="10" x2="21" y2="10"
                  stroke="white" stroke-width="2"/>
        </svg>
    </span>
</div>


        <div class="form-actions">

            <a
                href="{{ route('tasks.index', [], false) }}"
                class="cancel-btn">
                Cancel
            </a>

            <button type="submit" class="create-btn">
                Create Task
            </button>

        </div>

    </form>

</div>


<style>

    .form-header {
        margin-bottom: 30px;
    }

    .section-label {
        color: #008cff;
        font-size: 11px;
        font-weight: bold;
        letter-spacing: 3px;
    }

    .form-header h1 {
        margin-top: 8px;
        margin-bottom: 6px;
        font-size: 36px;
    }

    .form-header p {
        color: #7f8b9b;
    }


    .form-card {
        max-width: 850px;
        margin: 0 auto;

        padding: 35px;

        background:
            radial-gradient(
                circle at top right,
                rgba(0, 120, 255, 0.07),
                transparent 35%
            ),
            rgba(10, 15, 22, 0.9);

        border: 1px solid rgba(0, 140, 255, 0.2);

        border-radius: 16px;

        box-shadow:
            0 15px 45px rgba(0, 0, 0, 0.45),
            inset 0 0 40px rgba(0, 120, 255, 0.025);
    }


    .form-top {
        display: flex;
        align-items: center;
        gap: 16px;

        padding-bottom: 25px;
        margin-bottom: 25px;

        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }


    .form-icon {
        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        color: #008cff;
        font-size: 28px;

        background: rgba(0, 120, 255, 0.1);

        border: 1px solid rgba(0, 140, 255, 0.25);

        box-shadow:
            0 0 20px rgba(0, 120, 255, 0.12);
    }


    .form-top h2 {
        font-size: 20px;
        margin-bottom: 4px;
    }

    .form-top p {
        color: #697687;
        font-size: 13px;
    }


    .form-group {
        margin-bottom: 22px;
    }


    .form-group label {
        display: block;

        margin-bottom: 9px;

        color: #cbd5e1;

        font-size: 13px;
        font-weight: 600;
    }


    .form-group input,
    .form-group textarea,
    .form-group select {

        width: 100%;

        padding: 13px 15px;

        color: #ffffff;

        background: #070c12;

        border: 1px solid #263445;

        border-radius: 8px;

        outline: none;

        font-family: inherit;
        font-size: 14px;

        transition: 0.25s ease;
    }
.date-group {
    position: relative;
}

.date-icon {
    position: absolute;
    right: 15px;
    bottom: 13px;
    display: flex;
    align-items: center;
    pointer-events: none;
}

.date-group input[type="date"]::-webkit-calendar-picker-indicator {
    opacity: 0;
    cursor: pointer;
}

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #4f5c6c;
    }


    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {

        border-color: #008cff;

        box-shadow:
            0 0 0 2px rgba(0, 140, 255, 0.06),
            0 0 22px rgba(0, 140, 255, 0.12);
    }


    .form-group textarea {
        resize: vertical;
        min-height: 130px;
    }


    .form-group select {
        cursor: pointer;
    }


    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }


    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;

        padding-top: 10px;
        margin-top: 10px;

        border-top: 1px solid rgba(255, 255, 255, 0.06);
    }


    .cancel-btn,
    .create-btn {

        padding: 12px 20px;

        border-radius: 8px;

        font-size: 14px;
        font-weight: 600;

        text-decoration: none;

        cursor: pointer;

        transition: 0.25s ease;
    }


    .cancel-btn {

        color: #aeb9c8;

        background: #111821;

        border: 1px solid #263344;
    }


    .cancel-btn:hover {

        color: white;

        border-color: #3b4b60;

        background: #151e29;
    }


    .create-btn {

        color: white;

        background: #0078ff;

        border: 1px solid #008cff;

        box-shadow:
            0 0 18px rgba(0, 120, 255, 0.25);
    }


    .create-btn:hover {

        background: #008cff;

        transform: translateY(-2px);

        box-shadow:
            0 0 28px rgba(0, 140, 255, 0.5);
    }


    .error-box {

        margin-bottom: 25px;
        padding: 15px 18px;

        color: #ff9b9b;

        background: rgba(255, 50, 50, 0.07);

        border: 1px solid rgba(255, 70, 70, 0.25);

        border-radius: 8px;

        font-size: 13px;
    }


    .error-box strong {
        display: block;
        margin-bottom: 8px;
    }


    .error-box ul {
        padding-left: 20px;
    }


    .error-box li {
        margin-bottom: 4px;
    }


    @media (max-width: 700px) {

        .form-card {
            padding: 25px 20px;
        }

        .form-header h1 {
            font-size: 29px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .cancel-btn,
        .create-btn {
            text-align: center;
            width: 100%;
        }

    }

</style>

@endsection