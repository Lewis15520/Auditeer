@extends('auditeer::layouts.app')
@section('body')

    <div class="centerPanel" style="width: {{ config('auditeer.view_config.view.default_width') }}; margin: 0 auto;">

        <h1>Auditeer Data Viewing</h1>


        @forelse($auditData as $data)

            <div class="auditDataRow">
                <p>{{ $data->id }}</p>
                @if(isset($data->parameters()->user_id))

                    <p>
                        User: {{ $data->userFromId()->{config('auditeer.view_config.user.display_column')} }}
                        @if(config('auditeer.view_config.user.show_id'))(ID: {{ $data->parameters()->user_id }})@endif
                    </p>

                @endif
            </div>


        @empty

        @endforelse


    </div>

@endsection
