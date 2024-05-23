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
                        <select class="form-select" name="method">
                            <option value="Digital Wallet">Digital Wallet (Rp 6.000 minimum revenue)</option>
                            <option value="Bank">Bank (Rp 100.000 minimum revenue)</option>
                        </select>
                        @error('method')
                        <span class="form-text text-danger">
                            {{ $errors->first('method')  }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Destination</label>
                        <input class="form-control" type="text" name="destination" placeholder="081123456999_GOPAY" value="{{ old('destination') }}">
                        <span class="form-text">
                            <div>Digital Wallet Format: 081123456999_GOPAY/DANA/OVO</div>
                            <div>Bank Format: 0881233_BRI/BNI/BCA:AN_Jojo Rizo</div>
                        </span>
                        @error('destination')
                        <span class="form-text text-danger">
                            {{ $errors->first('destination')  }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">
                            Total Payment
                            (current revenue Rp {{ ReadableNumber(auth()->user()->reveneu, '.') }})
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
