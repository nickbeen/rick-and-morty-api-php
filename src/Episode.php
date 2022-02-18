<?php

namespace NickBeen\RickAndMortyPhpApi;

use NickBeen\RickAndMortyPhpApi\Contracts\EpisodeContract;

class Episode extends Base implements EpisodeContract
{
	public function withEpisode(int $episode): Episode
	{
		$this->filter['episode'] = $episode;
		return $this;
	}

	public function withName(string $name): Episode
	{
		$this->filter['name'] = strtolower($name);
		return $this;
	}
}
