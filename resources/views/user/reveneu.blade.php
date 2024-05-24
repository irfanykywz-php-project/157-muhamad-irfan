<x-app-layout title="My Reveneu">

    <div class="container mt-2 mb-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="bg-primary d-flex align-items-center text-white py-2">
                    <div class="px-3">
                        <i class="bi bi-person-circle fs-2"></i>
                    </div>
                    <div>
                        <h1 class="fs-3">
                            {{ auth()->user()->name }}'s Reveneu
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
                                <b>Rp {{ ReadableNumber(auth()->user()->reveneu, '.') }}</b>
                            </div>
                        </li>

                    </ul>

                </div>

                <div class="my-3 text-white px-3 py-1" style="background: #3f51b5">
                    <h2 class="fs-6 mb-0">Reveneu Detail</h2>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="background: #3f51b5;color: #fff;font-size: 12px">Date</th>
                            <th style="background: #3f51b5;color: #fff;font-size: 12px">Download</th>
                            <th style="background: #3f51b5;color: #fff;font-size: 12px">Reveneu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($reveneu) > 0)
                            @foreach($reveneu as $rev)
                                <tr>
                                    <td>{{ $rev->date }}</td>
                                    <td>{{ $rev->total_download }}</td>
                                    <td>Rp {{ $rev->total_reveneu }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">
                                    <p class="my-3 fs-5 text-center">
                                        Reveneu data not available...
                                    </p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                @if($reveneu->hasPages())
                    <div class="my-3">
                        {{ $reveneu->onEachSide(0)->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>

</x-app-layout>
