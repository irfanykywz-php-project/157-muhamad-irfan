<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">
                    Request Payment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('user.payout') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label for="">Method</label>
                        <input class="form-control" name="method" list="method-list" value="{{ old('method') }}">
                        <datalist id="method-list">
                            <option>Digital Wallet - OVO</option>
                            <option>Digital Wallet - Gopay</option>
                            <option>Digital Wallet - ShopeePay</option>
                            <option>Digital Wallet - DANA</option>
                            <option>Pulsa - Telkomsel</option>
                            <option>Pulsa - XL</option>
                            <option>Pulsa - Axis</option>
                            <option>Pulsa - Three</option>
                            <option>Pulsa - Indosat</option>
                            <option>Pulsa - SmartFren</option>
                            <option>Bank - BCA</option>
                            <option>Bank - BRI</option>
                            <option>Bank - BNI</option>
                            <option>Bank - Mandiri</option>
                            <option>Bank - BTPN</option>
                        </datalist>
                        <span class="form-text">
                            <div>Digital Wallet (Rp 6.000 minimum revenue)</div>
                            <div>Pulsa (Rp 6.000 minimum revenue)</div>
                            <div>Bank (Rp 100.000 minimum revenue)</div>
                        </span>
                        @error('method')
                        <span class="form-text text-danger">
                            {{ $errors->first('method')  }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Destination</label>
                        <input class="form-control" type="text" name="destination" placeholder="081123456999" value="{{ old('destination') }}">
                        <span class="form-text">
                            Insert Number of you wallet
                        </span>
                        @error('destination')
                        <span class="form-text text-danger">
                            {{ $errors->first('destination')  }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Identity</label>
                        <input class="form-control" type="text" name="identity" placeholder="AN: Ahmad" value="{{ old('identity') }}">
                        <span class="form-text">
                            <div>Insert wallet identity</div>
                        </span>
                        @error('identity')
                        <span class="form-text text-danger">
                            {{ $errors->first('identity')  }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">
                            Total Payment
                            (current revenue {{ auth()->user()->reveneu }})
                        </label>
                        <input class="form-control" type="text" name="total" value="{{ old('total') }}">
                        @error('total')
                        <span class="form-text text-danger">
                            {{ $errors->first('total')  }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Process</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@if($errors->any())
    <script>
        document.querySelector('[data-bs-target="#paymentModal"]').click();
    </script>
@endif
