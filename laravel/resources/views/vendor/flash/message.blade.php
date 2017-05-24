@foreach ((array) session('flash_notification') as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
    <div class="row alert-box">
        <div class="col-sm-6 col-sm-push-3 text-center">
            <div class="alert
                        alert-{{ $message['level'] }}
                        {{ $message['important'] ? 'alert-important' : '' }}"
            >
                @if ($message['important'])
                    <button type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-hidden="true"
                    >&times;</button>
                @endif

                {!! $message['message'] !!}
            </div>
        </div>
    </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
