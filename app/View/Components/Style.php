<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Style extends Component
{
    /**
     * Create a new component instance.
     */
    /**
     * Create a new component instance.
     */

    public $link = null;

    protected $source = null;
    protected $lang = null;
    protected $direction = null;
    protected $rtlStyles = [

        'css/style.bundle.css',
        'plugins/global/plugins.bundle.rtl.css',
        'plugins/custom/jstree/jstree.bundle.rtl.css',
        'plugins/custom/cropper/cropper.bundle.rtl.css',
        'plugins/custom/jkanban/jkanban.bundle.rtl.css',
        'plugins/custom/leaflet/leaflet.bundle.rtl.css',
        'plugins/custom/prismjs/prismjs.bundle.rtl.css',
        'plugins/custom/datatables/datatables.bundle.rtl.css',
        'plugins/custom/cookiealert/cookiealert.bundle.rtl.css',
        'plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css',
        'plugins/custom/vis-timeline/vis-timeline.bundle.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide/skin.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide-dark/skin.rtl.css',

        'plugins/custom/tinymce/skins/content/dark/content.rtl.css',
        'plugins/custom/tinymce/skins/content/default/content.rtl.css',
        'plugins/custom/tinymce/skins/content/document/content.rtl.css',
        'plugins/custom/tinymce/skins/content/writer/content.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide/content.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide-dark/content.rtl.css',

        'plugins/custom/tinymce/skins/ui/oxide/skin.min.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide-dark/skin.min.rtl.css',

        'plugins/custom/tinymce/skins/content/dark/content.min.rtl.css',
        'plugins/custom/tinymce/skins/content/default/content.min.rtl.css',
        'plugins/custom/tinymce/skins/content/document/content.min.rtl.css',
        'plugins/custom/tinymce/skins/content/writer/content.min.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide/content.min.rtl.css',

        'plugins/custom/tinymce/skins/ui/oxide/skin.mobile.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide-dark/content.min.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide-dark/skin.mobile.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide/content.inline.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide/content.mobile.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide/skin.shadowdom.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide/skin.mobile.min.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide-dark/skin.mobile.min.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide/content.inline.min.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxidecontent.mobile.min.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide/skin.shadowdom.min.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide-dark/content.inline.min.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide-dark/content.mobile.min.rtl.css',
        'plugins/custom/tinymce/skins/ui/oxide-dark/skin.shadowdom.min.rtl.css',
    ];


    public function __construct($source,$lang=null,$direction=null)
    {
        $this->source = $source;
        $this->lang = $lang;
        $this->direction = $direction;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $locale = App::currentLocale();

        if ($this->lang != $locale && !is_null($this->lang)) {
            return '';
        }

        if (in_array($this->source,$this->rtlStyles) && in_array($locale,['ar','fa'])) {
            $this->source = str_replace('.css','.rtl.css',$this->source);
        }

        $this->link = asset("assets/" . $this->source);
        return view('components.style');
    }
}
