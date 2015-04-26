{!! Form::open([ 'route' => [ 'user.status.store', $authUserId ], 'class' => 'form']) !!}
    {!! Form::label('How ya feelin today?') !!}

    {!! Form::text( 'status', null, [
    'required',
    'data-bind' => "textInput: newStatus",
    'class'=>'form-control',
    'placeholder'=>'Type your status here'
    ]) !!}

    {!! Form::submit( 'Post status', [
    'class' => 'pull-right',
    'data-bind' => 'click: addStatus'
    ]) !!}
{!! Form::close() !!}

<div class="clearfix"></div>

<div data-bind="foreach: statusesFromDb">
    <blockquote>
        <p class="status" data-bind="text: status, attr: { 'data-id': id }"></p>
        <small class="pull-right" data-bind="text: created_at"></small>
    </blockquote>
</div>