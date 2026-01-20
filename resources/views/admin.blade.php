<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Encabezado -->
                <div class="text-center mb-4">
                    <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-shield-check fs-1"></i>
                    </div>
                    <h2 class="fw-bold text-dark">Panel de Administración</h2>
                    <p class="text-muted">Gestión de usuarios del sistema</p>
                </div>

                <!-- Card Principal -->
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        
                        <!-- Información del Admin -->
                        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                            <div>
                                <h5 class="mb-1">
                                    <i class="bi bi-person-circle me-2"></i>
                                    {{ auth()->user()->name }} {{ auth()->user()->last_name }}
                                </h5>
                                <p class="text-muted mb-0 small">
                                    <i class="bi bi-envelope me-1"></i>{{ auth()->user()->email }}
                                </p>
                            </div>
                            <span class="badge bg-danger fs-6 px-4 py-2">
                                <i class="bi bi-shield-fill-check me-2"></i>
                                {{ strtoupper(auth()->user()->role) }}
                            </span>
                        </div>

                        <!-- Lista de Usuarios -->
                        <div class="mb-4">
                            <h5 class="text-danger mb-3 pb-2 border-bottom">
                                <i class="bi bi-people-fill me-2"></i>Lista de Usuarios Registrados
                            </h5>
                            
                            <div class="alert alert-info border-0 d-flex align-items-center mb-3">
                                <i class="bi bi-info-circle-fill fs-5 me-3"></i>
                                <small>Total de usuarios registrados: <strong>{{ $users->count() }}</strong></small>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-danger">
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col">Nombre Completo</th>
                                            <th scope="col">Correo Electrónico</th>
                                            <th scope="col" class="text-center">Rol</th>
                                            <th scope="col" class="text-center">Fecha de Registro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user) // Muesra los usuarios registrados en caso de que haya
                                        <tr>
                                            <td class="text-center fw-semibold">{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                                                        <i class="bi bi-person-fill"></i>
                                                    </div>
                                                    <div>
                                                        <strong>{{ $user->name }} {{ $user->last_name }}</strong>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="bi bi-envelope me-1 text-muted"></i>
                                                {{ $user->email }}
                                            </td>
                                            <td class="text-center">
                                                <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }} px-3 py-2">
                                                    <i class="bi bi-{{ $user->role === 'admin' ? 'shield-fill-check' : 'person-check' }} me-1"></i>
                                                    {{ strtoupper($user->role) }}
                                                </span>
                                            </td>
                                            <td class="text-center text-muted">
                                                <i class="bi bi-calendar-check me-1"></i>
                                                {{ $user->created_at->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                        @empty // es la condición del else
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                                No hay usuarios registrados
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Botón de Logout -->
                        <form action="{{ route('logout') }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-lg w-100 d-flex align-items-center justify-content-center">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-4">
                    <p class="text-muted small mb-0">
                        <i class="bi bi-lock-fill me-1"></i>
                        Panel de administración protegido
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
