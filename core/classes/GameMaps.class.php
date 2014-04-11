<?php
/**
 * BattlefieldTools.com BFP4F ServerTool
 * Version 0.6.0
 *
 * Copyright (C) 2013 <Danny Li> a.k.a. SharpBunny
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 */
 
class GameMaps {
	
	public $maps = array(
	
		'gulf_of_oman' => 'Gulf of Oman',
		'dragon_valley' => 'Dragon Valley',
		'dalian_plant' => 'Dalian Plant',
		'mashtuur_city' => 'Mashtuur City',
		'strike_at_karkand' => 'Strike at Karkand',
		'daging_oilfields' => 'Daging OilFields',
		'sharqi_peninsula' => 'Sharqi Peninsula',
		'wake_island_2007' => 'Wake Island 2007',
		'fushe_pass' => 'Fushe Pass',
		'greatwall' => 'GreatWall',
		'highway_tampa' => 'Highway Tampa',
		'kubra_dam' => 'Kubra Dam',
		'midnight_sun' => 'Midnight Sun',
		'operation_clean_sweep' => 'Operation Clean Sweep',
		'operationharvest' => 'Operation Harvest',
		'operationroadrage' => 'Operation Road Rage',
		'operationsmokescreen' => 'Operation Smoke Screen',
		'road_to_jalalabad' => 'Road to Jalalabad',
		'songhua_stalemate' => 'Songhua Stalement',
		'taraba_quarry' => 'Taraba Quarry',
		'zatar_wetlands' => 'Zatar Wetlands',
		'operation_blue_pearl' => 'Operation Blue Pearl',
	
	);
	
	public $gamemodes = array(
	
		'gpm_cq' => 'Assault'	
	);
	
	public $combos = array(
	
		'gpm_cq' => array(
			'gulf_of_oman',
			'dragon_valley',
			'dalian_plant',
			'mashtuur_city',
			'strike_at_karkand',
			'sharqi_peninsula',
			'wake_island_2007',
			'daging_oilfields',
			'wake_island_2007',
			'fushe_pass',
			'greatwall',
			'highway_tampa',
			'kubra_dam',
			'midnight_sun',
			'operation_clean_sweep',
			'operationharvest',
			'operationroadrage',
			'operationsmokescreen',
			'road_to_jalalabad',
			'songhua_stalemate',
			'taraba_quarry',
			'zatar_wetlands',
			'operation_blue_pearl',
		),
		
	
	);
	
	public $mapsAlt, $gamemodesAlt;
	
	public function __construct() {
		$this->mapsAlt = array_flip($this->maps);
		$this->gamemodesAlt = array_flip($this->gamemodes);
	}
	
	/**
	 * getMapName()
	 * Gets the mapname by key
	 * 
	 * @param $key str - Key e.g. strike_at_karkand
	 * @return str - Mapname
	 */
	public function getMapName($key) {
		if(isset($this->maps[strtolower($key)])) {
			return $this->maps[strtolower($key)];
		}
		
		return 'Unknown';
	}
	
	/**
	 * getGameMode()
	 * Gets the gamemode name by key
	 * 
	 * @param $key str - Key e.g. gpm_sa
	 * @return str - Gamemode name
	 */
	public function getGameMode($key) {
		if(isset($this->gamemodes[$key])) {
			return $this->gamemodes[$key];
		}
		
		return 'Unknown';
	}
	
	/**
	 * getMapNameKey()
	 * Gets the mapkey by map name
	 * 
	 * @param $name str - Mapname e.g. Karkand
	 * @return str - Key
	 */
	public function getMapNameKey($name) {
		if(isset($this->mapsAlt[$name])) {
			return $this->mapsAlt[$name];
		}
		
		return 'strike_at_karkand';
	}
	
	/**
	 * getGameModeKey()
	 * Gets the gamemode key by gamemode name
	 * 
	 * @param $name str - Gamemode name e.g. Assault
	 * @return str - Key
	 */
	public function getGameModeKey($name) {
		if(isset($this->gamemodesAlt[$name])) {
			return $this->gamemodesAlt[$name];
		}
		
		return 'gpm_sa';
	}
	
}
 
?>
