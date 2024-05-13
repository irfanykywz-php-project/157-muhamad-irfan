<x-app-layout title="{{ config('app.name') }}">

    @foreach($files as $file)
        <a href="{{ asset($file->path)  }}">{{ $file->name }}</a>
            {{ $file->name }}
            {{ $file->ext }}
            {{ $file->size }}
            {{ $file->downloaded }}
            {{ $file->description }}
    @endforeach

</x-app-layout>
