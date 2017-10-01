@extends('layouts.master')

@section('head_extra')
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="slider-pro" id="my-slider">
                <div class="sp-slides">
                    <!-- Slide 1 -->
                    <div class="sp-slide">
                        <img class="sp-image" src="http://lorempixel.com/960/500/sports/1"/>
                    </div>
                    <!-- Slide 2 -->
                    <div class="sp-slide">
                        <img class="sp-image" src="http://lorempixel.com/960/500/sports/2"/>
                        <p class="sp-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <!-- Slide 3 -->
                    <div class="sp-slide">
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <!-- Slide 4 -->
                    <div class="sp-slide">
                        <img class="sp-image" src="http://lorempixel.com/960/500/sports/3"/>
                        <h3 class="sp-layer sp-black"
                            data-position="bottomLeft" data-horizontal="10%"
                            data-show-transition="left" data-show-delay="300" data-hide-transition="right">
                            Lorem ipsum dolor sit amet
                        </h3>
                        <p class="sp-layer sp-white sp-padding"
                           data-width="200" data-horizontal="center" data-vertical="40%"
                           data-show-transition="down" data-hide-transition="up">
                            consectetur adipisicing elit
                        </p>
                        <div class="sp-layer sp-static">Static content</div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="sp-slide">
                        <h3 class="sp-layer">Lorem ipsum dolor sit amet</h3>
                        <p class="sp-layer">consectetur adipisicing elit</p>
                    </div>

                    <!-- thumbnails -->
                    <div class="sp-thumbnails">
                        <img class="sp-thumbnail" src="http://lorempixel.com/960/500/sports/1" data-src="http://lorempixel.com/480/250/sports/1"/>
                        <img class="sp-thumbnail" src="http://lorempixel.com/960/500/sports/2" data-src="http://lorempixel.com/480/250/sports/2"/>
                        <img class="sp-thumbnail" src="http://lorempixel.com/960/500/sports/3" data-src="http://lorempixel.com/480/250/sports/3"/>
                        <p class="sp-thumbnail">Thumbnail 4</p>
                        <p class="sp-thumbnail">Thumbnail 5</p>
                    </div>
                </div>
            </div>
            <?= $slider->generate(false); // Specify false so we don't generate a new <div> ?>
        </div><!-- /.col -->

    </div><!-- /.row -->
    @endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@endsection
