{!! Form::open([ 'route' => [ 'user.status.store', $authUserId ], 'class' => 'form addNewStatusForm']) !!}
    {!! Form::label('How ya feelin today?') !!}

    {!! Form::text( 'status', null, [
        'required',
        'data-bind' => "textInput: newStatus",
        'class'=>'form-control',
        'id' => 'statusTextBox',
        'placeholder'=>'Type your status here'
    ]) !!}

    {!! Form::submit( 'Post status', [
        'id' => 'addNewStatus',
        'class' => 'pull-right'
    ]) !!}
{!! Form::close() !!}

<div class="clearfix"></div>

<div data-bind="foreach: statusesFromDb">
    <blockquote>
        <p class="status" data-bind="text: status"></p>
        <a class="edit-status" data-bind="attr: { 'data-id': id }" href="{{ \URL::action('StatusController@index', [ $authUserId ]) }}">Edit</a>
        <small class="pull-right" data-bind="text: created_at"></small>
    </blockquote>
</div>