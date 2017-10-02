<?php
namespace App\Modules\Testmodule\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;
use Edofre\SliderPro\SliderPro;
use Edofre\SliderPro\Models\Slide;
use Edofre\SliderPro\Models\Slides\Caption;
use Edofre\SliderPro\Models\Slides\Image;
use Edofre\SliderPro\Models\Slides\Layer;
use Edofre\SliderPro\Models\Thumbnail;

class TestmoduleController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::guest()) {
            Audit::log(Auth::user()->id, trans('testmodule::general.audit-log.category'), trans('testmodule::general.audit-log.msg-index'));
        }

        $page_title = trans('testmodule::general.page.index.title');
        $page_description = trans('testmodule::general.page.index.description');

        $id = 'my-slider';

        $slides = [
            new Slide([
                'items' => [
                    new Image(['src' => '/images/Atlas_Mountains_view_from_Kasba-1024x768.jpg']),
                    new Caption(['tag' => 'p', 'content' => 'Atlas_Mountains_view_from_Kasba-1024x768.jpg']),
                ],
            ]),
            new Slide([
                'items' => [
                    new Image(['src' => '/images/Desert_Warning-1024x768.jpg']),
                    new Caption(['tag' => 'p', 'content' => 'Desert_Warning-1024x768.jpg']),
                ],
            ]),
            new Slide([
                'items' => [
                    new Image(['src' => '/images/Ouzoud_falls_free_monkey-1024x768.jpg']),
                    new Layer([
                        'tag' => 'h3',
                        'content' => 'Ouzoud_falls_free_monkey-1024x768.jpg',
                        'htmlOptions' => [
                            'class' => 'sp-black',
                            'data-position' => "bottomLeft",
                            'data-horizontal' => "10%",
                            'data-show-transition' => "left",
                            'data-show-delay' => "300",
                            'data-hide-transition' => "right"
                        ]]),
                    new Layer(['tag' => 'p', 'content' => 'consectetur adipisicing elit', 'htmlOptions' => ['class' => 'sp-white sp-padding', 'data-width' => "200", 'data-horizontal' => "center", 'data-vertical' => "40%", 'data-show-transition' => "down", 'data-hide-transition' => "up"]]),
                    new Layer(['tag' => 'div', 'content' => 'Static content', 'htmlOptions' => ['class' => 'sp-static']]),
                ],
            ]),
            new Slide([
                'content' =>
                    '<a class="sp-video" href="https://youtu.be/yxcTaVDWEuw">
                        <img src="/images/Ouzoud_falls-1024x768.jpg" width="500" height="300"/>
                    </a>'
                ,
            ]),
            new Slide([
                'items' => [
                    new Layer(['tag' => 'h3', 'content' => 'Lorem ipsum dolor sit amet']),
                    new Layer(['tag' => 'p', 'content' => 'Consectetur adipisicing elit']),
                ],
            ]),
        ];

        $thumbnails = [
            new Thumbnail(['tag' => 'img', 'htmlOptions' => [
                'src' => "/images/Atlas_Mountains_view_from_Kasba-1024x768.jpg",
                'data-src' => "/images/Atlas_Mountains_view_from_Kasba-1024x768.jpg"]
            ]),
            new Thumbnail(['tag' => 'img', 'htmlOptions' => [
                'src' => "/images/Desert_Warning-1024x768.jpg",
                'data-src' => "/images/Desert_Warning-1024x768.jpg"
            ]]),
            new Thumbnail(['tag' => 'img', 'htmlOptions' => [
                'src' => "/images/Ouzoud_falls_free_monkey-1024x768.jpg",
                'data-src' => "/images/Ouzoud_falls_free_monkey-1024x768.jpg"
            ]]),
            new Thumbnail(['tag' => 'p', 'content' => 'Thumbnail for video']),
            new Thumbnail(['tag' => 'p', 'content' => 'Thumbnail 5']),
        ];

        $slider = new \Edofre\SliderPro\SliderPro();
        $slider->setId($id);
        $slider->setOptions([
            'width'  => 960,
            'height' => 500,
            'arrows' => true,
            'init'   => new \Edofre\SliderPro\JsExpression("
                function() {
                    console.log('SR: my-slider is initialized');
                }
            "),
        ]);


        $slider = new \Edofre\SliderPro\SliderPro();
        $slider->setId($id);
        $slider->setOptions([
            'width'  => 960,
            'height' => 500,
/*
            'fade'   => true,
            'fullScreen' =>  true,
            'shuffle' =>  true,
            'smallSize' =>  500,
            'mediumSize' =>  1000,
            'largeSize' =>  3000,
            'thumbnailArrows' =>  true,
*/
            'arrows' => true,
            'buttons'=> false,
            'waitForLayers' => true,
//            'thumbnailWidth' => 200,
//            'thumbnailHeight' => 100,
            'thumbnailPointer' => true,
            'autoplay' => false,
            'autoScaleLayers' => false,
            'init'   => new \Edofre\SliderPro\JsExpression("
                function() {
                    console.log('SR: my Example1 slider is initialized');
                }
            "),
        ]);

        $request->session()->reflash();

        return view('testmodule::slider-pro', compact('page_title', 'page_description', 'slider', 'id', 'slides', 'thumbnails'));

//        return view('testmodule::index', compact('page_title', 'page_description', 'slider'));
//        return view('testmodule::slider-pro', compact('page_title', 'page_description', 'slider'));
    }
}
