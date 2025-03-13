@extends('layouts.base')
@section('title', 'Login')

@if(session('success'))
<div class="alert alert-success" id="success">
    {{ Session::get('success') }}
</div>
@endif

@if(session('fail'))
<div class="alert alert-danger" id="fail">
    {{ Session::get('fail') }}
</div>
@endif

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="login-left">
            <div class="verification-content">
                <h2>Be Verified</h2>
                <p>Join experienced Designers on this platform.</p>
            </div>
        </div>
        <div class="login-right">
            <div class="login-form-container">
                <h1>LOGIN</h1>
                <p class="welcome-text">We are happy to have you back.</p>
                
                <form class="login-form" method="POST" action="{{ route('auth.userLogin') }}">
                  @csrf
                    <div class="form-group">
                        <input type="email" class="form-input" id="email" name="email" placeholder="Email address" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class="form-input" id="password" name="password" placeholder="Password" required>
                    </div>
                    
                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" id="remember">
                            <span>Remember Me</span>
                        </label>
                        <a href="#" class="forgot-password">Forgot Password?</a>
                    </div>
                    
                    <button type="submit" class="login-button">Login</button>
                    
                    <p class="signup-text">
                        Don't have account? <a href="#" class="signup-link">Sign Up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background-color: #f5f5f5;
        font-family: 'Poppins', sans-serif;
    }

    .login-card {
        display: flex;
        background: white;
        border-radius: 16px;
        overflow: hidden;
        width: 100%;
        max-width: 800px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .login-left {
        flex: 1;
        background-color: #0052FF;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        text-align: center;
    }

    .verification-content {
        max-width: 220px;
    }

    .verification-content h2 {
        font-family: 'Courier New', monospace;
        font-size: 1.75rem;
        margin: 1rem 0 0.5rem;
    }

    .verification-content p {
        opacity: 0.9;
        font-size: 0.85rem;
        line-height: 1.4;
    }

    .verification-image {
        width: 150px;
        height: auto;
        margin-bottom: 1rem;
    }

    .login-right {
        flex: 1;
        padding: 2rem;
    }

    .login-form-container {
        max-width: 320px;
        margin: 0 auto;
    }

    h1 {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 0.25rem;
        font-weight: 600;
        text-align: center
    }

    p {
      text-align: center;
    }

    .welcome-text {
        color: #666;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #e1e1e1;
        border-radius: 6px;
        font-size: 0.9rem;
        transition: border-color 0.3s;
    }

    .form-input:focus {
        outline: none;
        border-color: #0052FF;
    }

    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        font-size: 0.8rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        color: #666;
    }

    .forgot-password {
        color: #0052FF;
        text-decoration: none;
    }

    .login-button {
        width: 100%;
        padding: 0.75rem;
        background-color: #0052FF;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 0.9rem;
        cursor: pointer;
        margin-bottom: 1rem;
        transition: background-color 0.3s;
    }

    .login-button:hover {
        background-color: #0045d8;
    }

    .google-signin {
        width: 100%;
        padding: 0.75rem;
        background-color: white;
        border: 1px solid #e1e1e1;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        cursor: pointer;
        margin-bottom: 1rem;
        font-size: 0.85rem;
        color: #333;
    }

    .google-signin:hover {
        background-color: #f5f5f5;
    }

    .google-icon {
        width: 16px;
        height: 16px;
    }

    .signup-text {
        text-align: center;
        color: #666;
        font-size: 0.8rem;
    }

    .signup-link {
        color: #0052FF;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .login-card {
            flex-direction: column;
            max-width: 400px;
        }

        .login-left {
            padding: 1.5rem;
        }

        .login-right {
            padding: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .login-container {
            padding: 0.5rem;
        }

        .login-card {
            border-radius: 12px;
        }

        .login-left, .login-right {
            padding: 1.25rem;
        }
    }
</style>
@endsection

