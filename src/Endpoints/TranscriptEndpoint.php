<?php

namespace Based\AssemblyAI\Endpoints;

use Based\AssemblyAI\Api;
use Based\AssemblyAI\Models\Transcript;

class TranscriptEndpoint
{
    protected string $audioUrl;
    protected ?string $acousticModel = null;
    protected ?string $languageModel = null;
    protected bool $formatText = true;
    protected bool $punctuate = true;
    protected bool $dualChannel = true;
    protected ?string $webhookUrl = null;
    protected ?int $audioStartFrom = null;
    protected ?int $audioEndAt = null;

    public function __construct(
        protected Api $api
    ) {
    }

    public function formatText(bool $value = true): self
    {
        $this->formatText = $value;

        return $this;
    }

    public function punctuate(bool $value = true): self
    {
        $this->punctuate = $value;

        return $this;
    }

    public function dualChannel(bool $value = true): self
    {
        $this->dualChannel = $value;

        return $this;
    }

    public function webhook(string $url): self
    {
        $this->webhookUrl = $url;

        return $this;
    }

    public function startFrom(int $time): self
    {
        $this->audioStartFrom = $time;

        return $this;
    }

    public function endAt(int $time): self
    {
        $this->audioEndAt = $time;

        return $this;
    }

    public function between(int $from, int $to): self
    {
        return $this->startFrom($from)->endAt($to);
    }

    public function create(string $audioUrl): Transcript
    {
        $this->audioUrl = $audioUrl;

        $response = $this->api->post("transcript", $this->query())->json();

        return new Transcript(...$response);
    }

    public function get(string $id): Transcript
    {
        return new Transcript(
            ...$this->api->get("transcript/{$id}")->json()
        );
    }

    public function query(): array
    {
        return collect([
            'audio_url' => $this->audioUrl,
            'acoustic_model' => $this->acousticModel,
            'language_model' => $this->languageModel,
            'format_text' => $this->formatText,
            'punctuate' => $this->punctuate,
            'dual_channel' => $this->dualChannel,
            'webhook_url' => $this->webhookUrl,
            'audio_start_from' => $this->audioStartFrom,
            'audio_end_at' => $this->audioEndAt,
        ])->whereNotNull()->toArray();
    }
}
