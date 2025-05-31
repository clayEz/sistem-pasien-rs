<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Pasien Baru | Klinik Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --light-bg: #f8f9fa;
            --dark-text: #212529;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-text);
        }
        
        .form-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 8px 8px 0 0;
            padding: 20px;
            margin-bottom: 0;
        }
        
        .form-container {
            background-color: white;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        
        .required-field::after {
            content: " *";
            color: #dc3545;
        }
        
        .form-control, .form-select {
            padding: 10px 15px;
            border-radius: 6px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(76, 201, 240, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .btn-outline-secondary {
            padding: 10px 25px;
            border-radius: 6px;
            font-weight: 500;
        }
        
        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 8px;
            margin-bottom: 20px;
            font-size: 1.1rem;
        }
        
        .floating-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: none;
        }
        
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }
            
            .btn-responsive {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Floating Alert (for success/error messages) -->
        <div id="floatingAlert" class="floating-alert alert alert-dismissible fade show" role="alert">
            <span id="alertMessage"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0"><i class="bi bi-person-plus me-2"></i> Pendaftaran Pasien Baru</h1>
                <p class="text-muted mb-0">Isi formulir berikut untuk mendaftarkan pasien baru</p>
            </div>
            <a href="/daftar-pasien" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="form-header">
            <h2 class="h4 mb-0"><i class="bi bi-clipboard2-pulse me-2"></i> Formulir Pendaftaran</h2>
        </div>
        
        <div class="form-container">
            <form id="patientForm" method="POST" action="#">
                @csrf

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i> Terjadi Kesalahan</h5>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Section 1: Data Utama -->
                <h5 class="section-title"><i class="bi bi-person-vcard me-2"></i> Data Utama Pasien</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="no_rm" class="form-label required-field">Nomor Rekam Medis</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-file-earmark-medical"></i></span>
                                <input type="text" class="form-control @error('no_rm') is-invalid @enderror" 
                                       id="no_rm" name="no_rm" value="{{ old('no_rm') }}" placeholder="RM-123456" required>
                            </div>
                            @error('no_rm')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label required-field">Nama Lengkap Pasien</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" 
                                       id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien') }}" placeholder="Nama lengkap" required>
                            </div>
                            @error('nama_pasien')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label required-field">Jenis Kelamin</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            @error('gender')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                          id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap pasien">{{ old('alamat') }}</textarea>
                            </div>
                            @error('alamat')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_telp" class="form-label">Nomor Telepon/HP</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="tel" class="form-control @error('no_telp') is-invalid @enderror" 
                                       id="no_telp" name="no_telp" value="{{ old('no_telp') }}" placeholder="08123456789">
                            </div>
                            @error('no_telp')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 2: Data Kelahiran -->
                <h5 class="section-title mt-4"><i class="bi bi-calendar-event me-2"></i> Data Kelahiran</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                       id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Kota tempat lahir">
                            </div>
                            @error('tempat_lahir')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" 
                                       id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                            </div>
                            @error('tgl_lahir')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 3: Kontak Darurat -->
                <h5 class="section-title mt-4"><i class="bi bi-person-lines-fill me-2"></i> Kontak Darurat</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_person" class="form-label">Nama Kontak Darurat</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror" 
                                       id="contact_person" name="contact_person" value="{{ old('contact_person') }}" placeholder="Nama kontak darurat">
                            </div>
                            @error('contact_person')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status_cp" class="form-label">Hubungan dengan Pasien</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-people"></i></span>
                                <select class="form-select @error('status_cp') is-invalid @enderror" 
                                        id="status_cp" name="status_cp">
                                    <option value="">Pilih Hubungan</option>
                                    <option value="Orang Tua" {{ old('status_cp') == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                                    <option value="Suami/Istri" {{ old('status_cp') == 'Suami/Istri' ? 'selected' : '' }}>Suami/Istri</option>
                                    <option value="Anak" {{ old('status_cp') == 'Anak' ? 'selected' : '' }}>Anak</option>
                                    <option value="Saudara" {{ old('status_cp') == 'Saudara' ? 'selected' : '' }}>Saudara</option>
                                    <option value="Lainnya" {{ old('status_cp') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            @error('status_cp')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center border-top pt-4 mt-4">
                    <div class="mb-3 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="confirmData" required>
                            <label class="form-check-label" for="confirmData">
                                Saya menyatakan data yang diisi adalah benar
                            </label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="reset" class="btn btn-outline-secondary btn-responsive">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-primary btn-responsive">
                            <i class="bi bi-save me-1"></i> Simpan Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Enhanced form validation
        document.getElementById('patientForm').addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = ['no_rm', 'nama_pasien', 'gender'];
            
            // Check required fields
            requiredFields.forEach(field => {
                const element = document.getElementById(field);
                if (!element.value.trim()) {
                    element.classList.add('is-invalid');
                    isValid = false;
                    
                    if (!element.nextElementSibling || !element.nextElementSibling.classList.contains('invalid-feedback')) {
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'invalid-feedback';
                        errorDiv.textContent = 'Field ini wajib diisi';
                        element.parentNode.parentNode.appendChild(errorDiv);
                    }
                }
            });
            
            // Check confirmation checkbox
            if (!document.getElementById('confirmData').checked) {
                document.getElementById('confirmData').classList.add('is-invalid');
                isValid = false;
                
                const checkError = document.createElement('div');
                checkError.className = 'invalid-feedback d-block';
                checkError.textContent = 'Anda harus menyetujui pernyataan ini';
                document.getElementById('confirmData').parentNode.appendChild(checkError);
            }
            
            if (!isValid) {
                e.preventDefault();
                
                // Show floating alert
                const alert = document.getElementById('floatingAlert');
                const alertMessage = document.getElementById('alertMessage');
                
                alert.classList.remove('alert-success');
                alert.classList.add('alert-danger');
                alertMessage.innerHTML = '<i class="bi bi-exclamation-triangle-fill me-2"></i> Mohon lengkapi data yang wajib diisi';
                alert.style.display = 'block';
                
                // Auto hide after 5 seconds
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 5000);
                
                // Scroll to first error
                const firstError = document.querySelector('.is-invalid');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });
        
        // Real-time validation for required fields
        document.querySelectorAll('input[required], select[required]').forEach(element => {
            element.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('is-invalid');
                    const errorDiv = this.parentNode.parentNode.querySelector('.invalid-feedback');
                    if (errorDiv) errorDiv.remove();
                }
            });
        });
        
        // Confirmation checkbox validation
        document.getElementById('confirmData').addEventListener('change', function() {
            if (this.checked) {
                this.classList.remove('is-invalid');
                const errorDiv = this.parentNode.querySelector('.invalid-feedback');
                if (errorDiv) errorDiv.remove();
            }
        });
        
        // Phone number validation
        document.getElementById('no_telp').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>
</html>