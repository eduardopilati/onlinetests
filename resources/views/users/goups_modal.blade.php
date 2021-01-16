<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title">
    <div class="modal-dialog" role='document'>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id='modal-title'>
                    {{ __('app.link-usergroup') }}
                </h4>
                <button type='button' class="close" data-dismiss='modal' aria-label="Close"><span class="fa fa-times"></span></button>
            </div>
            <div class="modal-body">
                @if($groups->count() > 0)
                <table class="table table-hover">
                    <thead>
                        <th>Categoria</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                        <tr>
                            <td>{{$group->title}}</td>
                            <td>
                                <button class='btn btn-success fa fa-plus btn-linkgroup' data-group="{{$group->id}}" data-toggle="tooltip" data-placement="top" title="{{ __('app.link-usergroup') }}"></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <span>{{ __('app.no-usergroup-found') }}</span>
                @endif
            </div>
            <div class="modal-footer">
            <button type='button' class="btn btn-default" data-dismiss='modal' aria-label="Close">{{ __('app.close') }}</button>
            </div>
        </div>
    </div>
</div>
