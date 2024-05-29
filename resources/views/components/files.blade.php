<div>
    <ul class="list-group list-group-flush">
        @if(count($files) > 0)
            @foreach($files as $file)
                <li class="list-group-item">

                    <div class="d-flex align-items-center">

                        <x-file-icon :ext="$file->ext"/>

                        <a class="fs- text-decoration-none" href="{{ route('file', $file->code) }}">
                            {{ $file->name }}
                        </a>
                    </div>
                    <div class="d-flex">
                        <span class="me-2">{{ $file->size }}</span>
                        <span>Uploaded: {{ $file->created_at }}</span>
                    </div>

                </li>
            @endforeach
        @else
            <p class="my-3 fs-5 text-center">
                Files data not available...
            </p>
        @endif

    </ul>
    @if($files->hasPages())
        <div class="border-bottom">
            <div class="m-3 mb-0">
                {{ $files->onEachSide(0)->withQueryString()->links() }}
            </div>
        </div>
        <div class="m-3">
            <form class="" action="{{ $jump }}" method="GET">
                @if(isset($q))
                    <input type="hidden" name="q" value="{{ $q }}">
                @endif
                <div class="d-flex gap-1">
                    <label for="">Jump: </label>
                    <input type="text" name="page" required value="{{ request()->get('page') }}"/>
                    <input type="submit" value="Go"/>
                </div>
            </form>
        </div>
    @endif
</div>
