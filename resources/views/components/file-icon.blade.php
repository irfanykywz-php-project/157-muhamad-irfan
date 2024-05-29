@props([
    'ext'
])



@if(in_array($ext, ['png', 'jpg', 'jpeg', 'gif']))
    <i class="bi bi-image me-2"></i>
@elseif(in_array($ext, ['mp3', 'wav']))
    <i class="bi bi-file-music me-2"></i>
@elseif(in_array($ext, ['zip', 'rar', 'iso', '7z']))
    <i class="bi bi-file-zip me-2"></i>
@else
    <i class="bi bi-file me-2"></i>
@endif
