<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="{{ $config->modelNames->dashedPlural }}-table">
            <thead>
            <tr>
                {!! $fieldHeaders !!}
@if($config->options->localized)
                <th colspan="3">@lang('crud.action')</th>
@else
@@if ('{{ $config->modelNames->dashedPlural }}' === 'projets')

                <th class="text-center">Tâches</th>
@@endif

                <th class="text-center">Action</th>
@endif
            </tr>
            </thead>
            <tbody>
            @@foreach(${{ $config->modelNames->camelPlural }} as ${{ $config->modelNames->camel }})
                <tr>
                    {!! $fieldBody !!}
                    @@if ('{{ $config->modelNames->dashedPlural }}' === 'projets')
                    <td class="text-center">
                        <a href="" class="btn btn-sm btn-secondary mx-2">
                            <i class="nav-icon fas fa-tasks"></i> Les Tâches
                        </a>
                    </td>
                    @@endif
         
                    <td  style="width: 120px">
                        @{!! Form::open(['route' => ['{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->camelPlural }}.destroy', ${{ $config->modelNames->camel }}->{{ $config->primaryName }}], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.show', [${!! $config->modelNames->camel !!}->{!! $config->primaryName !!}]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.edit', [${!! $config->modelNames->camel !!}->{!! $config->primaryName !!}]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @{!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        @{!! Form::close() !!}
                    </td>

                </tr>
            @@endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between align-items-center p-2">
        {{-- <div class="d-flex align-items-center mb-2">
    
            <form action="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.import') }}" method="post"
                enctype="multipart/form-data" id="importForm">
                @csrf
                <label for="upload" class="btn btn-default btn-sm mb-0 font-weight-normal">
                    <i class="fa-solid fa-file-arrow-down"></i>
                    {{ __('IMPORTER') }}
                </label>
                <input type="file" id="upload" name="file" style="display:none;"
                    onchange="submitForm()" />
            </form>
            <form>
                <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.export') }}" class="btn  btn-default btn-sm mt-0 mx-2">
                    <i class="fa-solid fa-file-export"></i>
                    {{ __('EXPORTER') }}
                </a>
            </form>
    
    
        </div> --}}
        <div class="card-footer clearfix">
            <div class="float-right">
                {!! $paginate !!}
            </div>
        </div>
    </div>
</div>
