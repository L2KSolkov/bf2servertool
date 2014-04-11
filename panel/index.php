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
 
require_once('../core/init.php');

$user->checkLogin(true);

$pageTitle = $lang['cp_dashboard'];
include(CORE_DIR . '/cp_header.php');
?>
			
			<div class="row">
				<div class="col-md-12">
					
					<h2><i class="fa fa-home"></i> <?=$lang['cp_dashboard']?> <small><?=$lang['cp_dashboard_subtitle']?></small></h2>
					<hr />
					
					<script>
					function alertError(last) {
						$('#infoAlert').removeClass('alert-success').addClass('alert-danger');
						$('#infoStatus').html('<?=addslashes($lang['msg_serverdown'])?>');
						$('#info0').html('<?=$lang['word_error']?> - <small><i class="fa fa-heart-o red"></i> ' + last + '</small>');
						$('#infoExtra').hide();
					}
					
					function fetchInfo() {
						$.get('<?=HOME_URL?>panel/ajax/serverInfo.php', function(data) {
							if(data.status.length > 0) {
								if(data.status == 'OK') {
									
									$('#infoAlert').removeClass('alert-danger').addClass('alert-success');
									$('#infoStatus').html('');
									$('#infoExtra').show();
									$('#info0').html(data.info.name + ' - <small><b class="yellow"> ' + data.request_date + '</small></b>');
									$('#info1').html(data.info.playersCurrent + ' / ' + data.info.playersMax + ' (' + data.info.playersJoining + ' <?=$lang['tool_server_joining']?>)');
									$('#info2').html(data.info.mapName + ' [' + data.info.gameModeName + '] ');
									$('#info3').html(data.info.ranked.replace('1','<span class="green"><?=$lang['tool_server_ranked']?></span>').replace('0','<span class="red"><?=$lang['tool_server_unranked']?></span>'));
									
								} else {
									alertError(data.last_stream);
								}
							} else {
								alertError(data.last_stream);
							}
						}).fail(function(data) {
							alertError(data.last_stream);
						});
					}
					
					// Fetch info every 15 seconds
					var i = new Interval('fetchInfo()', 15000);
					i.start();
					
					// Fetch info immediately when page is loaded
					fetchInfo();
					</script>

					<div class="alert alert-success alert-block" id="infoAlert">
						<h4><i class="fa fa-info-circle"></i> <span id="info0">Loading...</span></h4>
						<p id="infoStatus"></p>
						<div class="row" id="infoExtra">
							<div class="col-md-6">
								<p>
									<b><?=$lang['cp_dashboard_info_1']?>:</b> <span id="info1">Loading...</span><br />
									<b><?=$lang['tool_server_curmap']?>:</b> <span id="info2">Loading...</span>
								</p>
							</div>
							<div class="col-md-6">
								<p>
									<b><?=$lang['cp_dashboard_info_2']?>:</b> <span id="info3">Loading...</span><br />
									<b><?=$lang['vcheck_current']?>:</b> <?=TOOL_VERSION?>
								</p>
							</div>
						</div>
					</div>
					
					<hr />
					
					<div class="row">
						<div class="col-md-3 center db-item<?=(($userInfo['rights_server'] == 'no') ? ' disabled' : '')?>">
							<h1 class="dark"><i class="fa fa-hdd-o fa-2x"></i></h1>
							<h3><a href="<?=HOME_URL?>panel/server.php"><?=$lang['tool_server']?></a></h3>
							<p><?=$lang['tool_server_desc']?></p>
						</div>
						<div class="col-md-3 center db-item<?=(($userInfo['rights_itemlist'] == 'no') ? ' disabled' : '')?>">
							<h1 class="dark"><i class="fa fa-list fa-2x"></i></h1>
							<h3><a href="<?=HOME_URL?>panel/itemlist.php"><?=$lang['tool_iteml']?></a></h3>
							<p><?=$lang['tool_iteml_desc']?></p>
						</div>
						<div class="col-md-3 center db-item<?=(($userInfo['rights_superadmin'] == 'no') ? ' disabled' : '')?>">
							<h1 class="dark"><i class="fa fa-wrench fa-2x"></i></h1>
							<h3><a href="<?=HOME_URL?>panel/settings.php"><?=$lang['tool_set']?></a></h3>
							<p><?=$lang['tool_set_desc']?></p>
						</div>
						<div class="col-md-3 center db-item<?=(($userInfo['rights_superadmin'] == 'no') ? ' disabled' : '')?>">
							<h1 class="dark"><i class="fa fa-group fa-2x"></i></h1>
							<h3><a href="<?=HOME_URL?>panel/accounts.php"><?=$lang['tool_acc']?></a></h3>
							<p><?=$lang['tool_acc_desc']?></p>
						</div>
					</div>
					<br />
					<div class="row">
				
						<div class="col-md-3 center db-item">
							<h1 class="dark"><i class="fa fa-user fa-2x"></i></h1>
							<h3><a href="<?=HOME_URL?>panel/my-account.php"><?=$lang['cp_myaccount']?></a></h3>
							<p><?=$lang['cp_myaccount_subtitle']?></p>
						</div>
						<div class="col-md-3 center db-item">
							<h1><a href="javascript:;" onclick="$.executeCmd('toggleTool',{'vars':{'tool':'igcmds'}});$(this).find('i').toggleClass('red green')"><i class="<?=(($settings['tool_igcmds'] == 'true') ? 'fa fa-bullhorn green' : 'fa fa-bullhorn red')?> fa-2x"></i></a></h1>
							<h3><a href="<?=HOME_URL?>panel/igcmds"><?=$lang['tool_igcmds']?></a></h3>
							<p><?=$lang['tool_igcmds_desc']?></p>
						</div>
						<div class="col-md-3 col-md-offset-2 center db-item<?=(($userInfo['rights_blacklist'] == 'no') ? ' disabled' : '')?>">
							<h1><i class="fa fa-ban red fa-2x"></i></h1>
							<h3><a href="<?=HOME_URL?>panel/blacklist.php"><?=$lang['tool_bl']?></a></h3>
							<p><?=$lang['tool_bl_desc']?></p>
							<p><i><?=$lang['tool_bl_warn1']?></i></p>
						</div>
						<div class="col-md-3 center db-item<?=(($userInfo['rights_rcon'] == 'no') ? ' disabled' : '')?>">
							<h1><i class="fa fa-terminal blue fa-2x"></i></h1>
							<h3><a href="<?=HOME_URL?>panel/tool/rcon.php"><?=$lang['tool_rcon']?></a></h3>
							<p><?=$lang['tool_rcon_desc']?></p>
							<p><i><?=$lang['tool_rcon_info1']?></i></p>
						</div>
					</div>
					
					<br />
										
					
					</div>
					<br />
					<div class="row">
					</div>
					
				</div>
			</div>
			
<?php include(CORE_DIR . '/cp_footer.php'); ?>
