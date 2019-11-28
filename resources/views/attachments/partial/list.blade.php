

@if ($attachments->count())
    <ul class="attachment__member">

        @foreach ($attachments as $attachment)

            <!-- <a href="{{ $attachment->url }}"> -->
                <!-- {{ $attachment->filename }} ({{ $attachment->bytes }}) -->
                <img src="{{$attachment->url}}" width="400" height="300">
            <!-- </a> -->

        @endforeach
    </ul>
@endif