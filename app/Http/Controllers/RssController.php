<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use PhpParser\Unserializer\XML;
use Jenssegers\Date\Date;

class RssController extends BaseController
{
    /**
     * XML do RSS obtido.
     * @var \SimpleXMLElement
     */
    private $rss;

    /**
     * @method __construct
     */
    function __construct()
    {
        Date::setLocale('pt_BR');
        $this->rss = simplexml_load_file('http://g1.globo.com/dynamo/economia/rss2.xml');
    }

    /**
     * Retorna o valor de uma determinada chave do feed
     * @param $info string
     * @return string
     */
    private function getInfo($info)
    {
        return $this->rss->channel->$info;
    }

    /**
     * Retorna a lista de items do feed
     * @return array
     */
    private function getItems()
    {
        $items = [];
        foreach( $this->rss->channel->item as $item ) {
            $date = new Date($item->pubDate);

            $item->pubDate = $date->format('d \d\e F \d\e Y');
            $item->pubTime = $date->format('H:i:s');
            $items[] = $item;
        }

        return $items;
    }

    /**
     * Exibe o feed de notícias
     * @method view
     * @return html
     */
    public function view()
    {
        $date = new Date($this->getInfo('lastBuildDate'));

        return view('rsslist', [
            'title'         => $this->getInfo('title'),
            'description'   => $this->getInfo('description'),
            'link'          => $this->getInfo('link'),
            'date'          => $date->format('d \d\e F \d\e Y') . ', às ' . $date->format('H:i:s'),
            'items'         => $this->getItems()
        ]);
    }
}
