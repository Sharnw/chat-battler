<?php

namespace App\Services\ChatSources\Contracts;

interface ChatSourceContract  {

    /*
     * Full feature support list
     *
     * @return array
     */
    function featureList();

    /*
     * Check whether a feature is supported by the current source
     */
    function feature($identifier);

    /*
     * Send notification to chat channel.
     */
    function notifyChat($message);

    /*
     * Receive chat channel command.
     */
    function receiveCommand($command);

    /*
     * Source identifier attribute.
     */
    function identifier();

    /*
     * Source albel attribute.
     */
    function label();

    /*
     * Default settings array attribute.
     */
    function defaultSettings();

}
