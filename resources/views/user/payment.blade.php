<x-app-layout title="Payment Status">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                @if(session('message'))
                    <div class="alert alert-success mt-1 mb-2">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="bg-primary d-flex align-items-center text-white py-2">
                    <div class="px-3">
                        <i class="bi bi-person-circle fs-2"></i>
                    </div>
                    <div>
                        <h1 class="fs-3">
                            {{ auth()->user()->name }}'s Payment Status
                        </h1>
                    </div>
                </div>

                <div class="card my-3">

                    <div class="card-header rounded-0 bg-primary">
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div>
                                Your Revenue:
                                <b>Rp {{ ReadableNumber($user['reveneu'], '.') }}</b>
                            </div>
                        </li>

                    </ul>

                </div>

                <div class="my-3 text-white px-3 py-1" style="background: #3f51b5">
                    <h2 class="fs-6 mb-0">Payment Status</h2>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="background: #3f51b5;color: #fff;font-size: 12px">ID</th>
                        <th style="background: #3f51b5;color: #fff;font-size: 12px">Date</th>
                        <th style="background: #3f51b5;color: #fff;font-size: 12px">Amount</th>
                        <th style="background: #3f51b5;color: #fff;font-size: 12px">Method</th>
                        <th style="background: #3f51b5;color: #fff;font-size: 12px">Destination</th>
                        <th style="background: #3f51b5;color: #fff;font-size: 12px">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($payments) > 0)
                        @foreach($payments as $pay)
                            <tr>
                                <td>{{ $pay->id }}</td>
                                <td>{{ $pay->created_at }}</td>
                                <td>Rp {{ $pay->total }}</td>
                                <td>{{ $pay->method }}</td>
                                <td>{{ $pay->destination }}</td>
                                <td>
                                    @if($pay->status == 'pending')
                                        <span class="badge text-bg-warning">
                                            {{ $pay->status }}
                                        </span>
                                    @elseif($pay->status == 'reject')
                                        <span class="badge text-bg-danger">
                                            {{ $pay->status }}
                                        </span>
                                    @elseif($pay->status == 'success')
                                        <span class="badge text-bg-success">
                                            {{ $pay->status }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">
                                <p class="my-3 fs-5 text-center">
                                    Payment data not available...
                                </p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @if($payments->hasPages())
                    <div class="my-3">
                        {{ $payments->onEachSide(0)->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>

</x-app-layout>
