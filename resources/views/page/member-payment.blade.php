<x-app-layout title="Member Payment Status">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card">

                    <div class="card-header rounded-0 bg-primary">
                        <h1 class="mb-0 fs-4 text-white">
                            <i class="bi bi-credit-card"></i>
                            Member Payment Status
                        </h1>
                    </div>

                    <ul class="list-group list-group-flush">
                        @if(count($payment) > 0)
                            @foreach($payment as $pay)
                                <li class="list-group-item">
                                    <p class="small mb-0">
                                        <b>ID</b> : #{{ $pay->id }}
                                    </p>
                                    <p class="small mb-0">
                                        <b>Name</b> : {{ $pay->user->name }}
                                    </p>
                                    <p class="small mb-0">
                                        <b>Number</b> : {{ $pay->destinationHide($pay->destination) }}-{{ $pay->method }}
                                    </p>
                                    <p class="small mb-0">
                                        <b>Request Date</b> : {{ $pay->created_at }}
                                    </p>
                                    <p class="small mb-0">
                                        <b>Amount</b> : {{ $pay->total }}
                                    </p>
                                    <p class="small mb-0">
                                        <b>Status</b> : <span class="text-success">{{ $pay->status }}</span>
                                    </p>
                                    <p class="small mb-0">
                                        <b>Last Updated</b> : {{ $pay->updated_at }}
                                    </p>

                                </li>
                            @endforeach
                        @else
                            <p class="my-3 fs-5 text-center">
                                Payment data not available...
                            </p>
                        @endif
                    </ul>

                    @if($payment->hasPages())
                        <div class="border-top-1 mx-3 mt-3">
                            {{ $payment->onEachSide(0)->links() }}
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
