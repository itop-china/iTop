<?php
/**
 * Copyright (C) 2013-2020 Combodo SARL
 *
 * This file is part of iTop.
 *
 * iTop is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * iTop is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 */

namespace Combodo\iTop\Application\UI\Layout\ActivityPanel\ActivityEntry\CMDBChangeOp;


use iCMDBChangeOp;

/**
 * Class CMDBChangeOpCreateFactory
 *
 * @author Guillaume Lajarige <guillaume.lajarige@combodo.com>
 * @package Combodo\iTop\Application\UI\Layout\ActivityPanel\ActivityEntry\CMDBChangeOp
 */
class CMDBChangeOpCreateFactory extends CMDBChangeOpFactory
{
	public const DEFAULT_DECORATION_CLASSES = 'fas fa-fw fa-unlink';

	/**
	 * @inheritDoc
	 */
	public static function MakeFromCmdbChangeOp(iCMDBChangeOp $oChangeOp)
	{
		$oEntry = parent::MakeFromCmdbChangeOp($oChangeOp);
		$oEntry->SetDecorationClasses('fas fa-fw fa-seedling');

		return $oEntry;
	}
}