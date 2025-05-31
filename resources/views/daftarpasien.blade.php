<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --warning-color: #f8961e;
            --danger-color: #f72585;
            --border-radius: 12px;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fb;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .dashboard-container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 15px;
        }
        
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem;
            border-bottom: none;
        }
        
        .card-title {
            font-weight: 600;
            font-size: 1.5rem;
            margin: 0;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(63, 55, 201, 0.3);
        }
        
        .search-box {
            position: relative;
            max-width: 350px;
        }
        
        .search-box input {
            padding-left: 2.5rem;
            border-radius: 50px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .search-box input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(72, 149, 239, 0.25);
        }
        
        .search-box .bi-search {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        
        .filter-btn {
            border-radius: 50px;
            padding: 0.5rem 1.25rem;
            margin: 0 0.25rem;
            transition: all 0.3s ease;
        }
        
        .filter-btn.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .table-responsive {
            border-radius: var(--border-radius);
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: #f1f5fe;
            color: var(--dark-color);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            border-bottom: none;
            padding: 1rem 1.5rem;
        }
        
        .table tbody td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
            border-top: 1px solid #f1f5fe;
        }
        
        .table tbody tr {
            transition: background-color 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        .badge-gender {
            padding: 0.5rem 0.75rem;
            font-weight: 500;
            border-radius: 50px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .badge-gender-L {
            background-color: rgba(13, 202, 240, 0.1);
            color: var(--success-color);
        }
        
        .badge-gender-P {
            background-color: rgba(248, 107, 157, 0.1);
            color: var(--danger-color);
        }
        
        .action-btn {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
            margin: 0 3px;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        
        .btn-info {
            background-color: rgba(72, 149, 239, 0.1);
            color: var(--accent-color);
            border: none;
        }
        
        .btn-warning {
            background-color: rgba(248, 150, 30, 0.1);
            color: var(--warning-color);
            border: none;
        }
        
        .btn-danger {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--danger-color);
            border: none;
        }
        
        .empty-state {
            padding: 3rem 0;
            text-align: center;
        }
        
        .empty-state i {
            font-size: 3rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }
        
        .pagination .page-item .page-link {
            border: none;
            color: var(--dark-color);
            margin: 0 5px;
            border-radius: 50% !important;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            color: white;
        }
        
        .pagination .page-item:not(.active) .page-link:hover {
            background-color: #f1f5fe;
        }
        
        .alert {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .card-header > div {
                margin-top: 1rem;
                width: 100%;
            }
            
            .search-box {
                max-width: 100%;
            }
            
            .filter-buttons {
                margin-top: 1rem;
                justify-content: flex-start !important;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div class="d-flex align-items-center">
                    <i class="bi bi-people-fill me-3" style="font-size: 1.75rem;"></i>
                    <h4 class="card-title mb-0">Sistem informasi Pasien</h4>
                </div>
                <div class="d-flex flex-column flex-md-row align-items-md-center w-100 w-md-auto mt-3 mt-md-0">
                    <a href="/" class="btn btn-primary ms-md-3">
                        <i class="bi bi-plus-lg me-2"></i>Add New Patient
                    </a>
                </div>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <form method="GET" action="#" class="search-box">
                            <i class="bi bi-search"></i>
                            <input type="text" name="search" class="form-control ps-4" placeholder="    Search patients..." 
                                   value="{{ request('search') }}">
                        </form>
                    </div>
                    <div class="col-md-6 d-flex flex-column flex-md-row justify-content-md-end align-items-md-center">
                        <div class="d-flex filter-buttons">
                            <a href="#" 
                               class="btn filter-btn {{ request('filter') == 'all' || !request('filter') ? 'active' : '' }}">
                                All Patients
                            </a>
                            <a href="#" 
                               class="btn filter-btn {{ request('filter') == 'L' ? 'active' : '' }}">
                                Male
                            </a>
                            <a href="#" 
                               class="btn filter-btn {{ request('filter') == 'P' ? 'active' : '' }}">
                                Female
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>MR Number</th>
                                <th>Patient Name</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pasiens as $pasien)
                            <tr>
                                <td><strong class="text-primary">{{ $pasien->no_rm }}</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-placeholder me-3">
                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                                 style="width: 36px; height: 36px;">
                                                <i class="bi bi-person-fill text-muted"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $pasien->nama_pasien }}</div>
                                            <small class="text-muted">Last visit: 2 days ago</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-gender badge-gender-{{ $pasien->gender }}">
                                        <i class="bi bi-{{ $pasien->gender == 'L' ? 'gender-male' : 'gender-female' }} me-1"></i>
                                        {{ $pasien->gender == 'L' ? 'Male' : 'Female' }}
                                    </span>
                                </td>
                                <td>{{ $pasien->no_telp ?? '-' }}</td>
                                <td>
                                    <div class="text-truncate" style="max-width: 200px;">
                                        {{ $pasien->alamat }}
                                    </div>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end">
                                        <a href="#" class="action-btn btn-info" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="#" class="action-btn btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="#" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn btn-danger" title="Delete" 
                                                    onclick="return confirm('Are you sure you want to delete this patient?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="empty-state">
                                    <i class="bi bi-people"></i>
                                    <h5 class="mt-3 mb-2">No Patients Found</h5>
                                    <p class="text-muted">There are currently no patients in the system</p>
                                    @if(request('search') || request('filter'))
                                        <a href="#" class="btn btn-sm btn-outline-primary mt-2">
                                            Clear Search Filters
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($pasiens->hasPages())
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
                    <div class="text-muted mb-3 mb-md-0">
                        Showing {{ $pasiens->firstItem() }} to {{ $pasiens->lastItem() }} of {{ $pasiens->total() }} patients
                    </div>
                    <nav>
                        <ul class="pagination mb-0">
                            {{ $pasiens->withQueryString()->links() }}
                        </ul>
                    </nav>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto close alert after 5 seconds
        const alertElement = document.querySelector('.alert');
        if (alertElement) {
            setTimeout(() => {
                const alert = bootstrap.Alert.getOrCreateInstance(alertElement);
                alert.close();
            }, 5000);
        }

        // Add active class to clicked filter button
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>