<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class MainsCourantesParticipantsAPI extends MetariscAbstract
{
    /**
     * Suppression d'une participation d'une main courante.
     */
    public function deleteParticipant(string $participant_id) : void
    {
        $table = [
            'participant_id' => $participant_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/mains_courantes_participants/{participant_id}');
        $this->request('DELETE', $path);
    }
}
