<!-- Modal -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoModalLabel">
                    Set profile picture
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

               <div class="py-3">
                   <img referrerpolicy="no-referrer" class="photo" src="{{ auth()->user()->photoUrl(auth()->user()->photo) }}">
               </div>

                <div class="mb-3">
                    <input class="form-control select-photo" type="file">
                </div>

                <div>
                    <button type="button" class="btn btn-primary w-100 upload" data-url="{{ route('user.profile.photo') }}">Upload</button>
                </div>

            </div>
        </div>
    </div>
</div>
