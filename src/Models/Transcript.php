<?php

namespace Based\AssemblyAI\Models;

use Based\AssemblyAI\Endpoints\TranscriptEndpoint;

class Transcript
{
    protected TranscriptEndpoint $endpoint;

    public function __construct(
        public string $id,
        public string $status,
        public string $audio_url,
        public string $acoustic_model,
        public string $language_model,
        public bool $format_text,
        public bool $punctuate,
        public ?bool $dual_channel = null,
        public ?string $webhook_url = null,
        public ?float $audio_duration = null,
        public ?float $confidence = null,
        public ?string $text = null,
        public ?array $utterances = null,
        public ?int $webhook_status_code = null,
        public ?array $words = null,
        public ?string $error = null,
        public ?bool $speed_boost = null,
        ...$arguments
    ) {
    }
}
