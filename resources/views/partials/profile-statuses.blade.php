@foreach( $statuses as $status )
    <blockquote>
        <p>{{ $status->status }}</p>
        <small class="pull-right"> created at {{ $status->created_at }}</small>
    </blockquote>
@endforeach