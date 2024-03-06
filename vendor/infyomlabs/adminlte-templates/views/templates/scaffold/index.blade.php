@@extends('layouts.app')

@@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
@if($config->options->localized)
                    <h1>@@lang('models/{{ $config->modelNames->camelPlural }}.plural')</h1>
@else
                    <h1>{{ $config->modelNames->humanPlural }}</h1>
@endif
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.create') }}">
@if($config->options->localized)
                         @@lang('crud.add_new')
@else
                        Add New
@endif
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @@include('flash::message')

        <div class="clearfix"></div>
        <div class="card-header">
            <div class="col-sm-12 d-flex justify-content-between p-0">
                <div>
                </div>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input type="search" class="form-control form-control-lg" placeholder="Recherche">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            {!! $table !!}
        </div>
    </div>
@@endsection
@@push('page_scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        function fetchData(page, searchValue) {
            $.ajax({
                url: '/{!! $config->modelNames->camelPlural !!}/?page=' + page + '&searchValue=' + searchValue,
                success: function(data) {
                    var newData = $(data);

                    $('tbody').html(newData.find('tbody').html());
                    $('#card-footer').html(newData.find('#card-footer').html());
                    var paginationHtml = newData.find('.pagination').html();
                    if (paginationHtml) {
                        $('.pagination').html(paginationHtml);
                    } else {
                        $('.pagination').html('');
                    }
                }
            });
            console.log(searchValue);
        }

        $('body').on('click', '.pagination a', function(param) {

            param.preventDefault();

            var page = $(this).attr('href').split('page=')[1];
            console.log(page);
            var searchValue = $('#table_search').val();

            fetchData(page, searchValue);

        });

        $('body').on('keyup', '#table_search', function() {
            var page = $('#page').val();
            var searchValue = $('#table_search').val();

            fetchData(page, searchValue);
        });

    });
</script>

@@endpush