@extends('testmodule::layouts.master_slide')

@section('head_extra')
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('testmodule::general.page.index.box-title') }}</h3>
                    &nbsp;

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">

                    <div class="form-group">
                        {{ trans('testmodule::general.page.index.welcome') }}
                    </div><!-- /.form-group -->
                    {{-- Parameters for view : slider-pro::slider
                    / * @var $id string * /
                    / * @var $slides \Edofre\SliderPro\Models\Slide[] * /
                    / * @var $thumbnails \Edofre\SliderPro\Models\Thumbnail[] * /
                    --}}
                    @include('slider-pro::slider')
                    <!-- Begin generated code -->
                    <?=  $slider->generate(false); // Specify false so we don't generate a new <div>
                    ?> 
                    <!-- End Generated code -->

                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
    @endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@endsection
