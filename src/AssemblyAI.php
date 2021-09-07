<?php

namespace Based\AssemblyAI;

use Based\AssemblyAI\Endpoints\TranscriptEndpoint;

class AssemblyAI
{
    public Api $api;
    protected TranscriptEndpoint $transcript;

    public function __construct(string $token)
    {
        $this->api = new Api($token);
    }

    public function transcript(): TranscriptEndpoint
    {
        return $this->transcript ??= new TranscriptEndpoint($this->api);
    }
}
