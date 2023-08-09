<?php

namespace Metarisc\Services;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class ResumableFileUploadsAPI extends MetariscAbstract
{
    private array $replacement_table;

    protected function replacements() : \Closure
    {
        $table = $this->replacement_table;

        return function ($matches) use ($table) {
            $param = $matches[1];
            if (isset($table[$param])) {
                return $table[$param];
            } else {
                return $matches;
            }
        };
    }

    public function createNewUploadResource($body) : ResponseInterface
    {
        return $this->request('POST', '/resumable-file-uploads/files', [
            'json' => [$body,
            ],
        ]);
    }

    public function deleteFile($tus_resumable, $id) : ResponseInterface
    {
        $this->replacement_table = [
            'Tus-Resumable' => $tus_resumable,
            'id'            => $id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/resumable-file-uploads/files/{id}');

        return $this->request('DELETE', $path);
    }

    public function getServerInfo() : ResponseInterface
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/resumable-file-uploads/files');

        return $this->request('OPTIONS', $path);
    }

    public function getUploadOffset($tus_resumable, $id) : ResponseInterface
    {
        $this->replacement_table = [
            'Tus-Resumable' => $tus_resumable,
            'id'            => $id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/resumable-file-uploads/files/{id}');

        return $this->request('HEAD', $path);
    }

    public function patchFile($tus_resumable, $content_length, $upload_offset, $id, $upload_checksum = null, $body = null) : ResponseInterface
    {
        $this->replacement_table = [
            'Tus-Resumable'   => $tus_resumable,
            'Content-Length'  => $content_length,
            'Upload-Offset'   => $upload_offset,
            'id'              => $id,
            'Upload-Checksum' => $upload_checksum,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/resumable-file-uploads/files/{id}');

        return $this->request('PATCH', $path);
    }
}
