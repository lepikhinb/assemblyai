<?php

namespace Based\AssemblyAI\Facade;

use Based\AssemblyAI\AssemblyAI as AssemblyAIManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Based\AssemblyAI\Endpoints\TranscriptEndpoint transcript()
 *
 * @see \Based\AssemblyAI\AssemblyAI
 */
class AssemblyAI extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AssemblyAIManager::class;
    }
}
