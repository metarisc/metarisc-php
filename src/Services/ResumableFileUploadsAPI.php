<?php

namespace Metarisc\Services;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class ResumableFileUploadsAPI extends MetariscAbstract
{
    protected function replacements(array $replacement_table) : \Closure
    {
        return function (string $matches) use ($replacement_table) {
            $param = $matches[1];
            if (isset($replacement_table[$param])) {
                return $replacement_table[$param];
            } else {
                return $matches;
            }
        };
    }

    public function createNewUploadResource(string $body) : ResponseInterface
    {
        return $this->request('POST', '/resumable-file-uploads/files', [
            'json' => [$body,
            ],
        ]);
    }

    public function deleteFile(mixed $tus_resumable, string $id) : ResponseInterface
    {
        $table = [
            'Tus-Resumable' => $tus_resumable,
            'id'            => $id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/resumable-file-uploads/files/{id}');

        return $this->request('DELETE', $path);
    }

    public function getServerInfo() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/resumable-file-uploads/files');

        return $this->request('OPTIONS', $path);
    }

    public function getUploadOffset(mixed $tus_resumable, string $id) : ResponseInterface
    {
        $table = [
            'Tus-Resumable' => $tus_resumable,
            'id'            => $id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/resumable-file-uploads/files/{id}');

        return $this->request('HEAD', $path);
    }

    public function patchFile(mixed $tus_resumable, int $content_length, int $upload_offset, string $id, string $upload_checksum = null, string $body = null) : ResponseInterface
    {
        $table = [
            'Tus-Resumable'   => $tus_resumable,
            'Content-Length'  => $content_length,
            'Upload-Offset'   => $upload_offset,
            'id'              => $id,
            'Upload-Checksum' => $upload_checksum,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/resumable-file-uploads/files/{id}');

        return $this->request('PATCH', $path);
    }
}
