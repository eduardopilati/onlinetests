@if(isset($testgroups) && count($testgroups) > 0)
<ul class="list-group">
    @foreach ($testgroups as $testgroup)
    <li class="list-group-item">
        <span> {{ $testgroup->title }} </span>
            <a class="btn btn-sm btn-default fa fa-angle-double-right float-right btn-childtestgroup" href="{{ route('testgroups', ['id' => $testgroup->id]) }}"
            data-groupid="{{$testgroup->id}}" data-toggle="tooltip" data-placement="top" title="{{ __('app.view') }}"></a>
    </li>
    @endforeach
</ul>
@else
<span>{{ __('app.no-testgroup-found') }}</span>
@endif
