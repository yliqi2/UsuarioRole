<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <!-- Encabezado -->
                <div class="text-center mb-4">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-person-circle fs-1"></i>
                    </div>
                    <h2 class="fw-bold text-dark">Mi Perfil</h2>
                    <p class="text-muted">Información de tu cuenta</p>
                </div>

                <!-- Card Principal -->
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        
                        <!-- Información Personal -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3 pb-2 border-bottom">
                                <i class="bi bi-person-vcard me-2"></i>Información Personal
                            </h5>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-semibold mb-1">
                                        <i class="bi bi-person me-1"></i>Nombre
                                    </label>
                                    <input type="text" class="form-control form-control-lg bg-light border-0" 
                                           value="{{ auth()->user()->name }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-semibold mb-1">
                                        <i class="bi bi-person-badge me-1"></i>Apellido
                                    </label>
                                    <input type="text" class="form-control form-control-lg bg-light border-0" 
                                           value="{{ auth()->user()->last_name }}" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Información de Contacto -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3 pb-2 border-bottom">
                                <i class="bi bi-envelope me-2"></i>Información de Contacto
                            </h5>
                            
                            <label class="form-label text-muted small fw-semibold mb-1">
                                <i class="bi bi-envelope-at me-1"></i>Correo Electrónico
                            </label>
                            <input type="email" class="form-control form-control-lg bg-light border-0" 
                                   value="{{ auth()->user()->email }}" readonly>
                        </div>

                        <!-- Información de Cuenta -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3 pb-2 border-bottom">
                                <i class="bi bi-shield-check me-2"></i>Información de Cuenta
                            </h5>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-semibold mb-2">
                                        <i class="bi bi-award me-1"></i>Rol del Usuario
                                    </label>
                                    <div>
                                        <span class="badge bg-primary fs-6 px-4 py-2">
                                            <i class="bi bi-person-check me-2"></i>
                                            {{ strtoupper(auth()->user()->role) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-semibold mb-1">
                                        <i class="bi bi-calendar-check me-1"></i>Miembro desde
                                    </label>
                                    <input type="text" class="form-control form-control-lg bg-light border-0" 
                                           value="{{ auth()->user()->created_at->format('d/m/Y') }}" readonly>
                                </div>
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
                        Tu información está protegida y segura
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
