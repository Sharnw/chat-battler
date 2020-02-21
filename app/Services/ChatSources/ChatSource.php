<?php

namespace App\Services\ChatSources;

use App\Services\ChatSources\Contracts\ChatSourceContract;

abstract class ChatSource implements ChatSourceContract
{

	/*
     * Full feature support list
     *
     * @return array
     */
    public function featureList(){
    	return [
            'chat.commands' => false,
            'chat.notifications' => false
    	];
    }

	/*
	 * Check whether a feature is supported by the current source
	 */
	public function feature($identifier) {
		$featureList = $this->featureList();
		return (isset($featureList[$identifier]) && $featureList[$identifier]);
	}
}
