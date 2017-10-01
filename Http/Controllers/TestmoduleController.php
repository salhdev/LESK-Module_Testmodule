<?php
namespace App\Modules\Testmodule\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;
use Edofre\SliderPro\SliderPro;
//use Edofre\SliderPro\Models\Slide;
//use Edofre\SliderPro\Models\Slides\Caption;
//use Edofre\SliderPro\Models\Slides\Image;
//use Edofre\SliderPro\Models\Slides\Layer;


class TestmoduleController extends Controller
{
    public function index()
    {
        Audit::log(Auth::user()->id, trans('testmodule::general.audit-log.category'), trans('testmodule::general.audit-log.msg-index'));

        $page_title = trans('testmodule::general.page.index.title');
        $page_description = trans('testmodule::general.page.index.description');

		$slider = new SliderPro();
		$slider->setId('my-slider');
		$slider->setOptions([
		        'sliderOptions' => [
		                'width'  => 960,
		                'height' => 500,
		                'arrows' => true,
		                'init'   => new \Edofre\SliderPro\JsExpression("
		            function() {
		                console.log('slider is initialized');
		            }
		        "),
		        ]
		]);
//        return view('testmodule::index', compact('page_title', 'page_description', 'slider'));
        return view('testmodule::slider-pro', compact('page_title', 'page_description', 'slider'));
    }

}
