<?php

namespace BakDebugger\Laravel;

use GuzzleHttp\Client;
use Throwable;

class Bak
{
    use Colors;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var
     */
    protected $color;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $url = 'http://localhost';

    /**
     * @var string
     */
    protected $port = '54331';

    /**
     * @var
     */
    protected $content;

    protected $caller;


    /**
     * @param $content
     * @param $caller
     */
    public function __construct($content, $caller)
    {
        $this->content = $content;
        $this->caller = $caller;
        $this->id = uniqid();
        $this->client = Http::getClient();
    }

    /**
     * @param $color
     * @return $this
     */
    protected function color($color): self
    {
        $this->color = $color;

        return $this->send();
    }

    /**
     * @return $this
     */
    public function send(): self
    {
        try {
            $this->client->post($this->url.':'.$this->port.'/event', [
                'json' => [
                    'id' => $this->id,
                    'color' => (string)$this->color,
                    'content' => $this->content,
                    'time' => date('H:i:s.v'),
                    'caller' => $this->caller
                ]
            ]);
        } catch (Throwable $exception) {
            //
        }

        return $this;
    }
}
