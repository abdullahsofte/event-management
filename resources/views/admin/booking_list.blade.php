@extends('layouts.admin')
@section('title', 'Booking List')

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<style>
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 10px;
    }

    tr {
        border-bottom: 1px solid #dee2e6;
    }

    /* Custom Modal Styles */
    .custom-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .custom-modal-content {
        background-color: #fff;
        padding: 20px;
        margin: 10% auto;
        width: 40%;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .custom-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .custom-modal-body {
        margin-top: 15px;
        display: flex;
        justify-content: space-between;
    }

    .custom-modal-close {
        cursor: pointer;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .modal-row {
        display: flex;
        /* justify-content: space-between; */
        margin-bottom: 10px;
    }

    .btn {
        margin: 0 5px;
    }
    .view-btn{
        border: none;
        color: green;
        font-size: 15px;
        background-color: transparent;
    }
</style>

@section('admin-content')
    <main>
        <div class="container">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading">
                    <i class="fas fa-home"></i>
                    <a href="{{ route('admin.index') }}">Home</a> > Booking List
                </span>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="table-head">
                                <i class="fas fa-table me-1"></i> Booking List
                            </div>
                        </div>

                        <div class="card-body table-card-body p-3">
                            <table id="bookingTable" class="table table-bordered table-hover">
                                <thead class="text-center bg-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        {{-- <th>Address</th> --}}
                                        <th>Booking Type</th>
                                        <th>Booking For</th>
                                        <th>Booking Date</th>
                                        <th>Booking Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($bookings as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            {{-- <td>{{ $item->address }}</td> --}}
                                            <td>{{ $item->booking_type }}</td>
                                            <td>{{ $item->feature->feature_name ?? 'N/A' }}</td>
                                            <td>{{ $item->boking_date }}</td>
                                            <td>{{ $item->boking_time }}</td>
                                            <td class="text-center">
                                                <button class="view-btn" data-id="{{ $item->id }}"
                                                    data-name="{{ $item->name }}" data-email="{{ $item->email }}"
                                                    data-phone="{{ $item->phone }}" data-address="{{ $item->address }}"
                                                    data-type="{{ $item->booking_type }}"
                                                    data-feature="{{ $item->feature->feature_name ?? 'N/A' }}"
                                                    data-date="{{ $item->boking_date }}"
                                                    data-time="{{ $item->boking_time }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="{{ route('booking.edit', $item->id) }}" class="btn btn-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <!-- Using AJAX for deletion -->
                                                <form action="{{ route('booking.delete', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this booking?');">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Custom Modal -->
    <div id="viewModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h5>Booking Details</h5>
                <span class="custom-modal-close">&times;</span>
            </div>
            <div class="custom-modal-body">
                <div>
                    <div class="modal-row">
                        <strong>Name : </strong> <span id="modalName"></span>
                    </div>
                    <div class="modal-row">
                        <strong>Email : </strong> <span id="modalEmail"></span>
                    </div>
                    <div class="modal-row">
                        <strong>Phone : </strong> <span id="modalPhone"></span>
                    </div>
                    <div class="modal-row">
                        <strong>Address : </strong> <span id="modalAddress"></span>
                    </div>
                </div>
                <div>
                    <div class="modal-row">
                        <strong>Booking Type : </strong> <span id="modalType"></span>
                    </div>
                    <div class="modal-row">
                        <strong>Booking For : </strong> <span id="modalFeature"></span>
                    </div>
                    <div class="modal-row">
                        <strong>Booking Date : </strong> <span id="modalDate"></span>
                    </div>
                    <div class="modal-row">
                        <strong>Booking Time : </strong> <span id="modalTime"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('admin-js')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#bookingTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
            });

            $('.view-btn').on('click', function() {
                const name = $(this).data('name');
                const email = $(this).data('email');
                const phone = $(this).data('phone');
                const address = $(this).data('address');
                const type = $(this).data('type');
                const feature = $(this).data('feature');
                const date = $(this).data('date');
                const time = $(this).data('time');

                $('#modalName').text(name);
                $('#modalEmail').text(email);
                $('#modalPhone').text(phone);
                $('#modalAddress').text(address);
                $('#modalType').text(type);
                $('#modalFeature').text(feature);
                $('#modalDate').text(date);
                $('#modalTime').text(time);

                // Show modal
                $('#viewModal').fadeIn();
            });

            $('.custom-modal-close').on('click', function() {
                $('#viewModal').fadeOut();
            });

            $(window).on('click', function(e) {
                if ($(e.target).is('#viewModal')) {
                    $('#viewModal').fadeOut();
                }
            });
        });
    </script>

  
@endpush
