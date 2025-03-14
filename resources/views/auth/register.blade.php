@extends('adminlte::auth.register')
@section('main')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;">
            <div class="card-body">
                <h2 class="text-center mb-4">Crie sua conta</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <div class="input-group">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirme a Senha</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                </form>
                <p class="text-center mt-3">Já tem uma conta? <a href="{{ route('login') }}">Faça login</a></p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            let passwordInput = document.getElementById('password');
            let icon = document.querySelector('.btn-outline-secondary i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    </script>
@endsection