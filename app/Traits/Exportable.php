<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\StreamedResponse;

trait Exportable
{
    public function scopeToCsv(Builder $query, string $name = 'export.csv'): StreamedResponse
    {
        return response()->streamDownload(function () use ($query) {
            $results = $query->get();

            if ($results->count() < 1) return;

            $titles = implode(',', array_keys((array)$results->first()->getAttributes()));

            $values = $results->map(function ($result) {
                return implode(',', collect($result->getAttributes())->map(function ($thing) {
                    return '"' . $thing . '"';
                })->toArray());
            });

            $values->prepend($titles);

            echo $values->implode("\n");
        }, $name);
    }
}
